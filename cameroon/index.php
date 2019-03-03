<?php
  $Title = "Cameroon Keyboards by SIL";
  $MetaTag = "Free Cameroon keyboard layouts for Keyman";
  require_once('../common/header.php');

echo <<<END
<p>Keyboard layouts for the languages of Cameroon.</p>

<table class='display'>
END;

  $keyboards = array(
    'QWERTY Unicode' => array('Recommended keyboard based on US English keyboard layout', 436),
    'AZERTY Unicode' => array('Recommended keyboard based on French keyboard layout', 438),
    'QWERTY Legacy' => array('Legacy (non-Unicode) keyboard based on US English keyboard layout', 435),
    'AZERTY Legacy' => array('Legacy (non-Unicode) keyboard based on French keyboard layout', 437)
  );
  
  foreach ($keyboards as $name => $array) {
    list($note, $id) = $array;
  	echo <<<END
<tr>
<th>$name<br /><span class='note'>$note</span></th>
  <td><a onclick="pageTracker._link(this.href); return false;" href='http://keymankeyboards.com/$id'>
      <img border='0' src='$AllSites/small_download70.png' alt='Download Now!' />
      </a>
  </td>
</tr>
END;
  }
?>
</table>

<h2>Technical Support</h2>
<ul>
<li><a href='https://community.software.sil.org/c/keyman'>Community Forums</a></li>
</ul>

<?php
  $Tracker = "UA-249828-8";
  $ExtraCopyright = "Keyboards &copy; SIL Cameroon.";
  echo PageFooter($Tracker,$ExtraCopyright);
?>