<?PHP
	$action = $_GET['action'];
    $w = new Widgets();
////////////////////////////////////ADD////////////////////////////////////////////////////////////////////////
	if($action=='add')
	{
		$widget_modules 		= htmlspecialchars($_POST['widget_modules'], ENT_QUOTES);
		$widget_title 			= htmlspecialchars($_POST['widget_title'], ENT_QUOTES);
		$widget_content 		= htmlspecialchars($_POST['widget_content'], ENT_QUOTES);
		$widget_style 			= htmlspecialchars($_POST['widget_style'], ENT_QUOTES);
		$widget_type 			= $_POST['widget_type'];
		$widget_info 			= $_POST['widget_info'];
		$widget_state 			= $_POST['widget_state'];
		$widget_soluong 		= $_POST['widget_soluong'];
		if(count($widget_info)>0)
		{
			for($a = 0; $a < count($widget_info);$a++)
			{
				$info = $info.$widget_info[$a]."^_^AK^_^";
			}
		}	
		//Language
		$data_lang		=  isset($_POST['language']) || $_POST['language']!="" ? $_POST['language'] : $_SESSION['language'];
		
        $w->setWidget_code(NULL);
        $w->setWidget_modules($widget_modules);
        $w->setWidget_title($widget_title);
        $w->setWidget_content($widget_content);
        $w->setWidget_style($widget_style);
        $w->setWidget_type($widget_type);
        $w->setWidget_state($widget_state);
        $w->setWidget_info($info);
        $w->setWidget_soluong($widget_soluong);
        $w->setWidget_by($_COOKIE['login_fullname']);
        $w->setWidget_date(date('Y-m-d h:i:s'));
        $w->setWidget_ip($_SERVER['REMOTE_ADDR']);
        $w->setWidget_update_date(date('Y-m-d h:i:s'));
        $w->setWidget_update_ip($_SERVER['REMOTE_ADDR']);
        $w->setWidget_order('0');
        $w->setWidget_status('1');
        $w->setWidget_editor(NULL);
        $w->setWidget_lang($data_lang);  
        
        $insert = $w->insert();
        
        if(!$insert){
            echo '<script language="javascript">alert("'.$language['confirm_sql_error'].'");window.history.back()</script>';
			exit();
        } else {	
?>
        <script>
				if(confirm("<?PHP echo $language['confirm_insert_ok'];?>"))
					document.location='index.php?option=widget&action=add';
				else
					document.location='index.php?option=widget';
		</script>
<?PHP
        } //END IF
	}//END action=add
////////////////////////////////////UPDATE////////////////////////////////////////////////////////////////////////
	else if($action=='update')
	{
		if($_POST['submit']==$language['btn_save'])
		{
			$widget_modules 		= htmlspecialchars($_POST['widget_modules'], ENT_QUOTES);
			$widget_title 			= htmlspecialchars($_POST['widget_title'], ENT_QUOTES);
			$widget_content 		= htmlspecialchars($_POST['widget_content'], ENT_QUOTES);
			$widget_style 			= htmlspecialchars($_POST['widget_style'], ENT_QUOTES);
			$widget_type 			= $_POST['widget_type'];
			$widget_info 			= $_POST['widget_info'];
			$widget_state 			= $_POST['widget_state'];
			$widget_soluong 		= $_POST['widget_soluong'];
			if(count($widget_info)>0)
			{
				for($a = 0; $a < count($widget_info);$a++)
				{
					$info = $info.$widget_info[$a]."^_^AK^_^";
				}
			}
			//Language
			$data_lang		= isset($_POST['language']) || $_POST['language']!="" ? $_POST['language'] : $_SESSION['language'];
            
            $w->setWidget_modules($widget_modules);
            $w->setWidget_title($widget_title);
            $w->setWidget_content($widget_content);
            $w->setWidget_style($widget_style);
            $w->setWidget_type($widget_type);
            $w->setWidget_state($widget_state);
            $w->setWidget_info($info);
            $w->setWidget_soluong($widget_soluong);
            $w->setWidget_by($_COOKIE['login_fullname']);
            $w->setWidget_date(date('Y-m-d h:i:s'));
            $w->setWidget_ip($_SERVER['REMOTE_ADDR']);
            $w->setWidget_update_date(date('Y-m-d h:i:s'));
            $w->setWidget_update_ip($_SERVER['REMOTE_ADDR']);
            $w->setWidget_order('0');
            $w->setWidget_status('1');
            $w->setWidget_editor(NULL);
            $w->setWidget_lang($data_lang);
            
            $insert = $w->insert();
            
            if(!$insert){
                echo '<script language="javascript">alert("'.$language['confirm_sql_error'].'");window.history.back()</script>';
    			exit();
            } else {  
			
		?>
				<script>
						if(confirm("<?PHP echo $language['confirm_insert_ok'];?>"))
							document.location='index.php?option=widget&action=update&id=<?PHP echo $_GET['id']?>';
						else
							document.location='index.php?option=widget';
				</script>
		<?PHP
            }
		}
		if($_POST['submit']==$language['btn_update'])
		{
			$id = intval($_GET['id']);
            $widget_code            = $_POST['widget_code'];
			$widget_modules 		= htmlspecialchars($_POST['widget_modules'], ENT_QUOTES);
			$widget_title 			= htmlspecialchars($_POST['widget_title'], ENT_QUOTES);
			$widget_content 		= htmlspecialchars($_POST['widget_content'], ENT_QUOTES);
			$widget_style 			= htmlspecialchars($_POST['widget_style'], ENT_QUOTES);
			$widget_type 			= $_POST['widget_type'];
			$widget_info 			= $_POST['widget_info'];
			$widget_state 			= $_POST['widget_state'];
			$widget_soluong 		= $_POST['widget_soluong'];
			if(count($widget_info)>0)
			{
				for($a = 0; $a < count($widget_info);$a++)
				{
					$info = $info.$widget_info[$a]."^_^AK^_^";
				}
			}
			//Language
			$data_lang		= isset($_POST['language']) || $_POST['language']!="" ? $_POST['language'] : $_SESSION['language'];
            
            $w->setWidget_code($widget_code);
            $w->setWidget_modules($widget_modules);
            $w->setWidget_title($widget_title);
            $w->setWidget_content($widget_content);
            $w->setWidget_style($widget_style);
            $w->setWidget_type($widget_type);
            $w->setWidget_state($widget_state);
            $w->setWidget_info($info);
            $w->setWidget_soluong($widget_soluong);
            $w->setWidget_update_date(date('Y-m-d h:i:s'));
            $w->setWidget_update_ip($_SERVER['REMOTE_ADDR']);
            $w->setWidget_order('0');
            $w->setWidget_status('1');
            $w->setWidget_editor(NULL);
            $w->setWidget_lang($data_lang);
            
            $update = $w->update(intval($_GET['id']));
			
			if(!$update)
			{
				echo '<script language="javascript">alert("'.$language['confirm_update_error'].'");window.history.back();</script>';
				exit();
			}else {
			 			
	?>
    			<script>
    					if(confirm("<?PHP echo $language['confirm_update_ok'];?>"))
    						document.location="index.php?option=widget&action=update&id=<?PHP echo $_GET['id']?>";
    					else
    						document.location="index.php?option=widget";
    			</script>
	<?PHP	
            }	
		}
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
