<?php
  $Title = "Help for ISIS Keyboards";
  require_once('../common/header.php');
?>

<h2>FAQ</h2>

<ol>

<li>
  <p class='faq'>Which versions of Windows do these keyboards work on?</p>
  <p class='faa'>These keyboards will work without problems on Windows 2000, XP, Vista, Server 2003 and later versions.
     Some applications may have trouble displaying Indic text unless Internet Explorer 6.0 or later is installed.
     Windows 95, 98 and Me are not recommended because they have limited Unicode support, but you can use these 
     keyboards with some applications on these operating systems.  See the Keyman Desktop documentation for 
     more information.
  </p>
</li>

<li>
  <p class='faq'>Do I need additional fonts?</p>
  <p class='faa'>Not always.  In Windows XP, Oriya, Bangla and Malayalam scripts need separate fonts which are included
     with this package.
  </p>
</li>

</ol>

<?php
  $Tracker = "UA-249828-6";
  $ExtraCopyright = "Keyboards copyright &copy; Gautam Sengupta. ";
  echo PageFooter($Tracker,$ExtraCopyright);
?>
