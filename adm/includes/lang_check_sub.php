<?PHP
if (!isset($_SESSION['language']) OR $_SESSION['language']=="") {$_SESSION['language']="vietnam";}
if (isset($_GET['lang'])&&$_GET['lang']=="english") {$_SESSION['language']="english";}
if (isset($_GET['lang'])&&$_GET['lang']=="vietnam") {$_SESSION['language']="vietnam";}
if (isset($_GET['lang'])&&$_GET['lang']=="deutsch") {$_SESSION['language']="deutsch";}
if (isset($_GET['lang'])&&$_GET['lang']=="germany") {$_SESSION['language']="germany";}
if (isset($_GET['lang'])&&$_GET['lang']=="chinese") {$_SESSION['language']="chinese";}

include "../../language/".$_SESSION['language'].".php";

?>