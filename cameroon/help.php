<?php
  $Title = "Help for Cameroon Keyboards";
  require_once('../common/header.php');
?>

<h2>FAQ</h2>

<ol>

<li>
  <p class='faq'>Which versions of Windows does this keyboard work on?</p>
  <p class='faa'>These keyboards will work without problems on Windows 2000, XP, Vista, Server 2003 and later versions.    
     Windows 95, 98 and Me are not recommended because they have limited Unicode support, but you can use these 
     keyboards with some applications on these operating systems.  See the Keyman Desktop documentation for 
     more information.
  </p>
</li>

<li>
  <p class='faq'>Do I need additional fonts?</p>
  <p class='faa'>The Unicode font Charis SIL Bold is recommended and included in the package.
  </p>
</li>

</ol>

<?php
  $Tracker = "UA-249828-8";
  $ExtraCopyright = "Keyboards &copy; SIL Cameroon. ";
  echo PageFooter($Tracker,$ExtraCopyright);
?>