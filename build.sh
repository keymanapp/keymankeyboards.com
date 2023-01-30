#!/usr/bin/env bash
#
# Setup keymankeyboards.com site to run via Docker.
#
set -eu

## START STANDARD BUILD SCRIPT INCLUDE
# adjust relative paths as necessary
THIS_SCRIPT="$(greadlink -f "${BASH_SOURCE[0]}" 2>/dev/null || readlink -f "${BASH_SOURCE[0]}")"
. "$(dirname "$THIS_SCRIPT")/resources/builder.inc.sh"
## END STANDARD BUILD SCRIPT INCLUDE

################################ Main script ################################

function _get_docker_image_id() {
  echo "$(docker images -q keyman-keyboards-website)"
}

function _get_docker_container_id() {
  echo "$(docker ps -a -q --filter ancestor=keyman-keyboards-website)"
}

function _stop_docker_container() {
  KEYMAN_KEYBOARDS_CONTAINER=$(_get_docker_container_id)
  if [ ! -z "$KEYMAN_KEYBOARDS_CONTAINER" ]; then
    docker container stop $KEYMAN_KEYBOARDS_CONTAINER
  else
    echo "No Docker container to stop"
  fi
}

builder_describe \
  "Setup keymankeyboards.com site to run via Docker." \
  configure \
  clean \
  build \
  start \
  stop \
  test \

builder_parse "$@"

# This script runs from its own folder
cd "$REPO_ROOT"

if builder_start_action configure; then
  # Nothing to do
  builder_finish_action success configure
fi

if builder_start_action clean; then
  # Stop and cleanup Docker containers and images used for the site
  _stop_docker_container

  KEYMAN_KEYBOARDS_CONTAINER=$(_get_docker_container_id)
  if [ ! -z "$KEYMAN_KEYBOARDS_CONTAINER" ]; then
    docker container rm $KEYMAN_KEYBOARDS_CONTAINER
  else
    echo "No Docker container to clean"
  fi
    
  KEYMAN_KEYBOARDS_IMAGE=$(_get_docker_image_id)
  if [ ! -z "$KEYMAN_KEYBOARDS_IMAGE" ]; then
    docker rmi keyman-keyboards-website
  else 
    echo "No Docker image to clean"
  fi

  builder_finish_action success clean
fi

if builder_start_action stop; then
  # Stop the Docker container
  _stop_docker_container
  builder_finish_action success stop
fi

if builder_start_action build; then
  # Download docker image. --mount option requires BuildKit
  DOCKER_BUILDKIT=1 docker build -t keyman-keyboards-website .

  builder_finish_action success build
fi

if builder_start_action start; then
  # Start the Docker container
  if [ ! -z $(_get_docker_image_id) ]; then
    if [[ $OSTYPE =~ msys|cygwin ]]; then
      # Windows needs leading slashes for path
      docker run -d -p 8052:80 -v //$(pwd):/var/www/html/ -e S_KEYMAN_COM=localhost:8054 keyman-keyboards-website
    else
      docker run -d -p 8052:80 -v $(pwd):/var/www/html/ -e S_KEYMAN_COM=localhost:8054 keyman-keyboards-website
    fi
  else
    echo "${COLOR_RED}ERROR: Docker container doesn't exist. Run ./build.sh build first${COLOR_RESET}"
    builder_finish_action fail start
  fi

  builder_finish_action success start
fi

if builder_start_action test; then
  # TODO: lint tests

  #composer check-docker-links

  builder_finish_action success test
fi
