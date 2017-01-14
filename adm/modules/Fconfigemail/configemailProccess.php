<?PHP
	$action = $_GET['action'];     
    $db = new Database();
    $configE = new Config_email();
    
////////////////////////////////////ADD////////////////////////////////////////////////////////////////////////
	if($action=='add')
	{
		$email 		= htmlspecialchars($_POST['email'],ENT_QUOTES);
		$smtp 		= htmlspecialchars($_POST['smtp'],ENT_QUOTES);
		$port 		= htmlspecialchars($_POST['port'],ENT_QUOTES);
        $aut 		= $_POST['aut'];
        $pass 		= md5(md5($_POST['pass']));
        $fullname   = $_COOKIE['login_firstname'].' '.$_COOKIE['login_lastname'];
        
        if(!$configE->getARecordByEmail($email,'email_email')){
            //SET VALUE
            $configE->setEmail_email($email);
            $configE->setEmail_smtp($smtp);
            $configE->setEmail_port($port);
            $configE->setEmail_aut($aut);
            $configE->setEmail_pass($pass);
            $configE->setEmail_date(date('Y-m-d H:i:s'));
            $configE->setEmail_ip($_SERVER['REMOTE_ADDR']);
            $configE->setEmail_by($fullname);
            $configE->setEmail_update_date(date('Y-m-d H:i:s'));
            $configE->setEmail_update_ip($_SERVER['REMOTE_ADDR']);
            $configE->setEmail_update_by($fullname);
            $configE->setEmail_status(0);
            
            //Insert to database
            $insert = $configE->insert();
        }else {
            echo '<script type="text/javascirpt"> alert("Email này đã được thêm"); </script>';
        }
?>
       <script>
				if(confirm("<?PHP echo $language['confirm_insert_ok'];?>"))
					document.location='index.php?option=configemail&action=add';
				else
					document.location='index.php?option=configemail';
		</script>
<?PHP
	}
////////////////////////////////////UPDATE////////////////////////////////////////////////////////////////////////
	else if($action=='update')
	{
		if($_POST['submit']==$language['btn_update'])
		{
			$id = $_GET['id'];
            $email 		= htmlspecialchars($_POST['email'],ENT_QUOTES);
    		$smtp 		= htmlspecialchars($_POST['smtp'],ENT_QUOTES);
    		$port 		= htmlspecialchars($_POST['port'],ENT_QUOTES);
            $aut 		= $_POST['aut'];
            $pass 		= $_POST['pass']!="" ? md5(md5($_POST['pass'])) : $configE->getConfigEmail($id,'email_pass');
            $fullname   = $_COOKIE['login_firstname'].' '.$_COOKIE['login_lastname'];
            
            //SET VALUE
            $configE->setEmail_id($id);
            $configE->setEmail_email($email);
            $configE->setEmail_smtp($smtp);
            $configE->setEmail_port($port);
            $configE->setEmail_aut($aut);
            $configE->setEmail_pass($pass);
            $configE->setEmail_update_date(date('Y-m-d H:i:s'));
            $configE->setEmail_update_ip($_SERVER['REMOTE_ADDR']);
            $configE->setEmail_update_by($fullname);
            $configE->setEmail_status(0);
            //Insert to database
            $update = $configE->update();
            if(!$update){
                echo '<script language="javascript">alert("'.$language['confirm_sql_error'].'");window.history.back()</script>';
    			exit();
            }else {
	?>
			<script>
					if(confirm("<?PHP echo $language['confirm_update_ok'];?>"))
						document.location="index.php?option=configemail&action=update&id=<?PHP echo $_GET['id']?>";
					else
						document.location="index.php?option=configemail";
			</script>
	<?PHP		
		  }
        }
    }
?>
