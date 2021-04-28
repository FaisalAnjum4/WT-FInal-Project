<?php

 session_start();
?>

<?php
unset($_SESSION['username']);
session_destroy();
 header("Location: CoverPage.php ");
exit();


?>
