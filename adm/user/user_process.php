<?PHP
	$action = $_GET['action'];
    //$user = new User() du?c m? ? file index
////////////////////////////////////DELETE////////////////////////////////////////////////////////////////////////
	if($action=='delete')
	{
		$idlist = $_POST['checkbox'];
		if(count($idlist)>0)
		{
			for($a = 0; $a < count($idlist);$a++)
			{
				$db->query("DELETE FROM `".$tbfix."administrator` WHERE user_id = $idlist[$a]");
			}
?>		
        <script>
				if(confirm("<?PHP echo $lang['confirm_delete_ok'];?>"))
					document.location='index.php?option=user';
				else
					document.location='index.php';
		</script>
<?PHP
		}
		else
		{
			print ("<script language='javascript'>alert('".$lang['confirm_delete_error']."'); history.back(-1);</script>");
		}
	}
////////////////////////////////////ADD////////////////////////////////////////////////////////////////////////
	else if($action=='add')
	{
		$name 	= $_POST['user_name'];
		$pass 	= $_POST['user_pass'];
		$fullname = $_POST['user_fullname'];
		$right = $_POST['user_right'];
        //SET VALUE
        $user->setUser_name($name);
        $user->setUser_pass($user->encodePass('md5',$pass));
        $user->setUser_right($right);
        $user->setUser_active(1);
        $user->setUser_fullname($fullname);
        $user->setUser_email(null);
        $user->setUser_phone(null);
        $user->setUser_sex(1);
        $user->setUser_address(null);
        $user->setUser_count_login(0);
        $user->setUser_lock(0);
        $user->setUser_update_ip($_SERVER['REMOTE_ADDR']);
        $user->setUser_date_update(date('Y-m-d h:i:s'));
        
        $insert = $user->insert();
		
		if(!$insert)
		{
			echo '<script language="javascript">alert("'.$lang['confirm_sql_error'].'");window.history.back();</script>';
		} else{

?>
        <script>
				if(confirm("<?PHP echo $lang['confirm_insert_ok'];?>"))
					document.location='index.php?option=user&action=add';
				else
					document.location='index.php?option=user';
		</script>
<?PHP
		}
	}
////////////////////////////////////UPDATE////////////////////////////////////////////////////////////////////////
	else if($action=='update')
	{
		$id = intval($_GET['id']);
		$name 	= $_POST['user_name'];
		$fullname = $_POST['user_fullname'];
		$right = $_POST['user_right'];
        $address = $_POST['user_address'];
        $active = $_POST['user_active'];
        //set value
        $user->setUser_name($name);
        $user->setUser_right($right);
        $user->setUser_fullname($fullname);
        $user->setUser_active($active);
        $user->setUser_address($address);
        $user->setUser_update_ip($_SERVER['REMOTE_ADDR']);
        $user->setUser_date_update(date('Y-m-d h:i:s'));
        //change pass
        (isset($_POST['user_pass']) && $_POST['user_pass']!="") ? $user->setUser_pass($user->encodePass('md5',$_POST['user_pass'])) : $user->setUser_pass($user->getUser($id,'user_pass'));
		
        $update = $user->update($id);
        
		if(!$update)							
		{
			echo '<script language="javascript">alert("'.$lang['confirm_sql_error'].'");window.history.back();</script>';
		}else {					
?>
		<script>
				if(confirm("<?PHP echo $lang['confirm_update_ok'];?>"))
					document.location="index.php?option=user&action=update&id=<?PHP echo $id; ?>";
				else
					document.location="index.php?option=user";
		</script>
<?PHP		
		
////////////////////////////////////////////////////////////////////////////////////////////////////////////
	   }
    }
	else{
?>
	<script language="javascript">
		alert("<?PHP echo $lang['find_not_found'];?>");
		window.history.back();
	</script>
<?PHP
}
?>
