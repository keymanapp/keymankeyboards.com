# syntax=docker/dockerfile:1
# Site
FROM php:7.4-apache
COPY resources/keyman-site.conf /etc/apache2/conf-available/
RUN chown -R www-data:www-data /var/www/html/

RUN a2enmod rewrite; a2enconf keyman-site
