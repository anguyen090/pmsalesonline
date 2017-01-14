<?PHP

/**
 * Author: Nguyễn Minh Trực
 * Date: 16/07/2015
 * function xử lý database
*/
class functionGet extends Database{
    
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Get result có điều kiện
     * $parameters: bảng cần lấy và các giá trị cần lấy
     * $condition: Điều kiện cần
     * VD: $parameters = "noidung_id, noidung_title, noidung_note,...";
     *      $condition = array(
     *          'noidung_status' => 1,
     *          'noidung_lang'   => $_SESSION['language']
     *      );
     */    
   //FUNCTION CHUYỂN ĐỖI CHUỖI TỪ CÓ DẤU SANG KHÔNG DẤU
   public function convertViToEn($value){
    
        #---------------------------------a^
    	$value = str_replace("ấ", "a", $value);
    	$value = str_replace("ầ", "a", $value);
    	$value = str_replace("ẩ", "a", $value);
    	$value = str_replace("ẫ", "a", $value);
    	$value = str_replace("ậ", "a", $value);
    	#---------------------------------A^
    	$value = str_replace("Ấ", "a", $value);
    	$value = str_replace("Ầ", "a", $value);
    	$value = str_replace("Ẩ", "a", $value);
    	$value = str_replace("Ẫ", "a", $value);
    	$value = str_replace("Ậ", "a", $value);
    	#---------------------------------a(
    	$value = str_replace("ắ", "a", $value);
    	$value = str_replace("ằ", "a", $value);
    	$value = str_replace("ẳ", "a", $value);
    	$value = str_replace("ẵ", "a", $value);
    	$value = str_replace("ặ", "a", $value);
    	#---------------------------------A(
    	$value = str_replace("Ắ", "a", $value);
    	$value = str_replace("Ằ", "a", $value);
    	$value = str_replace("Ẳ", "a", $value);
    	$value = str_replace("Ẵ", "a", $value);
    	$value = str_replace("Ặ", "a", $value);
    	#---------------------------------a
    	$value = str_replace("á", "a", $value);
    	$value = str_replace("à", "a", $value);
    	$value = str_replace("ả", "a", $value);
    	$value = str_replace("ã", "a", $value);
    	$value = str_replace("ạ", "a", $value);
    	$value = str_replace("â", "a", $value);
    	$value = str_replace("ă", "a", $value);
    	#---------------------------------A
    	$value = str_replace("Á", "a", $value);
    	$value = str_replace("À", "a", $value);
    	$value = str_replace("Ả", "a", $value);
    	$value = str_replace("Ã", "a", $value);
    	$value = str_replace("Ạ", "a", $value);
    	$value = str_replace("Â", "a", $value);
    	$value = str_replace("Ă", "a", $value);
    	#---------------------------------e^
    	$value = str_replace("ế", "e", $value);
    	$value = str_replace("ề", "e", $value);
    	$value = str_replace("ể", "e", $value);
    	$value = str_replace("ễ", "e", $value);
    	$value = str_replace("ệ", "e", $value);
    	#---------------------------------E^
    	$value = str_replace("Ế", "e", $value);
    	$value = str_replace("Ề", "e", $value);
    	$value = str_replace("Ể", "e", $value);
    	$value = str_replace("Ễ", "e", $value);
    	$value = str_replace("Ệ", "e", $value);
    	#---------------------------------e
    	$value = str_replace("é", "e", $value);
    	$value = str_replace("è", "e", $value);
    	$value = str_replace("ẻ", "e", $value);
    	$value = str_replace("ẽ", "e", $value);
    	$value = str_replace("ẹ", "e", $value);
    	$value = str_replace("ê", "e", $value);
    	#---------------------------------E
    	$value = str_replace("É", "e", $value);
    	$value = str_replace("È", "e", $value);
    	$value = str_replace("Ẻ", "e", $value);
    	$value = str_replace("Ẽ", "e", $value);
    	$value = str_replace("Ẹ", "e", $value);
    	$value = str_replace("Ê", "e", $value);
    	#---------------------------------i
    	$value = str_replace("í", "i", $value);
    	$value = str_replace("ì", "i", $value);
    	$value = str_replace("ỉ", "i", $value);
    	$value = str_replace("ĩ", "i", $value);
    	$value = str_replace("ị", "i", $value);
    	#---------------------------------I
    	$value = str_replace("Í", "i", $value);
    	$value = str_replace("Ì", "i", $value);
    	$value = str_replace("Ỉ", "i", $value);
    	$value = str_replace("Ĩ", "i", $value);
    	$value = str_replace("Ị", "i", $value);
    	#---------------------------------o^
    	$value = str_replace("ố", "o", $value);
    	$value = str_replace("ồ", "o", $value);
    	$value = str_replace("ổ", "o", $value);
    	$value = str_replace("ỗ", "o", $value);
    	$value = str_replace("ộ", "o", $value);
    	#---------------------------------O^
    	$value = str_replace("Ố", "o", $value);
    	$value = str_replace("Ồ", "o", $value);
    	$value = str_replace("Ổ", "o", $value);
    	$value = str_replace("Ô", "o", $value);
    	$value = str_replace("Ộ", "o", $value);
    	#---------------------------------o*
    	$value = str_replace("ớ", "o", $value);
    	$value = str_replace("ờ", "o", $value);
    	$value = str_replace("ở", "o", $value);
    	$value = str_replace("ỡ", "o", $value);
    	$value = str_replace("ợ", "o", $value);
    	#---------------------------------O*
    	$value = str_replace("Ớ", "o", $value);
    	$value = str_replace("Ờ", "o", $value);
    	$value = str_replace("Ở", "o", $value);
    	$value = str_replace("Ỡ", "o", $value);
    	$value = str_replace("Ợ", "o", $value);
    	#---------------------------------u*
    	$value = str_replace("ứ", "u", $value);
    	$value = str_replace("ừ", "u", $value);
    	$value = str_replace("ử", "u", $value);
    	$value = str_replace("ữ", "u", $value);
    	$value = str_replace("ự", "u", $value);
    	#---------------------------------U*
    	$value = str_replace("Ứ", "u", $value);
    	$value = str_replace("Ừ", "u", $value);
    	$value = str_replace("Ử", "u", $value);
    	$value = str_replace("Ữ", "u", $value);
    	$value = str_replace("Ự", "u", $value);
    	#---------------------------------y
    	$value = str_replace("ý", "y", $value);
    	$value = str_replace("ỳ", "y", $value);
    	$value = str_replace("ỷ", "y", $value);
    	$value = str_replace("ỹ", "y", $value);
    	$value = str_replace("ỵ", "y", $value);
    	#---------------------------------Y
    	$value = str_replace("Ý", "y", $value);
    	$value = str_replace("Ỳ", "y", $value);
    	$value = str_replace("Ỷ", "y", $value);
    	$value = str_replace("Ỹ", "y", $value);
    	$value = str_replace("Ỵ", "y", $value);
    	#---------------------------------DD
    	$value = str_replace("Đ", "d", $value);
    	$value = str_replace("Đ", "d", $value);
    	$value = str_replace("đ", "d", $value);
    	#---------------------------------o
    	$value = str_replace("ó", "o", $value);
    	$value = str_replace("ò", "o", $value);
    	$value = str_replace("ỏ", "o", $value);
    	$value = str_replace("õ", "o", $value);
    	$value = str_replace("ọ", "o", $value);
    	$value = str_replace("ô", "o", $value);
    	$value = str_replace("ơ", "o", $value);
    	#---------------------------------O
    	$value = str_replace("Ó", "o", $value);
    	$value = str_replace("Ò", "o", $value);
    	$value = str_replace("Ỏ", "o", $value);
    	$value = str_replace("Õ", "o", $value);
    	$value = str_replace("Ọ", "o", $value);
    	$value = str_replace("Ô", "o", $value);
    	$value = str_replace("Ơ", "o", $value);
    	#---------------------------------u
    	$value = str_replace("ú", "u", $value);
    	$value = str_replace("ù", "u", $value);
    	$value = str_replace("ủ", "u", $value);
    	$value = str_replace("ũ", "u", $value);
    	$value = str_replace("ụ", "u", $value);
    	$value = str_replace("ư", "u", $value);
    	#---------------------------------U
    	$value = str_replace("Ú", "u", $value);
    	$value = str_replace("Ù", "u", $value);
    	$value = str_replace("Ủ", "u", $value);
    	$value = str_replace("Ũ", "u", $value);
    	$value = str_replace("Ụ", "u", $value);
    	$value = str_replace("Ư", "u", $value);
    	#---------------------------------
    	$value = str_replace("(", "", $value);
    	$value = str_replace(")", "", $value);
    	$value = str_replace(":", "", $value);
    	$value = str_replace("%", "", $value);
    	$value = str_replace("'", "", $value);
    	$value = str_replace('"', '', $value);
    	$value = str_replace('“', '', $value);
    	$value = str_replace('-', '', $value);
    	$value = str_replace(' ', '-', $value);
    	$value = stripTags($value,false);
    	#---------------------------------
    	if(strlen($value)>=140)
    	{
    		$value = substr($value,0,140);
    	}
    	#---------------------------------
    	return utf8_encode(strtolower($value));
    
   }
   
    function stripTags($str, $tags, $stripContent = false)
    {
    	$splitTags = explode(',', $tags);
    	foreach($splitTags as $tag){
    		if($stripContent)
    		$str = preg_replace("/<".$tag."[^>]*>.*<\/".$tag.">/iUs", '', $str);
    		else
    		$str = preg_replace("/<\/?".$tag."[^>]*>/iUs", '', $str);
    	}
    	return $str;
    }
    
    //HÀM PHÂN LOAI NOI DUNG
    function typeCategory($parentid,$aCats,$cols = array()){
        foreach($aCats as $v){
        	if($v->dongnoidung_id == $parentid){
        		$cols[] = $v->loainoidung_id;
        		$cols = typeCategory($v->loainoidung_id,$aCats,$cols);
        	}
        }
        return $cols;
    }
     
    //HÀM PHÂN LOAI SAN PHAM
    function typeProducts($parentid,$aCats,$cols = array()){
        foreach($aCats as $v){
        	if($v->dongsanpham_id == $parentid){
        		$cols[] = $v->loaisanpham_id;
        		$cols = typeProducts($v->loaisanpham_id,$aCats,$cols);
        	}
        }
        return $cols;
    }
    
    //HÀM KHỞI TẠO LẠI URL
	function khoitaoURL()
	{
        $db = new Database();
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
		}
		else if(isset($listAddress[$countListAddress-1]) AND ($listAddress[$countListAddress-1]=="site-map_html" OR $listAddress[$countListAddress-1]=="site-map" OR $listAddress[$countListAddress-1]=="so-do-site" OR $listAddress[$countListAddress-1]=="so-do-site_html"))
		{
			$results = 'sitemap/';
			$titlePage = "Sơ đồ site";
		}
		else if(isset($listAddress[0]) AND $listAddress[0]=="dat-mua" AND intval($listAddress[$countListAddress-1])>0)
		{
			$results = 'datmua/'.intval($listAddress[$countListAddress-1]);
			$titlePage = "Đặt mua sản phẩm ".$listAddress[$countListAddress-1];
			if($sanpham = $db->get_row("SELECT `sanpham_id`,`sanpham_title` FROM `".$tbfix."sanpham` WHERE `sanpham_id`='".intval($listAddress[$countListAddress-1])."' AND `sanpham_status`='1' LIMIT 1"))
			{
				$results = 'datmua/'.intval($listAddress[$countListAddress-1]);
				$titlePage = "Đặt mua sản phẩm ".$sanpham->sanpham_title;
			}
		}
		else if(isset($listAddress[0]) AND $listAddress[0]=="dat-hang" AND intval($listAddress[$countListAddress-2])>0)
		{
			$results = 'dathang/'.intval($listAddress[$countListAddress-2]);
			$titlePage = "Đặt hàng sản phẩm ".$listAddress[$countListAddress-2];
			if($sanpham = $db->get_row("SELECT `sanpham_id`,`sanpham_title` FROM `".$tbfix."sanpham` WHERE `sanpham_id`='".intval($listAddress[$countListAddress-2])."' AND `sanpham_status`='1' LIMIT 1"))
			{
				$results = 'dathang/'.intval($listAddress[$countListAddress-2]).'/'.str_replace("_"," ",str_replace("_html","",$listAddress[$countListAddress-1]));
				$titlePage = "Đặt hàng sản phẩm ".$sanpham->sanpham_title;
			}
		}
		else if(isset($listAddress[$countListAddress-1]) AND ($listAddress[$countListAddress-1]=="ket-qua-tim-kiem_html" OR $listAddress[$countListAddress-1]=="ket-qua-tim-kiem" OR $listAddress[$countListAddress-1]=="search"))
		{
			$results = 'search/';
			$titlePage = "Kết quả tìm kiếm từ khóa: \"".$_POST['keySearch']."\"";
		}
		//Kiểm tra thấy trang san pham
		else if(isset($listAddress[0]) AND $listAddress[0]=="san-pham")
		{
			if($sanpham = $db->get_row("SELECT `sanpham_id`,`sanpham_title` FROM `".$tbfix."sanpham` WHERE `sanpham_id`='".intval($listAddress[$countListAddress-1])."' AND `sanpham_status`='1' LIMIT 1"))
			{
				$results = 'products/chitiet/'.$sanpham->sanpham_id.'/';
				$titlePage = $sanpham->sanpham_title;
			}
			else if($loaisanpham = $db->get_row("select `loaisanpham_id`,`loaisanpham_title`,`loaisanpham_alias` FROM `".$tbfix."loaisanpham` WHERE `loaisanpham_alias`='".$listAddress[$countListAddress-2]."' AND `loaisanpham_status`='1' LIMIT 1"))
			{
				$results = 'products/danhsach/'.$loaisanpham->loaisanpham_id.'/';
				$titlePage = $loaisanpham->loaisanpham_title;
			}
			else
			{
				$results = 'products/';
				$titlePage = "Sản phẩm";
			}
		}
		//Kiểm tra thấy trang chi tiết bài viết
		else if(isset($listAddress[$countListAddress-1]) AND $loainoidung = $db->get_row("select `loainoidung_id`,`loainoidung_title`,`loainoidung_alias` FROM `".$tbfix."loainoidung` WHERE `loainoidung_alias`='".$listAddress[$countListAddress-1]."' AND `loainoidung_status`='1' LIMIT 1"))
		{
			
            $results = 'content/danhsach/'.$loainoidung->loainoidung_id.'/';
			$titlePage = $loainoidung->loainoidung_title;
		}
		else if(isset($listAddress[$countListAddress-1]) AND $noidung = $db->get_row("SELECT `noidung_id`,`noidung_title` FROM `".$tbfix."noidung` WHERE `noidung_id`='".intval($listAddress[$countListAddress-1])."' AND `noidung_status`='1' LIMIT 1"))
		{
			$results = 'content/chitiet/'.$noidung->noidung_id.'/';
			$titlePage = $noidung->noidung_title;
		}
		else if(isset($listAddress[$countListAddress-2]) AND $loainoidung = $db->get_row("select `loainoidung_id`,`loainoidung_title`,`loainoidung_alias` FROM `".$tbfix."loainoidung` WHERE `loainoidung_alias`='".$listAddress[$countListAddress-2]."' AND `loainoidung_status`='1' LIMIT 1"))
		{
			$results = 'content/danhsach/'.$loainoidung->loainoidung_id.'/';
			$titlePage = $loainoidung->loainoidung_title;
		}
		else{
			$titlePage = $titlePage;
			$results = '';
		}
		
		
		return $results;
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
 //HÀM UPLOAD HÌNH ẢNH VÀ ĐÓNG DẤU
	function uploadImages($file_type,$file_name,$file_size,$file_tmp,$path_big,$path_thumbs,$thumbs_width,$big_width)
	{	
        $err = '';
		//the new width of the resized image, in pixels.
		$img_thumb_width = $thumbs_width; // Hinh Thumbsnail
		$img_thumb_width2 = $big_width; // Hinh Co dong dau

		$extlimit = "yes"; //Limit allowed extensions? (no for all extensions allowed)
		//List of allowed extensions if extlimit = yes
		$limitedext = array(".jpg",".png",".jpeg");
					
	   //check the file's extension
	   $ext = strrchr($file_name,'.');
	   $ext = strtolower($ext);
       
	   //uh-oh! the file extension is not allowed!
	   if (($extlimit == "yes") && (!in_array($ext,$limitedext))) {
		  $err = "Bạn chỉ được phép upload hình ảnh với đuôi JPG|PNG|GIF|BMP!";
	   }
	   else
	   {
		   //so, whats the file's extension?
		   $getExt = explode ('.', $file_name);
		   $file_ext = $getExt[count($getExt)-1];
	
		   //create a random file name
		   $rand_name = $getExt[0];//md5(time());
		   $rand_name= $rand_name."_".rand(0,999999);
		   //the new width variable
		   $ThumbWidth = $img_thumb_width;
		   $ThumbWidth2 = $img_thumb_width2;
		   if($file_size){
                //UPLOAD HÌNH GÓC
				move_uploaded_file ($file_tmp, $path_big.$rand_name.'.'.$file_ext);
				
			}
		}
		if(!$err){
			return $path_big.$rand_name.'.'.$file_ext;
		}
		else{
			echo 	'<script language="javascript">
						alert("Kết quả:Upload images bị lỗi!!! \n---------------------------------------\nError: '.$err.' !");
					</script>';
		}
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
//Hàm kiểm tra xem trang hiện tại là trang chủ, trang bài viết, trang sản phẩm, trang liên hệ....
    function getTypeWebsite($option){
        if($option=='index' OR $option==""){
            $type = 'website';
        }else {
            $type='article';
        }
        return $type;
    }
//Xử lý mã hóa link link
/**
 * Các tham số bao gồm
 * $url: Chèn link chạy web vào (Link trang chủ)
 * $page: file php xử lý vd: webAction.php
 * $option: Giá trị option
 * $action: Giá trị action
 * $id: Giá trị ID
 * $key: Key mã hóa để kiểm tra
 */
    function encodeLink($url,$page,$option,$action,$id,$key){
        $link = $url.'/'.$page.'?';
        if($option!=""){
            $link .= 'ops='.base64_encode($option);
        }
        if($action!=""){
            $link .= '&atc='.base64_encode($option);
        }
        if($id!=""){
            $link .= '&id='.base64_encode($id);
        }
        if($key!=""){
            $link .= '&keys='.md5(md5($key));
        }
        return $link;
    }
//Function highlight code
function highlight_html($string, $decode = TRUE){
    $tag = '#0000ff';
    $att = '#ff0000';
    $val = '#8000ff';
    $com = '#34803a';
    $find = array(
        '~(\s[a-z].*?=)~',                    // Highlight the attributes
        '~(<\!--.*?-->)~s',            // Hightlight comments
        '~("[a-zA-Z0-9\/].*?")~',    // Highlight the values
        '~(<[a-z].*?>)~',                // Highlight the beginning of the opening tag
        '~(</[a-z].*?>)~',            // Highlight the closing tag
        '~(&.*?;)~',                    // Stylize HTML entities
    );
    $replace = array(
        '<span style="color: '.$att.';">$1</span>',
        '<span style="color: '.$com.';">$1</span>',
        '<span style="color: '.$val.';">$1</span>',
        '<span style="color: '.$tag.';">$1</span>',
        '<span style="color: '.$tag.';">$1</span>',
        '<span style="font-style: italic;">$1</span>',
    );
    if($decode)
        $string = htmlentities($string);
    return preg_replace($find, $replace, $string);
}
//Get Type content by parent id
public function getContentTypeByParent($parent,$value){
    $db = new Database();
    $contentTypeID = array();
    $condition = array(
        'where'     => 'loainoidung_status=1'
    );
    $result = $db->getSData('loainoidung',$value,$condition);
    foreach($result as $val){
        if($val->dongnoidung_id==$parent){
            $contentTypeID[] = $val->loainoidung_id;
            $contentTypeID[] = $this->getContentTypeByParent($val->loainoidung_id,$value);
        }
    }
    return $contentTypeID;
}
//Get Type Content, Lấy các loại nội dung con của cha gán vào thành một dãy số
public function getContentType($parent,$value){
    $lidArr = $parent.',';
    $contentType = $this->getContentTypeByParent($parent,$value);
    for($i=0;$i<count($contentType);$i++){
        $lidArr .= $contentType[$i].',';
    }
    $lidArr = $lidArr.'M^T';
    $lidArr = str_replace(',M^T','',$lidArr);
    return $lidArr;
}
//Hàm xử lý nội dung đăng ký
    function getTypeContent($option,$view,$id){
        $db = new Database();
        //Tạo mảng lưu giá trị
        $result = '';
        //Kiểm tra xem trang hiện tại là content or product
        if($option=='content'){
            $value = 'loainoidung_id';
            $condition = array(
                'where'     => '`noidung_id`='.intval($id)
            );
            if($view=='chitiet'){
                $idc = $db->getAData('noidung',$value,$condition);
                $result = array("option"=>"content","item"=>$idc->loainoidung_id);
            }else {
                $result = intval($id)>0 ? array("option"=>"content","item"=>$id) : array("option"=>"content","item"=>"0");
            }
        }
        else {
            $result = array("option"=>"index","item"=>"0");
        }
        return $result;
    }
//Hàm lấy link hiện tại website
    function curPageURL() {
        //Link bắt đầu bằng http
        $pageURL = 'http';
        //Nếu server hỗ trợ ssl https thì thêm chữ s phía sau http
        if($_SERVER["HTTPS"] == "on") {
        
            $pageURL .= "s";
        
        }
        //Sau http thì thêm :// vào phía sau
        $pageURL .= "://";
        //Trả về cổng người dùng đang sử dụng, nếu không đúng 80 thì tên miền trả về thêm :cổng đang sử dụng
        if ($_SERVER["SERVER_PORT"] != "80") {
        
            $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
        
        } else {
        
            $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
        
        }
        return $pageURL;
    }
//Hàm thông báo lỗi bằng script
    public function confirmErr($text){
        $res = '
            <script language="javascript">
                alert("'.$text.'");
                javascript:window.history.back();
            </script>
        ';
        return $res;
    }
//Hàm mã hóa id trên website
public function encodeID($key,$v,$id){
	$k = md5(md5($key));
	$setKey = $k.$v.base64_encode($id);
	return $setKey;
}
public function decodeID($key,$v,$vID){
    $ID = "";
    if(isset($vID) && $vID != ""){
        $k = md5(md5($key));
        //Cắt chuỗi ID
        $str = explode($v,$vID);
        if($k == $str[0]){
            $ID = base64_decode($str[1]);
        }
    }
    return $ID;
}
    //Function send mail to
    /**
     * Các tham số bao gồm
     * st: Title status là tiêu đề trước thay thế cho email người gửi
     * Title: Tiêu đề được đặt khi gửi mail
     * Email: Email để gửi
     * Password: Password của email gửi
     * exp: ssl hoặc tls
     * out: Outgoing email
     * Port: Chọn port để gửi email
     * euser: Mảng các email để gửi
     * html: nội dung gửi mail
     * nohtml: Nội dung không chứa html khi gửi mail
     */
    function sendMailTo($debug,$st, $title,$email,$pass,$exp,$out,$port,$euser=array(),$html,$nohtml){
        $mail = new PHPMailer();
        $mail->IsSMTP();   // send via SMTP
        if(isset($debug) && $debug==1 || $debug ==2){
            $mail->SMTPDebug = 1;
        }
        $mail->SMTPAuth   = true;                  // enable SMTP authentication
        $mail->SMTPSecure = $exp;                 // sets the prefix to the servier
        $mail->Host       = $out;      // sets GMAIL as the SMTP server
        $mail->Port       = $port;                   // set the SMTP port for the GMAIL server
        $mail->Username = $email;  // SMTP username
        $mail->Password = $pass; // SMTP password
        $mail->From     =$email;
        $mail->FromName = $st;
        $mail->IsHTML(true); // send as HTML
        $mail->Subject  =  $title;
        //Kiểm tra xem có tồn email gửi người nhận hay không?
        if(count($euser)>0)
        {
            foreach($euser as $euser){
                $mail->AddAddress($euser,"");
            }
        }
        $mail->Body    = $html;
        $mail->AltBody = $nohtml;
        if($mail->Send())
        {
            return true;
        }
    }
    
}//END class