
<?php 
$title = "Contact";
ob_start()
?>

<div class="centered-box">
    <h1>Comming soon</h1>
    <p>Ce contenu arrive bientôt</p>
</div>

<?php
$content = ob_get_clean() ;
require("template.php");
?>

