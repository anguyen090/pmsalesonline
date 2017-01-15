<?php
    //Thông tin public được xem
    //Kiểm tra xem người dùng có đăng nhập hay không, lấy thông tin đăng nhập của người dùng
    $f = new functionGet();
    $user = new User();
    $nlt = new Newsletter();
    $comm = new Comment();
    $contact = new Contact();
    $user = new User();
    $channel = new SalesChannel();
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
    $getPer = $user->checkPerAdmin(array(1),'group_id',$f->decodeID($getKey['log_key_en_id'],$getKey['log_key_cv_id'],$_COOKIE['login_userid']),$_COOKIE['login_username']);
    $getAdm = $user->checkViewIsAdmin('user_id,group_id,user_name,user_admin',$f->decodeID($getKey['log_key_en_id'],$getKey['log_key_cv_id'],$_COOKIE['login_userid']),$_COOKIE['login_username']);
    $getNewslt = $nlt->countNewsLettersRegister(0,' count(*) ');
    $getComment = $comm->countNewComment(0,' count(*) ');
    $getContact =  $contact->countNewContact(0,' count(*) ');
    $getCountUser = $user->countNewUser(0,' count(*) ');
    //Kiểm tra tồn tại đăng nhập
    if($getPer==true && $getAdm==true){
        $curentUrl = $f->curPageURL();
        //Kiểm tra chức năng
        if(isset($action) && $action=='add'){
            $code = $channel->getMaxID('salechannel_code')+13;
            $contentShow = '';
            $contentShow .= '
                <div class="small">
                    <div id="kbh-alert"></div>
                    <form name="saleadd" id="saleadd" action="" method="POST">
                        <label>Mã kênh bán hàng</label>
                        <input class="input" name="kbh_code" id="kbh_code" type="text" value="'.$code.'" />
                        <label>Tên kênh bán hàng</label>
                        <input class="input" name="kbh_title" id="kbh_title" type="text" placeholder="" />
                        <label>Website</label>
                        <input class="input" name="kbh_website" id="kbh_website" type="text" placeholder="" />
                        <label>Tài khoản</label>
                        <input class="input" name="kbh_account" id="kbh_account" type="text" placeholder="" />
                        <label>Ngày tham gia</label>
                        <input class="input datetime" name="kbh_join" id="kbh_join"  type="text" placeholder="" />
                        <label>Người quản trị</label>
                        <input class="input" name="kbh_author" id="kbh_author" type="text" placeholder="" />
                        <label>Mô tả</label>
                        <textarea class="input textarea" name="kbh_note" id="kbh_note"></textarea>
                        <label>Trạng thái</label>
                        <select name="kbh_action" id="kbh_action" class="small input">
                            <option value="Mới tạo tài khoản">Mới tạo tài khoản</option>
                            <option value="Đang chờ duyệt">Đang chờ duyệt</option>
                            <option value="Sẳn sàng bán hàng">Sẳn sàng bán hàng</option>
                        </select>
                        <div class="clear"></div>
                        <input class="button" name="submit" type="submit" text="Thêm vào" />
                    </form>
                </div>
                <div class="clear"></div>
            ';
            echo $contentShow;
        }else if(isset($action) && $action=='update'){
            $id = intval($_GET['id']);
            $getcn = $channel->getARecodeByID($id,'salechannel_id,salechannel_code,salechannel_title,salechannel_note,salechannel_website,salechannel_account,salechannel_join,salechannel_author,salechannel_action');
            $contentShow = '';
            $contentShow .= '
                <div class="small">
                    <div id="kbh-alert"></div>
                    <form name="saleupdate" id="saleupdate" action="" method="POST">
                        <label>Mã kênh bán hàng</label>
                        <input class="input" name="kbh_code" id="kbh_code" type="text" readonly="true" value="'.$getcn->salechannel_code.'" />
                        <label>Tên kênh bán hàng</label>
                        <input class="input" name="kbh_title" id="kbh_title" type="text" value="'.$getcn->salechannel_title.'" />
                        <label>Website</label>
                        <input class="input" name="kbh_website" id="kbh_website" type="text" value="'.$getcn->salechannel_website.'" />
                        <label>Tài khoản</label>
                        <input class="input" name="kbh_account" id="kbh_account" type="text" value="'.$getcn->salechannel_account.'" />
                        <label>Ngày tham gia</label>
                        <input class="input datetime" name="kbh_join" id="kbh_join"  type="text" value="'.date('d/m/Y',strtotime($getcn->salechannel_join)).'" />
                        <label>Người quản trị</label>
                        <input class="input" name="kbh_author" id="kbh_author" type="text" value="'.$getcn->salechannel_author.'" />
                        <label>Mô tả</label>
                        <textarea class="input textarea" name="kbh_note" id="kbh_note">'.$getcn->salechannel_note.'</textarea>
                        <label>Trạng thái</label>
                        <select name="kbh_action" id="kbh_action" class="small input">
                            <option value="'.$getcn->salechannel_action.'">'.$getcn->salechannel_action.'</option>
                            <option value="Mới tạo tài khoản">Mới tạo tài khoản</option>
                            <option value="Đang chờ duyệt">Đang chờ duyệt</option>
                            <option value="Sẳn sàng bán hàng">Sẳn sàng bán hàng</option>
                        </select>
                        <div class="clear"></div>
                        <input class="button" name="submit" type="submit" text="Cập nhật" />
                    </form>
                </div>
                <div class="clear"></div>
            ';
            echo $contentShow;
        }else {
?>
        
        <ul class="button-action">
            <li><a href="<?php echo $curentUrl; ?>/them-moi">Thêm mới</a></li>
            <li><a href="<?php echo $curentUrl; ?>/cap-nhat">Cập nhật</a></li>
            <li><a href="#">Xóa bỏ</a></li>
        </ul>
        <div id="info-group" class="box-manager">
            <h1 style="text-align: left;padding-left: 10px;">THÔNG TIN ĐƠN HÀNG</h1>
            <div class="data-gird">
                <ul>
                    <li class="tt-box">
                        <span class="cols-1 center">#</span>
                        <span class="cols-1 center">STT</span>
                        <span class="cols-2">Mã KBH</span>
                        <span class="cols-3">Tên KBH</span>
                        <span class="cols-3">Website</span>
                        <span class="cols-2">Tài khoản</span>
                        <span class="cols-3">Ngày tham gia</span>
                        <span class="cols-3">Quản trị</span>
                        <span class="cols-3">Trạng thái</span>
                        <span class="cols-3 center">Action</span>
                        <div class="lear"></div>
                    </li>
                </ul>
                <?php
                    $getchannel = $channel->getAll('salechannel_id,salechannel_code,salechannel_title,salechannel_note,salechannel_website,salechannel_account,salechannel_join,salechannel_author,salechannel_action');
                    $contentShow = '<ul class="scroll-y" style="max-height: 500px;">';
                    $ki = 1; //Kênh i
                    foreach($getchannel as $getchannel){
                        $contentShow .= '
                            <li class="cc-box">
                                <span class="cols-1 center"><input type="checkbox" name="kbh[]" value="'.$getchannel->salechannel_id.'" /></span>
                                <span class="cols-1 center">'.$ki++.'</span>
                                <span class="cols-2"><a href="#">'.$getchannel->salechannel_code.'</a></span>
                                <span class="cols-3"><p>'.$getchannel->salechannel_title.'</p></span>
                                <span class="cols-3"><p>'.$getchannel->salechannel_website.'</p></span>
                                <span class="cols-2"><p>'.$getchannel->salechannel_account.'</p></span>
                                <span class="cols-3"><p>'.$getchannel->salechannel_join.'</p></span>
                                <span class="cols-3"><p>'.$getchannel->salechannel_author.'</p></span>
                                <span class="cols-3"><p>'.$getchannel->salechannel_action.'</p></span>
                                <span class="cols-3 center"><p><a href="'.$curentUrl.'/'.$getchannel->salechannel_id.'-cap-nhat">Cập nhật</a> | <a href="#">Xóa</a></p></span>
                                <div class="lear"></div>
                            </li>
                        ';
                    }
                    $contentShow .= ' </ul>';
                    echo $contentShow;
                ?>
            </div>
        </div>
<?php
        }//END check function
    }//END Check login
?>