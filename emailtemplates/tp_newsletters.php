<?php
    require_once("../_sys/emailtemplates.class.php");
    $etl = new EmailTemplates();
    $etl->setUrl_art('http://khoinghiepsinhvien.com');
    $getInfo = array(
        'url'               => $etl->getUrl_art(),
        'link_face'         => 'https://www.facebook.com/thembansevui',
        'link_youtube'      => 'https://goo.gl/Gk3YS4',
        'link_googleplus'   => 'https://plus.google.com/+MinhTrựcAZtuts',
        'title'             => 'Chúng ta nên học lập trình như thế nào?',
        'content'           => '
                                <p> Học lập trình là một trong những quá trình gian nan chứ không đơn giản là một con đường thẳng như các bạn nghĩ. Chuyện dậy sớm thức khuya là điều khó tránh khỏi trong mỗi lập trình viên, đó là sự yêu thích, sự đam mê chứ không đơn giản chỉ là đi học và đi về.</p>
                                <p> Tất nhiên, không có gì là dễ dàng, cái gì cũng vậy, có gian nan thì mới có thành công được.</p>
                                <p> Trong phạm vi bài viết này, mình sẽ chia sẽ với các bạn những phương pháp học lập trình để giúp các bạn có thể học lập trình một cách vững vàng hơn, một cách tốt hơn.</p>
                                <p> Học lập trình viên như thế nào</p>
                               ',
        'image'             => '<img src="http://khoinghiepsinhvien.com/uploads/images/hoc-lap-trinh-vien-1.jpg" />',
        'link'              => 'http://khoinghiepsinhvien.com/tin-cong-nghe/tin-tuc-cong-nghe/82-chung-ta-nen-hoc-lap-trinh-nhu-the-nao?.html',
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
                <?php echo $getInfo['content']; ?>
                <div style="text-align: center;"><?php echo $getInfo['image']; ?></div>
                <a href="<?php echo $getInfo['link']; ?>" style="color: #fff; font-size: 14px; margin: 10px auto;display: table; text-align: center;padding: 10px 30px; background: #ed1c24;font-size: 14px;text-decoration: none;">Xem thêm tại đây...</a>
            
            </div>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <div style="background: #f1f1f1;padding: 20px;border-top: 3px solid #cbcbcb;border-bottom: 3px solid #cbcbcb;padding: 10px; text-lign: center">
                Nếu bạn bạn thấy những thông tin của chúng tôi đang làm phiên bạn, bạn vui lòng <a href="#">Hủy đăng ký tại đây</a>.
            </div>
        </td>
    </tr>
</table>