<?php
    //Thông tin public được xem
    //Kiểm tra xem người dùng có đăng nhập hay không, lấy thông tin đăng nhập của người dùng
    $f = new functionGet();
    $user = new User();
    $nlt = new Newsletter();
    $comm = new Comment();
    $contact = new Contact();
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
    $getPer = $user->checkPerAdmin(array(1),'group_id',$f->decodeID($getKey['log_key_en_id'],$getKey['log_key_cv_id'],$_COOKIE['login_userid']),$_COOKIE['login_username']);
    $getAdm = $user->checkViewIsAdmin('user_id,group_id,user_name,user_admin',$f->decodeID($getKey['log_key_en_id'],$getKey['log_key_cv_id'],$_COOKIE['login_userid']),$_COOKIE['login_username']);
    $getNewslt = $nlt->countNewsLettersRegister(0,' count(*) ');
    $getComment = $comm->countNewComment(0,' count(*) ');
    $getContact =  $contact->countNewContact(0,' count(*) ');
    $getCountUser = $user->countNewUser(0,' count(*) ');
    if($getPer==true && $getAdm==true){
?>
        <div id="info-group" class="box-manager">
            <h1>KÊNH BÁN HÀNG</h1>
            <span class="num-ric">03</span>
            <ul>
                <li class="active"><a href="#">LAZADA - <em>lazada.vn</em></a></li>
                <li><a href="#">MUALIENTAY - <em>mualientay.net</em></a></li>
                <li><a href="#">ADAYROI - <em>adayroi.com</em></a></li>
            </ul>
        </div>
<?php
    }else {
        echo "Hiện tại bạn chưa đăng nhập, vui lòng đăng nhập để sử dụng ứng dụng này";
    }
?>