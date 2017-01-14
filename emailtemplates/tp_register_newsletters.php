<?php
    require_once("../_sys/emailtemplates.class.php");
    $etl = new EmailTemplates();
    $etl->setUrl_art('http://khoinghiepsinhvien.com');
    $getInfo = array(
        'url'               => $etl->getUrl_art(),
        'link_face'         => 'https://www.facebook.com/thembansevui',
        'link_youtube'      => 'https://goo.gl/Gk3YS4',
        'link_googleplus'   => 'https://plus.google.com/+MinhTrựcAZtuts',
        'title'             => 'Xin chào bạn!',
        'image'             => '<img src="http://khoinghiepsinhvien.com/uploads/images/hoc-lap-trinh-vien-1.jpg" />',
        'link'              => 'http://khoinghiepsinhvien.com/tin-cong-nghe/tin-tuc-cong-nghe/82-chung-ta-nen-hoc-lap-trinh-nhu-the-nao?.html',
        'content'           => '
                                <p>Chúng tôi nhận thấy rằng bạn muốn đăng ký nhận những tin mới nhất từ '.$getInfo["url"].', chúng tôi biết rằng bạn đang quan tâm đến chúng tôi!</p>
                                <p>Chỉ còn một bước nữa để chúng tôi xác nhận rằng đây chính xác là bạn để chúng tôi gửi ngay tin đầu tiên đến cho bạn.</p>
                                <p style="font-weight: bold;">Bạn vui lòng nhấp vào liên kết dưới đây để xác nhận. Nếu bạn vẫn không thấy tin tức từ chúng tôi, vui lòng liên hệ với chúng tôi để báo cáo sự cố này!</p>
                                <a href='.$getInfo["link"].' style="color: #fff; font-size: 14px; margin: 10px auto;display: table; text-align: center;padding: 10px 30px; background: #ed1c24;font-size: 14px;text-decoration: none;">Xác nhận đăng ký</a>
                                <p style="font-weight: bold;">Bạn có thể thực hiện các chức năng sau khi đăng ký:</p>
                                <p>Thay đổi thông tin đăng ký hoặc email đăng ký bất cứ lúc nào!</p>
                                <p>Nếu những email của chúng tôi làm phiền đến bạn, bạn có thể hủy đăng ký bất cứ lúc nào.</p>
                                <p>- - - -</p>
                                <p>QTV: Nguyễn Minh Trực</p>
                                <p>Email: <a href="mailto:trucminhnguyen1990@gmail.com">trucminhnguyen1990@gmail.com</a></p>
                               ',
        'link_cancel'       => 'http://khoinghiepsinhvien.com'
    );
?>
<table border="0" width="100%">
    <tr>
        <td><img src="<?php echo $getInfo['url']; ?>/uploads/images/logo-az_57446533382bc.png" /></td>
        <td align="right">
            <a href="<?php echo $getInfo['link_face']; ?>"><img src="<?php echo $getInfo['url']; ?>/emailtemplates/icon/facebook.jpg" /></a>
            <a href="<?php echo $getInfo['link_googleplus']; ?>"><img src="<?php echo $getInfo['url']; ?>/emailtemplates/icon/googleplus.jpg" /></a>
            <a href="<?php echo $getInfo['link_youtube']; ?>"><img src="<?php echo $getInfo['url']; ?>/emailtemplates/icon/youtube.jpg" /></a>
        </td>
    </tr>
    <tr>
        <td colspan="2"><div style="width: 100%; height: 3px; background: #015e97;"></div></td>
    </tr>
    <tr>
        <td colspan="2">
            <div style="background: #f1f1f1;padding: 20px;">
                <h2 style="font-size: 16px;font-weight:bold;"><?php echo $getInfo['title']; ?></h2>
                
                <p>Chúng tôi nhận thấy rằng bạn muốn đăng ký nhận những tin mới nhất từ <?php echo $getInfo["url"]; ?>, chúng tôi biết rằng bạn đang quan tâm đến chúng tôi!</p>
                <p>Chỉ còn một bước nữa để chúng tôi xác nhận rằng đây chính xác là bạn để chúng tôi gửi ngay tin đầu tiên đến cho bạn.</p>
                <p style="font-weight: bold;">Bạn vui lòng nhấp vào liên kết dưới đây để xác nhận. Nếu bạn vẫn không thấy tin tức từ chúng tôi, vui lòng liên hệ với chúng tôi để báo cáo sự cố này!</p>
                <a href='<?php echo $getInfo["link"]; ?>' style="color: #fff; font-size: 14px; margin: 10px auto;display: table; text-align: center;padding: 10px 30px; background: #ed1c24;font-size: 14px;text-decoration: none;">Xác nhận đăng ký</a>
                <p style="font-weight: bold;">Bạn có thể thực hiện các chức năng sau khi đăng ký:</p>
                <p>Thay đổi thông tin đăng ký hoặc email đăng ký bất cứ lúc nào!</p>
                <p>Nếu những email của chúng tôi làm phiền đến bạn, bạn có thể hủy đăng ký bất cứ lúc nào.</p>
                <p>- - - -</p>
                <p>QTV: Nguyễn Minh Trực</p>
                <p>Email: <a href="mailto:trucminhnguyen1990@gmail.com">trucminhnguyen1990@gmail.com</a></p>
            </div>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <div style="background: #f1f1f1;padding: 20px;border-top: 3px solid #cbcbcb;border-bottom: 3px solid #cbcbcb;padding: 10px; text-lign: center">
                Nếu bạn bạn thấy những thông tin của chúng tôi đang làm phiên bạn, bạn vui lòng <a href="<?php echo $getInfo['link_cancel']; ?>">Hủy đăng ký tại đây</a>.
            </div>
        </td>
    </tr>
</table>