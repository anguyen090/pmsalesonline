<?PHP

if(isset($_COOKIE['user_name']) && $_COOKIE['user_name'] != ""){
    
    $pri = "no";
    //Khởi tạo lớp user
    $user = new User();
    //Mặc nhiên đã tồn tại id của user
    $getUser = $user->getArecordByID($id);
    //Get status by user
    $status = $st->getARecoreByUser($_COOKIE['user_id']);
    }else {
        //echo '<meta http-equiv="refresh" content="0;http://'.$_SERVER['HTTP_HOST'].'">';
        $pri = "yes";
    }
    echo $pri;
?>
<style>
    #status {
        height: 25px;
        border: 1px solid #fff;
        resize: none;
        outline: none;
    }
    #statussubmit {
        float: right;
        width: 100px;
    }
    .viewby {
        float: left;
    }
    .info-view-by {
        display:none;
        border-top: 1px solid #ccc; 
        padding: 5px 10px;
    }
    #info-member {
        
    }
    #info-left {
        width: 312px;
        float: left;
        border: 1px solid #ccc;
        min-height: 300px;
    }
    #info-right {
        width: 660px;
        float: right;
        border: 1px solid #ccc;
    }
    .info-avatar {
        width: 200px;
        height: 200px;
        margin: 30px auto;
        padding: 10px 10px;
        position: relative;
        background: url(./templates/default/js_css/images/avt_bg.jpg) top left no-repeat;
    }
    .info-avatar img {
        max-width: 180px;
        width: expression( this.scrollWidth > 181 ? "180" : "auto" );
        max-height: 180px;
        height: expression( this.scrollWidth > 181 ? "180" : "auto" );
    }
    .info-title-tab {
        height: 36px;
        background: #194971;
        border-bottom: 1px solid #ccc;
    }
    .info-title-tab h2.title {
        font-size: 14px;
        font-weight: bold;
        width: 180px;
        text-align:  center;
        color: #194971;
        background: #fff url(./templates/default/js_css/images/mainmenu_hover_bg.jpg) top left no-repeat;
    }
    .info-content-left, .info-content-right {
        width: 275px;
        padding: 10px 10px;
        border-right: 1px solid #ccc;
        float:left;
    }
    .info-content-right {width:380px; border: none; float:right;}
    .info-content-right ul li {
        background: #f6f2f2;
        padding: 5px 10px;
        width:100%;
        margin: 10px 0px;
    }
    .info-content-left span {
        font-weight:bold;
        float: left;
        padding: 0px 10px 0px 0px;
    }
    .info-content-left .edit {
        float: right;
        position: absolute;
        right: 0;
        top:10px;
    }
    .info-content-left ul li {
        padding: 10px 0px;
        border-bottom: 1px solid #ccc;
        position: relative;
    }
    .select {
        width: 100%;
    }
</style>
<script>
    $(document).ready(function(){
        $("#statusMember").click(function(){
           $("#status").animate({height:"80px"},500);
           $(".info-view-by").fadeIn(500);
        });
        $(".user_fullname_edit").click(function(){
            $("#user_fullname").html('<div class="container"></div><input name="user_fullname_u" id="user_fullname_u" value="<?PHP echo $getUser->user_fullname;?>" /><input name="user_fullname_update" id="user_fullname_update" type="submit" value="Cập nhật" />');
            $(".edit").fadeOut("slow");
        });
        $(".user_sex_edit").click(function(){
            $("#user_sex").html('<div class="container"></div><select name="user_sex_u" class="select" id="user_sex_u"><option value="1" <?PHP if($getUser->user_sex==1){echo 'selected="selected"';}else {echo "";} ?>>Nam</option><option value="0" <?PHP if($getUser->user_sex==0){echo 'selected="selected"';}else {echo "";} ?>>Nữ</option></select><input name="user_sex_update" id="user_sex_update" type="submit" value="Cập nhật" />');
            $(".edit").fadeOut("slow");
        });
        $(".user_email_edit").click(function(){
            $("#user_email").html('<input name="user_email_u" id="user_email_u" value="<?PHP echo $getUser->user_email;?>" /><div class="container"></div><input name="user_email_update" id="user_email_update" type="submit" value="Cập nhật" />');
            $(".edit").fadeOut("slow");
        });
        $(".user_phone_edit").click(function(){
            $("#user_phone").html('<input name="user_phone_u" id="user_phone_u" value="<?PHP echo $getUser->user_phone;?>" /><div class="container"></div><input name="user_phone_update" id="user_phone_update" type="submit" value="Cập nhật" />');
            $(".edit").fadeOut("slow");
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#field-add").click(function(){
            $(".field-add").fadeIn('slow');
            $(".info-content-right a").fadeOut();
        });
        $("#place-a").click(function(){
           $(".place-add").fadeIn('slow');
           $(".info-content-right a").fadeOut();
        });
        $("#shool-e").click(function(){
           $(".shool-edit").fadeIn('slow');
           $(".info-content-right a").fadeOut();
        });
        $("#shool-cancel").click(function(){
            $(".shool-edit").fadeOut('slow');
            $(".info-content-right a").fadeIn();
        });
        $("#job-e").click(function(){
           $(".job-edit").fadeIn('slow');
           $(".info-content-right a").fadeOut();
        });
    });
</script>
    <div id="info-member">
        <div id="info-left">
            <div class="info-avatar">
                <?PHP
                    echo '<img src="'.MTN_BASE_SITEURL.Templates.'/js_css/images/no_avt.jpg" />';
                ?>
            </div>
            <div id="statusMember" class="info-status">
                <h4>Hôm nay thế nào</h4>
                <div class="container"></div>
                <div style="border:1px solid #ccc;">
                    <form name="status-form-add" id="status-form-add" action="" method="POST">
                        <textarea name="status" id="status" cols="41" rows="1" placeholder="Cảm nghĩ của bạn"></textarea>
                        <div class="info-view-by">
                                <select name="viewby" id="viewby">
                                    <option value="1">
                                        Cá nhân
                                    </option>
                                    <option value="0">
                                        Cộng đồng
                                    </option>
                                </select>
                            <input name="statuss-add" id="statuss-add" type="submit" value="Đăng" />
                            <div style="clear: both;"></div>
                        </div>
                    </form>
                </div>
                <p><?PHP if(isset($status->status_content) && $status->status_content!="") echo $status->status_content; else echo ""; ?></p>
            </div>
            <div class="info-status">
                <h4>Liên kết</h4>
                <p>http://facebook.com</p>
            </div>
            <div class="info-status">
                <h4>Địa chỉ</h4>
                <p>95/6 Nguyễn Thông, CMT8, P. An Thới, Q. Bình Thủy, TP. Cần Thơ</p>
            </div>
            <div class="info-status">
                <h4>Nghề nghiệp hiện tại</h4>
                <p>Lập trình viên PHP cho  Công ty Cổ phần Công nghệ Truyền thông Miền Tây Net</p>
            </div>
        </div>
        <div id="info-right">
            <div class="info-title-tab">
                <h2 class="title">Thông tin cá nhân</h2>
            </div>
            <div class="info-content-tab">
                <div class="info-content-left">
                
                    <ul>
                        <form name="infoMemberForm" id="infoMemberForm" action="" method="POST">
                            <?PHP
                                $infoUser = "";
                                $infoUser[] = $getUser->user_name!="" ? "<span>Username:</span> <div id='user_name'>" . $getUser->user_name . "</div>" : NULL;
                                $infoUser[] = $getUser->user_fullname!="" ? "<span>Tên thật:</span> <div id='user_fullname'>" . $getUser->user_fullname . "</div><a href='#' class='user_fullname_edit edit'>Sửa</a>" : NULL;
                                $infoUser[] = ($getUser->user_sex!="" && $getUser->user_sex==1) ? "<span>Giới tính:</span> <div id='user_sex'>Nam</div><a href='#' class='user_sex_edit edit'>Sửa</a>" : "<span>Giới tính:</span> <div id='user_sex'>Nữ</div><a href='#' class='user_sex_edit edit'>Sửa</a>";
                                $infoUser[] = $getUser->user_email!="" ? "<span>Email:</span> <div id='user_email'>" . $getUser->user_email . "</div><a href='#' class='user_email_edit edit'>Sửa</a>" : NULL;
                                $infoUser[] = $getUser->user_phone!="" ? "<span>Phone:</span> <div id='user_phone'>" . $getUser->user_phone . "</div><a href='#' class='user_phone_edit edit'>Sửa</a>" : "<a href='#' class='user_phone_edit edit'>Sửa</a>";
                                for($i=0;$i<count($infoUser);$i++){
                                    echo '<li>' . $infoUser[$i] . '</li>';
                                }
                            ?>    
                        </form>
                        <li>
                            <a href="#" id="field-add">Thêm một trường hiển thị</a>
                            <div class="field-add" style="display: none;">
                                <p>
                                    <label for="field_name">Tên trường</label>
                                    <select name="field_name" id="field_name">
                                        <option value="address">Địa chỉ</option>
                                        <option value="job">Nghề nghiệp</option>
                                        <option value="face">Facebook</option>
                                        <option value="google">Google +</option>
                                    </select>
                                </p>
                                <p>
                                    <label for="field_data">Địa chỉ</label>
                                    <textarea style="resize: none;" name="field_data" id="field_data" cols="39" rows="3" placeholder="Khu 2, Đường 3/2, P. Xuân Khánh, Q. Ninh Kiều, TP. Cần Thơ"></textarea>
                                </p>
                                <input name="fieldupdate" id="fieldupdate" type="submit" value="Cập nhật" />
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="info-content-right">
                    <ul>
                        <li class="job">    
                            <p class="editable_textile">dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutp</p> 
                        </li>
                        <li class="job">    
                            <p>Làm việc tại Công ty Cổ Phần Công nghệ Truyền thông Miền Tây Net</p>
                            <p>Địa chỉ: P. An Thới, Q. Bình Thủy, TP. Cần Thơ</p>
                            <a href="#"><i class="glyphicon glyphicon-eye-open"></i> Ẩn đi</a> <a href="#" id="job-e"><i class="glyphicon glyphicon-edit"></i> Chỉnh sửa</a>
                            <div class="job-edit" style="display: none;">
                                <p>
                                    <label for="job_name">Trường học</label>
                                    <input name="job_name" id="job_name" type="text" placeholder="Đại học Cần Thơ" />
                                </p>
                                <p>
                                    <label for="job_address">Địa chỉ</label>
                                    <textarea style="resize: none;" name="job_address" id="job_address" cols="53" rows="3" placeholder="Khu 2, Đường 3/2, P. Xuân Khánh, Q. Ninh Kiều, TP. Cần Thơ"></textarea>
                                </p>
                                <input name="jobupdate" id="jobupdate" type="submit" value="Cập nhật" />
                            </div>
                        </li>
                        <li class="shool">
                            <div class="container"></div>  
                            <p>Làm việc tại Công ty Cổ Phần Công nghệ Truyền thông Miền Tây Net</p>
                            <p>Địa chỉ: P. An Thới, Q. Bình Thủy, TP. Cần Thơ</p>
                            <a href="#"><i class="glyphicon glyphicon-eye-open"></i> Ẩn đi</a> <a href="#" id="shool-e"><i class="glyphicon glyphicon-edit"></i> Chỉnh sửa</a>
                            <div class="shool-edit" style="display: none;">
                                <p>
                                    <label for="shool_name">Trường học</label>
                                    <input name="shool_name" id="shool_name" type="text" placeholder="Đại học Cần Thơ" />
                                </p>
                                <p>
                                    <label for="shool_address">Địa chỉ</label>
                                    <textarea style="resize: none;" name="shool_address" id="shool_address" cols="53" rows="3" placeholder="Khu 2, Đường 3/2, P. Xuân Khánh, Q. Ninh Kiều, TP. Cần Thơ"></textarea>
                                </p>
                                <button name="shool-cancel" id="shool-cancel">Hủy</button>
                                <input name="shoolupdate" id="shoolupdate" type="submit" value="Cập nhật" />
                            </div>
                        </li>
                        <li class="place">
                            <div class="container"></div>
                            <a href="#" id="place-a">Thêm nơi sinh sống</a>
                            <div class="place-add" style="display: none;">
                                <p>
                                    <label for="place_name">Sống tại</label>
                                    <input name="place_name" id="place_name" type="text" placeholder="Cần Thơ" />
                                </p>
                                <p>
                                    <label for="place_address">Đến từ</label>
                                    <textarea style="resize: none;" name="place_address" id="place_address" cols="53" rows="3" placeholder="Ấp Nha Sáp, xã Vĩnh Điều, huyện Giang thành, tỉnh Kiên Giang"></textarea>
                                </p>
                                <input name="placeadd" id="placeadd" type="submit" value="Đăng" />
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>