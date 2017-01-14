<?PHP

    /**
     * Author: Nguyễn Minh Trực
     * Date: 25/07/2015
     */

class LoaiNoiDung extends Database {
    
    
    //Gọi hàm kết nối database, hàm insert, hàm update, hàm get record
    function __construct(){
        parent::__construct();
    }
    
    /**
     * Properties: Thuộc tính của lớp
     * Tương ứng với các trường trong bảng
     */
    private $user_id; /*Biến này dùng để kiểm tra khi menu dạng protected*/
    private $loainoidung_id;
    private $dongnoidung_id;
    private $loainoidung_title;
    private $loainoidung_alias;
    private $loainoidung_link;
    private $loainoidung_note;
    private $loainoidung_author;
    private $loainoidung_by;
    private $loainoidung_user_id;
    private $loainoidung_permission;
    private $loainoidung_images;
    private $loainoidung_date;
    private $loainoidung_ip;
    private $loainoidung_update_date;
    private $loainoidung_update_ip;
    private $loainoidung_update_by;
    private $loainoidung_view;
    private $loainoidung_mainmenu;
    private $loainoidung_submenu;
    private $loainoidung_hot;
    private $loainoidung_order;
    private $loainoidung_status;
    private $loainoidung_editor;
    private $loainoidung_lang;
    
    /**
      * Properties GET SET
      * Luu ý sử dụng hàm: nếu đặt biến trong hàm trùng với biên được khai báo ở trên thì phải dùng $this->bien
      * Set: là đặt giá trị cho biến (luu gia tri vao)
      * Get: trả về giá trị (lay gia tri ra)
      */
    //$user_id
    public function setUser_id($user_id){
        $this->user_id = $user_id;
    }
    public function getUser_id(){
        return $this->user_id;
    }
    //$loainoidung_id
    public function setLoaiNoiDung_id($loainoidung_id){
        $this->loainoidung_id = $loainoidung_id;
    }
    public function getLoaiNoiDung_id(){
        return $this->loainoidung_id;
    }
    
    //$dongnoidung_id
    public function setDongNoiDung_id($dongnoidung_id){
        $this->dongnoidung_id = $dongnoidung_id;
    }
    public function getDongNoiDung_id(){
        return $this->dongnoidung_id;
    }
    
    //$loainoidung_title
    public function setLoaiNoiDung_title($loainoidung_title){
        $this->loainoidung_title = $loainoidung_title;
    }
    public function getLoaiNoiDung_title(){
        return $this->loainoidung_title;
    }
    
    //$loainoidung_alias
    public function setLoaiNoiDung_alias($loainoidung_alias){
        $this->loainoidung_alias = $loainoidung_alias;
    }
    public function getLoaiNoiDung_alias(){
        return $this->loainoidung_alias;
    }
    
    //$loainoidung_link
    public function setLoaiNoiDung_link($loainoidung_link){
        $this->loainoidung_link = $loainoidung_link;
    }
    public function getLoaiNoiDung_link(){
        return $this->loainoidung_link;
    }
    
    //$loainoidung_note
    public function setLoaiNoiDung_note($loainoidung_note){
        $this->loainoidung_note = $loainoidung_note;
    }
    public function getLoaiNoiDung_note(){
        return $this->loainoidung_note;
    }
    
    //$loainoidung_author
    public function setLoaiNoiDung_author($loainoidung_author){
        $this->loainoidung_author = $loainoidung_author;
    }
    public function getLoaiNoiDung_author(){
        return $this->loainoidung_author;
    }
    
    //$loainoidung_by
    public function setLoaiNoiDung_by($loainoidung_by){
        $this->loainoidung_by = $loainoidung_by;
    }
    public function getLoaiNoiDung_by(){
        return $this->loainoidung_by;
    }
    
    //$loainoidung_user_id
    public function setLoainoidung_user_id($loainoidung_user_id){
        $this->loainoidung_user_id = $loainoidung_user_id;
    }
    public function getLoainoidung_user_id(){
        return $this->loainoidung_user_id;
    }
    
    //$loainoidung_permission
    public function setLoainoidung_permission($loainoidung_permission){
        $this->loainoidung_permission = $loainoidung_permission;
    }
    public function getLoainoidung_permission(){
        return $this->loainoidung_permission;
    }
    
    //$loainoidung_images
    public function setLoaiNoiDung_images($loainoidung_images){
        $this->loainoidung_images = $loainoidung_images;
    }
    public function getLoaiNoiDung_images(){
        return $this->loainoidung_images;
    }
    
    //$loainoidung_date
    public function setLoaiNoiDung_date($loainoidung_date){
        $this->loainoidung_date = $loainoidung_date;
    }
    
    public function getLoaiNoiDung_date(){
        return $this->loainoidung_date;
    }
    
    //$loainoidung_ip
    public function setLoaiNoiDung_ip($loainoidung_ip){
        $this->loainoidung_ip = $loainoidung_ip;
    }
    
    public function getLoaiNoiDung_ip(){
        return $this->loainoidung_ip;
    }
    
    //$loainoidung_update_date
    public function setLoaiNoiDung_update_date($loainoidung_update_date){
        $this->loainoidung_update_date = $loainoidung_update_date;
    }
    
    public function getLoaiNoiDung_update_date(){
        return $this->loainoidung_update_datel;
    }
    
    //$loainoidung_update_by
    public function setLoaiNoiDung_update_by($loainoidung_update_by){
        $this->loainoidung_update_by = $loainoidung_update_by;
    }
    
    public function getLoaiNoiDung_update_by(){
        return $this->loainoidung_update_by;
    }
    
    //$loainoidung_update_ip
    public function setLoaiNoiDung_update_ip($loainoidung_update_ip){
        $this->loainoidung_update_ip = $loainoidung_update_ip;
    }
    
    public function getLoaiNoiDung_update_ip(){
        return $this->loainoidung_update_ip;
    }
    
    //$loainoidung_view
    public function setLoaiNoiDung_view($loainoidung_view){
        $this->loainoidung_view = $loainoidung_view;
    }
    
    public function getLoaiNoiDung_view(){
        return $this->loainoidung_view;
    }
    
    //$loainoidung_mainmenu
    public function setLoaiNoiDung_mainmenu($loainoidung_mainmenu){
        $this->loainoidung_mainmenu = $loainoidung_mainmenu;
    }
    
    public function getLoaiNoiDung_mainmenu(){
        return $this->loainoidung_mainmenu;
    }
    
    //$loainoidung_submenu
    public function setLoaiNoiDung_submenu($loainoidung_submenu){
        $this->loainoidung_submenu = $loainoidung_submenu;
    }
    
    public function getLoaiNoiDung_submenu(){
        return $this->loainoidung_submenu;
    }
    
    //$loainoidung_hot
    public function setLoaiNoiDung_hot($loainoidung_hot){
        $this->loainoidung_hot = $loainoidung_hot;
    }
    
    public function getLoaiNoiDung_hot(){
        return $this->loainoidung_hot;
    }
    
    //$loainoidung_order
    public function setLoaiNoiDung_order($loainoidung_order){
        $this->loainoidung_order = $loainoidung_order;
    }
    public function getLoaiNoiDung_order(){
        return $this->loainoidung_order;
    }
    
    //$loainoidung_status
    public function setLoaiNoiDung_status($loainoidung_status){
        $this->loainoidung_status = $loainoidung_status;
    }
    
    public function getLoaiNoiDung_status(){
        return $this->loainoidung_status;
    }
    
    //$loainoidung_editor
    public function setLoaiNoiDung_editor($loainoidung_editor){
        $this->loainoidung_editor = $loainoidung_editor;
    }
    
    public function getLoaiNoiDung_editor(){
        return $this->loainoidung_editor;
    }
    
    //$loainoidung_lang
    public function setLoaiNoiDung_lang($loainoidung_lang){
        $this->loainoidung_lang = $loainoidung_lang;
    }
    
    public function getLoaiNoiDung_lang(){
        return $this->loainoidung_lang;
    }
    
    /**
       * Methods: Thu?c tính
       * Các hàm c?n thi?t trong class: insert, update, getinfo,...
       */
      
      public function insert(){
        $db = new Database();
        
        $value = "
            loainoidung_id,
            dongnoidung_id,
            loainoidung_title,
            loainoidung_alias,
            loainoidung_link,
            loainoidung_note,
            loainoidung_author,
            loainoidung_by,
            loainoidung_images,
            loainoidung_view,
            loainoidung_mainmenu,
            loainoidung_submenu,
            loainoidung_hot,
            loainoidung_order,
            loainoidung_status
        ";
        
        $insert = $db->insertData('loainoidung', $value);
        
        return true;
        
      }
      
      //Hàm cập nhật loại nội dung
      public function update($id) {
        
        $db = new Database();
        
        $value = array(
            'dongnoidung_id'            => $this->getDongNoiDung_id(),
            'loainoidung_title'         => $this->getLoaiNoiDung_title(),
            'loainoidung_alias'         => $this->getLoaiNoiDung_alias(),
            'loainoidung_link'          => $this->getLoaiNoiDung_link(),
            'loainoidung_note'          => $this->getLoaiNoiDung_note(),
            'loainoidung_author'        => $this->getLoaiNoiDung_author(),
            'loainoidung_by'            => $this->getLoaiNoiDung_by(),
            'loainoidung_images'        => $this->getLoaiNoiDung_images(),
            'loainoidung_date'          => $this->getLoaiNoiDung_date(),
            'loainoidung_ip'            => $this->getLoaiNoiDung_ip(),
            'loainoidung_update_date'   => $this->getLoaiNoiDung_update_date(),
            'loainoidung_update_ip'     => $this->getLoaiNoiDung_update_ip(),
            'loainoidung_update_by'     => $this->getLoaiNoiDung_update_by(),
            'loainoidung_view'          => $this->getLoaiNoiDung_view(),
            'loainoidung_mainmenu'      => $this->getLoaiNoiDung_mainmenu(),
            'loainoidung_submenu'       => $this->getLoaiNoiDung_submenu(),
            'loainoidung_hot'           => $this->getLoaiNoiDung_hot(),
            'loainoidung_order'         => $this->getLoaiNoiDung_order(),
            'loainoidung_status'        => $this->getLoaiNoiDung_status(),
            'loainoidung_editor'        => $this->getLoaiNoiDung_editor(),
            'loainoidung_lang'          => $this->getLoaiNoiDung_lang()
        );
        
        $condition = array(
            'where'     => 'loainoidung_id=1 AND loainoidung_id='.$id
        );
        
        $update = $db->updateData('loainoidung',$value,$condition);
        
        return true;
      }
      
      public function getARecord($id) {
        $db = new Database();
        
        $value = "
            loainoidung_id,
            dongnoidung_id,
            loainoidung_title,
            loainoidung_alias,
            loainoidung_link,
            loainoidung_note,
            loainoidung_images,
            loainoidung_mainmenu,
            loainoidung_submenu
        ";
        
        $condition = array(
            'where'     => 'loainoidung_status=1 AND loainoidung_id='.$id
        );
        
        $result = $db->getAData('loainoidung', $value, $condition);
        
        return $result;
      }
      
      public function getAll()
      {
        $db = new Database();
        
        $value = "
            loainoidung_id,
            dongnoidung_id,
            loainoidung_title,
            loainoidung_alias,
            loainoidung_link,
            loainoidung_note,
            loainoidung_author,
            loainoidung_by,
            loainoidung_images,
            loainoidung_mainmenu,
            loainoidung_submenu,
            loainoidung_hot,
            loainoidung_update_date,
            loainoidung_order
        ";
        
        $condition = array(
            'where'     => 'loainoidung_status=1',
            'order_by'  => 'loainoidung_order ASC'
        );
        
        $result = $db->getSData('loainoidung', $value, $condition);

        return $result;
        
      }
      
      public function getAllByID($id)
      {
        $db = new Database();
        
        $value = "
            loainoidung_id,
            dongnoidung_id,
            loainoidung_title,
            loainoidung_alias,
            loainoidung_link,
            loainoidung_note,
            loainoidung_author,
            loainoidung_by,
            loainoidung_images,
            loainoidung_mainmenu,
            loainoidung_submenu,
            loainoidung_hot,
            loainoidung_order
        ";
        
        $condition = array(
            'where'     => 'loainoidung_status=1 AND loainoidung_id='.$id,
            'order_by'  => 'loainoidung_order ASC, loainoidung_update_date ASC'
        );
        
        $result = $db->getSData('loainoidung', $value, $condition);

        return $result;
        
      }
      
      /**
       * Hàm lấy dãy id loainoidung_user_id và kiểm tra xem, nếu id rỗng thì bỏ qua.
       * $listID: là dãy id được lấy ra từ trường loainoidung_user_id
       */
      public function getTypeContentByUserID($listID){
        $split = explode("^MT^",$listID);
        $res = array();
        for($i=0;$i<count($split)-1;$i++){
            $res[] = $split[$i];
        }
        return $res;
      }
      
      /**
       * Hàm kiểm tra permission của thành viên
       * Nếu permission là proteced thì lấy giá trị id của thành viên để so sánh, vói những id có trong dãy id user_id thì mới gán vào mảng menuArrList
       */
      public function getTypeContentByPermission($permission){
        //Code here
      }
      
        /**
         * Hàm lấy thông tin loại nội dung
         * $id: loainoidung_id của bài viết
         * $value: Giá trị trả về: loainoidung_id, loainoidung_title. Các trường trong bảng loại nội dung
         */
        public function getContentType($id,$value){
            
            $getlnd = $this->getARecord($id);
            
            $res = $getlnd->$value;
            
            return $res;
        }
      
      /**
       * Hàm lấy tất cả ds menu đưa vào một mảng
       */
      public function menuArrayList($value){
        //Mở kết nối với database
        $db = new Database();
        //Khai báo một biến mảng để chứa danh sách menu
        $menuContent = array();
        /*
        $value = "
            loainoidung_id,
            dongnoidung_id,
            loainoidung_title,
            loainoidung_alias,
            loainoidung_link
        ";
        */
        $condition = array(
            'where'     => 'loainoidung_status=1 AND loainoidung_mainmenu=1',
            'order_by'  => 'loainoidung_order ASC, loainoidung_update_date ASC'
        );
        $resutls = $db->getSData('loainoidung', $value, $condition);
        foreach($resutls as $values){
            
            $menuContent[] = $values;
            
        }
        return $menuContent;
        
      }
      /**
       * Hàm đếm menu con
       */
      public function countMenuSub($id,$value){
        $db = new Database();
        $condition = array(
            'where'     =>  'dongnoidung_id='.intval($id)
        );
        $result = $db->countData('loainoidung',$value,$condition);
        return $result;
      }
      
      /**
       * Hàm đệ quy menu
       * Đệ quy: có nghĩa là viết một hàm xong rồi gọi lại chính nó thay vì viết nhiều vòng lặp
       */
      public function getMenuCategory($parent,$lid,$value, $paID, $paClass, $addClass){
        //Biến menu là một mảng dữ liệu
        $menu = $this->menuArrayList($value);
        //Khai báo biến menu tạm để lưu các giá trị cần xử lý
        $menu_tmp = array();
        foreach($menu as $key=>$values)
        {
            //Kiểm tra dòng nội dung xem có bằng parent hay không
            if($values->dongnoidung_id == $parent)
            {
                $menu_tmp[] = $values;
                unset($menu[$key]); //Hủy phần tử đã được gán vào biến tạm
            }
        }
        //Kiểm tra paID, paClass có tồn tại không?
        $paID = isset($paID) && $paID!="" ? 'id="'.$paID.'"' : "";
        $paClass = isset($paClass) && $paClass!="" ? 'class="'.$paClass.'"' : "";
        //Kiểm tra sự tồn tại của biến tạm
        if($menu_tmp)
        {
            echo '<ul '.$paID.' '.$paClass.'>';
            $dem=0;
            foreach($menu_tmp as $items)
            {
                $dem++;
                //Nếu là giá trị đầu tiên và là menu chính thì không có menuLine
                $menuActive = '';
                $menuLine = ($dem!=1 && $parent == 0) ?  '<li class="line"></li>' : '';
                echo $menuLine.'<li>';
                //Kiểm tra permistion
                if($items->loainoidung_alias == 'trang-chu' || $items->loainoidung_alias == 'home' || $items->loainoidung_alias == '' || $items->loainoidung_alias == 'home-page'){
                    $menuActive =  $lid=='' ? 'class="active"' : '';
                    echo '<a href="'.MTN_BASE_SITEURL.'" '.$menuActive.'>'.$items->loainoidung_title.'</a>';
                    $this->getMenuCategory($items->loainoidung_id,0,$value);
                }
                else
                {
                    //Kiểm tra permission
                    if($items->loainoidung_permission == "protected"){
                        $typeID = $this->getUser_id();
                        $arrListID = $this->getTypeContentByUserID($items->loainoidung_user_id);
                        //print_r($arrListID);
                        $class = isset($addClass) && $addClass!="" && count($this->countMenuSub($items->loainoidung_id," count(*) ")) > 0 ? 'class="'.$addClass.'"' : "";
                        if(in_array($typeID,$arrListID,true)){
                            $menuActive = $items->loainoidung_id == $lid ? 'class="active"' : '';
                            echo '<a '.$menuActive.' '.$class.' href="'.MTN_BASE_SITEURL.'/'.$this->RootContentAliasLink($items->loainoidung_id,"").'">'.$items->loainoidung_title.'</a>';
                            $this->getMenuCategory($items->loainoidung_id,$lid,$value);
                        }
                    }else {
                        $class = isset($addClass) && $addClass!="" && count($this->countMenuSub($items->loainoidung_id," count(*) ")) > 0 ? 'class="'.$addClass.'"' : "";
                        $menuActive = $items->loainoidung_id == $lid ? 'class="active"' : '';
                        echo '<a '.$menuActive.' '.$class.' href="'.MTN_BASE_SITEURL.'/'.$this->RootContentAliasLink($items->loainoidung_id,"").'">'.$items->loainoidung_title.'</a>';
                        $this->getMenuCategory($items->loainoidung_id,$lid,$value);
                    }
                    
                }
                echo '</li>';
            }
            echo '<div class="clear"></div></ul>';
        }
    }
    //Hàm get submenu
    public function getMenuSub($value){
        $db = new Database();
        $condition = array(
            'where'     => 'loainoidung_submenu = "1" AND loainoidung_status="1" ORDER BY loainoidung_order DESC, loainoidung_update_date DESC'
        );
        $menuList = $db->getSData('loainoidung',$value,$condition);
        $num = count($menuList);
        if($num > 0)
        {
            $i=0;
            foreach($menuList as $item){
                $i++;
                $subMenuLine = $i<$num ? "<li class='sub-menuline'></li>" : "";
                $link = $item->loainoidung_link!="" ? str_replace('../',MTN_BASE_SITEURL.MTN_URLRewrite,$item->loainoidung_link) : MTN_BASE_SITEURL.MTN_URLRewrite.$this->RootContentAliasLink($item->loainoidung_id,"");
                echo '<li><a href="'.$link.'">'.$item->loainoidung_title.'</a></li>'.$subMenuLine;
            }
            echo '<div class="clear"></div>';
        }
    }
    //HÀM GET ROOT CONTENT ID
    function RootContent($lid){
    	
        $db = new Database();
        
    	$value = "loainoidung_id, dongnoidung_id";
        
        $condition = array(
            'where'    => 'loainoidung_id='.$lid
        );
        
        $dlnd = $db->getAData('loainoidung', $value, $condition);
    	
        $bienMenu = 0;
        
        if($dlnd->dongnoidung_id==0)
    	{
    		$bienMenu = $dlnd->loainoidung_id;
    	}
    	else
    	{
    		$bienMenu = $dlnd->dongnoidung_id;
    		RootContent($bienMenu);
    	}
    	return $bienMenu;
    }
    
    /**
     * HÀM PHÂN LOAI NOI DUNG
     */
	function typeCategoryList($parentid,$cols = array()){
		$db = new Database();
        
        $value = "loainoidung_id,dongnoidung_id";
        
        $condition = array(
            'where'     => 'loainoidung_status=1',
            'order_by'  => 'loainoidung_order DESC'
        );
        
        $loainoidung = $db->getSData('loainoidung',$value,$condition);
        
		if($loainoidung)
		{
			foreach($loainoidung as $v){
				if($v->dongnoidung_id == $parentid){
					$cols[] = $v->loainoidung_id;
					//Phương pháp đệ quy
                    $cols = $this->typeCategoryList($v->loainoidung_id,$cols);
				}
			}
		}
		return $cols;
	}
	function typeCategory($parentid){
		//Lấy giá trị gán vào biến $strArray
        $strArray = $parentid.",";
		$cols = $this->typeCategoryList($parentid);
		for($i=0;$i<count($cols);$i++)
		{
			$phay = ',';
			$strArray = $strArray.$cols[$i].$phay;
		}
		$strArray = $strArray."^_^";
		$strArray = str_replace(",^_^","",$strArray);
        return $strArray;
	}
    
//HÀM GET ROOT CONTENT ID
    function RootContentAliasLink($lid,$results){
        $db = new Database();
        $value = "loainoidung_id,dongnoidung_id,loainoidung_alias";
        $condition = array(
            'where'     => 'loainoidung_status = 1 AND loainoidung_id='.$lid
        );
        $dlnd = $db->getAData('loainoidung',$value,$condition);
    	$bienMenu = 0;
    	if($dlnd)
    	{
    		if($dlnd->dongnoidung_id==0)
    		{
    			$bienMenu = $dlnd->loainoidung_id;
    			$results = $dlnd->loainoidung_alias;
    		}
    		else
    		{
    			$bienMenu = $dlnd->dongnoidung_id;
    			$results = $this->RootContentAliasLink($bienMenu,$dlnd->loainoidung_alias.'/'.$results);
    		}
    	}
    	return $results;
    }
    //Lấy tất cả loại nội dung đưa vào 1 mảng
    public function contentArrayList($value){
        
        //Khởi tạo mảng rỗng lưu giá trị
        $contentArr = array();
        
        $result = $this->getAll($value);
        
        foreach($result as $values){
            
            $contentArr[] = $values;
            
        } 
        
        return $contentArr;
        
    }
    
    //Đệ quy loại nội dung để lấy ra các loại nội dung tương ứng theo từng cấp
    public function getContentCategory($parentid,$value,$res=''){
        
        //Lấy ra tất cả dữ liệu trong mảng contentArrayList
        $contentType = $this->contentArrayList($value);
        
        //Khai báo mảng tạm để chứa giá trị theo cấp khi duyệt qua mảng ContentType
        $content_tmp = array();
        
        foreach($contentType as $key=>$val){
            
            if($val->dongnoidung_id == $parentid){
                
                $content_tmp[] = $val;
                unset($contentType[$key]); //Hủy Loại nội dung đã lấy ra.
                
            }
            
        }
        
        //Kiểm tra xem $content_tmp có dữ liệu không? nếu có thì lấy ra
        if($content_tmp){
            
            foreach($content_tmp as $items){
               
               echo '<option value="'.$items->loainoidung_id.'">'.$res.$items->loainoidung_title.'</option>';
               
               //Gọi lại hàm gọi là đệ quy
               $this->getContentCategory($items->loainoidung_id,$value,'---/');
                
            }
            
        }
        
    }
      
}