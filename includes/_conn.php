<?PHP
include_once "../_sys/_config.php";
include_once "../_sys/ez_sql_core.php";
include_once "../_sys/ez_sql_mysql.php";


date_default_timezone_set("Asia/Ho_Chi_Minh");

$db = new ezSQL_mysql($userdata,$db_pass,$database,$server);

ob_start();

//////////////////////////// LOAD FUNCTIONS SU LY //////////////////////////////////
include("./../_sys/_chuyendoi.php");
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