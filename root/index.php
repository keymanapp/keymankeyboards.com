<?php 
  function util_loadpage($page, $from_current_url = true) {
    if(substr($page, 0, 5) == 'http:' || substr($page, 0, 6) == 'https:' || substr($page, 0, 6) == 'about:')
      header("Location: ".$page, true, 301);
    else
      header("Location: ".($from_current_url ? current_url(true) : protocol.$_SERVER['HTTP_HOST'].'/').$page, true, 301);
    echo(chr(13).chr(10));
    flush();

    exit;
  }
    
  if(isset($_REQUEST['id'])) $id = $_REQUEST['id'];
  else if(isset($_REQUEST['ID'])) $id = $_REQUEST['ID'];
  else if(isset($_REQUEST['KeyboardID'])) $id = $_REQUEST['KeyboardID'];
  else if(isset($_REQUEST['keyboardid'])) $id = $_REQUEST['keyboardid'];
 
  if(isset($id) && is_numeric($id)) {
    util_loadpage('https://keyman.com/keyboards/legacy/'.$id, false);
  } else {
    if(isset($_REQUEST['Search'])) $Search=rawurlencode($_REQUEST['Search']);
    else if(isset($_REQUEST['q'])) $Search=rawurlencode($_REQUEST['q']);
    
    if(isset($Search)) $Search = "?q=$Search&from=keymankeyboards.com";
    else $Search = '';
  
    util_loadpage('https://keyman.com/keyboards/'.$Search, false);
  }
?>
