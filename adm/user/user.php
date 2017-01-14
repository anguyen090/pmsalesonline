<?PHP
$action = isset($_GET['action']) && $_GET['action']!="" ? $_GET['action'] : "";
if($action == '' || $action == 'view')
{
?>
<div id="mainContent"> 
    <div class="control">
        <a href="index.php"><?PHP echo $lang['website_manager'];?></a> <img src="imgs/arr_.gif" /> <a href="index.php?option=user"><?PHP echo $lang['user_manager'];?></a>
        <div class="small right" style="text-align: right;">
            <?PHP
    			$getPer = $user->checkPerAdmin(array(1,2,3),'group_id',$f->decodeID($getKey['log_key_en_id'],$getKey['log_key_cv_id'],$_COOKIE['login_userid']),$_COOKIE['login_username']);
                if($getPer==true)
    			{
    				echo '
    					<a href="#" onClick="doAction()"> '.$lang['delete'].' </a> - <a href="index.php?option=user&action=add">'.$lang['add'].' &nbsp;&nbsp;</a>
    				';
    			}
    		?>
        </div>
        <div style="clear:both;"></div>
    </div>
    <div class="control">
        <a href="index.php?option=user&action=add"><img alt="Add New Content" src="imgs/add_.png" /></a> <span><?PHP echo $lang['user_list'];?></span>
    </div>
    <div id="content">
        <script type="text/javascript">
			function checkAll(checkname, exby) {
			  for (i = 0; i < checkname.length; i++)
			  checkname[i].checked = exby.checked? true:false
			}
			function doAction()
			{
				if(confirm("<?PHP echo $lang['confirm_delete'];?>"))
					document.form1.submit();
			}
		</script>
        <form name="form1" action="index.php?option=user_process&action=delete" method="post">
            <table width="100%" border="0">
              <tr>
                <td align="center"><b>#</b></td>
                <td><input type="checkbox" name="checkall" id="checkall" onClick="checkAll(document.form1.checkbox,this)"></td>
                <td><b><?PHP echo $lang['username'];?></b></td>
                <td><b><?PHP echo $lang['fullname'];?></b></td>
                <td><b><?PHP echo $lang['user_info'];?></b></td>
                <td><b><?PHP echo $lang['date_update'];?></b></td>
                <td><b><?PHP echo $lang['right'];?></b></td>
                <td><b><?PHP echo $lang['status'];?></b></td>
              </tr>
              <?PHP
              	if($user = $db->get_results("SELECT `user_id`, `user_name`, `user_address`, `user_firstname`,`user_lastname`, DATE_FORMAT(`user_date_update`,'%d/%m/%Y %r') AS `user_date_update`, `user_right`, `user_active` FROM `".$tbfix."user` ORDER BY `user_date_update` DESC"))
            	{
            		$i=1;
            		foreach ( $user as $user )
            		{
            			if($user->user_right==0)
            				$right = $lang['right_0'];
            			if($user->user_right==1)
            				$right = $lang['right_1'];
            			if($user->user_right==2)
            				$right = $lang['right_2'];
            			if($user->user_right==3)
            				$right = $lang['right_3'];
            			if($user->user_active==1)
            				$active = 'Hoạt động';
            			else{$active = 'Không hoạt động';}
            			echo '<tr>';
            			echo '	<td valign="top">'.$i.'</td>';
            			echo '  <td valign="top"><input type="checkbox" name="checkbox[]" id="checkbox" value="'.$user->user_id.'"></td>';
            			echo '  <td valign="top"><a href="index.php?option=user&action=update&id='.$user->user_id.'">'.$user->user_name.'</a></td>';
            			echo '  <td valign="top">'.$user->user_fullname.'</td>';
            			echo '  <td valign="top">'.$user->user_address.'</td>';
            			echo '  <td valign="top">'.$user->user_date_update.'</td>';
            			echo '  <td valign="top">'.$right.'</td>';
            			echo '  <td valign="top">'.$active.'</td>';
            			echo '</tr>';
            			$i++;
            		}
            	}else{echo "<tr><td colspan=8><br>".$lang['no_item']."</td></tr>";}
              ?>          
            </table>
        </form>
    </div>
</div>
<?PHP
}
else if($action == 'add')
{
?>
<div id="mainContent">
    <div class="control">
        <a href="index.php"><?PHP echo $lang['website_manager'];?></a> <img src="imgs/arr_.gif" /> <a href="index.php?option=user"><?PHP echo $lang['user_manager'];?></a> <img src="imgs/arr_.gif" /> <?PHP echo $lang['user_add'];?>
    </div>
    <div class="control">
        <a href="index.php?option=user&action=add"><img alt="Add New Content" src="imgs/add_.png" /></a> <span><?PHP echo $lang['user_add'];?></span>
    </div>
    <div id="content">
        <form class="form" name="form2" method="post" action="index.php?option=user_process&action=add" enctype="multipart/form-data">
            <label><?PHP echo $lang['username'];?></label>
            <input name="user_name" type="text" class="input" />
            <label><?PHP echo $lang['password'];?></label>
            <input name="user_pass" type="text" class="input" />
            <label><?PHP echo $lang['fullname'];?></label>
            <input name="user_fullname" type="text" class="input" />
            <label><?PHP echo $lang['user_info'];?></label>
            <input name="user_address" type="text" class="input" />
            <label><?PHP echo $lang['right'];?></label>
            <select name="user_right" class="input">
                <option value="0"><?PHP echo $lang['right_0'];?></option>
                <option value="1"><?PHP echo $lang['right_1'];?></option>
                <option value="2"><?PHP echo $lang['right_2'];?></option>
                <option value="3"><?PHP echo $lang['right_3'];?></option>
            </select>
            <div class="buttonAction">
                <input class="button" type="submit" name="Submit" id="button" value="<?PHP echo $lang['btn_save'];?>" />
            </div>
        </form>
        <div style="clear: both;"></div>
    </div>
</div>
<?PHP
}
else if($action == 'update')
{
?>
<div id="mainContent">
    <div class="control">
        <a href="index.php"><?PHP echo $lang['website_manager'];?></a> <img src="imgs/arr_.gif" /> <a href="index.php?option=user"><?PHP echo $lang['user_manager'];?></a> <img src="imgs/arr_.gif" /> <?PHP echo $lang['user_update'];?>
    </div>
    <div class="control">
        <a href="index.php?option=user&action=add"><img alt="Add New Content" src="imgs/add_.png" /></a> <span><?PHP echo $lang['user_update'];?></span>
    </div>
    <div id="content">
        <?PHP
          	$id = intval($_GET['id']);
        	if(!$user = $db->get_row("SELECT `user_id`,`user_name`, `user_fullname`, `user_address`, `user_right`, `user_active`  FROM `".$tbfix."administrator` WHERE `user_id`=$id"))
        	{
        		echo '<script language="javascript">alert("'.$lang['find_not_found'].'");window.history.back();</script>';
        	}
        ?>
        <form name="form2" method="post" action="index.php?option=user_process&action=update&id=<?PHP echo  $user->user_id?>" enctype="multipart/form-data">
            <label><?PHP echo $lang['username'];?></label>
            <input name="user_name" type="text" class="input" value="<?PHP echo $user->user_name?>" />
            <label><?PHP echo $lang['password'];?></label>
            <input name="user_pass" type="password" class="input" value="" />
            <label><?PHP echo $lang['fullname'];?></label>
            <input name="user_fullname" type="text" class="input" value="<?PHP echo $user->user_fullname?>" />
            <label><?PHP echo $lang['user_info'];?></label>
            <input name="user_address" type="text" class="input" value="<?PHP echo $user->user_address?>" />
            <label><?PHP echo $lang['right'];?></label>
            <select name="user_right" class="input">
                <?PHP
                    if($user->user_right==0)
                        echo '<option value=0>'.$lang['right_0'].'</option>';
                    if($user->user_right==1)
                        echo '<option value=1>'.$lang['right_1'].'</option>';
                    if($user->user_right==2)
                        echo '<option value=2>'.$lang['right_2'].'</option>';
                    if($user->user_right==3)
                        echo '<option value=3>'.$lang['right_3'].'</option>';
                ?>
                <option value="0"><?PHP echo $lang['right_0'];?></option>
                <option value="1"><?PHP echo $lang['right_1'];?></option>
                <option value="2"><?PHP echo $lang['right_2'];?></option>
                <option value="3"><?PHP echo $lang['right_3'];?></option>
            </select>
            <label>Trạng thái</label>
            <select name="user_active" class="input">
                <?PHP
                    if($user->user_active==1){
                        echo '<option value="1">Đang hoạt động</option>';
                    }else {
                        echo '<option value="0">Khóa tài khoản</option>';
                    }
                ?>
                <option value="1">Đang hoạt động</option>
                <option value="0">Khóa tài khoản</option>
            </select>
            <div class="buttonAction">
                <input class="button" type="submit" name="Submit" id="button" value="<?PHP echo $lang['btn_update'];?>" />
            </div>
        </form>
    </div>
</div>
<?PHP
}
else
{
?>
<script type="text/javascript">
		alert("<?PHP echo $lang['find_not_found']?>");
       window.history.back();
</script>
<?PHP
}
?>
