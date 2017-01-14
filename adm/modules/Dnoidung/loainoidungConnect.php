<?PHP
//Connect
require_once ("../../../includes/dhtmlx_conn.php");
//Kiem tra dang nhap
//require_once ("../../includes/session_check.php");

//Kiem tra Language
require_once ("../../includes/lang_check_sub.php");
//LOAD LANGUAGE
require_once ("../../modules/Dnoidung/language/".$_SESSION['language'].".php");


//DHTMLX Connect
require_once ("../../dhtmlx/dhtmlx_connect/grid_connector.php");
$conn = mysql_connect($server,$userdata,$db_pass);
mysql_select_db($database);
mysql_query("SET NAMES 'utf8'", $conn);

	//FORMAT BEFOR LOAD -- Select
	function formattingLoad($row){
                  //formattingDATE loainoidung_update_date
                  $data = $row->get_value("loainoidung_update_date");
                  $row->set_value("loainoidung_update_date",date("d/m/Y - h:i:s",strtotime($data)));
				  
                  //formatting EDITOR
                  $data = $row->get_value("loainoidung_id");
                  $row->set_value("loainoidung_editor","<a href='index.php?option=loainoidung&action=update&id={$data}'>Sửa chi tiết</a>");
	}
	
	//FORMAT BEFOR Processing -- Update
	function CheckDataUpdate($action){
            //$new_value = date("y-m-d h:i:s"); //Ngày cập nhật là ngày hiện tại
			// $action->set_value("loainoidung_update_date",$new_value);
			
            $action->set_value("loainoidung_by",$_COOKIE['login_fullname']);//người cập nhật 
			
			//KHONG CẬP NHẬT CÁC Cột SAO
			$action->remove_field("loainoidung_update_date"); //the named field won't be included in CRUD operations
	}
	

	$grid = new GridConnector($conn,"MySQL");
	$grid->event->attach("beforeRender","formattingLoad");
	$grid->event->attach("beforeUpdate","CheckDataUpdate");
	$grid->dynamic_loading(50);

    $filter1 = new OptionsConnector($conn,"MySQL");
    $filter1->render_table($tbfix."loainoidung","dongnoidung_id","loainoidung_id(value),loainoidung_title(label)");
    $grid->set_options("dongnoidung_id",$filter1);
    
    $grid->render_table($tbfix."loainoidung","loainoidung_id","loainoidung_id, dongnoidung_id, loainoidung_title, loainoidung_link, loainoidung_by, loainoidung_update_date, loainoidung_update_ip, loainoidung_lang, loainoidung_mainmenu, loainoidung_submenu, loainoidung_hot, loainoidung_order, loainoidung_status, loainoidung_editor"); 



?>