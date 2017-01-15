<?php
    if(isset($_COOKIE['login_userid']))
    {
        $f = new functionGet();
        echo $f->linkToLink('dashboard');
    }
?>          
<div id="register">
    <div class="alert"></div>
    <div style="clear: both;margin-bottom: 10px;"></div>
    <form class="cmxform" id="registerForm" action="" method="POST">
        <div class="account">
            <input type="hidden" id="rgt_action" name="rgt_action" value="mtregister"/>
            <label>Tên đăng nhập</label>
            <input class="input" id="rgt_username" name="rgt_username" type="text" placeholder="Tên đăng nhập" />
            <label>Mật khẩu</label>
            <input class="input" id="rgt_password" name="rgt_password" type="password" placeholder="Mật khẩu" />
            <label>Nhập lại mật khẩu</label>
            <input class="input" id="rgt_re_password" name="rgt_re_password" type="password" placeholder="Nhập lại mật khẩu" />
        </div>
        <div class="info">
            <div style="width: 49%; float: left;">
                <label>Họ</label>
                <input class="input" id="rgt_firstname" name="rgt_firstname" type="text" placeholder="Họ" />
            </div>
            <div style="width: 49%; float: right;">
                <label>Tên</label>
                <input class="input" id="rgt_lastname" name="rgt_lastname" type="text" placeholder="Tên" />
            </div>
            <div style="clear: both;"></div>
            <label>Địa chỉ</label>
            <textarea class="input" id="rgt_address" name="rgt_address" placeholder="Địa chỉ"></textarea>
            <label>Email <span style="font-style: italic;font-weight: normal;">(Nhập email để lấy lại mật khẩu nếu mất)</span></label>
            <input class="input" id="rgt_email" name="rgt_email" type="text" placeholder="Email" />
            <label>Số điện thoại</label>
            <input class="input" id="rgt_phone" name="rgt_phone" type="text" placeholder="Số điện thoại" />
            <div style="width: 49%;">
                <label>Giới tính</label>
                <select class="input" id="rgt_sex" name="rgt_sex">
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                </select>
            </div>
            <div style="clear: both;"></div>
            <div class="datereg" style="width: 28%;float: left">
                <input class="input" id="rgt_date" name="rgt_date" type="text" placeholder="Ngày sinh" />
            </div>
            <div class="monthreg" style="width: 38%;float: left;margin-left: 2%;">
                <input class="input" id="rgt_month" name="rgt_month" type="text" placeholder="Tháng sinh" />
            </div>
            <div class="yearreg" style="width: 28%;float: right;">
                <input class="input" id="rgt_year" name="rgt_year" type="text" placeholder="Năm sinh" />
            </div>
            <div style="clear: both;margin-bottom: 10px;"></div>
            <div class="small">
                <input id="rgt_agree" name="rgt_agree" type="checkbox" /> Tôi đồng ý <a href="#">Điều khoản sử dụng</a>
            </div>
            <div class="small">
                <input class="button" id="btn-register" name="submit" type="submit" value="Đăng ký"  />
            </div>
            <div style="clear: both;margin-bottom: 20px;"></div>
        </div>
    </form>
</div>