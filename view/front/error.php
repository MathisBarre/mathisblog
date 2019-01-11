
<?php 
$title = "Error";
ob_start()
?>

<div class="centered-box">
    <h1>Oops...</h1>
    <p><?= $errorMessage ?></p>
</div>

<?php
$content = ob_get_clean() ;
require("template.php");
?>

