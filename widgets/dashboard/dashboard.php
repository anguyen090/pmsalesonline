<?php
    //Thông tin public được xem
    //Kiểm tra xem người dùng có đăng nhập hay không, lấy thông tin đăng nhập của người dùng
    $f = new functionGet();
    $user = new User();
    /**
     * Khai báo các giá trị hàm decode
     * log_key_en_id: từ khóa cho key endcode id
     * log_key_cv_id: Từ khóa cho key convert id
     */
    $getKey = array(
        'log_key_en_id'         => '$Log@KwID',
        'log_key_cv_id'         => 'KwiD',
        'log_key_en_firstname'  => '$Log@KwFname',
        'log_key_cv_firstname'  => 'FLnA',
        'log_key_en_lastname'   => '$Log@KwLname',
        'log_key_cv_lastname'      => 'LLnA'
    );
    $user_id = isset($id) && $id!=0 ? $id : $f->decodeID($getKey['log_key_en_id'],$getKey['log_key_cv_id'],$_COOKIE['login_userid']);
    $meminfo = '';
    if(intval($user_id)>0){
        //Mặc định sẽ cho phép người dùng xem thông tin cá nhân cho phép
        //Kiểm tra thử có phải admin hay không?
		echo $_COOKIE['login_username'];
        $permission = $user->checkPermissionUser(null,'user_id,group_id,user_name',$user_id,$_COOKIE['login_username']);
		$value = 'user_id,group_id,user_name,user_firstname,user_lastname,user_email,user_yahoo,user_skype,user_website,user_facebook,user_googleplus,user_twitter,user_phone,user_birthday,user_job,user_note,user_address,user_images,user_active';
        $getU = $_COOKIE['login_username']!="" ? $user->checkViewIsMember($value,$user_id,$_COOKIE['login_username']) : $user->checkViewNoneMember($value,$user_id);
		$bank = $db->get_results("SELECT `bank_id`,`bank_bank`,`bank_name`,`bank_chinhanh`, `bank_number` FROM `".$tbfix."bank` WHERE `user_id`='".$user_id."' AND `bank_status`='1' ORDER BY `bank_order` DESC, `bank_update_date` DESC");
        $avatar = $getU->user_images !="" ? '<img src="'.str_replace('../',MTN_BASE_SITEURL.'/',$getU->user_images).'" />' : '<img src="'.MTN_BASE_SITEURL.Templates.'/avatar/avt-default.jpg" />';
        $active = $getU->user_active==1 ? "Đã kích hoạt" : "Chưa kích hoạt";
    }else {
        //Chưa đăng nhập
        echo $f->linkToLink('dang-nhap.html');
    }
    //Xử lý avatart
    if(in_array('view',$permission,true)){$meminfo = $meminfo . $avatar;}
    if(in_array('edit',$permission,true)){$meminfo = $meminfo . '<input name="action" type="hidden" value="mtupload" /><input type="file" name="images" class="fileUpload" /><ul class="f-upload"><li>Cập nhật ảnh</li><li class="img-cam"></li><div style="clear: both;"></div></ul>';}
    //Xử lý chỉnh sửa thông tin
?>
<div class="alert-logout"></div>
<div id="widgetPContent">
    <div class="das-account">
        <div class="small">
            <div class="small avt">
                <div class="avatar">
                    <form name="avtForm" action="<?php echo $f->encodeLink(MTN_BASE_SITEURL,'webAction.php','avtupload','avtupload',$user_id,'mtupload'); ?>" method="POST" enctype="multipart/form-data">
                        <?PHP echo $meminfo; ?>
                    </form>
                </div>
            </div>
            <div class="small">
                <div class="mem info cus">
                    <?php
                        if(in_array('view',$permission,true)){
                            echo '
                                <p>Tên tài khoản: <span>'.$getU->user_firstname.' '.$getU->user_lastname.'</span></p>
                                <p>Trạng thái: <span style="color: green;">'.$active.'</span></p>
                                <p>Username: <span>'.$getU->user_name.'</span></p>    
                            ';
                        }
                        if(in_array('admin',$permission,true)){echo '<p><a href="'.MTN_BASE_SITEURL.'/adm" target="_blank">Đến trang quản trị</a></p>';}
                        if(in_array('edit',$permission,true)){
                            echo '
                                <p><a href="javascript:void(0)" onclick="popupmember(\'changepass\',\'Đổi mật khẩu\')">Đổi mật khẩu</a></p>
                                <p><a href="#" onclick="checkLogout()">Đăng xuất</a></p>
                                <div class="changepasspopup">
                                    <div class="popupShow" id="changepasspopupShow">
                                        <div class="popuptitle">
                                            <h2 class="mem title"></h2>
                                            <span class="closepopup" onclick="closePopup(\'changepass\')">x</span>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="popupContent">
                                            <div class="alert"></div>
                                            <form class="cmxform" name="changePass" id="changePass" action="" method="POST">
                                                <input class="input" name="userid" id="userid" type="hidden" value="'.$f->decodeID($getKey['log_key_en_id'],$getKey['log_key_cv_id'],$_COOKIE['login_userid']).'" />
                                                <label>Mật khẩu cũ:</label>
                                                <input class="input" name="oldpass" id="oldpass" type="password" placeholder="Mật khẩu cũ" />
                                                <div class="account" style="margin-top: 10px;">
                                                    <label>Mật khẩu mới:</label>
                                                    <input class="input" name="newpass" id="newpass" type="password" placeholder="Mật khẩu mới">
                                                    <label>Nhập lại mật khẩu mới:</label>
                                                    <input class="input" id="renewpass" name="renewpass" type="password" placeholder="Nhập lại mật khẩu mới">
                                                </div>
                                                <input class="button" id="btn-checkchange" name="submit" onclick="" type="submit" value="Đổi mật khẩu">
                                                <div class="clear"></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            ';
                        }
                    ?>
                </div>
            </div>
            <div style="clear: both;"></div>
            <div class="memTitleBar">
                <?php
                    if(in_array('view',$permission,true)){
                        echo '<h2 class="mem-title">THÔNG TIN TÀI KHOẢN</h2>';
                    }
                ?>
                <div class="clear"></div>
            </div>
            <?php
                if(in_array('view',$permission,true)){
                    foreach($bank as $bank){
                        if(in_array('edit',$permission,trule)){$editbank = '<div class="bar"><span><a href="javascript: void(0)" onclick="popupshoweditbank(\'editbank\',\'Cập nhật tài khoản ngân hàng\',\''.$bank->bank_id.'\',\''.$bank->bank_bank.'\',\''.$bank->bank_name.'\',\''.$bank->bank_number.'\',\''.$bank->bank_chinhanh.'\')">Sửa</a></span></div>';}
                        echo '
                            '.$editbank.'
                            <div class="mem bank">
                                <p>Ngân hàng: <span>'.$bank->bank_bank.'</span></p>
                                <p>Chủ tài khoản: <span>'.$bank->bank_name.'</span></p>
                                <p>Số tài khoản: <span>'.$bank->bank_number.'</span></p>
                                <p>Chi nhánh: <span>'.$bank->bank_chinhanh.'</span></p>
                            </div>
                        ';
                    }
                }
                if(in_array('edit',$permission,true)){
                    echo '
                        <div class="editbankpopup">
                            <div class="popupShow" id="editbankpopupShow">
                                <div class="popuptitle">
                                    <h2 class="mem title"></h2>
                                    <span class="closepopup" onclick="closePopup(\'editbank\')">x</span>
                                    <div class="clear"></div>
                                </div>
                                <div class="popupContent">
                                    <div class="alert"></div>
                                    <form class="cmxform" name="editbank" id="editbank" action="" method="POST">
                                        <input class="input" name="eb_uid" id="eb_uid" type="hidden" value="'.$_COOKIE['login_userid'].'" />
                                        <input class="input" name="eb_id" id="eb_id" type="hidden" value="" />
                                        <label>Tên ngân hàng:</label>
                                        <input class="input" name="eb_bank" id="eb_bank" type="text" value="'.$bank->bank_bank.'" placeholder="Tên ngân hàng" />
                                        <label>Chủ tài khoản:</label>
                                        <input class="input" name="eb_accounter" id="eb_accounter" type="text" value="'.$bank->bank_name.'" placeholder="Chủ tài khoản">
                                        <label>Số tài khoản:</label>
                                        <input class="input" id="eb_series" name="eb_series" type="text" value="'.$bank->bank_number.'" placeholder="011100023456">
                                        <label>Chi nhánh:</label>
                                        <input class="input" id="eb_chinhanh" name="eb_chinhanh" type="text" value="'.$bank->bank_chinhanh.'" placeholder="Chi nhánh">
                                        <input class="button" name="submit" type="submit" value="Cập nhật">
                                        <div class="clear"></div>
                                    </form>
                                </div>
                            </div>
                        </div> 
                    ';
                }
                if(in_array('add',$permission, true)){
                    echo '
                        <div class="mem bank">
                            <a href="javascript:void(0)" onclick="popupmember(\'addbank\',\'Thêm tài khoản ngân hàng\')">Thêm thông tin tài khoản</a>
                        </div>
                        <div class="addbankpopup">
                            <div class="popupShow" id="addbankpopupShow">
                                <div class="popuptitle">
                                    <h2 class="mem title"></h2>
                                    <span class="closepopup" onclick="closePopup(\'addbank\')">x</span>
                                    <div class="clear"></div>
                                </div>
                                <div class="popupContent">
                                    <div class="alert"></div>
                                    <form class="cmxform" name="addbank" id="addbank" action="" method="POST">
                                        <input class="input" name="ab_uid" id="ab_uid" type="hidden" value="'.$_COOKIE['login_userid'].'" />
                                        <label>Tên ngân hàng:</label>
                                        <input class="input" name="ab_bank" id="ab_bank" type="text" placeholder="Tên ngân hàng" />
                                        <label>Chủ tài khoản:</label>
                                        <input class="input" name="ab_accounter" id="ab_accounter" type="text" placeholder="Chủ tài khoản">
                                        <label>Số tài khoản:</label>
                                        <input class="input" id="ab_series" name="ab_series" type="text" placeholder="011100023456">
                                        <label>Chi nhánh:</label>
                                        <input class="input" id="ab_chinhanh" name="ab_chinhanh" type="text" placeholder="Chi nhánh">
                                        <input class="button" name="submit" type="submit" value="Thêm tài khoản">
                                        <div class="clear"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    ';   
                }
                
            ?>
        </div>
    </div>
    <div class="das-account">
        <div class="small">
            <div class="memTitleBar">
                <?php
                    if(in_array('view',$permission,true)){
                        echo '<h2 class="mem-title">THÔNG TIN CÁ NHÂN</h2>';
                    }
                    if(in_array('edit',$permission,true)){
                        echo '<span><a href="javascript:void(0)" onclick="popupmember(\'editmeminfo\',\'Cập nhật thông tin cá nhân\')">Sửa</a></span>';
                    }
                ?>
                <div class="clear"></div>
            </div>
            <div class="mem info">
                <?php
                    if(in_array('view',$permission,true)) {
                        echo '
                            <p>Họ và tên: <span class="bold">'.$getU->user_firstname.' '.$getU->user_lastname.'</span></p>
                            <p>Địa chỉ: <span>'.$getU->user_address.'</span></p>
                            <p>Điện thoại: <span>'.$getU->user_phone.'</span></p>
                            <p>Ngày sinh: <span>'.date("d/m/Y",strtotime($getU->user_birthday)).'</span></p>
                            <p>Nghề nghiệp: <span>'.$getU->user_job.'</span></p>
                            <p>Về bạn: <span>'.$getU->user_note.'</span></p>
                        ';
                    }
                    if(in_array('edit',$permission,true)){
                        echo '
                            <div class="editmeminfopopup">
                                <div class="popupShow" id="editmeminfopopupShow">
                                    <div class="popuptitle">
                                        <h2 class="mem title"></h2>
                                        <span class="closepopup" onclick="closePopup(\'editmeminfo\')">x</span>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="popupContent">
                                        <div class="alert"></div>
                                        <form class="cmxform" name="editmeminfo" id="editmeminfo" action="" method="POST">
                                            <input class="input" name="abeim_uid" id="abeim_uid" type="hidden" value="'.$_COOKIE['login_userid'].'" />
                                            <label>Họ:</label>
                                            <input class="input" name="eim_firstname" id="eim_firstname" type="text" value="'.$getU->user_firstname.'" placeholder="Họ" />
                                            <label>Tên:</label>
                                            <input class="input" name="eim_lastname" id="eim_lastname" type="text" value="'.$getU->user_lastname.'" placeholder="Tên">
                                            <label>Địa chỉ:</label>
                                            <input class="input" id="eim_address" name="eim_address" type="text" value="'.$getU->user_address.'" placeholder="Địa chỉ">
                                            <label>Điện thoại:</label>
                                            <input class="input" id="eim_phone" name="eim_phone" type="text" value="'.$getU->user_phone.'" placeholder="0909 808 792">
                                            <label>Nghề nghiệp:</label>
                                            <input class="input" id="eim_job" name="eim_job" type="text" value="'.$getU->user_job.'" placeholder="Công nghệ thông tin">
                                            <label>Về bạn:</label>
                                            <textarea class="input" name="eim_aboutme" id="eim_aboutme" placeholder="Đôi nét về bản thân">'.$getU->user_note.'</textarea>
                                            <input class="button" name="submit" onclick="" type="submit" value="Cập nhật">
                                            <div class="clear"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        ';
                    }
                ?>
            </div>
            <div class="clear"></div>
            <div class="memTitleBar">
                <?php
                    if(in_array('view',$permission,true)){
                        echo '<h2 class="mem-title">THÔNG TIN LIÊN HỆ</h2>';
                    }
                    if(in_array('edit',$permission,true)){
                        echo '<span><a href="javascript:void(0)" onclick="popupmember(\'editcontact\',\'Cập nhật thông tin liên hệ\')">Sửa</a></span>';
                    }
                ?>
            </div>
            <div class="clear"></div>
            <div class="mem info">
                <?php
                    if(in_array('view',$permission,true)){
                        echo '
                            <p>Email: <span><a href="maito:'.$getU->user_email.'">'.$getU->user_email.'</a></span></p>
                            <p>Yahoo: <span><a href="maito:'.$getU->user_yahoo.'">'.$getU->user_yahoo.'</a></span></p>
                            <p>Skype: <span>'.$getU->user_skype.'</span></p>
                            <p>Website: <span><a href="'.$getU->user_website.'" target="_blank">'.$getU->user_website.'</a></span></p>
                            <p>Facebook: <span><a href="'.$getU->user_facebook.'" target="_blank">'.$getU->user_facebook.'</a></span></p>
                            <p>Google+: <span><a href="'.$getU->user_googleplus.'" target="_blank">'.$getU->user_googleplus.'</a></span></p>
                            <p>Twitter: <span><a href="'.$getU->user_twitter.'" target="_blank">'.$getU->user_twitter.'</a></span></p>
                        ';
                    }
                    if(in_array('edit',$permission,true)){
                        echo '
                            <div class="editcontactpopup">
                                <div class="popupShow" id="editcontactpopupShow">
                                    <div class="popuptitle">
                                        <h2 class="mem title"></h2>
                                        <span class="closepopup" onclick="closePopup(\'editcontact\')">x</span>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="popupContent">
                                        <div class="alert"></div>
                                        <form class="cmxform" name="editcontact" id="editcontact" action="" method="POST">
                                            <input class="input" name="ect_uid" id="ect_uid" type="hidden" value="'.$_COOKIE['login_userid'].'" />
                                            <label>Email:</label>
                                            <input class="input" name="ect_email" id="ect_email" type="text" value="'.$getU->user_email.'" placeholder="example@canthoksg.com" />
                                            <label>Yahoo:</label>
                                            <input class="input" name="ect_yahoo" id="ect_yahoo" type="text" value="'.$getU->user_yahoo.'" placeholder="example@yahoo.com">
                                            <label>Skype:</label>
                                            <input class="input" id="ect_skype" name="ect_skype" type="text" value="'.$getU->user_skype.'" placeholder="anguyen090">
                                            <label>Website:</label>
                                            <input class="input" id="ect_website" name="ect_website" type="text" value="'.$getU->user_website.'" placeholder="http://canthoksg.com">
                                            <label>Facebook:</label>
                                            <input class="input" id="ect_facebook" name="ect_facebook" type="text" value="'.$getU->user_facebook.'" placeholder="link facebook">
                                            <label>Google +:</label>
                                            <input class="input" id="ect_googleplus" name="ect_googleplus" type="text" value="'.$getU->user_googleplus.'" placeholder="link google+">
                                            <label>Twitter:</label>
                                            <input class="input" id="ect_twitter" name="ect_twitter" type="text" value="'.$getU->user_twitter.'" placeholder="link twitter">
                                            <input class="button" name="submit" type="submit" value="Cập nhật">
                                            <div class="clear"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        ';
                    }
                ?>
                
            </div>
        </div>
    </div>
    <div style="clear: both;"></div>
</div>