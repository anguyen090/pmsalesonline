<?PHP
	$action = $_GET['action'];
    $box = new Boxhienthi();
    $htvt = new HienThiViTri();
////////////////////////////////////ADD////////////////////////////////////////////////////////////////////////
	if($action=='add')
	{
		$boxhienthi_title 			= htmlspecialchars($_POST['boxhienthi_title'], ENT_QUOTES);
		$boxhienthi_option	 		= $_POST['boxhienthi_option'];
		
		//Language
		$data_lang		= isset($_POST['language']) || $_POST['language']!="" ? $_POST['language'] : $_SESSION['language'];
		
		//Kiem tra option
		$option_list = explode("^_^AK^_^", $boxhienthi_option);
        
        //Insert box hiển thị
        //set value
        $box->setBoxhienthi_title($boxhienthi_title);
        $box->setBoxhienthi_option($option_list[0]);
        $box->setBoxhienthi_value($option_list[1]);
        $box->setBoxhienthi_by($_COOKIE['login_fullname']);
        $box->setBoxhienthi_date(date('Y-m-d h:i:s'));
        $box->setBoxhienthi_ip($_SERVER['REMOTE_ADDR']);
        $box->setBoxhienthi_update_date(date('Y-m-d h:i:s'));
        $box->setBoxhienthi_update_ip($_SERVER['REMOTE_ADDR']);
        $box->setBoxhienthi_order(0);
        $box->setBoxhienthi_status(1);
        $box->setBoxhienthi_lang($data_lang);
        
        //insert data
        $insert = $box->insert();
        
		//Lua du lieu vao trong bang boxhienthi
		if($insert)
		{
			//lay thong tin cua boxhienthi moi vua them vao
			$getBoxhienthi = $box->getARecord('boxhienthi_id');
            echo "Max id: ".$getBoxhienthi->boxhienthi_id;
			//lay thong tin vi tri va luu vao bang vitri tung muc 1
			$widgets	= $_POST['widgets'];
			foreach ($widgets as $widgets)
			{
				//Lấy vị trị
                $position = (int)preg_replace('/[^0-9]/','',$widgets['xyz_column']);
                //Set value
                $htvt->setBoxhienthi_id($getBoxhienthi->boxhienthi_id);
                $htvt->setHienthivitri_column($widgets['xyz_column']);
                $htvt->setHienthivitri_content($widgets['xyz_widgetid']);
                $htvt->setHienthivitri_position($position);
                //luu vao du lieu
                $insertvitri = $htvt->insert();
                
				if(!$insertvitri)
				{
					echo '<script language="javascript">alert("'.$language['confirm_sql_error'].'");window.history.back()</script>';
					exit();
				}
			}
		}
		else {
			echo '<script language="javascript">alert("'.$language['confirm_sql_error'].'");window.history.back()</script>';
			exit();
		}
		
			
		//====================================================================================================================		
?>
        <script>
				if(confirm("<?PHP echo $language['confirm_insert_ok'];?>"))
					document.location='index.php?option=boxhienthi&action=add';
				else
					document.location='index.php?option=boxhienthi';
		</script>
<?PHP
	}
////////////////////////////////////UPDATE////////////////////////////////////////////////////////////////////////
	else if($action=='update')
	{
		$id = $_GET['id'];
		$boxhienthi_title 			= htmlspecialchars($_POST['boxhienthi_title'], ENT_QUOTES);;
		$boxhienthi_option	 		= $_POST['boxhienthi_option'];
		//Language
		$data_lang		= isset($_POST['language']) || $_POST['language']!="" ? $_POST['language'] : $_SESSION['language'];
		//Kiem tra option
		$option_list = explode("^_^AK^_^", $boxhienthi_option);

        //set value
        $box->setBoxhienthi_title($boxhienthi_title);
        $box->setBoxhienthi_option($option_list[0]);
        $box->setBoxhienthi_value(intval($option_list[1]));
        $box->setBoxhienthi_update_date(date('Y-m-d h:i:s'));
        $box->setBoxhienthi_update_ip($_SERVER['REMOTE_ADDR']);
        $box->setBoxhienthi_lang($data_lang);
        
        $update = $box->update($_GET['id']);

		if($update)
		{
			//xóa het cách xap xep hien thi cu cua muc nay!
			$htvt->delete($_GET['id']);
			//Thêm moi vi tri xap xep vao data
			$widgets	= $_POST['widgets'];
			foreach ($widgets as $widgets)
			{
				//Lấy vị trí hiển thị
                $position = (int)preg_replace('/[^0-9]/','',$widgets['xyz_column']);
                //Set value 
                $htvt->setBoxhienthi_id($_GET['id']);
                $htvt->setHienthivitri_column($widgets['xyz_column']);
                $htvt->setHienthivitri_content($widgets['xyz_widgetid']);
                $htvt->setHienthivitri_position($position);
                //luu vao du lieu
                $insertvitri = $htvt->insert();
				if(!$insertvitri)
				{
					echo '<script language="javascript">alert("'.$language['confirm_sql_error'].'");window.history.back()</script>';
					exit();
				}
			}
		}
		else{
			echo '<script language="javascript">alert("'.$language['confirm_update_error'].'");window.history.back();</script>';
			exit();
		}
		
		//====================================================================================================================		
			
	?>
			<script>
					if(confirm("<?PHP echo $language['confirm_update_ok'];?>"))
						document.location="index.php?option=boxhienthi&action=update&id=<?PHP echo $_GET['id']?>";
					else
						document.location="index.php?option=boxhienthi";
			</script>
	<?PHP		
////////////////////////////////////////////////////////////////////////////////////////////////////////////
	}
	else{
?>
	<script language="javascript">
		alert("<?PHP echo $language['find_not_found'];?>");
		window.history.back();
	</script>
<?PHP
}
?>
