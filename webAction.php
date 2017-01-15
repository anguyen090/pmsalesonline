<?PHP
session_start();
//Dat gia tri cho duong dan khoi dong Web admin
define('_AK_MOS_', 1 );
//Load file ket noi data
require("./includes/_mainconn.php");
//Kiem tra Language
require("./includes/lang_check.php");
require_once("./_sys/database.class.php");
//Class functions
require_once "./_sys/functions.class.php";
//Class contact
require_once "./models/contact.class.php";
//Class contact
require_once "./models/comment.class.php";
//Class contact
require_once "./models/content.class.php";
//Class User
require_once "./models/user.class.php";
//Class User
require_once "./models/saleschannel.class.php";
//Class function
require_once("./_sys/functions.class.php");
$ct =  new Contact();
$f = new functionGet();
$cm = new Comment();
$content = new Content();
$user = new User();
$channel = new SalesChannel();
require_once("./models/configuration.class.php");
$config = new Configuration();
//Class config email
require_once("./models/configemail.class.php");
$configE = new Config_email();
//Class config email
require_once("./models/newsletters.class.php");
$nlt = new Newsletter();
$configuration = $config->getARecord("config_website_title,config_website_url,config_logo,config_company_info,config_contact_info,config_copyright");
//Khai báo các biến khởi tạo
define('MTN_BASE_SITEURL',$config->getUrl($config->getConfig('config_website_url')));
define('MTN_URLRewrite','/');
//====================================================================================================================	
//Cập nhật thông tin nhà bán hàng
//Quản lý kênh bán hàng
if(isset($_POST['page']) && $_POST['page']=='salechannelupdate'){
    //Lấy thông tin từ form
    $code     = htmlspecialchars($_POST['kbh_code'], ENT_QUOTES);
	$title 	  = htmlspecialchars($_POST['kbh_title'], ENT_QUOTES);
	$website  = htmlspecialchars($_POST['kbh_website'], ENT_QUOTES);
    $account  = htmlspecialchars($_POST['kbh_account'], ENT_QUOTES);
	//$join     = htmlspecialchars($_POST['kbh_join'], ENT_QUOTES);
    //Xử lý ngày
    //date("Y-m-d",strtotime(str_replace("/","-",$_POST['kbh_join']])));
    $join = $_POST['kbh_account']!="" ? date("Y-m-d",strtotime(str_replace("/","-",$_POST['kbh_join']))) : "";
    $author   = htmlspecialchars($_POST['kbh_author'], ENT_QUOTES);
    $note     = htmlspecialchars($_POST['kbh_note'], ENT_QUOTES);
    $action   = htmlspecialchars($_POST['kbh_action'], ENT_QUOTES);
    $username = $_COOKIE['login_username'];
    //SET Thông tin
    $channel->setSalechannel_code($code);
    $channel->setSalechannel_title($title);
    $channel->setSalechannel_note($note);
    $channel->setSalechannel_website($website);
    $channel->setSalechannel_account($account);
    $channel->setSalechannel_join($join);
    $channel->setSalechannel_author($author);
    $channel->setSalechannel_update_date(date('Y-m-d h:i:s'));
    $channel->setSalechannel_update_ip($_SERVER['REMOTE_ADDR']);
    $channel->setSalechannel_update_by($username);
    $channel->setSalechannel_action($action);
    //Thêm dữ liệu
    $update = $channel->updateByCode();
    if($update){
        echo '<div class="success">Cập nhật kênh bán hàng thành công!</div>'.$f->refresh(1000);
    }else {
	   echo '<div class="warning">Lỗi! Không thể cập nhật thông tin. liên hệ với Quản trị viên</div>';
	} 
}
//Quản lý kênh bán hàng
if(isset($_POST['page']) && $_POST['page']=='salechanneladd'){
    //Lấy thông tin từ form
    $code     = htmlspecialchars($_POST['kbh_code'], ENT_QUOTES);
	$title 	  = htmlspecialchars($_POST['kbh_title'], ENT_QUOTES);
	$website  = htmlspecialchars($_POST['kbh_website'], ENT_QUOTES);
    $account  = htmlspecialchars($_POST['kbh_account'], ENT_QUOTES);
	//$join     = htmlspecialchars($_POST['kbh_join'], ENT_QUOTES);
    //Xử lý ngày
    //date("Y-m-d",strtotime(str_replace("/","-",$_POST['kbh_join']])));
    $join = $_POST['kbh_account']!="" ? date("Y-m-d",strtotime(str_replace("/","-",$_POST['kbh_join']))) : "";
    $author   = htmlspecialchars($_POST['kbh_author'], ENT_QUOTES);
    $note     = htmlspecialchars($_POST['kbh_note'], ENT_QUOTES);
    $action   = htmlspecialchars($_POST['kbh_action'], ENT_QUOTES);
    $username = $_COOKIE['login_username'];
    //SET Thông tin
    $channel->setSalechannel_code($code);
    $channel->setSalechannel_title($title);
    $channel->setSalechannel_note($note);
    $channel->setSalechannel_content("");
    $channel->setSalechannel_website($website);
    $channel->setSalechannel_account($account);
    $channel->setSalechannel_join($join);
    $channel->setSalechannel_author($author);
    $channel->setSalechannel_date(date('Y-m-d h:i:s'));
    $channel->setSalechannel_ip($_SERVER['REMOTE_ADDR']);
    $channel->setSalechannel_by($username);
    $channel->setSalechannel_update_date(date('Y-m-d h:i:s'));
    $channel->setSalechannel_update_ip($_SERVER['REMOTE_ADDR']);
    $channel->setSalechannel_update_by($username);
    $channel->setSalechannel_action($action);
    $channel->setSalechannel_status(intval(1));
    echo $channel->getSalechannel_status();
    //Thêm dữ liệu
    $insert = $channel->insert();
    if($insert){
        echo '<div class="success">Thêm kênh bán hàng thành công!</div>'.$f->refresh(1000);
    }else {
	   echo '<div class="warning">Lỗi! Không thể cập nhật thông tin liên hệ.</div>';
	} 
}
//Contact
if(isset($_POST['page']) && $_POST['page']=="contactpage")
{
	$name     = htmlspecialchars($_POST['ct_name'], ENT_QUOTES);
	$email 	  = htmlspecialchars($_POST['ct_email'], ENT_QUOTES);
	$phone	  = htmlspecialchars($_POST['ct_phone'], ENT_QUOTES);
    $address  = htmlspecialchars($_POST['ct_address'], ENT_QUOTES);
	$content  = htmlspecialchars($_POST['ct_content'], ENT_QUOTES);
    //Set value
    $ct->setContact_name($name);
    $ct->setContact_email($email);
    $ct->setContact_phone($phone);
    $ct->setContact_address($address);
    $ct->setContact_content($content);
    $ct->setContact_date(date('Y-m-d h:i:s',time()));
    $ct->setContact_ip($_SERVER['REMOTE_ADDR']);
    $ct->setContact_update_date(date('Y-m-d h:i:s',time()));
    $ct->setContact_update_ip($_SERVER['REMOTE_ADDR']);
    $ct->setContact_status(1);
    $insert = $ct->insert();
	//Lưu vào trong data
	if($insert)
	{
        //Insert thành công và tiến hành gửi mail
		//require class phpmailer
		require("./includes/class.phpmailer.php");
		$emailU = $email!="" ? $email : "";
		$euser = array($emailU, "nguoihungnam2011@gmail.com");
		$html = '
		
			Xin chào <b>'.$name.'</b>!<br /><br />

			Chúng tôi rất vui vì nhận được sự quan tâm của bạn, cảm ơn bạn đã liên hệ với chúng tôi. <br /><br />
			
			- Nếu những ý đóng góp của bạn, chúng tôi sẽ tiến hành kiểm tra và tiến hành khắc phục sơm để website được hoàn thiện và phục vụ tốt hơn.<br /><br />
			
			- Nếu bạn muốn tư vấn thêm dịch vụ hoặc thông tin sản phẩm chúng tôi sẽ tiến hành trả lời sớm cho bạn thông qua điện thoại trực tiếp hoặc thông qua email.<br /><br />
			
			- Nếu bạn muốn đặt mua sản phẩm, chúng tôi sẽ tiến hành xác nhận lại một số thông tin và tiến hành giao hạn cho bạn.<br /><br />
			
			<div style="border: 1px solid #ccc;padding: 10px;">'.$content.'</div><br /><br />
			
			Xin chân thành cảm ơn! <br /><br />
		';
		$nohtml = '
		
			Xin chào <b>'.$name.'</b>!<br /><br />

			Chúng tôi rất vui vì nhận được sự quan tâm của bạn, cảm ơn bạn đã liên hệ với chúng tôi. <br /><br />
			
			- Nếu những ý đóng góp của bạn, chúng tôi sẽ tiến hành kiểm tra và tiến hành khắc phục sơm để website được hoàn thiện và phục vụ tốt hơn.<br /><br />
			
			- Nếu bạn muốn tư vấn thêm dịch vụ hoặc thông tin sản phẩm chúng tôi sẽ tiến hành trả lời sớm cho bạn thông qua điện thoại trực tiếp hoặc thông qua email.<br /><br />
			
			- Nếu bạn muốn đặt mua sản phẩm, chúng tôi sẽ tiến hành xác nhận lại một số thông tin và tiến hành giao hạn cho bạn.<br /><br />
			
			<div style="border: 1px solid #ccc;padding: 10px;">'.$content.'</div><br /><br />
			
			Xin chân thành cảm ơn! <br /><br />
		';
        $configemail = $configE->getARecord(1,'email_email,email_pass,email_smtp,email_port,email_aut');
        $listArr = array(
            'email' => $configemail->email_email,
            'smtp'  => $configemail->email_smtp,
            'port'  => $configemail->email_port,
            'aut'   => $configemail->email_aut,
            'pass'  => $configE->parsePassword('Ksv_@kiengiang@123ct^MT^',$configE->getConfigEmail(1,'email_pass'))
        );
		$send = $f->sendMailTo(0,"Liên hệ","Thông tin liên hệ",$listArr['email'],$listArr['pass'],$listArr['aut'],$listArr['smtp'],$listArr['port'],$euser,$html,$nohtml);
		if($send==true){
			echo '<div class="success">Gửi thông tin thành công!</div>'.$f->refresh(800);
		}else {
			echo '<div class="warning">Lỗi! Không thể gửi mail! vui lòng liên hệ quản trị viên.</div>';
		}
	}else {
	   echo '<div class="warning">Lỗi! Không thể cập nhật thông tin liên hệ.</div>';
	}
}
if(isset($_POST['page'])){
    $page = $_POST['page'];
    if($page == 'comment'){
        $cmcontent = htmlspecialchars_decode($_POST['cmcontent'], ENT_QUOTES);
        $cmoption = htmlspecialchars_decode($_POST['cmoption'], ENT_QUOTES);
        $cmitem = htmlspecialchars_decode($_POST['cmitem'], ENT_QUOTES);
		$cmname = htmlspecialchars($_POST['cmname'], ENT_QUOTES);
		$cmuser = htmlspecialchars($_POST['cmuser'], ENT_QUOTES);
		$cmparent = htmlspecialchars($_POST['cmparent'], ENT_QUOTES);
        $cm->setComment_modules($cmoption);
        $cm->setComment_item($cmitem);
        $cm->setComment_parent($cmparent);
        $cm->setComment_content($cmcontent);
        $cm->setComment_name($cmname);
        $cm->setComment_update_date(date('Y-m-d h:i:s',time()));
        $cm->setComment_update_ip($_SERVER['REMOTE_ADDR']);
        //Insert into database
        $insert = $cm->insert();
        if($insert){
            //Cập nhật count comment
			$content->countCommentUpdate($cmoption,$cmitem);
			echo "<div class='success'>Thêm bình luận thành công!</div>".$f->refresh(800);
        }else {
            echo "<div class='warning'>Thêm bình luận thất bại!</div>";
        }
    }
	if($page == 'commentreply'){
        $cmrcontent = htmlspecialchars_decode($_POST['cmrcontent'], ENT_QUOTES);
        $cmroption = htmlspecialchars_decode($_POST['cmroption'], ENT_QUOTES);
        $cmritem = htmlspecialchars_decode($_POST['cmritem'], ENT_QUOTES);
		$cmrname = htmlspecialchars($_POST['cmrname'], ENT_QUOTES);
		$cmruser = htmlspecialchars($_POST['cmruser'], ENT_QUOTES);
		$cmrparent = htmlspecialchars($_POST['cmrparent'], ENT_QUOTES);
        $cm->setComment_modules($cmroption);
        $cm->setComment_item($cmritem);
        $cm->setComment_parent($cmrparent);
        $cm->setComment_content($cmrcontent);
        $cm->setComment_name($cmrname);
        $cm->setComment_update_date(date('Y-m-d h:i:s',time()));
        $cm->setComment_update_ip($_SERVER['REMOTE_ADDR']);
        //Insert into database
        $insert = $cm->insert();
        if($insert){
            //Cập nhật count comment
			$content->countCommentUpdate($cmroption,$cmritem);
			echo "<div class='success'>Thêm bình luận thành công!</div>".$f->refresh(800);
        }else {
            echo "<div class='warning'>Có lỗi! Vui lòng liên hệ QTV.</div>";
        }
    }
//Check login form
    if(isset($_POST['page']) && $_POST['page']=="login"){
        //POST username và password nhập vào        
        $user_name = htmlspecialchars_decode($_POST['u']);
        $user_pass = md5(md5($_POST['p']));
        //Set cookie username tạm khi người dùng nhập vào để kiểm tra
        setcookie('tmp_username',$user_name);           
        //Lấy dữ liệu theo điều kiện đúng username và password
        $login = $user->login($user_name,$user_pass,"user_id,user_name,user_firstname,user_lastname,user_right,user_active");
        //Nếu có dữ liệu và dữ liệu lớn hơn 0
        if(isset($login) && count($login)>0){
            echo "<div class='success'>Đăng nhập thành công!</div>";
            //$f->refresh("");
            //Xóa cookie đếm số lần đăng nhập sai
            setcookie('num', '', time() - 3600, '/');
            unset($_COOKIE['tmp_username']);
            unset($_COOKIE['lock']);
            /**
             * time() = Thời gian hiện tại
             * 60 = 60 giây = 1 phút
             * 60 = 60 phút = 1 giờ
             * Thời gian hiện tại + (60 giây * 60 phút)
             * Set cookie thì lấy thời gian hiện tại + thời gian tồn tại cookie
             * Xóa cookie thì lấy thời gian hiện tại trừ đi thời gian cho phép tồn tại cookie
             */
            //Set cookie id
            setcookie("login_userid",$f->encodeID('$Log@KwID','KwiD',$login->user_id),0,'/');
            //Set cookie fullname
            setcookie('login_firstname',$f->encodeID('$Log@KwFname','FLnA',$login->user_firstname),0,'/');
            setcookie('login_lastname',$f->encodeID('$Log@KwLname','LLnA',$login->user_lastname),0,'/');
            setcookie("login_username",$login->user_name,0,'/');
            echo $f->linkToLink('dashboard');
        }else {
            echo "<div class='warning'>Lỗi! Username hoặc mật khẩu không đúng!</div>";
        }
    }//Kiểm tra login page
//Kiểm tra trang register page
//Register
if(isset($_POST['page']) && $_POST['page']=='register'){
    $rgt_uname=htmlspecialchars($_POST['rgt_uname'], ENT_QUOTES);
    $rgt_upass = $_POST['rgt_upass'];
    $rgt_fname=htmlspecialchars($_POST['rgt_fname'], ENT_QUOTES);
    $rgt_lname=htmlspecialchars($_POST['rgt_lname'], ENT_QUOTES);
    $rgt_addr=isset($_POST['rgt_addr']) ? htmlspecialchars($_POST['rgt_addr'], ENT_QUOTES) : "";
    $rgt_email=isset($_POST['rgt_email']) ? htmlspecialchars($_POST['rgt_email'], ENT_QUOTES) : "";
    $rgt_phone=isset($_POST['rgt_phone']) ? htmlspecialchars($_POST['rgt_phone'], ENT_QUOTES) : "";
    $rgt_sex=isset($_POST['rgt_sex']) ? htmlspecialchars($_POST['rgt_sex'], ENT_QUOTES) : "";
    $rgt_date=isset($_POST['rgt_date']) ? htmlspecialchars($_POST['rgt_date'], ENT_QUOTES) : '00';
    $rgt_month=isset($_POST['rgt_month']) ? htmlspecialchars($_POST['rgt_month'], ENT_QUOTES) : '00';
    $rgt_year=isset($_POST['rgt_year']) ? htmlspecialchars($_POST['rgt_year'], ENT_QUOTES) : '0000';
    $birthday = $rgt_year.'-'.$rgt_month.'-'.$rgt_date;
    $user = new User();
    $user->setGroup_id(4);
    $user->setUser_name($rgt_uname);
    $user->setUser_pass($rgt_upass);
    $user->setUser_right(1);
    $user->setUser_active(1);
    $user->setUser_firstname($rgt_fname);
    $user->setUser_lastname($rgt_lname);
    $user->setUser_email($rgt_email);
    $user->setUser_phone($rgt_phone);
    $user->setUser_sex($rgt_sex);
    $user->setUser_birthday($birthday);
    $user->setUser_address($rgt_addr);
    $user->setUser_count_login(0);
    $user->setUser_lock(0);
    $user->setUser_update_ip($_SERVER['REMOTE_ADDR']);
    $user->setUser_date_update(date("Y-m-d h:i:s"));
    if(!$user->getARecordByUsername($rgt_uname)){
        if($user->insert()){
            echo '<div class="success">Đăng ký thành công</div>'.$f->refresh(800);
        }else {
            echo '<div class="warning">Lỗi! Không thể đăng ký thành viên</div>';
        }
    }else {
        echo '<div class="warning">Lỗi! <b>'.$rgt_uname.'</b>, đã được đăng ký, vui lòng chọn tên khác! </div>';
    }
}
//Update info mation
if($page=='infoupdate'){
        
        $id = $_COOKIE['user_id'];
        
        if(isset($_POST['ufullname'])&&$_POST['ufullname']!= NULL){
            
            $value=array(
                'user_fullname' => $_POST['ufullname']
            );
            
            $update = $user->updateInfoCustom($id,$value);
            
            if($update){
                echo "Update thành công";
                echo '<meta http-equiv="refresh" content="2;http://'.$_SERVER['HTTP_HOST'].'/'.$_COOKIE['user_name'].'">';
            }
        }
        if(isset($_POST['uemail'])&&$_POST['uemail']!= NULL){
            
            $value=array(
                'user_email' => $_POST['uemail']
            );
            
            $update = $user->updateInfoCustom($id,$value);
            
            if($update){
                echo "Update thành công";
                echo '<meta http-equiv="refresh" content="2;http://'.$_SERVER['HTTP_HOST'].'/'.$_COOKIE['user_name'].'">';
            }
        }
        if(isset($_POST['usex'])&&$_POST['usex']!= NULL){
            
            $value=array(
                'user_sex' => $_POST['usex']
            );
            
            $update = $user->updateInfoCustom($id,$value);
            
            if($update){
                echo "Update thành công";
                echo '<meta http-equiv="refresh" content="2;http://'.$_SERVER['HTTP_HOST'].'/'.$_COOKIE['user_name'].'">';
            }
        }
        if(isset($_POST['uphone'])&&$_POST['uphone']!= NULL){
            
            $value=array(
                'user_phone' => $_POST['uphone']
            );
            
            $update = $user->updateInfoCustom($id,$value);
            
            if($update){
                echo "Update thành công";
                echo '<meta http-equiv="refresh" content="2;http://'.$_SERVER['HTTP_HOST'].'/'.$_COOKIE['user_name'].'">';
            }
        }
    }//Kiểm tra page = Logout
    if(isset($_POST['page']) && $_POST['page']=='logout'){
        //Set cookie id
        setcookie("login_userid","",time()-1,'/');
        //Set cookie fullname
        setcookie('login_firstname',"",time()-1,'/');
        setcookie('login_lastname',"",time()-1,'/');
        //Set cookie username
        setcookie("login_username","",time()-1,'/');
        //Set cookie quyền hạn user right
        setcookie("login_userright","",time()-1,'/');
        setcookie("user_active","",time()-1,'/');
        echo '<script> alert("Đăng xuất thành công"); </script>'.$f->linkToLink(MTN_BASE_SITEURL);
    }//Kiểm tra trang logout
}//Kiem tra ton tai bien page
//Thay đổi avatar
if(isset($_GET['atc']) && base64_decode($_GET['atc'])=="avtupload" && $_GET['keys']==md5(md5("mtupload"))) {
    if(intval(base64_decode($_GET['id']))>0){
        $id = base64_decode($_GET['id']);
       if(isset($_FILES['images']) AND $_FILES['images']['type']!=null){
            $user = new User();
            $user->setUser_id($id);
            if($updateAvatar = $user->updateImages('avatar',$_FILES['images']['type'],$_FILES['images']['name'],$_FILES['images']['size'], $_FILES['images']['tmp_name']))			
                echo '<script language="javascript">alert("Cập nhật ảnh đại diện thành công!");javascript:window.history.back();</script>';
            else
                echo '<script language="javascript">alert("Lỗi! không thể cập nhật ảnh đại diện. Liên hệ QTV");javascript:window.history.back();</script>';
        } 
    }
}
//====================================================================================================================
if(isset($_GET['ops']) && base64_decode($_GET['ops'])=='newslettersemail' && base64_decode($_GET['atc'])=='newslettersemail'){
    if(md5(md5('knsv_@NewsLettes$123'))==$_GET['keys'])
    {
        $option = htmlspecialchars($_POST['newslettersoption'], ENT_QUOTES);
        $item = htmlspecialchars($_POST['newslettersitem'], ENT_QUOTES);
        $email = htmlspecialchars($_POST['newslettersemail'], ENT_QUOTES);
        if($newsletters = $nlt->getNewslettersByCustom($email,$option,$item,'newsletters_id')){
            echo $f->confirmErr("Chuyên mục này đã được đăng ký bởi email này, vui lòng chọn một email khác hoặc một chuyên mục khác");
        }else {
            $nlt->setNewsletters_email($email);
            $nlt->setNewsletters_option($option);
            $nlt->setNewsletters_parent($item);
            $nlt->setNewsletters_date(date("Y-m-d h:i:s"));
            $nlt->setNewsletters_ip($_SERVER['REMOTE_ADDR']);
            $nlt->setNewsletters_update_date(date("Y-m-d h:i:s"));
            $nlt->setNewsletters_update_ip($_SERVER['REMOTE_ADDR']);
            $nlt->setNewsletters_status(0);
            
            //Insert data
            $insertnlt = $nlt->insert();
            if($insertnlt){
                //Insert thành công và tiến hành gửi mail
        		//require class phpmailer
        		require("./includes/class.phpmailer.php");
        		$emailU = $email!="" ? $email : "";
        		$euser = array($emailU, "nguoihungnam2011@gmail.com");
        		$html = file_get_contents("http://myproject.net/emailtemplates/tp_register_newsletters.php");
        		$nohtml = file_get_contents("http://myproject.net/emailtemplates/tp_register_newsletters.php");
                $configemail = $configE->getARecord(1,'email_email,email_pass,email_smtp,email_port,email_aut');
                $listArr = array(
                    'email' => $configemail->email_email,
                    'smtp'  => $configemail->email_smtp,
                    'port'  => $configemail->email_port,
                    'aut'   => $configemail->email_aut,
                    'pass'  => $configE->parsePassword('Ksv_@kiengiang@123ct^MT^',$configE->getConfigEmail(1,'email_pass'))
                );
        		$send = $f->sendMailTo(0,"Đăng ký nhận tin mới","Đăng ký nhận tin mới",$listArr['email'],$listArr['pass'],$listArr['aut'],$listArr['smtp'],$listArr['port'],$euser,$html,$nohtml);
        		if($send==true){
        			echo $f->confirmErr("Email của bạn đã đăng ký thành công, vui lòng check mail để kiểm tra");
        		}else {
  		            echo $f->confirmErr("Lỗi! Không thể gửi mail! vui lòng liên hệ quản trị viên.");
        		}
                
            }else {
                echo $f->confirmErr("Hệ thống không nhận được email của bạn, vui lòng liên hệ với QTV");
            }
        }
    }
}
?>