<?php
    //Thông tin public được xem
    //Kiểm tra xem người dùng có đăng nhập hay không, lấy thông tin đăng nhập của người dùng
    $f = new functionGet();
    $user = new User();
    $nlt = new Newsletter();
    $comm = new Comment();
    $contact = new Contact();
    $user = new User();
    echo $option;
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
        //Kiểm tra chức năng
        if(isset($action) && $action=='add'){
            echo "Thêm mới đơn hàng";
        }else if(isset($action) && $action=='update'){
            echo $id;
            echo "Cập nhật đơn hàng";
        }else {
?>
        DANH SÁCH ĐƠN HÀNG
        <div id="info-group" class="box-manager">
            <h1 style="text-align: left;padding-left: 10px;">THÔNG TIN ĐƠN HÀNG</h1>
            <div class="data-gird">
                <ul>
                    <li class="tt-box">
                        <span class="cols-1 center">STT</span>
                        <span class="cols-2">Mã đơn</span>
                        <span class="cols-2">Mã SP</span>
                        <span class="cols-3">Tên KH</span>
                        <span class="cols-2">Địa chỉ</span>
                        <span class="cols-2">Khuyến mãi</span>
                        <span class="cols-2">Tạm tính</span>
                        <span class="cols-3">Trạng thái</span>
                        <span class="cols-3 center">Action</span>
                        <div class="lear"></div>
                    </li>
                </ul>
                <ul class="scroll-y" style="max-height: 500px;">
                    <li class="cc-box">
                        <span class="cols-1 center">1</span>
                        <span class="cols-2"><a href="#">313339839</a></span>
                        <span class="cols-2"><p>TDA8G</p><p>K200DX</p></span>
                        <span class="cols-3"><p>Nguyễn Văn Quốc Cường</p></span>
                        <span class="cols-2"><p>Thừa Thiên Huế</p></span>
                        <span class="cols-2"><p>0</p></span>
                        <span class="cols-2"><p>1.200.000</p></span>
                        <span class="cols-3">
                            <p>Đặt: 28/12/2016</p>
                            <p>Gửi: 30/12/2016</p>
                            <p>Giao: 03/01/2017</p>
                            <p>Thành công: 05/01/2017</p>
                        </span>
                        <span class="cols-3 center"><p><a href="#">Cập nhật</a> | <a href="#">Xóa</a></p></span>
                        <div class="lear"></div>
                    </li>
                    <li class="cc-box">
                        <span class="cols-1 center">1</span>
                        <span class="cols-2"><a href="#">313339839</a></span>
                        <span class="cols-2"><p>TDA8G</p><p>K200DX</p></span>
                        <span class="cols-3"><p>Nguyễn Văn Quốc Cường</p></span>
                        <span class="cols-2"><p>Thừa Thiên Huế</p></span>
                        <span class="cols-2"><p>0</p></span>
                        <span class="cols-2"><p>1.200.000</p></span>
                        <span class="cols-3">
                            <p>Đặt: 28/12/2016</p>
                            <p>Gửi: 30/12/2016</p>
                            <p>Giao: 03/01/2017</p>
                            <p>Thành công: 05/01/2017</p>
                        </span>
                        <span class="cols-3 center"><p><a href="#">Cập nhật</a> | <a href="#">Xóa</a></p></span>
                        <div class="lear"></div>
                    </li>
                    <li class="cc-box">
                        <span class="cols-1 center">1</span>
                        <span class="cols-2"><a href="#">313339839</a></span>
                        <span class="cols-2"><p>TDA8G</p><p>K200DX</p></span>
                        <span class="cols-3"><p>Nguyễn Văn Quốc Cường</p></span>
                        <span class="cols-2"><p>Thừa Thiên Huế</p></span>
                        <span class="cols-2"><p>0</p></span>
                        <span class="cols-2"><p>1.200.000</p></span>
                        <span class="cols-3">
                            <p>Đặt: 28/12/2016</p>
                            <p>Gửi: 30/12/2016</p>
                            <p>Giao: 03/01/2017</p>
                            <p>Thành công: 05/01/2017</p>
                        </span>
                        <span class="cols-3 center"><p><a href="#">Cập nhật</a> | <a href="#">Xóa</a></p></span>
                        <div class="lear"></div>
                    </li>
                </ul>
            </div>
        </div>
<?php
        }//END check function
    }//END Check login
?>