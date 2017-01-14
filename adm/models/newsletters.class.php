<?php

class Newsletter extends Database {
    
    public function __construct(){
        parent::__construct();
    }
    
    /** Properties */
    private $newsletters_id;
    private $newsletters_email;
    private $newsletters_option;
    private $newsletters_parent;
    private $newsletters_note;
    private $newsletters_date;
    private $newsletters_ip;
    private $newsletters_update_date;
    private $newsletters_update_ip;
    private $newsletters_status;
    
    /** Method GET SET */
    public function setNewsletters_id($newsletters_id){
        $this->newsletters_id = $newsletters_id;
    }
    public function getNewsletters_id(){
        return $this->newsletters_id;
    }
    
    //$newsletters_email
    public function setNewsletters_email($newsletters_email){
        $this->newsletters_email = $newsletters_email;
    }
    public function getNewsletters_email(){
        return $this->newsletters_email;
    }
    
    //$newsletters_option
    public function setNewsletters_option($newsletters_option){
        $this->newsletters_option = $newsletters_option;
    }
    public function getNewsletters_option(){
        return $this->newsletters_option;
    }
    
    //$newsletters_parent
    public function setNewsletters_parent($newsletters_parent){
        $this->newsletters_parent = $newsletters_parent;
    }
    public function getNewsletters_parent(){
        return $this->newsletters_parent;
    }
    //$newsletters_note
    public function setNewsletters_note($newsletters_note){
        $this->newsletters_note = $newsletters_note;
    }
    public function getNewsletters_note(){
        return $this->newsletters_note;
    }
    //$newsletters_date
    public function setNewsletters_date($newsletters_date){
        $this->newsletters_date = $newsletters_date;
    }
    public function getNewsletters_date(){
        return $this->newsletters_date;
    }
    //$newsletters_ip
    public function setNewsletters_ip($newsletters_ip){
        $this->newsletters_ip = $newsletters_ip;
    }
    public function getNewsletters_ip(){
        return $this->newsletters_ip;
    }
    //$newsletters_update_date
    public function setNewsletters_update_date($newsletters_update_date){
        $this->newsletters_update_date = $newsletters_update_date;
    }
    public function getNewsletters_update_date(){
        return $this->newsletters_update_date;
    }
    //$newsletters_update_ip
    public function setNewsletters_update_ip($newsletters_update_ip){
        $this->newsletters_update_ip = $newsletters_update_ip;
    }
    public function getNewsletters_update_ip(){
        return $this->newsletters_update_ip;
    }
    //$newsletters_status
    public function setNewsletters_status($newsletters_status){
        $this->newsletters_status = $newsletters_status;
    }
    public function getNewsletters_status(){
        return $this->newsletters_status;
    }
    
    /** Function */
    
    //Function insert
    public function insert(){
        $db = new Database();
        $value = array(
            'newsletters_id'        => NULL,
            'newsletters_email'     => $this->getNewsletters_email(),
            'newsletters_option'    => $this->getNewsletters_option(),
            'newsletters_parent'    => $this->getNewsletters_parent(),
            'newsletters_note'      => $this->getNewsletters_note(),
            'newsletters_date'      => $this->getNewsletters_date(),
            'newsletters_ip'        => $this->getNewsletters_ip(),
            'newsletters_update_date'   => $this->getNewsletters_update_date(),
            'newsletters_update_ip' => $this->getNewsletters_update_ip(),
            'newsletters_status'    => $this->getNewsletters_status()
        );
        $result = $db->insertData('newsletters',$value);
        return $result;
        $this->db->close();
    }
    //Function update
    public function update(){
        $db = new Database();
        $value = array(
            'newsletters_email'     => $this->getNewsletters_email(),
            'newsletters_option'    => $this->getNewsletters_option(),
            'newsletters_parent'    => $this->getNewsletters_parent(),
            'newsletters_note'      => $this->getNewsletters_note(),
            'newsletters_date'      => $this->getNewsletters_date(),
            'newsletters_ip'        => $this->getNewsletters_ip(),
            'newsletters_update_date'   => $this->getNewsletters_update_date(),
            'newsletters_update_ip' => $this->getNewsletters_update_ip(),
            'newsletters_status'    => $this->getNewsletters_status()
        );
        $condition = array(
            'where'     => 'newsletters_id='.intval($this->getNewsletters_id())
        );
        $result = $db->updateData('newsletters',$value,$condition);
        return $result;
        $this->db->close();
    }
    //Hàm lấy một giá trị từ id
    public function getARecordByID($id,$value){
        $db = new Database();
        $condition = array(
            'where'     => 'newsletters_id='.intval($id)
        );
        $result = $db->getAData('newsletters',$value,$condition);
        return $result;
        $this->db->close();
    }
    //Hàm lấy dự liệu theo email, option, parent
    public function getNewslettersByEmail($email,$option,$parent,$value){
        $db = new Database();
        $condition = array(
            'where'     => 'newsletters_email='.$email.' AND newsletters_option='.$option.' AND newsletters_parent='.intval($parent)
        );
        $result = $db->getAData('newsletters',$value,$condition);
        return $result;
        $this->db->close();
    }
    //Hàm lấy một giá trị từ 1 trường và trả về trường đó
    public function getNewsletters($id,$value){
        $getnewslt = $this->getARecordByID($id,$value);
        $data = $getnewslt->$value;
        return $data;
    }
}