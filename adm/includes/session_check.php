<?PHP
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
    $getU = $user->checkViewIsMember('user_id,user_name,group_id',$f->decodeID($getKey['log_key_en_id'],$getKey['log_key_cv_id'],$_COOKIE['login_userid']),$_COOKIE['login_username']);
    //Kiểm tra xem có tồn tại thành viên hay không? nếu không thì yêu cầu đăng nhập
    if(!isset($getU)){
        echo $f->linkToLink('/adm/user/user_login.php');
    }
    //Kiểm tra xem có phải là admin hay không nếu không thoát khỏi trang
    $getPer = $user->checkPerAdmin(array(1,2,3),'group_id',$f->decodeID($getKey['log_key_en_id'],$getKey['log_key_cv_id'],$_COOKIE['login_userid']),$_COOKIE['login_username']);
    if(isset($getU) && $getPer==false){
        echo $user->logOut();
        echo $f->confirmErr("Bạn không có quyền truy cập vào trang này!");
    }
?>