<?PHP

/**
 * Author: Nguyễn Minh Trực
 * Date: 18-10-2015
 */
 
class User extends Database {
    
    
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Properties
     */
    private $user_id;
    private $group_id;
    private $user_name;
    private $user_pass;
    private $user_firstname;
    private $user_lastname;
    private $user_right;
    private $user_active;
    private $user_email;
    private $user_phone;
    private $user_sex;
    private $user_address;
    private $user_birthday;
    private $user_images;
    private $user_count_login;
    private $user_lock;
    private $user_update_ip;
    private $user_date_update;
     
     
    /**
     * Properties GET SET
     */
    //$user_id
    public function setUser_id($user_id){
        $this->user_id = $user_id;
    }
    public function getUser_id(){
        return $this->user_id;
    }
    //$group_id
    public function setGroup_id($group_id){
        $this->group_id = $group_id;
    }
    public function getGroup_id(){
        return $this->group_id;
    }
    //$user_name
    public function setUser_name($username){
        $this->user_name = $username;
    }
    
    public function getUser_name(){
        return $this->user_name;
    }
    
    //$user_pass
    public function setUser_pass($password){
        $this->user_pass = $password;
    }
    
    public function getUser_pass(){
        return $this->user_pass;
    }
    
    //$user_right
    public function setUser_right($user_right){
        $this->user_right = $user_right;
    }
    
    public function getUser_right(){
        return $this->user_right;
    }
    
    //$user_active
    public function setUser_active($user_active){
        $this->user_active = $user_active;
    }
    
    public function getUser_active(){
        return $this->user_active;
    }
    
    //$user_fullname
    public function setUser_firstname($user_firstname){
        $this->user_firstname = $user_firstname;
    }
    
    public function getUser_firstname(){
        return $this->user_firstname;
    }
    
    //$user_fullname
    public function setUser_lastname($user_lastname){
        $this->$user_lastname = $user_lastname;
    }
    
    public function getUser_lastname(){
        return $this->user_lastname;
    }
    
    //$user_email
    public function setUser_email($user_email){
        $this->user_email = $user_email;
    }
    
    public function getUser_email(){
        return $this->user_email;
    }
    
    //$user_phone
    public function setUser_phone($user_phone){
        $this->user_phone = $user_phone;
    }
    
    public function getUser_phone(){
        return $this->user_phone;
    }
    
    //$user_sex
    public function setUser_sex($user_sex){
        $this->user_sex = $user_sex;
    }
    public function getUser_sex(){
        return $this->user_sex;
    }
    //$user_brithday
    public function setUser_birthday($user_birthday){
        $this->user_birthday = $user_birthday;
    }
    public function getUser_birthday(){
        return $this->user_birthday;
    }
    //$user_address
    public function setUser_address($user_address){
        $this->user_address = $user_address;
    }
    public function getUser_address(){
        return $this->user_address;
    }
    //$user_images
    public function setUser_images($user_images){
        $this->user_images = $user_images;
    }
    public function getUser_images(){
        return $this->user_images;
    }
    //$user_count_login
    public function setUser_count_login($user_count_login){
        $this->user_count_login = $user_count_login;
    }
    public function getUser_count_login(){
        return $this->user_count_login;
    }
    //$user_lock
    public function setUser_lock($user_lock){
        $this->user_lock = $user_lock;
    }
    public function getUser_lock(){
        return $this->user_lock;
    }
    //$user_update_ip
    public function setUser_update_ip($user_update_ip){
        $this->user_update_ip = $user_update_ip;
    }
    public function getUser_update_ip(){
        return $this->user_update_ip;
    }
    //$user_date_update
    public function setUser_date_update($user_date_update){
        $this->user_date_update = $user_date_update;
    }
    public function getUser_date_update(){
        return $this->user_date_update;
    }
    
    /**
     * Methods
     */
     //insert
     public function insert(){
        $db = new Database();
        $value = array(
            'user_id'       => 'NULL',
            'group_id'      => $this->getGroup_id(),
            'user_name'     => $this->getUser_name(),
            'user_pass'     => md5(md5($this->getUser_pass())),
            'user_right'    => $this->getUser_right(),
            'user_active'   => $this->getUser_active(),
            'user_firstname' => $this->getUser_firstname(),
            'user_lastname' => $this->getUser_lastname(),
            'user_email'    => $this->getUser_email(),
            'user_phone'    => $this->getUser_phone(),
            'user_sex'      => $this->getUser_sex(),
            'user_birthday' => $this->getUser_birthday(),
            'user_address'  => $this->getUser_address(),
            'user_count_login'  => $this->getUser_count_login(),
            'user_lock'         => $this->getUser_lock(),
            'user_update_ip'    => $this->getUser_update_ip(),
            'user_date_update'  => $this->getUser_date_update()
        );
        $result = $db->insertData('user',$value);
        return $result;
     }
     
     //update
     public function update($id) {
        $db = new Database();
        $value = array(
            'user_name'     => $this->getUser_name(),
            'user_pass'     => md5(md5($this->getUser_pass())),
            'user_right'    => $this->getUser_right(),
            'user_active'   => $this->getUser_active(),
            'user_firstname' => $this->user_firstname(),
            'user_address'  => $this->getUser_address(),
            'user_count_login'  => $this->getUser_count_login(),
            'user_update_ip'    => $this->getUser_update_ip(),
            'user_date_update'  => $this->getUser_date_update()
        );
        $condition = array(
            'where'     => 'user_id='.$id
        );
        $result = $db->updateData('user',$value,$condition);
        return $result;
     }
     //function get Arecord not condition
     public function getARecord($value){
        $db = new Database();
        $condition = array(
            'order_by'      =>   'user_id DESC',
            'limit_start'   => '0',
            'limit_end'     => '1'
        );
        $result = $db->getAData('user',$value,$condition);
        return $result;
     }
     //Function get Arecode by id
     public function getArecordByID($id,$value){
        $db = new Database();
        $condition = array(
            'where'   => 'user_id='.intval($id)
        );
        $result = $db->getAData('user',$value,$condition);
        return $result;
     }
     //update images
     public function updateImages($folder,$ftype,$fname,$fsize,$ftmp){
        $db = new Database();
        //kết nối class function upload images
        $f = new functionGet();
        if($fname!=NULL AND $ftype!=null){
			//Đường dẫn thư mục upload hình ảnh vào
			$big_path = "./uploads/".$folder."/";
            //Hình ảnh thu nhỏ
			$thumb_path = "./uploads/".$folder."/thumbs/";
            //Lấy ra link ảnh khi uploads
            $linkimages = '.'.$f->uploadImages($ftype,$fname,$fsize,$ftmp,$big_path,$thumb_path,"200","");
            //Luu vao du lieu
            $id = $this->getUser_id();
            if(isset($id) & $id!=NULL){
                $getImages = $this->getARecordByID($id,'user_id,user_images');
                //xóa hình cu
				if($getImages->user_images!="")
				{
					@unlink($getImages->user_images);
				}
            }else {
                $getImages = $this->getARecord('user_id');
            }
            $value = array(
                'user_images'   => $linkimages
            );
            $condition = array(
                'where'     => 'user_id='.$getImages->user_id
            );
            $result = $db->updateData('user',$value,$condition);
            return $result;	
        }
     }
     //update info custom condition
     public function updateInfoCustom($id, $value=array()){
        $db = new Database();
        
        $condition = array(
            'where'     => 'user_id='.$id
        );
        
        $result = $db->updateData('user',$value,$condition);
        
        return $result;
        
     }
     
     //update by username và $value custom
     public function updateByUsername($username,$value=array()) {
        
        $db = new Database();
        
        $condition = array(
            'where'     => 'user_name="'.$username.'"'
        );
        
        $result = $db->updateData('user',$value,$condition);
        
     }
     
     //update set value
     
     //delete
//Hàm kiểm tra tồn tại email đăng ký hay chưa?
    public function getArecordByEmail($email,$value){
        $db = new Database();
        $condition = array(
            'where'     => 'user_email='.$email
        );
        $result = $db->getAData('user',$value,$condition);
        return $result;
    }
    
    //Get a record by username
    public function getARecordByUsername($username){
        
        $db = new Database();
        
        $value = "
            user_id,
            user_name,
            user_pass,
            user_right,
            user_active,
            user_firstname,
            user_address,
            user_lock,
            user_date_update
        ";
        
        $condition = array(
            'where'     => 'user_name="'.$username.'"'
        );
        
        $result = $db->getAData('user',$value,$condition);
        
        return $result;
        
    }
    
    //Get a record by user lock
    public function getARecordByLock($lock){
        
        $db = new Database();
        
        $value = "
            user_id,
            user_name,
            user_pass,
            user_right,
            user_active,
            user_firstname,
            user_address,
            user_date_update
        ";
        
        $condition = array(
            'where'     => 'user_lock="'.$lock.'"'
        );
        
        $result = $db->getAData('user',$value,$condition);
        
        return $result;
        
    }
    
    //Get all
    public function getAll(){
        
        $db = new Database();
        
        $value = "
            user_id,
            user_name,
            user_pass,
            user_right,
            user_active,
            user_firstname,
            user_address,
            user_date_update
        ";
        
        $condition = array(
            'where'     => 'user_active=1',
            'order_by'  => 'user_date_update DESC'
        );
        
        $result = $db->getSData('user',$value,$condition);
        
        return $result;
    }
    
    //Get all by id
    public function getAllByID($id){
        
        $db = new Database();
        
        $value = "
            user_id,
            user_name,
            user_pass,
            user_right,
            user_active,
            user_firstname,
            user_address
        ";
        
        $condition = array(
            'where'     => 'user_active=1 AND user_id='.$id,
            'order_by'  => 'user_date_update DESC'
        );
        
        $result = $db->getSData('user',$value,$condition);
        
        return $result;
    }
    
    //Get User
    //Function Get user full name
    public function getUser($id,$value){
        
        $getU = $this->getArecordByID($id,$value);
        
        $res = $getU->$value;
        
        return $res;
    
    }
    //Get fullname
    public function getFullname($id){
        $getU = $this->getArecordByID($id,'user_id,user_firstname,user_lastname');
        $res = $getU->user_firstname . ' ' . $getU->user_lastname;
        return $res;
    }
    
    //login
    public function login($username,$password,$value){
        //Kết nối database
        $db = new Database();
        //Kiểm tra đăng nhập
        if(isset($username) && $username!="" && isset($password) && $password !="")
        {
            $condition = array(
                'where'     => 'user_active=1 AND user_name="'.$username.'" AND user_pass="'.$password.'"'
            );
            $result = $db->getAData('user',$value,$condition);
            return $result;
        }
    }
    
    //login last
    
    //logout
    
    //check username
    
    //change pass
    
    //change info
    
    /**
     * Cac ham nang cao
     */
    //Gioi han so lan dang nhap
    
    //Dang nhap gui qua email quan tri
    
    /** 
     * Kiểm tra xem có phải là user đã đăng nhâp hay không?
     * Nếu lấy được thông tin khi cookie username và cookie userid hiện tại trùng với database thì thành viên đó đã đăng nhập
     */
    public function checkViewIsMember($value,$uid,$uname){
        $db = new Database();
        $condition = array(
            'where'     => 'user_active=1 AND user_id='.intval($uid).' AND user_name="'.htmlspecialchars($uname,ENT_QUOTES).'"'
        );
        $result = $db->getAData('user',$value,$condition);
        return $result;
    }
    
    /**
     * Hàm kiểm tra nếu thành viên chưa đăng nhập
     * Trường hợp này được sử dụng cho vào trang info của thành viên đó.
     */
    public function checkViewNoneMember($value,$uid){
        $db = new Database();
        $condition = array(
            'where'     => 'user_active=1 AND user_id='.intval($uid)
        );
        $result = $db->getAData('user',$value,$condition);
		return $result;
    }
    
    /**
     * Kiểm tra xem user có phải là admin chính hay không?
     * Tồn tại user_name của user_id == user_name hiện tại
     * Nếu user_admin=1 thì admin đó là admin chính
     */
    public function checkViewIsAdmin($value,$uid,$uname){
        $result = false;
        //Khai báo các giá trị của các group tương ứng: 1=admin,2=mod,3=mem
        $pArr = array(1);
        //Lấy thông tin thành viên và so sánh với uid, uname để kiểm tra đăng nhập
        $getRes = $this->getArecordByID($uid,$value);
        $group = new Group();
        //Lấy thông tin group dựa vào group_id của user được lấy ở trên và kiểm tra giá trị (value) của nó đem so sánh với $pArr
        $groupID = $group->getArecordByID($getRes->group_id,'group_value');
        if($getRes->user_name==$uname && $getRes->user_admin==1){
            if(in_array(intval($groupID->group_value),$pArr,true)){
               $result = true; 
            }
        }
        return $result;
    }
    /** 
     * Kiểm tra quyền hạn thành viên
     * $fix: Thêm tiền tố phía trước để kiểm tra quyền trường hợp bị trùng, trường hợp 1 trang cần kiểm tra quyền 2 lần
     */
    public function checkPermissionUser($fix,$value,$uid,$uname){
        global $pri;
        //Mặc định quyền hạn là được phép xem ($pri đã là dang mảng)
        $per = $pri;
        //Lấy dữ liệu bảng user theo user_name và user_id
        $getU = isset($uid) && intval($uid)>0 ? $this->checkViewIsMember($value,$uid,$uname) : $this->checkViewNoneMember($value,$uname);
        if(isset($fix) && $fix != ""){
            if(isset($uid) && $getU && $getU->user_name == $uname){
                $per[] = $fix.'_edit';
                $per[] = $fix.'_add';
                //Kiểm tra nếu là admin
                if($this->checkViewIsAdmin('user_admin',$uid,$uname)==true){
                    $per[] = $fix.'_admin';
                }
            }else {
                $per = $pri;
            }
        }else {
            if(isset($uid) && $getU && $getU->user_name == $uname){
                $per[] = 'edit';
                $per[] = 'add';
                ////Kiểm tra nếu là admin
                if($this->checkViewIsAdmin('user_admin',$uid,$uname)==true){
                    $per[] = 'admin';
                }
            }else {
                $per = $pri;
            }
        }
        return $per;
    }
    /**
     * Kiểm tra quyền thao tác user
     * 1. Lấy thông tin user thông qua username và userid
     * 2. Lấy được thông tin group của user đó và lấy thông tin theo group theo groupid
     * 3. Kiểm tra xem có phải là admin không?  Nếu là admin mới cho phép quản lý user
     */
    public function checkPerAdmin($gArr=array(),$value,$uid,$uname){
        $res = false;
        $getU = $this->checkViewIsMember($value,$uid,$uname);
        $groupid = $getU->group_id;
        $group = new Group();
        $getG = $group->getArecordByID($groupid,'group_value');
        if(in_array(intval($getG->group_value),$gArr,true)){
            $res = true;
        }
        return $res;
    }
    /**
     * Hàm đếm những user mới đăng ký thông báo cho admin
     */
    public function countNewUser($type, $value){
        $db = new Database();
        $condition = array(
            'where'     => 'user_isread='.intval($type)
        );
        $result = $db->countData('user',$value,$condition);
        return $result;
    }
}