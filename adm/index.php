<?PHP
session_start();
//Dat gia tri cho duong dan khoi dong Web admin
define( '_AK_MOS_', 1 );
define('MTN_BASE_SITEURL','http://'.$_SERVER['HTTP_HOST'].'/pnsalesonline');
//Kiem tra Language
require("./includes/lang_check.php");
//Ket noi database-------------------------------------------
require("./includes/_conn.php");
?>
<?PHP
//Gọi đến class function
include '../_sys/function.class.php';
// Kiem tra quyen truoc khi lam viec;
include './models/bannerslide.class.php';
include './models/configuration.class.php';
include './models/widget.class.php';
include './models/loainoidung.class.php';
include './models/content.class.php';
include './models/boxhienthi.class.php';
include './models/hienthivitri.class.php';
include './models/user.class.php';
include './models/group.class.php';
include './models/themes.class.php';
include './models/configemail.class.php';
include './models/newsletters.class.php';
include_once "./models/checkfilelog.class.php";
$user = new User();
$group = new Group();
$config = new Configuration();
$themes = new Themes();
$log = new CheckFileLog();
$f = new functionGet();
//Kiểm tra trang admin
// Kiem tra quyen truoc khi lam viec
if(isset($_GET['action']) AND $_GET['action']!="")
	$todo=$_GET['action'];
if(isset($_POST['action']) AND $_POST['action']!="")	
	$todo=$_POST['action'];
if(isset($todo) AND $todo=="")
	$todo="view";
if(isset($todo) AND $todo=="view")
	include("./includes/read_check.php");
if(isset($todo) AND $todo=="add")
	include("./includes/add_check.php");
if(isset($todo) AND $todo=="update")
	include("./includes/update_check.php");
if(isset($todo) AND $todo=="delete")
	include("./includes/delete_check.php");
?>
<?PHP
//Kiem tra dang nhap
include("./includes/session_check.php");
//Dau trang	header
include_once("./includes/header.php");
 if(isset($_GET['option'])){
	//Kiểm tra các file có file config để chạy file config
    foreach (glob("./modules/*/config.php") as $filename) {
		include $filename;
		foreach ($linkAction as $linkAction)
		{
			if($_GET['option']==$linkAction[0])
			{
				include "./modules/".$linkAction[1];
			}
		}
	}
    //Sử dụng switch case để include module
    switch($_GET['option']) {
        case 'user':
        require_once "./user/user.php";
        break;
        case 'user_process':
        require "./user/user_process.php";
        break;
        case 'version':
        require_once "./includes/version.php";
        break;
    }
 }else{
 	include_once "./includes/welcome.php";
 }
?> 
 <?PHP
 //Load check file log truy cập website
 $log->checkLogWebsiteLogin($_SERVER['REMOTE_ADDR'],"log/log_adm/","Desktop","Trang "," Admin",$log->curentPage());
 //include footer
 include_once("./includes/footer.php");
 ?>
