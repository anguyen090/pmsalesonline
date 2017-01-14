<?PHP
	$action = $_GET['action'];     
    $db = new Database();
    $newsletters = new Newsletter();
    
////////////////////////////////////ADD////////////////////////////////////////////////////////////////////////
	if($action=='add')
	{
		$email 		= htmlspecialchars($_POST['email'],ENT_QUOTES);
		$option		= htmlspecialchars($_POST['option'],ENT_QUOTES);
		$parent		= htmlspecialchars($_POST['parent'],ENT_QUOTES);
        
        //SET VALUE
        $newsletters->setNewsletters_email($email);
        $newsletters->setNewsletters_option($option);
        $newsletters->setNewsletters_parent($parent);
        $newsletters->setNewsletters_note("");
        $newsletters->setNewsletters_date(date('Y-m-d H:i:s'));
        $newsletters->setNewsletters_ip($_SERVER['REMOTE_ADDR']);
        $newsletters->setNewsletters_update_date(date('Y-m-d H:i:s'));
        $newsletters->setNewsletters_update_ip($_SERVER['REMOTE_ADDR']);
        $newsletters->setNewsletters_status(0);
        
        //Insert to database
        $insert = $newsletters->insert();
        if(!$insert){
            echo '<script language="javascript">alert("'.$language['confirm_sql_error'].'");window.history.back()</script>';
    		exit();
        }else {
?>
       <script>
				if(confirm("<?PHP echo $language['confirm_insert_ok'];?>"))
					document.location='index.php?option=newsletters&action=add';
				else
					document.location='index.php?option=newsletters';
		</script>
<?PHP
        }
	}
////////////////////////////////////UPDATE////////////////////////////////////////////////////////////////////////
	else if($action=='update')
	{
		if($_POST['submit']==$language['btn_update'])
		{
			$id = intval($_GET['id']);
            $email 		= htmlspecialchars($_POST['email'],ENT_QUOTES);
    		$option		= htmlspecialchars($_POST['option'],ENT_QUOTES);
    		$parent		= htmlspecialchars($_POST['parent'],ENT_QUOTES);
            
            //SET VALUE
            $newsletters->setNewsletters_id($id);
            $newsletters->setNewsletters_email($email);
            $newsletters->setNewsletters_option($option);
            $newsletters->setNewsletters_parent($parent);
            $newsletters->setNewsletters_update_date(date('Y-m-d H:i:s'));
            $newsletters->setNewsletters_update_ip($_SERVER['REMOTE_ADDR']);
            $newsletters->setNewsletters_status(0);
            //Insert to database
            $update = $newsletters->update();
            if(!$update){
                echo '<script language="javascript">alert("'.$language['confirm_sql_error'].'");window.history.back()</script>';
    			exit();
            }else {
	?>
			<script>
					if(confirm("<?PHP echo $language['confirm_update_ok'];?>"))
						document.location="index.php?option=newsletters&action=update&id=<?PHP echo $_GET['id']?>";
					else
						document.location="index.php?option=newsletters";
			</script>
	<?PHP		
		  }
        }
    }
?>
