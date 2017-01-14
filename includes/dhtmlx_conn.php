<?PHP
include_once "../../../_sys/_config.php";
include_once "../../../_sys/ez_sql_core.php";
include_once "../../../_sys/ez_sql_mysql.php";
include_once "../../../_sys/_chuyendoi.php";

$db = new ezSQL_mysql($userdata,$db_pass,$database,$server);

ob_start();

?>