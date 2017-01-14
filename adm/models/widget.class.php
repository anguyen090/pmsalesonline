<?PHP

    /**
     * Author: Nguyễn Minh Trực
     * Creat date: 19-07-2015
     */
     
class Widgets extends Database {
    
    public function __construct(){
        parent::__construct();
    }
    
    /**
     * Properties: Thuộc tính class
     * Tương ứng với các trường trong table bannerslide
     */
    private $widget_id;
    private $widget_code;
    private $widget_modules;
    private $widget_title;
    private $widget_content;
    private $widget_style;
    private $widget_type;
    private $widget_state;
    private $widget_info;
    private $widget_soluong;
    private $widget_by;
    private $widget_date;
    private $widget_ip;
    private $widget_update_date;
    private $widget_update_ip;
    private $widget_order;
    private $widget_status;
    private $widget_editor;
    private $widget_lang;
    private $widgetID;
    
    //Properties GET SET
    //$widget_id
    public function setWidget_id($widget_id){
        $this->widget_id = $widget_id;
    }
    
    public function getWidget_id(){
        return $this->widget_id;
    }
    
    //$widget_code
    public function setWidget_code($widget_code){
        $this->widget_code = $widget_code;
    }
    
    public function getWidget_code(){
        return $this->widget_code;
    }
    
    //$widget_modules
    public function setWidget_modules($widget_modules){
        $this->widget_modules = $widget_modules;
    }
    
    public function getWidget_modules(){
        return $this->widget_modules;
    }
    
    //$widget_title
    public function setWidget_title($widget_title){
        $this->widget_title = $widget_title;
    }
    
    public function getWidget_title(){
        return $this->widget_title;
    }
    
    //$widget_content
    public function setWidget_content($widget_content){
        $this->widget_content = $widget_content;
    }
    
    public function getWidget_content(){
        return $this->widget_content;
    }
    
    //$widget_style
    public function setWidget_style($widget_style){
        $this->widget_style = $widget_style;
    }
    
    public function getWidget_style(){
        return $this->widget_style;
    }
    
    //$widget_type
    public function setWidget_type($widget_type){
        $this->widget_type = $widget_type;
    }
    
    public function getWidget_type(){
        return $this->widget_type;
    }
    
    //$widget_state
    public function setWidget_state($widget_state){
        $this->widget_state = $widget_state;
    }
    
    public function getWidget_state(){
        return $this->widget_state;
    }
    
    //$widget_info
    public function setWidget_info($widget_info){
        $this->widget_info = $widget_info;
    }
    
    public function getWidget_info(){
        return $this->widget_info;
    }
    
    //$widget_soluong
    public function setWidget_soluong($widget_soluong){
        $this->widget_soluong = $widget_soluong;
    }
    
    public function getWidget_soluong(){
        return $this->widget_soluong;
    }
    
    //$widget_by
    public function setWidget_by($widget_by){
        $this->widget_by = $widget_by;
    }
    
    public function getWidget_by(){
        return $this->widget_by;
    }
    
    //$widget_date
    public function setWidget_date($widget_date){
        $this->widget_date = $widget_date;
    }
    
    public function getWidget_date(){
        return $this->widget_date;
    }
    
    //$widget_ip
    public function setWidget_ip($widget_ip){
        $this->widget_ip = $widget_ip;
    }
    
    public function getWidget_ip(){
        return $this->widget_ip;
    }
    
    //$widget_update_date
    public function setWidget_update_date($widget_update_date){
        $this->widget_update_date = $widget_update_date;
    }
    
    public function getWidget_update_date(){
        return $this->widget_update_date;
    }
    
    //$widget_update_ip
    public function setWidget_update_ip($widget_update_ip){
        $this->widget_update_ip = $widget_update_ip;
    }
    
    public function getWidget_update_ip(){
        return $this->widget_update_ip;
    }
    
    //$widget_order
    public function setWidget_order($widget_order){
        $this->widget_order = $widget_order;
    }
    
    public function getWidget_order(){
        return $this->widget_order;
    }
    
    //$widget_status
    public function setWidget_status($widget_status){
        $this->widget_status = $widget_status;
    }
    
    public function getWidget_status(){
        return $this->widget_status;
    }
    
    //$widget_editor
    public function setWidget_editor($widget_editor){
        $this->widget_editor = $widget_editor;
    }
    
    public function getWidget_editor(){
        return $this->widget_editor;
    }
    
    //$widget_lang
    public function setWidget_lang($widget_lang){
        $this->widget_lang = $widget_lang;
    }
    
    public function getWidget_lang(){
        return $this->widget_lang;
    }
    
    //$widgetID
    public function setWidgetID($widgetID){
        $this->widgetID = $widgetID;
    }
    
    public function getWidgetID(){
        return $this->widgetID;
    }
    
    /**
        widget_id
        widget_code
        widget_modules
        widget_title
        widget_content
        widget_style
        widget_type
        widget_state
        widget_info
        widget_soluong
        widget_by
        widget_date
        widget_ip
        widget_update_date
        widget_update_ip
        widget_order
        widget_status
        widget_editor
        widget_lang  
    */
    //Hàm insert
    public function insert(){
        
        $db = new Database();
        
        $value = array(
            'widget_id'            => 'NULL',
            'widget_code'           => $this->getWidget_code(),
            'widget_modules'        => $this->getWidget_modules(),
            'widget_title'          => $this->getWidget_title(),
            'widget_content'        => $this->getWidget_content(),
            'widget_style'          => $this->getWidget_style(),
            'widget_type'           => $this->getWidget_type(),
            'widget_state'          => $this->getWidget_state(),
            'widget_info'           => $this->getWidget_info(),
            'widget_soluong'        => $this->getWidget_soluong(),
            'widget_by'             => $this->getWidget_by(),
            'widget_date'           => $this->getWidget_date(),
            'widget_ip'             => $this->getWidget_ip(),
            'widget_update_date'    => $this->getWidget_update_date(),
            'widget_update_ip'      => $this->getWidget_update_ip(),
            'widget_order'          => $this->getWidget_order(),
            'widget_status'         => $this->getWidget_status(),
            'widget_editor'         => $this->getWidget_editor(),
            'widget_lang'           => $this->getWidget_lang()
        );
        
        $result = $db->insertData('widget',$value);
        
        return $result;
        
    }
    
    //Hàm insert
    public function update($id){
        
        $db = new Database();
        
        $value = array(
            'widget_code'           => $this->getWidget_code(),
            'widget_modules'        => $this->getWidget_modules(),
            'widget_title'          => $this->getWidget_title(),
            'widget_content'        => $this->getWidget_content(),
            'widget_style'          => $this->getWidget_style(),
            'widget_type'           => $this->getWidget_type(),
            'widget_state'          => $this->getWidget_state(),
            'widget_info'           => $this->getWidget_info(),
            'widget_soluong'        => $this->getWidget_soluong(),
            'widget_by'             => $this->getWidget_by(),
            'widget_date'           => $this->getWidget_date(),
            'widget_ip'             => $this->getWidget_ip(),
            'widget_update_date'    => $this->getWidget_update_date(),
            'widget_update_ip'      => $this->getWidget_update_ip(),
            'widget_order'          => $this->getWidget_order(),
            'widget_status'         => $this->getWidget_status(),
            'widget_editor'         => $this->getWidget_editor(),
            'widget_lang'           => $this->getWidget_lang()
        );
        
        $condition = array(
            'where'     => 'widget_id='.intval($id)
        );
        
        $result = $db->updateData('widget',$value,$condition);
        
        return $result;
        
    }
    
    //Lấy 1 dòng giá trị từ databse
    public function getARecord($value){
        $db = new Database();
        $condition = array(
            'where'         => 'widget_status = 1',
            'order_by'      => 'widget_id DESC',
            'limit_start'   => '0',
            'limit_end'     => '1'
        );
        
        $result = $db->getAData('widget', $value, $condition);
        
        return $result;
    }
    
    public function getARecordByID($id, $value){
        $db = new Database();
        $condition = array(
            'where'         => 'widget_status = 1 AND widget_id='.intval($id)
        );
        
        $result = $db->getAData('widget', $value, $condition);
        
        return $result;
    }
    
    
    //Lấy 1 dòng giá trị từ databse
    public function getAll($value){
        $db = new Database();
        
        $condition = array(
            'where'     => 'widget_status = 1',
        );
        
        $result = $db->getSData('widget', $value, $condition);
        
        return $result;
    }
    
    /**
     * Function check widget
     * Kiểm tra widget tự viết hay được tạo trong admin, kiểm tra là widget quảng cáo, nôi dung, sản phẩm
     * Set các vị trí tương ứng cho widget
     * $id: Widget ID
     */
    private function checkWidget($id, $position, $widgetID){
        
        $widget = $this->getARecord($id);
        
        //Kiểm tra xem có phải là widget tự viết hay không?
        if($widget->widget_code != "")
        {
            include_once MTN_ROOTDIR."/widgets/".$widget->widget_content;
        }
        else
        {
            //Kiểm tra các phần hiển thị --> BOX INFO - widget title, widget content
            $viewList = explode("^_^AK^_^",$widget->widget_info);
            
            //Xử lý module từng widget
            //Nếu là widget quảng cáo
            $widgetID = 'widget1';
            if($position = '3')
            {
                $widgetID = 'widgetP';
            }
            else
            {
                $widgetID = 'widget1';
            }
            
            //Kiểm tra xem có phải vị trí 12, 13, 14 hay không để add cái title vào
            if($position==12 OR $position==13 OR $position==14)
            {
                $wStart="left";
                $wEnd = "right";
            }
        }
    }
    
    //Hàm kiểm tra trạng sản phẩm
    //Priate vì hàm này chỉ sử dụng nội bộ trong class này
    private function checkState($widgetType,$state,$num){
        
        $db = new Database();
        
        $pArray = array('hot', 'view', 'rate', 'command','sale','promo','saleoff');
        
        $stateWhere = ""; 
        
        //Kiểm tra xem widget đang xét là widget nội dung hay widget sản phẩm
        if($widgetType=="noidung"){
            //Nếu là nội dung
            $value = "
                `noidung_id`,
                `loainoidung_id`,
                `user_id`,
                `noidung_title`,
                `noidung_note`,
                `noidung_content`,
                `noidung_images`,
                `noidung_author`,
                `noidung_update_date`
            ";
        }else{
            //Nếu là sản phẩm
            $value = "
                `sanpham_id`,
                `loaisanpham_id`,
                `sanpham_title`,
                `sanpham_price`,
                `sanpham_note`,
                `sanpham_content`,
                `sanpham_images`,
                `sanpham_by`,
                `sanpham_update_date`
            ";  
        }
        //Kiểm tra xem trạng thái của widget đó là gì?
        //Nếu là dạng ngẫu nhiên
        if($state == 'random'){
            $stateWhere = array(
                'where'     => $widgetType.'_status=1',
                'order_by'  => 'ORDER BY RAND()',
                'limit_start'   => '0',
                'limit_end'     => $num
            );
        }
        //Nếu là bài viết hoặc sản phẩm mới
        if($state == 'new'){
            $stateWhere = array(
                'where'         => $widgetType.'_status=1',
                'limit_start'   => '0',
                'limit_end'     => $num
            );
        } else {
            //Nếu tìm thấy $state trong mảng $pArray thì thực hiện  lấy dữ liệu theo $state
            if(in_array($state,$pArray,true)){
                $stateWhere = array(
                    'where'         => $widgetType.'_status=1 AND '.$widgetType.'_'.$state.'=1',
                    'limit_start'   => '0',
                    'limit_end'     => $num
                );
            }//END check in_array()
        }//END check state không khác random và new
        
        $result = $db->getSData($widgetType,$value,$stateWhere);
        
        return $result;
    }
    
    
    /**
     * HÀM KIỂM TRA VÀ LẤY GIÁ TRỊ CHO WIDGET CONTENT
     * $widgetType: cho biết widget này là widget noidung hay widget san pham hay widget quảng cáo
     * $widgetID: Cho biết id widget đó
     * $vitri: Cho biết vị trị đang xét của widget đó
     * $num: Giới hạn số lượng tin được hiển thị ra bên ngoài
     */
    public function checkWidgetContent($widgetID){
        
        global $PrimaryContent;
        
        $widgetContent = array();
        
        if($widgetID == 0){
            
            $widgetContent['contentPrimary'] =  $PrimaryContent;
            
        } else {
            //Mở kết nối database     
            $db = new Database();
            
            //Khởi tạo lớp function
            $f = new functionGet();
            
            //Khởi tạo lớp loại nội dung
            $lnd = new LoaiNoiDung();
            
            //Khởi tạo lớp user
            $user = new User();
            //$ndLike = $like->getD($_COOKIE['user_id'],0,10);
            
            //Gọi đến hàm getARecord trong lớp widget
            $widget = $this->getARecord($widgetID);
            
            //Cái này để cho biết là widget quảng cáo, widget sản phẩm, 
            //hay widget bài viết tương ứng với 3 tab trong admin
            $widgetType = $widget->widget_modules;
            
            //Cho biết số lượng bài viết được hiển thị ra bên ngoài
            $num = $widget->widget_soluong;
            
            $state = $widget->widget_state;
            
            //Cut chuỗi hiển thị
            $view_list = explode("^_^AK^_^", $widget->widget_info);
            
            //Kiểm tra xem có phải widget tự viết hay không?
            if($widget->widget_code != "" && $widgetType == 'Widget')
            {
                if(in_array('title',$view_list,true)){$widgetContent['widgetTitle'] = $widget->widget_title;}
                
                $widgetContent['widgetContentDefault'] =  $widget->widget_content;
                
            } else {
                
                //Kiểm tra widgetType
                //Nếu là widget quảng cáo
                if($widgetType == 'quangcao'){
                   //Kiểm tra tiêu đề widget
                   if(in_array("title",$view_list,true)){$widgetContent['widgetTitle'] = $widget->widget_title;}
                   //Kiểm tra hiển thị nôi dung widget
                   if(in_array('content', $view_list,true)) {$widgetContent['widgetContent'] = htmlspecialchars_decode(str_replace('../',MTN_BASE_SITEURL.'/',$widget->widget_content));}
                   
                } else {
                    
                    
                    //Kiểm tra trạng thái của widget là nội dung, quảng cáo hay sản phẩm
                    $getContent = $this->checkState($widgetType,$state,$num);
                    
                    $i=0;
    
                    //Kiểm tra xem có cho phép hiển thị tiêu đề widget hay không?
                    if(in_array('title',$view_list,true)){$widgetContent['widgetTitle'] = $widget->widget_title;}
                    
                    foreach($getContent as $getContent)
                    {
                        $i++;
                        //Sử dụng mảng 2 chiều để lưu dữ liệu vào
                        //$f->RootContentAliasLink();
                        $image='';
                        //Hiển thị icon tròn phía trước tiêu đề nội dung
                        $titleIcon = true;
                        /** Kiểm tra giá trị iamge trong mảng bằng bao nhiêu nếu:
                         * Nếu == 0 tức là không cho phép hiển thị images
                         * Nếu == 1 tức là cho phép hiển thị hình ảnh đại diện cho tin đầu tiên
                         * Nếu == 2 tức là cho phép hiển thị hình đại diện cho 2 tin đầu tiên
                         * Nếu == 3 tức là cho phép hiển thị hình đại diện cho tất cả các tin
                         */
                        if(in_array("0",$view_list,true)){
                            $image = '';
                            $titleIcon = true;
                        }else if(in_array("1",$view_list,true)){
                            if($i==1){
                                $image = '<img src="'.str_replace("../",MTN_BASE_SITEURL.'/',str_replace("noidung/","noidung/",$getContent->noidung_images)).'"/>';
                                $titleIcon = false;
                            }
                        }
                        else if (in_array("2",$view_list,true)) {
                            if($i==1 || $i==2){
                                $image = '<img src="'.str_replace("../",MTN_BASE_SITEURL.'/',str_replace("noidung/","noidung/",$getContent->noidung_images)).'"/>';
                                $titleIcon = false;
                            }
                        }else if(in_array("3",$view_list,true)){
                            $image = '<img src="'.str_replace("../",MTN_BASE_SITEURL.'/',str_replace("noidung/","noidung/",$getContent->noidung_images)).'"/>';
                            $titleIcon = false;
                        }
                        $widgetContent[$i]['titleIcon'] = $titleIcon;
                        $widgetContent[$i]['link'] = $lnd->RootContentAliasLink($getContent->loainoidung_id,"").$getContent->noidung_id.'-'.$f->convertViToEn(stripTags(str_replace("../",MTN_BASE_SITEURL.'/',htmlspecialchars_decode($getContent->noidung_title)),false)).'.html';
                        $widgetContent[$i]['userlink'] = MTN_BASE_SITEURL.'/'.$user->getUser($getContent->user_id,"user_name");
                        $widgetContent[$i]['topiclink'] = MTN_BASE_SITEURL.MTN_URLRewrite.$lnd->RootContentAliasLink($getContent->loainoidung_id,"");
                        //Nếu cho phép hiển thị hình ảnh đại diện
                        if (in_array('image', $view_list, true))		{$widgetContent[$i]['images'] = $image;}
                        //Nếu cho phép hiển thị title widget
                        if (in_array('noidungtitle', $view_list, true))	{$widgetContent[$i]['title'] = $getContent->noidung_title;}
                        //Nếu cho phép hiển thị ngày tháng cập nhật
                        if (in_array('update', $view_list, true))		{$widgetContent[$i]['updateDate'] = date('d/m/Y',strtotime($getContent->noidung_update_date));}
    					//Nếu cho phép hiển thị nôi dung mô tả
                        if (in_array('note', $view_list, true))			{$widgetContent[$i]['note'] = str_replace("../",MTN_BASE_SITEURL.'/',htmlspecialchars_decode($getContent->noidung_note));}
    					//Nếu cho phép hiển thị nội dung chi tiết
                        if (in_array('content', $view_list, true))		{$widgetContent[$i]['content'] =  str_replace("../",MTN_BASE_SITEURL.'/',htmlspecialchars_decode($getContent->noidung_content));}
                        //Nếu cho phép hiển thị loại nội dung
                        if(in_array('contentby',$view_list,true))       {$widgetContent[$i]['contentby'] = $user->getUser($getContent->user_id,"user_fullname"); }
                        //Nếu cho phép hiển thị loại nội dung
                        if(in_array('contenttype',$view_list,true))     {$widgetContent[$i]['contenttype'] = $lnd->getContentType($getContent->loainoidung_id,"loainoidung_title"); }
                     
                     }
                }
            }
        } //END if
        
        if(isset($widgetContent) && $widgetContent!=""){
            return $widgetContent;
        }
    }
}

