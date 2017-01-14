<?PHP
//Connect
require_once ("../../../includes/dhtmlx_conn.php");
//Kiem tra dang nhap
//require_once ("../../includes/session_check.php");

//Kiem tra Language
require_once ("../../includes/lang_check_sub.php");
//LOAD LANGUAGE
require_once ("../../modules/Fcomment/language/".$_SESSION['language'].".php");

//DHTMLX Connect
require_once ("../../dhtmlx/dhtmlx_connect/grid_connector.php");
$conn = mysql_connect($server,$userdata,$db_pass);
mysql_select_db($database);
mysql_query("SET NAMES 'utf8'", $conn);

	//FORMAT BEFOR LOAD -- Select
	function formattingLoad($row){
		global $tbfix;
		
                  //formattingDATE comment_update_date
                  $data = $row->get_value("comment_update_date");
                  $row->set_value("comment_update_date",date("d/m/Y - h:i:s",strtotime($data)));
				  
                  //formattingDATE comment_update_date
                  $modules = $row->get_value("comment_modules");
                  $item = $row->get_value("comment_item");
				  if($modules=="content")
				  {
					$row->set_value("comment_modules","Bài viết");
					$connect2 = new GridConnector($conn,"MySQL");
					$sql = mysql_query("SELECT `noidung_title` FROM `".$tbfix."noidung` WHERE `noidung_id`='".$item."' LIMIT 1 ");
					$noidung = mysql_fetch_array($sql);
					$row->set_value("comment_item","<a href='../content/chitiet/".$item."-".chuyendoi(htmlspecialchars_decode($noidung['noidung_title'])).".html' target='_blank'>".htmlspecialchars_decode($noidung['noidung_title'])."</a>");
				  }
				  if($modules=="products")
				  {
					$row->set_value("comment_modules","Sản phẩm");
					$connect2 = new GridConnector($conn,"MySQL");
					$sql = mysql_query("SELECT `sanpham_title` FROM `".$tbfix."sanpham` WHERE `sanpham_id`='".$item."' LIMIT 1 ");
					$sanpham = mysql_fetch_array($sql);
					$row->set_value("comment_item","<a href='../san-pham/".$item."-".chuyendoi(htmlspecialchars_decode($sanpham['sanpham_title'])).".html' target='_blank'>".htmlspecialchars_decode($sanpham['sanpham_title'])."</a>");
				  }
				  
	}
	
	//FORMAT BEFOR Processing -- Update
	function CheckDataUpdate($action){
            $new_value = date("y-m-d h:i:s"); //Ngày cập nhật là ngày hiện tại
            $action->set_value("comment_update_date",$new_value);
			
			//khong cap nhat các field sau
			$action->remove_field("comment_modules"); //the named field won't be included in CRUD operations
			$action->remove_field("comment_item"); //the named field won't be included in CRUD operations
	}
	

	$grid = new GridConnector($conn,"MySQL");
	$grid->event->attach("beforeRender","formattingLoad");
	$grid->event->attach("beforeUpdate","CheckDataUpdate");
	$grid->dynamic_loading(50);
    
    $grid->render_table($tbfix."comment","comment_id","comment_id, comment_modules, comment_item, comment_content, comment_name, comment_update_date, comment_update_ip, comment_status"); 



?>