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
                  //formattingDATE noidung_update_date
                  $data = $row->get_value("noidung_update_date");
                  $row->set_value("noidung_update_date",date("d/m/Y - h:i:s",strtotime($data)));
				  
                  //formattingDATE noidung_title Link
                  $dataID = $row->get_value("noidung_id");
                  $dataTitle = $row->get_value("noidung_title");
                  $row->set_value("noidung_title","<a target='_blank' href='../".$dataID."-".chuyendoi($dataTitle).".html'>".$dataTitle."</a>");
				  
                  //formatting EDITOR
                  $data = $row->get_value("noidung_id");
                  $row->set_value("noidung_editor","<a href='index.php?option=noidung&action=update&id={$data}'>Sửa chi tiết</a>");
	}
	
	//FORMAT BEFOR Processing -- Update
	function CheckDataUpdate($action){
			// $new_value = date("y-m-d h:i:s"); //Ngày cập nhật là ngày hiện tại
			// $action->set_value("noidung_update_date",$new_value);
			
            //$action->set_value("noidung_by",$_COOKIE['login_firstname'].' '.$_COOKIE['login_lastname']);//người cập nhật 
			
			//KHONG CẬP NHẬT CÁC Cột SAO
			$action->remove_field("noidung_title"); //the named field won't be included in CRUD operations
			$action->remove_field("noidung_update_date"); //the named field won't be included in CRUD operations
	}
	

	$grid = new GridConnector($conn,"MySQL");
	$grid->event->attach("beforeRender","formattingLoad");
	$grid->event->attach("beforeUpdate","CheckDataUpdate");
	$grid->dynamic_loading(50);

    $filter1 = new OptionsConnector($conn,"MySQL");
    $filter1->render_table($tbfix."loainoidung","loainoidung_id","loainoidung_id(value),loainoidung_title(label)");
    $grid->set_options("loainoidung_id",$filter1);
    
    $grid->render_table($tbfix."noidung","noidung_id","noidung_id, loainoidung_id, noidung_title, noidung_by, noidung_update_date, noidung_update_ip, noidung_lang, noidung_hot, noidung_command, noidung_order, noidung_status, noidung_editor"); 



?>