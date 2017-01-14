<?PHP
    //HÀM KHỞI TẠO LẠI URL
	function khoitaoURL()
	{
		global $db,$tbfix,$titlePage,$descriptionPage,$pri,$imagePage,$breadcrumb;
		$countListAddress = 1;
		$results = '';
		$linkAddress = '';
		while(list($key,$value) = each($_GET)) {
			$linkAddress = $linkAddress.$key;
		} 
		$listAddress = explode("/", $linkAddress);
		$countListAddress = count($listAddress);
		//Kiểm tra các modules được xây dựng sẵn - link cố định
		if(isset($listAddress[$countListAddress-1]) AND ($listAddress[$countListAddress-1]=="lien-he_html" OR $listAddress[$countListAddress-1]=="lien-he"))
		{
			$results = 'contact/';
			$titlePage = "Liên hệ";
			$descriptionPage = "Trong quá trình sử dụng website, hoặc tìm kiếm các thông tin liên quan. Nếu có vấn đề lỗi hay cần hỗ trợ các bạn vui lòng liên hệ với chúng tôi";
		}
        else if(isset($listAddress[$countListAddress-1]) AND ($listAddress[$countListAddress-1]=="dang-ky_html" OR $listAddress[$countListAddress-1]=="dang-ky" OR $listAddress[$countListAddress-1]=="dang-ky" OR $listAddress[$countListAddress-1]=="dang-ky_html"))
		{
			$results = 'register/';
			$titlePage = "Đăng ký thành viên";
			$descriptionPage = "Đăng ký làm thành viên với chúng tôi, các bạn sẽ cùng chúng tôi xây dựng nội dung website cùng chúng tôi";
		}
        else if(isset($listAddress[$countListAddress-1]) AND ($listAddress[$countListAddress-1]=="dang-nhap_html" OR $listAddress[$countListAddress-1]=="dang-nhap" OR $listAddress[$countListAddress-1]=="dang-nhap" OR $listAddress[$countListAddress-1]=="dang-nhap_html"))
		{
			$results = 'login/';
			$titlePage = "Đăng nhập";
			$descriptionPage = "Các bạn hãy đăng nhập vào website để sử dụng các chức năng của website";
		}
		else if(isset($listAddress[$countListAddress-1]) AND ($listAddress[$countListAddress-1]=="site-map_html" OR $listAddress[$countListAddress-1]=="site-map" OR $listAddress[$countListAddress-1]=="so-do-site" OR $listAddress[$countListAddress-1]=="so-do-site_html"))
		{
			$results = 'sitemap/';
			$titlePage = "Sơ đồ site";
			$descriptionPage = "Sơ đồ website";
		}
		else if(isset($listAddress[$countListAddress-1]) AND ($listAddress[$countListAddress-1]=="ket-qua-tim-kiem_html" OR $listAddress[$countListAddress-1]=="ket-qua-tim-kiem" OR $listAddress[$countListAddress-1]=="search"))
		{
			$results = 'search/';
			$titlePage = "Kết quả tìm kiếm từ khóa: \"".$_POST['keySearch']."\"";
			//$breadcrumb = '<li class="active" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'.MTN_BASE_SITEURL.'/search/ket-qua-tim-kiem.html" itemprop="url" title="Kết quả tìm kiếm từ khóa: '.$_POST['keySearch'].'"><span itemprop="title">Kết quả tìm kiếm từ khóa: '.$_POST['keySearch'].'</span></a></li>';
		}
        else if(isset($listAddress[$countListAddress-1]) AND ($listAddress[$countListAddress-1]=="dashboard"))
		{
			$results = 'dashboard/';
            $pri = array("view");
			$titlePage = "Thông tin cá nhân";
			$descriptionPage = "Trang thông tin thành viên, trang quản lý thông tin của bạn, bạn có thể xem lại các giao dịch với chúng tôi";
			return $results;exit();
		}
        else if($member = $db->get_row("SELECT `user_id`, `user_name`, `user_firstname`, `user_lastname` FROM `".$tbfix."user` WHERE user_name='".$listAddress[$countListAddress-1]."' AND `user_active`='1'"))
		{
			$results = 'dashboard/danhsach/'.$member->user_id;
            $pri = array('view');
			$titlePage = "Thông tin cá nhân ".$member->user_firstname . " " . $member->user_lastname;
			$descriptionPage = "Trang thông tin thành viên, trang quản lý thông tin của bạn, bạn có thể xem lại các giao dịch với chúng tôi";
            return $results;exit();
		}
        //Kiểm tra chức năng hoạt động
        else if(isset($listAddress[$countListAddress-1]) AND $loainoidung = $db->get_row("SELECT `loainoidung_id`, `loainoidung_title`, `loainoidung_alias`,`loainoidung_note`, `loainoidung_keys` FROM `".$tbfix."loainoidung` WHERE `loainoidung_alias`='".mysql_escape_string($listAddress[$countListAddress-1])."' AND `loainoidung_status`='1'") OR $listAddress[$countListAddress-1]=="sales-chanel")
		{
			$results = $loainoidung->loainoidung_keys;
			$titlePage = $loainoidung->loainoidung_title;
			$descriptionPage = $loainoidung->loainoidung_title;
		}else if(isset($listAddress[$countListAddress-2]) AND $loainoidung = $db->get_row("SELECT `loainoidung_id`, `loainoidung_title`, `loainoidung_alias`,`loainoidung_note`, `loainoidung_keys` FROM `".$tbfix."loainoidung` WHERE `loainoidung_alias`='".mysql_escape_string($listAddress[$countListAddress-2])."' AND `loainoidung_status`='1'")  AND $listAddress[$countListAddress-1]=="them-moi"){
            $results = $loainoidung->loainoidung_keys.'/danhsach/11/as/add/';
			$titlePage = $loainoidung->loainoidung_title;
			$descriptionPage = $loainoidung->loainoidung_title;
		}
        //Kiểm tra trang kênh bán hàng
        else if(isset($listAddress[$countListAddress-2]) AND $loainoidung = $db->get_row("SELECT `loainoidung_id`, `loainoidung_title`, `loainoidung_alias`,`loainoidung_note`, `loainoidung_keys` FROM `".$tbfix."loainoidung` WHERE `loainoidung_alias`='".mysql_escape_string($listAddress[$countListAddress-2])."' AND `loainoidung_status`='1'")  AND $salechannel=$db->get_row("SELECT `salechannel_id` FROM `".$tbfix."saleschannel` WHERE `salechannel_id`='".intval($listAddress[$countListAddress-1])."' AND `salechannel_status`=1")){
            $results = $loainoidung->loainoidung_keys.'/chitiet/'.$salechannel->salechannel_id.'/as/update/';
			$titlePage = $loainoidung->loainoidung_title;
			$descriptionPage = $loainoidung->loainoidung_title;
		}
		//Kiểm tra thấy trang chi tiết bài viết
		else if(isset($listAddress[$countListAddress-1]) AND $loainoidung = $db->get_row("select `loainoidung_id`,`loainoidung_title`,`loainoidung_alias`,`loainoidung_note` FROM `".$tbfix."loainoidung` WHERE `loainoidung_alias`='".mysql_escape_string($listAddress[$countListAddress-1])."' AND `loainoidung_status`='1' LIMIT 1"))
		{
			$results = 'content/danhsach/'.$loainoidung->loainoidung_id.'/';
			$titlePage = $loainoidung->loainoidung_title;
            $descriptionPage = $loainoidung->loainoidung_note;
			//$breadcrumb = '<li class="active" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'.MTN_BASE_SITEURL.'/'.$listAddress[$countListAddress-1].'/" itemprop="url" title="'.$loainoidung->loainoidung_title.'"><span itemprop="title">'.$loainoidung->loainoidung_title.'</span></a></li>';
		}
		else if(isset($listAddress[$countListAddress-1]) AND $noidung = $db->get_row("SELECT `noidung_id`,`noidung_title`,`noidung_note`,`noidung_images` FROM `".$tbfix."noidung` WHERE `noidung_id`='".intval($listAddress[$countListAddress-1])."' AND `noidung_status`='1' LIMIT 1"))
		{
			$results = 'content/chitiet/'.$noidung->noidung_id.'/';
			$titlePage = $noidung->noidung_title;
			$descriptionPage = $noidung->noidung_note;
            $imagePage = $noidung->noidung_images;
		}
		else if(isset($listAddress[$countListAddress-2]) AND $loainoidung = $db->get_row("select `loainoidung_id`,`loainoidung_title`,`loainoidung_alias`,`loainoidung_note` FROM `".$tbfix."loainoidung` WHERE `loainoidung_alias`='".$listAddress[$countListAddress-2]."' AND `loainoidung_status`='1' LIMIT 1"))
		{
			$results = 'content/danhsach/'.$loainoidung->loainoidung_id.'/';
			$titlePage = $loainoidung->loainoidung_title;
            $descriptionPage = $loainoidung->loainoidung_note;
			//$breadcrumb = '<li class="active" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'.MTN_BASE_SITEURL.'/'.$listAddress[$countListAddress-2].'/" itemprop="url" title="'.$loainoidung->loainoidung_title.'"><span itemprop="title">'.$loainoidung->loainoidung_title.'</span></a></li>';
		}
		else{
			$titlePage = $titlePage;
			$results = '';
		}
		return $results;
	}
//HÀM PHÂN LOAI SAN PHAM
	function typeProductsList($parentid,$cols = array()){
		global $db,$tbfix;
		//$cols[] = $parentid;
		if($loaisanpham = $db->get_results("SELECT `loaisanpham_id`,`dongsanpham_id` FROM `".$tbfix."loaisanpham` WHERE `loaisanpham_lang`='".$_SESSION['language']."' AND `loaisanpham_status`='1' ORDER BY `loaisanpham_order` desc"))
		{
			foreach($loaisanpham as $v){
				if($v->dongsanpham_id == $parentid){
					$cols[] = $v->loaisanpham_id;
					$cols = typeProductsList($v->loaisanpham_id,$cols);
				}
			}
		}
		return $cols;
	}
	function typeProducts($parentid){
		$strArray = $parentid.",";
		$cols = typeProductsList($parentid);
		for($i=0;$i<count($cols);$i++)
		{
			$phay = ',';
			$strArray = $strArray.$cols[$i].$phay;
		}
		$strArray = $strArray."^_^";
		$strArray = str_replace(",^_^","",$strArray);
		return $strArray;
	}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//HÀM GET ROOT LoaiSP ID
	function RootSanphamAliasLink($lid,$results){
		global $db,$tbfix;
		$bienMenu = 0;
		if($dlnd = $db->get_row("SELECT `loaisanpham_id`,`dongsanpham_id`,`loaisanpham_alias` FROM `".$tbfix."loaisanpham` WHERE `loaisanpham_id`='".$lid."' LIMIT 1"))
		{
			if($dlnd->dongsanpham_id==0)
			{
				$bienMenu = $dlnd->loaisanpham_id;
				$results = $dlnd->loaisanpham_alias.'/'.$results;
				//$results = $results.'AK';
				//$results = str_replace('/AK','.html',$results);
			}
			else
			{
				$bienMenu = $dlnd->dongsanpham_id;
				$results = RootSanphamAliasLink($bienMenu,$dlnd->loaisanpham_alias.'/'.$results);
			}
		}
		return 'san-pham/'.$results;
	}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//HÀM GET ROOT LoaiSP ID
	function btnDathang($id,$sanphamTitle){
		$btnDathang = '<a href="'.MTN_BASE_SITEURL.MTN_URLRewrite.'dat-hang/'.$id.'-'.$sanphamTitle.'/" class="btnDathang"><img src="'.MTN_BASE_SITEURL.Templates.'/js_css/images/btn_datxe.gif"/></a>';
		
		return $btnDathang;
	}
 //Hàm xử lý cắt chuỗi
	function cutStr($noidung,$num){
		$limit = $num - 1 ;
		$str_tmp = '';
		$arrstr = explode(" ", $noidung);
	if ( count($arrstr) <= $num ) { return $noidung; }
	if (!empty($arrstr)) {
		for ( $j=0; $j< count($arrstr) ; $j++) {
		$str_tmp .= " " . $arrstr[$j];
			if ($j == $limit){ break;}
		}
	}
		return $str_tmp.'...';
	}
//Hàm refresh
    function refresh($time){
        $re = '
            <script>
                $(document).ready(function(){
                    setTimeout(function(){
                        location.reload();
                    }, '.$time.');
                });
            </script>
        ';
        return $re; 
    }
//Hàm link về một link nào đó
    function linkToLink($link){
        $res = '
            <script type="text/javascript" language="javascript">
               window.location="'.$link.'";
            </script>
        ';
        return $res;
    }
 //Hàm đọc RSS website
     function getRssFeed($link, $num, $title) {
    		$doc = new DOMDocument(); 
    		$doc->load($link); 
    		$Feeds = array(); 
    		echo "<ul class='rss-link'>";
    		$i = 0;
    		foreach ($doc->getElementsByTagName('item') as $node) {
    			$i++;
    			if($i<=$num){
    				$itemRSS = array ( 
    					'title' => $node->getElementsByTagName('title')->item(0)->nodeValue, 
    					'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue, 
    					'link' => $node->getElementsByTagName('link')->item(0)->nodeValue, 
    					'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue 
    				); 
    				array_push($Feeds, $itemRSS); 
    				
    				echo '<li><a href="'.$itemRSS['link'].'">'.$itemRSS['title'].'</a> - '.$title.'</li>';
    			}else
    			{
    				break;
    			}
    		}
    		echo "</ul>";
    	}
?>