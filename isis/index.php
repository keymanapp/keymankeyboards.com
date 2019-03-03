<?php
  $Title = "ISIS Keyboards";
  $MetaTag = "Free Indic keyboard layouts for Keyman with online demo";
  require_once('../common/header.php');
  echo KMW_Demo('7',"Keyboard_isis_devanagari",'12pt Tahoma');
  echo <<<END
<script src='https://s.keyman.com/kmw/engine/453/keymanweb.js'></script>
<script src='https://s.keyman.com/kmw/engine/453/kmwuibutton.js'></script>
<script>
  (function(kmw) {
    kmw.init();
    kmw.addKeyboards('isis_bangla@asm', 'isis_bangla@ben', 'isis_devanagari@gom',
                     'isis_gujarati@guj', 'isis_devanagari@hin',
                     'isis_kannada@kan', 'isis_malayalam@mal',
                     'isis_devanagari@mar', 'isis_devanagari@mve',
                     'isis_oriya@ori', 'isis_gurmukhi@pan', 'isis_gurmukhi@pnb',
                     'isis_devanagari@san', 'isis_tamil@tam', 'isis_telugu@tel');
  })(tavultesoft.keymanweb);
</script>
END;
?>

<div>

<p>
Mnemonic (Romanized) keyboards for all major Indian scripts. ISIS is free and easy to use.
Developed by Gautam Sengupta, Center for Applied Linguistics &amp; Translation Studies,
University of Hyderabad and funded by the Government of India. Requires Windows 2000/XP.</p>


<div style='float: right; border: solid 1px #cccccc; width: 312px; font-size: 10pt; margin: 0 8px 8px 8px; padding: 8px; background: #FFFFCC'>
<h1 style='margin: 0px 0px 0px 0px'><img src='<?php echo $AllSites; ?>/kmwlogo.gif' alt='KMW' style='margin: 0 6px 6px 0; vertical-align: top; float: left' />KeymanWeb Demo</h1>
<div style='float: right; margin: 0 0 0 0'><div id='KeymanWebControl'></div></div>
<p style='margin: 4px 0 0 0; font-size: 10pt'>Try the ISIS keyboard layouts here:</p>
<div><textarea id='ta' cols='64' rows='8' onfocus='dofocus();' onblur='doblur();' style='color: grey; font: italic 10pt Tahoma; text-align: center; padding: 4px; width: 300px; height: 100px; margin:0'>
Click here and start typing to try 
using an ISIS keyboard.
No download required!</textarea></div>

<p style='margin: 6px 0 4px 0'><a href='https://keyman.com/developer/keymanweb/'>More about KeymanWeb</a></p>
</div>

<table class='display'>
<?php
  $keyboards = array(
    'Bangla' => array('Assamese, Bengali', 419),
    'Devanagari' => array('Hindi, Konkani, Marathi, Marwari, Sanskrit', 420),
    'Gujarati' => array('Gujarati', 421),
    'Gurmukhi' => array('Panjabi', 422),
    'Kannada' => array('Kannada', 423),
    'Malayalam' => array('Malayalam', 424),
    'Oriya' => array('Oriya', 425),
    'Tamil' => array('Tamil', 426),
    'Telugu' => array('Telugu', 427)
  );
  
  foreach ($keyboards as $name => $array) {
    list($langs, $id) = $array;
  	echo <<<END
<tr>
  <th style='padding-top:0'>$name<br /><span class='note'>$langs</span></th>
  <td style='padding-top:0'><a onclick="pageTracker._link(this.href); return false;" href='http://keymankeyboards.com/$id'>
    <img border='0' src='$AllSites/tiny_download70.png' alt='Download Now!' /></a></td>
</tr>
END;
  }
?>

<tr>
<th>All ISIS keyboards in one package<br /><span style="font-weight: normal; padding-left: 10px">All Indic languages shown above</span></th>
<td><a onclick="pageTracker._link(this.href); return false;" href='http://keymankeyboards.com/330'>
    <img border='0' src='<?php echo $AllSites; ?>/tiny_download70.png' alt='Download Now!' />
  </a>
</td>
</tr>
</table>

<h2>Technical Support</h2>
<ul>
<li><a href='https://community.software.sil.org/c/keyman'>Community Forums</a></li>
</ul>

</div>

<?php
  $Tracker = "UA-249828-6";
  $ExtraCopyright = "Keyboards copyright &copy; Gautam Sengupta. ";
  echo PageFooter($Tracker,$ExtraCopyright);
?>
