<?php
include_once "../../../_sys/_config.php";
include_once "../../../_sys/database.class.php";
include_once "../../../_sys/functions.class.php";
include_once "../../../_sys/ez_sql_core.php";
include_once "../../../_sys/ez_sql_mysql.php";
include_once "../../models/user.class.php";
include_once "../../models/loainoidung.class.php";
$user = new User();
$lnd = new LoaiNoiDung();
if(isset($_POST['page'])){
    $page = $_POST['page'];
    if($page=="loadUser"){
        $userList = $user->getAll("user_id,user_name,user_firstname,user_lastname");
        if(count($userList)>0){
            echo '<select name="userList[]" multiple="multiple" class="input">';
            foreach($userList as $items){
                echo '<option value="'.$items->user_id.'">'.$items->user_name.'</option>';
            }
            echo '</select>';
        }else {
            echo "Không tồn tại User nào";
        }
    }
    if($page=="loadUserEdit"){
        $id = intval($_POST['id']);
		$loaind = $lnd->getARecordByID($id,"loainoidung_user_id");
		$userList = $user->getAll("user_id,user_name,user_firstname,user_lastname");
		if($loaind->loainoidung_user_id != ""){
			$idListArr = $lnd->getTypeContentByUserID($loaind->loainoidung_user_id);
				if(count($userList)>0){
				echo '<select name="userList[]" multiple="multiple" class="input">';
				foreach($userList as $items){
					$selected = in_array($items->user_id,$idListArr,true) ? 'selected="selected"' : "";
					echo '<option '.$selected.' value="'.$items->user_id.'">'.$items->user_name.'</option>';
				}
				echo '</select>';
			}else {
				echo "Không tồn tại User nào";
			}
		}else {
			if(count($userList)>0){
				echo '<select name="userList[]" multiple="multiple" class="input">';
				foreach($userList as $items){
					echo '<option value="'.$items->user_id.'">'.$items->user_name.'</option>';
				}
				echo '</select>';
			}else {
				echo "Không tồn tại User nào";
			}
		}
    }
}