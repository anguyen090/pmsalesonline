<?PHP

class Configuration extends Database{
    
    function __construct(){
        parent::__construct();
    }
    
    /**
     * Properties: Các thuộc tính của lớp
     * Tương ứng với các trường trong table configuration
     */
     private $config_id;
     private $config_website_title;
     private $config_website_url;
     private $config_fanpage;
     private $config_slogan;
     private $config_hotline;
     private $config_support_yahoo;
     private $config_support_skype;
     private $config_email;
     private $config_facebook;
     private $config_twitter;
     private $config_youtube;
     private $config_logo;
     private $config_company_info;
     private $config_contact_info;
     private $config_copyright;
     private $config_update_date;
     private $config_lang;    
     /**
      * Properties GET SET
      * Lưu ý sử dụng hàm: Nếu đặt biết trong hàm trùng với biên được khai báo ở trên thì phải dùng $this->biến
      * Set: là đặt giá trị cho biến (luu gia tri vao)
      * Get: trả về giá trị (lay gia tri ra)
      */
      //$config_id
      public function setConfig_id($config_id){
        $this->config_id = $config_id;
      }
      
      public function getConfig_id(){
        return $this->config_id;
      }
      
      //$config_website_title
      public function setConfig_website_title($config_website_title){
        $this->config_website_title = $config_website_title;
      }
      
      public function getConfig_website_title(){
        return $this->config_website_title;
      }
      
      //$config_website_url
      public function setConfig_website_url($config_website_url){
        $this->config_website_url = $config_website_url;
      }
      
      public function getConfig_website_url(){
        return $this->config_website_url;
      }
      
      //$config_fanpage
      public function setConfig_fanpage($config_fanpage){
        $this->config_fanpage = $config_fanpage;
      }
      
      public function getConfig_fanpage(){
        return $this->config_fanpage;
      }
      
      //$config_slogan
      public function setConfig_slogan($config_slogan){
        $this->config_slogan = $config_slogan;
      }
      
      public function getConfig_slogan(){
        return $this->config_slogan;
      }
      
      //$config_hotline
      public function setConfig_hotline($config_hotline){
        $this->config_hotline = $config_hotline;
      }
      
      public function getConfig_hotline(){
        return $this->config_hotline;
      }
      
      //$config_support_yahoo
      public function setConfig_support_yahoo($config_support_yahoo){
        $this->config_support_yahoo = $config_support_yahoo;
      }
      
      public function getConfig_support_yahoo(){
        return $this->config_support_yahoo;
      }
      
      //$config_support_skype
      public function setConfig_support_skype($config_support_skype){
        $this->config_support_skype = $config_support_skype;
      }
      
      public function getConfig_support_skype(){
        return $this->config_support_skype;
      }
      
      //$config_email
      public function setConfig_email($config_email){
        $this->config_email = $config_email;
      }
      
      public function getConfig_email(){
        return $this->config_email;
      }
      
      //$config_facebook
      public function setConfig_facebook($config_facebook){
        $this->config_facebook = $config_facebook;
      }
      
      public function getConfig_facebook(){
        return $this->config_facebook;
      }
      
      //$config_twitter
      public function setConfig_twitter($config_twitter){
        $this->config_twitter = $config_twitter;
      }
      
      public function getConfig_twitter(){
        return $this->config_twitter;
      }
      
      //$config_youtube
      public function setConfig_youtube($config_youtube){
        $this->config_youtube = $config_youtube;
      }
      
      public function getConfig_youtube(){
        return $this->config_youtube;
      }
      
      //$config_logo
      public function setConfig_logo($config_logo){
        $this->config_logo = $config_logo;
      }
      
      public function getConfig_logo(){
        return $this->config_logo;
      }
      
      //$config_company_info
      public function setConfig_company_info($config_company_info){
        $this->config_company_info = $config_company_info;
      }
      
      public function getConfig_company_info(){
        return $this->config_company_info; 
      }
      
      //$config_contact_info
      public function setConfig_contact_info($config_contact_info){
        $this->config_contact_info = $config_contact_info;
      }
      
      public function getConfig_contac_info(){
        return $this->config_contact_info;
      }
      
      //$config_copyright
      public function setConfig_copyright($config_copyright){
        $this->config_copyright = $config_copyright;
      }
      
      public function getConfig_copyright(){
        return $this->config_copyright;
      }
      
      
      //$config_update_date
      public function setConfig_update_date($config_update_date){
        $this->config_update_date = $config_update_date;
      }
      
      public function getConfig_update_date(){
        return $this->config_update_date;
      }
      
      //$config_lang
      public function setConfig_lang($config_lang){
        $this->config_lang = $config_lang;
      }
      
      public function getConfig_lang(){
        return $this->config_lang;
      }
      
      /**
       * Methods: Thuộc tính
       * Các hàm cần thiết trong class: insert, update, getinfo,...
       */
       
       //Function Insert data
       public function insert(){
            //Mở lớp database để có kết nối với database và sử dụng hàm insertData.
            $db = new Database();
            $value = array(
                'config_id'             =>'NULL',
                'config_website_title'  =>$this->getConfig_website_title(),
                'config_website_url'    =>$this->getConfig_website_url(),
                'confgi_fanpage'        => $this->getConfig_fanpage(),
                'config_slogan'         =>$this->getConfig_slogan(),
                'config_hotline'        =>$this->getConfig_hotline(),
                'config_support_yahoo'  =>$this->getConfig_support_yahoo(),
                'config_support_skype'  =>$this->getConfig_support_skype(),
                'config_email'          =>$this->getConfig_email(),
                'config_facebook'       =>$this->getConfig_facebook(),
                'config_twitter'        =>$this->getConfig_twitter(),
                'config_youtube'        =>$this->getConfig_youtube(),
                'config_logo'           =>$this->getConfig_logo(),
                'config_contact_info'   =>$this->getConfig_contac_info(),
                'config_copyright'      =>$this->config_copyright,
                'config_update_date'    =>$this->getConfig_update_date(),
                'config_lang'           =>$this->setConfig_lang()
            );
            $result = $db->insertData('configuration',$value);
            
            return $result;
       }
       
       public function update($languge){
            
            //Mở lớp database để có kết nối với database và sử dụng hàm insertData.
            $db = new Database();
            
            $value = array(
                'config_website_title'  =>$this->getConfig_website_title(),
                'config_website_url'    =>$this->getConfig_website_url(),
                'config_fanpage'        => $this->getConfig_fanpage(),
                'config_slogan'         =>$this->getConfig_slogan(),
                'config_hotline'        =>$this->getConfig_hotline(),
                'config_support_yahoo'  =>$this->getConfig_support_yahoo(),
                'config_support_skype'  =>$this->getConfig_support_skype(),
                'config_email'          =>$this->getConfig_email(),
                'config_facebook'       =>$this->getConfig_facebook(),
                'config_twitter'        =>$this->getConfig_twitter(),
                'config_youtube'        =>$this->getConfig_youtube(),
                'config_logo'           =>$this->getConfig_logo(),
                'config_company_info'   =>$this->getConfig_company_info(),
                'config_contact_info'   =>$this->getConfig_contac_info(),
                'config_copyright'      =>$this->config_copyright,
                'config_update_date'    =>$this->getConfig_update_date()
            );
            
            $condition = array(
                'where'         =>'config_lang = "'.$languge.'"'
            );
            
            $result = $db->updateData('configuration',$value,$condition);
            
            return $result;
       }
       
       public function getARecord($value) {
            $db = new Database();
            $condition = array(
                'order_by'=>'config_id DESC',
                'limit_start'=>'0',
                'limit_end'=>'1'
            );
            
            $results = $db->getAData('configuration',$value,$condition);
            
            return $results;  
       }
       //Get config và trả về 1 giá trị cần lấy
       public function getConfig($value){
            $config = $this->getARecord($value);
            $res = $config->$value;
            return $res;
       }
       //Get url website
       /**
        * Chức năng cho phép website chạy chính thức, demo, ver1, ver2, ver3 hoặc url nào đó (Chỉ có quản trị chính mới chỉnh được).
        * Nếu url = 0 là chạy chính thức
        * Nếu url = ver1 là chạy ver1
        * Nếu url = ver2 là chạy ver2
        * Nếu url = demo thì chạy demo
        * Ngược lại thì lấy giá trị nhập vào của nó.
        */
        
       public function getUrl($value){
            $config = $this->getConfig($value);
            $url = $config!="0" ? $config : "";
            return $url;
       }
}