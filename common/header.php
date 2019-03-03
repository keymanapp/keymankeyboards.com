<?php

  ob_start();

  if(!isset($Title)) exit;
  
  $TestServer = strpos($_SERVER['HTTP_HOST'], 'keymankeyboards.local') !== FALSE;
  if($TestServer)
  {
    $site_tavultesoft='testsite.tavultesoft.local';
    $site_keymandesktophelp = 'help.keymandesktop.tavultesoft.local';
  }
  else
  {
    $site_tavultesoft='www.tavultesoft.com';
    $site_keymandesktophelp = 'help.keymandesktop.com';
  }
  
// Identify the host, and get the enclosing folder  (*** use Cameroon temporarily! ***)
  $AllSites = "http://common." . substr(strstr($_SERVER['HTTP_HOST'],"."),1);
  
// Read the menu and any additional styles needed.  
// Embedded fonts must be included in local.css (see ethiopic for example)
  $PageMenu = $LocalStyles = "";
  if(file_exists("./menu.inc"))
    $PageMenu = file_get_contents("./menu.inc");
  if(file_exists("./local.css")) 
    $LocalStyles =  '@import "/local.css";';
    
  $Description = '';
  if(isset($MetaTag)) $Description='<meta name="Description" content="'.$MetaTag.'" />';
  
  echo <<<END
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  $Description
  <title>$Title</title>
  
  <style type='text/css'>
    @import "$AllSites/kbdsitestyle.css"; 
    $LocalStyles    
  </style>
  
<script type='text/javascript'><!--
startList = function() {
	if (document.all&&document.getElementById) {
		navRoot = document.getElementById("nav");
		for (i=0; i<navRoot.childNodes.length; i++) {
			node = navRoot.childNodes[i]; 
			if (node.nodeName=="LI") {
				node.onmouseover=function() {
					this.className+=" over";
				}
				node.onmouseout=function() {
					 this.className=this.className.replace(" over", "");
				}
			}
		}
	}
}
window.onload=startList;
//--></script>
  
</head>
<body>

<div id='container'>

<div style='position: relative; left: 0; top: 0; height: 80px; border-bottom: solid 2px white'>
  <a href='https://keyman.com'><img src='$AllSites/logo2.png' 
    style='position: absolute; border: none; display: block; left: 10px; bottom: 14px' 
    width='250' height='66' alt='Keyman' />
  </a>
</div>

$PageMenu

<div id='content'>
<div id='mainColumn'>
<div class='mainColumn_content'>

<h1>$Title</h1>
END;

function PageFooter($Tracker,$ExtraCopyright="",$MessageBlock="")
{
  $footer = <<<EFTR
  
</div>
</div>
</div>

<div style='clear: both'></div>

$MessageBlock

<p style='font: 8pt Tahoma; margin-bottom: 6px'>$ExtraCopyright &nbsp; Website &copy; 2017 SIL International.</p>

</div>       

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-249828-1");
pageTracker._setDomainName("none");
pageTracker._setAllowLinker(true);
pageTracker._trackPageview();
} catch(err) {}</script>

</body>
</html>
EFTR;
  
  return $footer;
}

function KMW_Demo($id,$kbd,$font)
{
  $t = <<<END
<script type='text/javascript'>
var FirstTime = true, WasVisible = false;

function dofocus()
{
  var ta=document.getElementById('ta');
  if(FirstTime)
  {
    FirstTime = false;
    tavultesoft.keymanweb.setActiveKeyboard("$kbd");
    tavultesoft.keymanweb.osk.show(tavultesoft.keymanweb.util.getAbsoluteX(ta), tavultesoft.keymanweb.util.getAbsoluteY(ta)+ta.offsetHeight);
    ta.value="";
    ta.style.color="black";
    ta.style.textAlign="";
    ta.style.font='$font';
  }
}
function doblur()
{
}
</script>   
END;
  return $t;  
}

  function current_url($folder_only = false)
  {
  	$s = str_replace("\\", "/", $folder_only ? dirname($_SERVER['PHP_SELF']) : $_SERVER['PHP_SELF']);
  	if(substr($s, strlen($s)-1) != '/') $s .= '/';
  	$protocol = (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT']==443) ? 'https://' : 'http://';
  	return $protocol.$_SERVER['HTTP_HOST'] . $s;
  }

  function util_loadpage($page, $from_current_url = true, $permanent = false)
  {
    session_write_close();
    if(substr($page, 0, 5) == 'http:' || substr($page, 0, 6) == 'https:' || substr($page, 0, 6) == 'about:')
      $h = "Location: ".$page;
    else
    {
      $protocol = (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT']==443) ? 'https://' : 'http://';
      $h = "Location: ".($from_current_url ? current_url(true) : $protocol.$_SERVER['HTTP_HOST'].'/').$page;
    }
    
    if($permanent) header($h, TRUE, 301);
    else header($h);
    
    echo(chr(13).chr(10));
    //ob_end_flush();
    flush();

    exit;
  }

?>