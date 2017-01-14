<?PHP
include_once "./_sys/_config.php";
include_once "./_sys/ez_sql_core.php";
include_once "./_sys/ez_sql_mysql.php";

date_default_timezone_set("Asia/Ho_Chi_Minh");

$db = new ezSQL_mysql($userdata,$db_pass,$database,$server);

ob_start();

//////////////////////////// LOAD FUNCTIONS SU LY //////////////////////////////////
include("./_sys/_chuyendoi.php");
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>