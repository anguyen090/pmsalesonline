<?PHP
	$action = $_GET['action'];
           
    $db = new Database();
    
    $b = new BannerSlide();
    
////////////////////////////////////ADD////////////////////////////////////////////////////////////////////////
	if($action=='add')
	{
		$title 		= htmlspecialchars($_POST['title'],ENT_QUOTES);
		$link 		= htmlspecialchars($_POST['link'],ENT_QUOTES);
		$bgcolor 		= htmlspecialchars($_POST['bgcolor'],ENT_QUOTES);
		//Language
		$data_lang		= isset($_POST['language']) || $_POST['language']!="" ? $_POST['language'] : $_SESSION['language'];
        
        //SET VALUE
        $b->setBannerSlide_title($title);
        $b->setBannerSlide_link($link);
        $b->setBannerSlide_bgcolor($bgcolor);
        $b->setBannerSlide_by($_COOKIE['login_fullname']);
        $b->setBannerSlide_ip($_SERVER['REMOTE_ADDR']);
        $b->setBannerSlide_update_by($_COOKIE['login_fullname']);
        $b->setBannerSlide_update_ip($_SERVER['REMOTE_ADDR']);
        $b->setBannerSlide_order("0");
        $b->setBannerSlide_status("1");
        $b->setBannerSlide_lang($data_lang);
        $b->setBannerSlide_editor(NULL);
        
        //Insert to database
        $insert = $b->insert();
				
		if($insert){
            $b->updateImages('bannerSlide',$_FILES['images']['type'],$_FILES['images']['name'],$_FILES['images']['size'],$_FILES['images']['tmp_name']);
		}	

?>
       <script>
				if(confirm("<?PHP echo $language['confirm_insert_ok'];?>"))
					document.location='index.php?option=bannerSlide&action=add';
				else
					document.location='index.php?option=bannerSlide';
		</script>
<?PHP
	}
////////////////////////////////////UPDATE////////////////////////////////////////////////////////////////////////
	else if($action=='update')
	{
		if($_POST['submit']==$language['btn_save'])
		{
			
            $title 		= htmlspecialchars($_POST['title'],ENT_QUOTES);
    		$link 		= htmlspecialchars($_POST['link'],ENT_QUOTES);
    		$bgcolor 		= htmlspecialchars($_POST['bgcolor'],ENT_QUOTES);
            
			//Language
			$data_lang		= isset($_POST['language']) || $_POST['language']!="" ? $_POST['language'] : $_SESSION['language'];
            
            //SET VALUE
            $b->setBannerSlide_title($title);
            $b->setBannerSlide_link($link);
            $b->setBannerSlide_bgcolor($bgcolor);
            $b->setBannerSlide_by($_COOKIE['login_fullname']);
            $b->setBannerSlide_ip($_SERVER['REMOTE_ADDR']);
            $b->setBannerSlide_update_by($_COOKIE['login_fullname']);
            $b->setBannerSlide_update_ip($_SERVER['REMOTE_ADDR']);
            $b->setBannerSlide_order("0");
            $b->setBannerSlide_status("1");
            $b->setBannerSlide_lang($data_lang);
            $b->setBannerSlide_editor(NULL);
            
            //Insert to database
            $insert = $b->insert();
    				
    		if($insert){
                $b->updateImages('bannerSlide',$_FILES['images']['type'],$_FILES['images']['name'],$_FILES['images']['size'],$_FILES['images']['tmp_name']);
    		}
		?>
				<script>
						if(confirm("<?PHP echo $language['confirm_insert_ok'];?>"))
							document.location='index.php?option=bannerSlide&action=add';
						else
							document.location='index.php?option=bannerSlide';
				</script>
		<?PHP
		}
		if($_POST['submit']==$language['btn_update'])
		{
			$id = $_GET['id'];
			$title 		= htmlspecialchars($_POST['title'],ENT_QUOTES);
    		$link 		= htmlspecialchars($_POST['link'],ENT_QUOTES);
    		$bgcolor 		= htmlspecialchars($_POST['bgcolor'],ENT_QUOTES);
            //Language
			$data_lang		= isset($_POST['language']) || $_POST['language']!="" ? $_POST['language'] : $_SESSION['language'];
            
            //SET VALUE
            $b->setBannerSlide_id($id);
            $b->setBannerSlide_title($title);
            $b->setBannerSlide_link($link);
            $b->setBannerSlide_bgcolor($bgcolor);
            $b->setBannerSlide_update_date(date('Y-m-d h:i:s'));
            $b->setBannerSlide_update_by($_COOKIE['login_fullname']);
            $b->setBannerSlide_update_ip($_SERVER['REMOTE_ADDR']);
            $b->setBannerSlide_order("0");
            $b->setBannerSlide_status("1");
            $b->setBannerSlide_lang($data_lang);
            $b->setBannerSlide_editor(NULL);
            
            //Insert to database
            $update = $b->update($id);
    				
    		if($update){
                $b->updateImages('bannerSlide',$_FILES['images']['type'],$_FILES['images']['name'],$_FILES['images']['size'],$_FILES['images']['tmp_name']);
    		}else {
                echo '<script language="javascript">alert("'.$language['confirm_update_error'].'");window.history.back();</script>';
				exit();
    		}
	?>
			<script>
					if(confirm("<?PHP echo $language['confirm_update_ok'];?>"))
						document.location="index.php?option=bannerSlide&action=update&id=<?PHP echo $_GET['id']?>";
					else
						document.location="index.php?option=bannerSlide";
			</script>
	<?PHP		
		}
		
////////////////////////////////////////////////////////////////////////////////////////////////////////////
	}
	else if($action=='delImage')
	{
		//Xóa ảnh được chọn
        $delete = $b->deleteImages(intval($_GET['id']));
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
