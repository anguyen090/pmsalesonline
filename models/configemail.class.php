<?php

class Config_email extends Database{
    
    public function __construct(){
        parent::__construct();
    }
    
    /** properties */
    private $email_id;
    private $email_email;
    private $email_smtp;
    private $email_port;
    private $email_aut;
    private $email_pass;
    private $email_date;
    private $email_ip;
    private $email_by;
    private $email_update_date;
    private $email_update_ip;
    private $email_update_by;
    private $email_status;
    
    /** Method function get set */
    //$email_id
    public function setEmail_id($email_id){
        $this->email_id = $email_id;
    }
    public function getEmail_id(){
        return $this->email_id;
    }
    
    //$email_email
    public function setEmail_email($email_email){
        $this->email_email = $email_email;
    }
    public function getEmail_email(){
        return $this->email_email;
    }
    
    //$email_smtp
    public function setEmail_smtp($email_smtp){
        $this->email_smtp = $email_smtp;
    }
    public function getEmail_smtp(){
        return $this->email_smtp;
    }
    
    //$email_port
    public function setEmail_port($email_port){
        $this->email_port = $email_port;
    }
    public function getEmail_port(){
        return $this->email_port;
    }
    
    //$email_aut
    public function setEmail_aut($email_aut){
        $this->email_aut = $email_aut;
    }
    public function getEmail_aut(){
        return $this->email_aut;
    }
    
    //$email_pass
    public function setEmail_pass($email_pass){
        $this->email_pass = $email_pass;
    }
    public function getEmail_pass(){
        return $this->email_pass;
    }
    
    //$email_date
    public function setEmail_date($email_date){
        $this->email_date = $email_date;
    }
    public function getEmail_date(){
        return $this->email_date;
    }
    //$email_ip
    public function setEmail_ip($email_ip){
        $this->email_ip = $email_ip;
    }
    public function getEmail_ip(){
        return $this->email_ip;
    }
    
    //$email_by
    public function setEmail_by($email_by){
        $this->email_by = $email_by;
    }
    public function getEmail_by(){
        return $this->email_by;
    }
    //$email_update_date
    public function setEmail_update_date($email_update_date){
        $this->email_update_date = $email_update_date;
    }
    public function getEmail_update_date(){
        return $this->email_update_date;
    }
    //$email_update_ip
    public function setEmail_update_ip($email_update_ip){
        $this->email_update_ip = $email_update_ip;
    }
    public function getEmail_update_ip(){
        return $this->email_update_ip;
    }
    //$email_update_by
    public function setEmail_update_by($email_update_by){
        $this->email_update_by = $email_update_by;
    }
    public function getEmail_update_by(){
        return $this->email_update_by;
    }
    
    //$email_status
    public function setEmail_status($email_status){
        $this->email_status = $email_status;
    }
    public function getEmail_status(){
        return $this->email_status;
    }
    
    /** Function insert */
    public function insert(){
        $db = new Database();
        $value = array(
            'email_id'      => NULL,
            'email_email'   => $this->getEmail_email(),
            'email_smtp'    => $this->getEmail_smtp(),
            'email_port'    => $this->getEmail_port(),
            'email_aut'     => $this->getEmail_aut(),
            'email_pass'    => $this->getEmail_pass(),
            'email_date'    => $this->getEmail_date(),
            'email_ip'      => $this->getEmail_ip(),
            'email_by'      => $this->getEmail_by(),
            'email_update_date' => $this->getEmail_update_date(),
            'email_update_ip'   => $this->getEmail_update_ip(),
            'email_update_by'   => $this->getEmail_update_by(),
            'email_status'      => $this->getEmail_status()
        );
        $result = $db->insertData('config_email',$value);
        return $result;
        $this->db->close();
    }
    
    /** Function insert */
    public function update(){
        $db = new Database();
        $value = array(
            'email_email'   => $this->getEmail_email(),
            'email_smtp'    => $this->getEmail_smtp(),
            'email_port'    => $this->getEmail_port(),
            'email_aut'     => $this->getEmail_aut(),
            'email_pass'    => $this->getEmail_pass(),
            'email_update_date' => $this->getEmail_update_date(),
            'email_update_ip'   => $this->getEmail_update_ip(),
            'email_update_by'   => $this->getEmail_update_by(),
            'email_status'      => $this->getEmail_status()
        );
        $condition = array(
            'where'     => 'email_id='.intval($this->getEmail_id())
        );
        $result = $db->updateData('config_email',$value,$condition);
        return $result;
        $this->db->close();
    }
    //Get a record
    public function getARecord($id,$value){
        $db = new Database();
        $condition = array(
            'where'     => 'email_id='.intval($id)
        );
        $result = $db->getAData('config_email',$value,$condition);
        return $result;
        $this->db->close();
    }
    //Get từng trường dữ liệu
    public function getConfigEmail($id,$value){
        $data = $this->getARecord($id,$value);
        $result = $data->$value;
        return $result;
    }
    /**
     * Hàm kiểm tra xem mật khẩu có đúng với mật khẩu mã hóa trong database hay không?
     */
    public function parsePassword($pin, $pout){
        $res = '';
        $enpass = md5(md5($pin));
        if($enpass == $pout){
            $res = $pin;
        }
        return $res;
    }
    //Get value by email
    public function getARecordByEmail($email,$value){
        $db = new Database();
        $condition = array(
            'where'     => 'email_email='.$email
        );
        $data = $db->getAData('config_email',$value,$condition);
        $result = $data->$value;
        return $result;
    }
}