<?PHP
	$action = $_GET['action'];
    $nd = new Content();
////////////////////////////////////ADD////////////////////////////////////////////////////////////////////////
	if($action=='add')
	{
		$title 		= htmlspecialchars($_POST['title'], ENT_QUOTES);
		$type 		= htmlspecialchars($_POST['type'], ENT_QUOTES);
		$note 		= htmlspecialchars($_POST['note'], ENT_QUOTES);
		$content 	= htmlspecialchars($_POST['content'], ENT_QUOTES);
		$author 	= htmlspecialchars($_POST['author'], ENT_QUOTES);
        $updatedate = date("Y-m-d H:i:s",strtotime(str_replace("/","-",$_POST['updatedate'])));
        $fullname   = $_COOKIE['login_firstname'].' '.$_COOKIE['login_lastname'];
		//Language
		$data_lang		= isset($_POST['language']) || $_POST['language']!="" ? $_POST['language'] : $_SESSION['language'];
		
        $nd->setLoainoidung_id($type);
        $nd->setUser_id($_COOKIE['login_userid']);
        $nd->setNoidung_title($title);
        $nd->setNoidung_note($note);
        $nd->setNoidung_content($content);
        $nd->setNoidung_author($author);
        $nd->setNoidung_by($fullname);
        $nd->setNoidung_date($updatedate);
        $nd->setNoidung_ip($_SERVER['REMOTE_ADDR']);
        $nd->setNoidung_update_date($updatedate);
        $nd->setNoidung_update_ip($_SERVER['REMOTE_ADDR']);
        $nd->setNoidung_update_by($fullname);
        $nd->setNoidung_order(0);
        $nd->setNoidung_view(0);
        $nd->setNoidung_hot(0);
        $nd->setNoidung_command(1);
        $nd->setNoidung_count_command(0);
        $nd->setNoidung_rate(0);
        $nd->setNoidung_status(1);
        $nd->setNoidung_lang($data_lang);
        
        $insert = $nd->insert();
        	
		if(!$insert)
		{
			echo '<script language="javascript">alert("'.$language['confirm_sql_error'].'");window.history.back()</script>';
			exit();
		}else {
		  
          //Nếu insert thành công update images
          $nd->updateImages('noidung',$_FILES['images']['type'],$_FILES['images']['name'],$_FILES['images']['size'], $_FILES['images']['tmp_name']);	

?>
        <script>
				if(confirm("<?PHP echo $language['confirm_insert_ok'];?>"))
					document.location='index.php?option=noidung&action=add';
				else
					document.location='index.php?option=noidung';
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
			$type 		= htmlspecialchars($_POST['type'], ENT_QUOTES);
			$note 		= htmlspecialchars($_POST['note'], ENT_QUOTES);
			$content 	= htmlspecialchars($_POST['content'], ENT_QUOTES);
			$author 	= htmlspecialchars($_POST['author'], ENT_QUOTES);
            $updatedate = date("Y-m-d H:i:s",strtotime(str_replace("/","-",$_POST['updatedate'])));
            $fullname   = $_COOKIE['login_firstname'].' '.$_COOKIE['login_lastname'];
			//Language
			$data_lang		= isset($_POST['language']) || $_POST['language']!="" ? $_POST['language'] : $_SESSION['language'];
            
            $nd->setLoainoidung_id($type);
            $nd->setNoidung_title($title);
            $nd->setNoidung_note($note);
            $nd->setNoidung_content($content);
            $nd->setNoidung_author($author);
            $nd->setNoidung_by($fullname);
            $nd->setNoidung_date($updatedate);
            $nd->setNoidung_ip($_SERVER['REMOTE_ADDR']);
            $nd->setNoidung_update_date($updatedate);
            $nd->setNoidung_update_ip($_SERVER['REMOTE_ADDR']);
            $nd->setNoidung_update_by($fullname);
            $nd->setNoidung_order(0);
            $nd->setNoidung_view(0);
            $nd->setNoidung_hot(0);
            $nd->setNoidung_command(1);
            $nd->setNoidung_count_command(0);
            $nd->setNoidung_rate(0);
            $nd->setNoidung_status(1);
            $nd->setNoidung_lang($data_lang);
			
            $insert = $nd->insert();
        	
    		if(!$insert)
    		{
    			echo '<script language="javascript">alert("'.$language['confirm_sql_error'].'");window.history.back()</script>';
    			exit();
    		}else {
    		  
              //Nếu insert thành công update images
              $nd->updateImages('noidung',$_FILES['images']['type'],$_FILES['images']['name'],$_FILES['images']['size'], $_FILES['images']['tmp_name']);	

		?>
				<script>
						if(confirm("<?PHP echo $language['confirm_insert_ok'];?>"))
							document.location='index.php?option=noidung&action=add';
						else
							document.location='index.php?option=noidung';
				</script>
		<?PHP
            }
		}
		if($_POST['submit']==$language['btn_update'])
		{
			$title 		= htmlspecialchars($_POST['title'], ENT_QUOTES);
			$type 		= htmlspecialchars($_POST['type'], ENT_QUOTES);
			$note 		= htmlspecialchars($_POST['note'], ENT_QUOTES);
			$content 	= htmlspecialchars($_POST['content'], ENT_QUOTES);
			$author 	= htmlspecialchars($_POST['author'], ENT_QUOTES);
            $updatedate = date("Y-m-d H:i:s",strtotime(str_replace("/","-",$_POST['updatedate'])));
            $fullname   = $_COOKIE['login_firstname'].' '.$_COOKIE['login_lastname'];
			//Language
			$data_lang		= isset($_POST['language']) || $_POST['language']!="" ? $_POST['language'] : $_SESSION['language'];
			
            $nd->setLoainoidung_id($type);
            $nd->setNoidung_title($title);
            $nd->setNoidung_note($note);
            $nd->setNoidung_content($content);
            $nd->setNoidung_author($author);
            $nd->setNoidung_update_date($updatedate);
            $nd->setNoidung_update_ip($_SERVER['REMOTE_ADDR']);
            $nd->setNoidung_update_by($fullname);
            $nd->setNoidung_lang($data_lang);
            
            $update = $nd->update(intval($_GET['id']));
			
			if(!$update)
			{
				echo '<script language="javascript">alert("'.$language['confirm_update_error'].'");window.history.back();</script>';
				exit();
			}else {
			
            //update images
            $nd->updateImages('noidung',$_FILES['images']['type'],$_FILES['images']['name'],$_FILES['images']['size'], $_FILES['images']['tmp_name']);
			
	?>
			<script>
					if(confirm("<?PHP echo $language['confirm_update_ok'];?>"))
						document.location="index.php?option=noidung&action=update&id=<?PHP echo $_GET['id']?>";
					else
						document.location="index.php?option=noidung";
			</script>
	<?PHP
            }		
		}
		
////////////////////////////////////////////////////////////////////////////////////////////////////////////
	}
	else if($action=='delImage')
	{
		//Xóa images được chọn
		$delete = $nd->deleteImages(intval($_GET['id']));
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
