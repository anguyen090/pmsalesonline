<?php
    if(isset($_COOKIE['login_userid']))
    {
        $f = new functionGet();
        echo $f->linkToLink('dashboard');
    }
?>
<div class="alert"></div>
<div id="login">
    <div class="login-error"></div>
    <form id="loginForm" action="" method="POST">
        <input type="hidden" name="action" value="^_^AK^_^"/>
        <label>Tên đăng nhập</label>
        <input class="input" name="username" id="login_usename" type="text" placeholder="Tên đăng nhập" />
        <label>Mật khẩu</label>
        <input class="input" name="password" id="login_password" type="password" placeholder="Mật khẩu" />
        <div class="small" style="width: 50%;float: left;line-height: 40px;">
            <input name="remember" type="checkbox" /> Ghi nhớ | <a href="#" onclick="popupmember('forgotpass', 'Quên mật khẩu')">Quên mật khẩu</a>
        </div>
        <div class="small" style="width: 48%; float: right;">
            <input id="btnloginForm" class="button" name="submit" type="submit" value="Đăng nhập"  />
        </div>
        <div style="clear: both;margin-bottom: 20px;"></div>
    </form>
    <div class="forgotpasspopup">
        <div class="popupShow" id="forgotpasspopupShow">
            <div class="popuptitle">
                <h2 class="mem title"></h2>
                <span class="closepopup" onclick="closePopup('forgotpass')">x</span>
                <div class="clear"></div>
            </div>
            <div class="popupContent">
                <div class="fgp_alert"></div>
                <form class="cmxform" name="forgotpass" id="forgotpass" action="" method="POST">
                    <label>Nhập email của bạn:</label>
                    <input class="input" name="fgp_email" id="fgp_email" type="text" placeholder="Email đăng ký" />
                    <div class="account" style="margin-top: 10px;">
                        <label>Bạn vui lòng cung cấp cho chúng tôi một ít thông tin về bạn</label>
                        <label>Họ tên:</label>
                        <input class="input" name="fgp_name" id="fgp_name" type="text" placeholder="Họ tên của bạn" />
                        <label>Điện thọai:</label>
                        <input class="input" id="fgp_phone" name="fgp_phone" type="text" placeholder="Số điện thoại" />
                    </div>
                    <input class="button" id="btn-forgotpass" name="submit" type="submit" value="Gửi" />
                    <div class="clear"></div>
                </form>
            </div>
        </div>
    </div><!--END popup quên mật khẩu-->
</div>