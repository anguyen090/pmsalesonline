<?PHP

    /**
     * Author: Nguyễn Minh Trực
     * Creat date: 26-07-2015
     */
class CountertOnlines extends Database {
    
    public function __construct(){
        parent::__construct();
    }
    
    //Properties
    private $id;
    private $time;
    private $session_cookie;
    private $client_ip;
    
    //Properties GET SET
    //$id
    public function setID($id){
        $this->id = $id;
    }
    
    public function getID(){
        return $this->id;
    }
    
    //$time
    public function setTime($time) {
        $this->time = $time;
    }
    
    public function getTime(){
        return $this->time;
    }
    
    //$session_cookie
    public function setSession_cookie($session_cookie){
        $this->session_cookie = $session_cookie;
    }
    
    public function getSession_cookie(){
        return $this->session_cookie;
    }
    
    //$client_ip
    public function setClient_ip($client_ip){
        $this->client_ip = $client_ip;   
    }
    
    public function getClient_ip(){
        return $this->client_ip;
    }
    
    //Method
    public function insert(){
        $db = new Database();
        $value = array(
            'id'                => NULL,
            'time'              => $this->getTime(),
            'session_cookie'    => $this->getSession_cookie(),
            'client_ip'         => $this->getClient_ip()
        );
        
        $insert = $db->insertData('countert_onlines', $value);
        
        return $insert;
    }
    
    //function update
    public function update($id){
        $db = new Database();
        
        $value = array(
            'time'              => $this->getTime(),
            'session_cookie'    => $this->getSession_cookie(),
            'client_ip'         => $this->getClient_ip()
        );
        
        $condition = array(
            'where'     => 'id='.$id
        );
        
        $update = $db->updateData('countert_onlines', $value, $condition);
        
        if($update) {
            return true;
        }
    }
    
    //function delete
    public function delete($onlineTime){
        
        $db = new Database();
        
        $condition = array(
            'where' => 'time < ' . $onlineTime
        );
        
        $delete = $db->deleteData('countert_onlines', $condition);
        
        if($delete)
        {
            return true;
        }
    }
    
    /**
     * Hàm kiểm tra client truy cập
     * Kiểm tra ngày hiện tại có thông tin truy cập chưa? Nếu chưa thêm ngày.
     * $cookie: $_COOKIE['visitor']
     * $server: $_SERVER['HTTP_COOKIE']
     */
    public function checkClient($cookie, $server, $date)
    {
        $result = '';
        if((!isset($cookie) OR $cookie == "") AND isset($server))
        {
            //Thêm người dùng truy cập vào và set cookie cho người dùng đó
            $insert = $this->insert();
            setcookie('visitor',$server);
            
            //Kiểm tra ngày truy cập, nếu chưa có thì thêm ngày truy cập vào
            $countertdays = new CountertDaysClass();
            $getA = $countertdays->getARecord();
            //Nếu ngày lấy ra nhỏ hơn ngày hiện tại thì thêm vào database
            //echo $countertdays->getDate();
            
            if($getA->date < $date)
            {
                //echo $date;
                $result = $countertdays->insertDays();
            }
            else
            {
                //echo "Cập nhật thêm vào database";
                $result = $countertdays->updateDays();
            }
        }
        return $result;
    }
    
}