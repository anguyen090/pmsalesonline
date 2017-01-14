<?PHP
include_once "../_sys/_config.php";
include_once "../_sys/database.class.php";
include_once "../_sys/functions.class.php";
include_once "../_sys/ez_sql_core.php";
include_once "../_sys/ez_sql_mysql.php";

date_default_timezone_set("Asia/Ho_Chi_Minh");

$db = new ezSQL_mysql($userdata,$db_pass,$database,$server);

ob_start();

//////////////////////////// LOAD FUNCTIONS SU LY //////////////////////////////////
include("../_sys/_chuyendoi.php");

//=====================================HAM TAO VA LAY COOKIE=================================================
//Cookie
function tao_cookie($name, $value = ""){ 
$expires = time() + 60*60*24*365; 
setcookie($name, $value, $expires,"/",""); } 
function lay_cookie($name){ 
if (isset($_COOKIE[$name])) 
{ return urldecode($_COOKIE[$name]); 
} else { 
return FALSE; } }
///////////////////////////LAY COOKIE WEBSITE HOAT DONG///////////////////////////////
$cookie["user_email"]	= lay_cookie("user_email");
$cookie["user_pass"]	= lay_cookie("user_pass");
$cookie["user_fullname"]= lay_cookie("user_fullname");
$cookie["user_right"]	= lay_cookie("user_right");
			
$user_email		= $cookie["user_email"];
$user_pass		= $cookie["user_pass"];
$user_fullname	= $cookie["user_fullname"];
$user_right		= $cookie["user_right"];

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//HÀM PHÂN LOAI NOI DUNG
	function typeCategory($parentid,$aCats,$cols = array()){
		foreach($aCats as $v){
			if($v->dongnoidung_id == $parentid){
				$cols[] = $v->loainoidung_id;
				$cols = typeCategory($v->loainoidung_id,$aCats,$cols);
			}
		}
		return $cols;
	}

	//HÀM PHÂN LOAI SAN PHAM
	function typeProducts($parentid,$aCats,$cols = array()){
		foreach($aCats as $v){
			if($v->dongsanpham_id == $parentid){
				$cols[] = $v->loaisanpham_id;
				$cols = typeProducts($v->loaisanpham_id,$aCats,$cols);
			}
		}
		return $cols;
	}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>