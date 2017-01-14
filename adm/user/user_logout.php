<?PHP
include_once "../../_sys/_config.php";
include_once "../../_sys/database.class.php";
include_once "../../_sys/functions.class.php";
include_once "../../_sys/ez_sql_core.php";
include_once "../../_sys/ez_sql_mysql.php";
include_once "../../_sys/functions.class.php";
include_once "../models/user.class.php";
$f = new functionGet();
$user =  new User();
$user->logOut();
echo $f->confirmErr("Đăng xuất thành công");