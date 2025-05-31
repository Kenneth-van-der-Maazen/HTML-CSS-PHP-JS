<?php  
session_start();

session_unset();
session_destroy();

echo "Uitgelogd!";
header("Refresh:2; url=index.php");
exit;