<?PHP
	$action = $_GET['action'];
    $lnd = new LoaiNoiDung();
////////////////////////////////////ADD////////////////////////////////////////////////////////////////////////
	if($action=='add')
	{
		$title 		= htmlspecialchars($_POST['title'], ENT_QUOTES);
		$alias 		= htmlspecialchars($_POST['alias'], ENT_QUOTES);
        $keys       = htmlspecialchars($_POST['keys'], ENT_QUOTES);
		$link 		= htmlspecialchars($_POST['link'], ENT_QUOTES);
		$type 		= htmlspecialchars($_POST['type'], ENT_QUOTES);
		$note 		= htmlspecialchars($_POST['note'], ENT_QUOTES);
        $list       = $_POST['userList'];
        $permission	= htmlspecialchars($_POST['status'], ENT_QUOTES);
        $user_list = '';
        foreach($list as $itemList){
            $user_list .= $itemList."^MT^";
        }
        $fullname   = $_COOKIE['login_firstname'].' '.$_COOKIE['login_lastname'];
		//Language
		$data_lang		= isset($_POST['language']) || $_POST['language']!="" ? $_POST['language'] : $_SESSION['language'];
		
        $lnd->setDongNoiDung_id($type);
        $lnd->setLoaiNoiDung_title($title);
        $lnd->setLoaiNoiDung_alias($alias);
        $lnd->setLoaiNoiDung_keys($keys);
        $lnd->setLoaiNoiDung_link($link);
        $lnd->setLoaiNoiDung_note($note);
        $lnd->setLoaiNoiDung_author(NULL);
        $lnd->setLoaiNoiDung_by($fullname);
        $lnd->setLoainoidung_user_id($user_list);
        $lnd->setLoainoidung_permission($permission);
        $lnd->setLoaiNoiDung_date(date('Y-m-d h:i:s'));
        $lnd->setLoaiNoiDung_ip($_SERVER['REMOTE_ADDR']);
        $lnd->setLoaiNoiDung_update_date(date('Y-m-d h:i:s'));
        $lnd->setLoaiNoiDung_update_ip($_SERVER['REMOTE_ADDR']);
        $lnd->setLoaiNoiDung_update_by($fullname);
        $lnd->setLoaiNoiDung_view(NULL);
        $lnd->setLoaiNoiDung_mainmenu(0);
        $lnd->setLoaiNoiDung_submenu(0);
        $lnd->setLoaiNoiDung_hot(0);
        $lnd->setLoaiNoiDung_order(0);
        $lnd->setLoaiNoiDung_status(1);
        $lnd->setLoaiNoiDung_editor(NULL);
        $lnd->setLoaiNoiDung_lang($data_lang);
        
        $insert = $lnd->insert();
        
        if(!$insert){
            echo '<script language="javascript">alert("'.$language['confirm_sql_error'].'");window.history.back()</script>';
			exit();
        }else {
        
            //Nếu insert thành công thì update images
            $lnd->updateImages('loainoidung',$_FILES['images']['type'],$_FILES['images']['name'],$_FILES['images']['size'],$_FILES['images']['tmp_name']);
    		
?>
            <script>
    				if(confirm("<?PHP echo $language['confirm_insert_ok'];?>"))
    					document.location='index.php?option=loainoidung&action=add';
    				else
    					document.location='index.php?option=loainoidung';
    		</script>
<?PHP
        }
	}
////////////////////////////////////UPDATE////////////////////////////////////////////////////////////////////////
	else if($action=='update')
	{
		if($_POST['submit']==$language['btn_save'])
		{
			$title 		= htmlspecialchars($_POST['title'], ENT_QUOTES);
			$alias 		= htmlspecialchars($_POST['alias'], ENT_QUOTES);
            $keys       = htmlspecialchars($_POST['keys'], ENT_QUOTES);
			$link 		= htmlspecialchars($_POST['link'], ENT_QUOTES);
			$type 		= htmlspecialchars($_POST['type'], ENT_QUOTES);
			$note 		= htmlspecialchars($_POST['note'], ENT_QUOTES);
            $fullname   = $_COOKIE['login_firstname'].' '.$_COOKIE['login_lastname'];
			//Language
			$data_lang		= isset($_POST['language']) || $_POST['language']!="" ? $_POST['language'] : $_SESSION['language'];
			
            $lnd->setDongNoiDung_id($type);
            $lnd->setLoaiNoiDung_title($title);
            $lnd->setLoaiNoiDung_alias($alias);
            $lnd->setLoaiNoiDung_keys($keys);
            $lnd->setLoaiNoiDung_link($link);
            $lnd->setLoaiNoiDung_note($note);
            $lnd->setLoaiNoiDung_author(NULL);
            $lnd->setLoaiNoiDung_by($fullname);
            $lnd->setLoaiNoiDung_date(date('Y-m-d h:i:s'));
            $lnd->setLoaiNoiDung_ip($_SERVER['REMOTE_ADDR']);
            $lnd->setLoaiNoiDung_update_date(date('Y-m-d h:i:s'));
            $lnd->setLoaiNoiDung_update_ip($_SERVER['REMOTE_ADDR']);
            $lnd->setLoaiNoiDung_update_by($fullname);
            $lnd->setLoaiNoiDung_view(NULL);
            $lnd->setLoaiNoiDung_mainmenu(0);
            $lnd->setLoaiNoiDung_submenu(0);
            $lnd->setLoaiNoiDung_hot(0);
            $lnd->setLoaiNoiDung_order(0);
            $lnd->setLoaiNoiDung_status(1);
            $lnd->setLoaiNoiDung_editor(NULL);
            $lnd->setLoaiNoiDung_lang($data_lang);
            
            $insert = $lnd->insert();
        
            if(!$insert){
                echo '<script language="javascript">alert("'.$language['confirm_sql_error'].'");window.history.back()</script>';
    			exit();
            }else {
            
                //Nếu insert thành công thì update images
                $lnd->updateImages('loainoidung',$_FILES['images']['type'],$_FILES['images']['name'],$_FILES['images']['size'],$_FILES['images']['tmp_name']);
        		
	?>
			<script>
					if(confirm("<?PHP echo $language['confirm_insert_ok'];?>"))
						document.location='index.php?option=loainoidung&action=add';
					else
						document.location='index.php?option=loainoidung';
			</script>
	<?PHP
            }
		}
		if($_POST['submit']==$language['btn_update'])
		{
			$title 		= htmlspecialchars($_POST['title'], ENT_QUOTES);
			$alias 		= htmlspecialchars($_POST['alias'], ENT_QUOTES);
            $keys       = htmlspecialchars($_POST['keys'], ENT_QUOTES);
			$link 		= htmlspecialchars($_POST['link'], ENT_QUOTES);
			$type 		= htmlspecialchars($_POST['type'], ENT_QUOTES);
			$note 		= htmlspecialchars($_POST['note'], ENT_QUOTES);
            $fullname   = $_COOKIE['login_firstname'].' '.$_COOKIE['login_lastname'];
            $permission	= htmlspecialchars($_POST['status'], ENT_QUOTES);
            if($permission != "public"){
                $list       = $_POST['userList'];
                $user_list = '';
                foreach($list as $itemList){
                    $user_list .= $itemList."^MT^";
                }
            }else {
                $user_list = null;
            }
			//Language
			$data_lang		= isset($_POST['language']) || $_POST['language']!="" ? $_POST['language'] : $_SESSION['language'];
            
            $lnd->setDongNoiDung_id($type);
            $lnd->setLoaiNoiDung_title($title);
            $lnd->setLoaiNoiDung_alias($alias);
            $lnd->setLoaiNoiDung_keys($keys);
            $lnd->setLoaiNoiDung_link($link);
            $lnd->setLoainoidung_user_id($user_list);
            $lnd->setLoainoidung_permission($permission);
            $lnd->setLoaiNoiDung_note($note);
            $lnd->setLoaiNoiDung_update_date(date('Y-m-d h:i:s'));
            $lnd->setLoaiNoiDung_update_ip($_SERVER['REMOTE_ADDR']);
            $lnd->setLoaiNoiDung_update_by($fullname);
            $lnd->setLoaiNoiDung_lang($data_lang);
			
            //Update database
            $update = $lnd->update(intval($_GET['id']));
            
			if(!$update)
			{
				echo '<script language="javascript">alert("'.$language['confirm_update_error'].'");window.history.back();</script>';
				exit();
			}else {
			 
                //Update hình ảnh
                $lnd->updateImages('loainoidung',$_FILES['images']['type'],$_FILES['images']['name'],$_FILES['images']['size'],$_FILES['images']['tmp_name']);
                
	?>
    			<script>
    					if(confirm("<?PHP echo $language['confirm_update_ok'];?>"))
    						document.location="index.php?option=loainoidung&action=update&id=<?PHP echo $_GET['id']?>";
    					else
    						document.location="index.php?option=loainoidung";
    			</script>
	<?PHP
            }		
		}
		
////////////////////////////////////////////////////////////////////////////////////////////////////////////
	}
	else if($action=='delImage')
	{
		//Xóa images được chọn
        $delete = $lnd->deleteImages(intval($_GET['id']));
		if($delete){
		  echo '<script language="javascript">window.history.back();</script>';
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
