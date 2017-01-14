<?PHP

/**
 * Author: Nguyễn Minh Trực
 * Date: 18-09-2015
 */

class Contact extends Database {
    
    public function __construct(){
        parent::__construct();
    }
    
    /**
     * Properties
     * Các trường trong table
     */
    private $contact_id;
    private $contact_name;
    private $contact_phone;
    private $contact_email;
    private $contact_address;
    private $contact_content;
    private $contact_date;
    private $contact_ip;
    private $contact_update_date;
    private $contact_update_ip;
    private $contact_status;
    
    /**
     * Properties GET SET
     */
    //$contact_id
    public function setContact_id($contact_id){
        $this->contact_id = $contact_id;
    }
    
    public function getContact_id(){
        return $this->contact_id;
    }
    
    //$contact_name
    public function setContact_name($contact_name){
        $this->contact_name = $contact_name;
    }
    
    public function getContact_name(){
        return $this->contact_name;
    }
    
    //$contact_phone
    public function setContact_phone($contact_phone){
        $this->contact_phone = $contact_phone;
    }
    
    public function getContact_phone(){
        return $this->contact_phone;
    }
    
    //$contact_email
    public function setContact_email($contact_email){
        $this->contact_email = $contact_email;
    }
    
    public function getContact_email(){
        return $this->contact_email;
    }
    
    //$contact_address
    public function setContact_address($contact_address){
        $this->contact_address = $contact_address;
    }
    
    public function getContact_address(){
        return $this->contact_address;
    }
    
    //$contact_content
    public function setContact_content($contact_content){
        $this->contact_content = $contact_content;
    }
    
    public function getContact_content(){
        return $this->contact_content;
    }
    
    //$contact_date
    public function setContact_date($contact_date){
        $this->contact_date = $contact_date;
    }
    
    public function getContact_date(){
        return $this->contact_date;
    }
    
    //$contact_ip
    public function setContact_ip($contact_ip){
        $this->contact_ip = $contact_ip;
    }
    
    public function getContact_ip(){
        return $this->contact_ip;
    }
    
    //$contact_update_date
    public function setContact_update_date($contact_update_date){
        $this->contact_update_date = $contact_update_date;
    }
    
    public function getContact_update_date(){
        return $this->contact_update_date;
    }
    
    //$contact_update_ip
    public function setContact_update_ip($contact_update_ip){
        $this->contact_update_ip = $contact_update_ip;
    }
    
    public function getContact_update_ip(){
        return $this->contact_update_ip;
    }
    
    //$contact_status
    public function setContact_status($contact_status){
        $this->contact_status = $contact_status;
    }
    
    public function getContact_status(){
        return $this->contact_status;
    }
    
    /**
    contact_id
    contact_name
    contact_phone
    contact_email
    contact_address
    contact_content
    contact_date
    contact_ip
    contact_update_date
    contact_update_ip
    contact_status
    */
    
    //insert
    public function insert(){
        //Khởi tạo database
        $db = new Database();
        
        $value = array(
            'contact_id'            => 'NULL',
            'contact_name'          => $this->getContact_name(),
            'contact_phone'         => $this->getContact_phone(),
            'contact_email'         => $this->getContact_email(),
            'contact_address'       => $this->getContact_address(),
            'contact_content'       => $this->getContact_content(),
            'contact_date'          => $this->getContact_date(),
            'contact_ip'            => $this->getContact_ip(),
            'contact_update_date'   => $this->getContact_update_date(),
            'contact_update_ip'     => $this->getContact_update_ip(),
            'contact_status'        => $this->getContact_status()
        );
        
        //Insert database
        $result = $db->insertData('contact',$value);
        
        return $result;
        
    }
    
    //update
    public function update($id){
        //Khởi tạo database
        $db = new Database();
        
        $value = array(
            'contact_name'          => $this->getContact_name(),
            'contact_phone'         => $this->getContact_phone(),
            'contact_email'         => $this->getContact_email(),
            'contact_address'       => $this->getContact_address(),
            'contact_content'       => $this->getContact_content(),
            'contact_date'          => $this->getContact_date(),
            'contact_ip'            => $this->getContact_ip(),
            'contact_update_date'   => $this->getContact_update_date(),
            'contact_update_ip'     => $this->getContact_update_ip(),
            'contact_status'        => $this->getContact_status()
        );
        
        $condition = array(
            'where'         =>  'contact_id = ' . $id 
        );
        
        $result = $db->updateData('contact', $value, $condition);
        
        return $result;
        
    }
    
    //get a record
    public function getARecord($id){
        
        $db = new Database();
        
        $value = "contact_id,contact_name,contact_phone,contact_email,contact_address,contact_content, contact_update_date, contact_update_ip";
        
        $condition = array(
            'where'     => 'contact_id=' . $id . 'AND contact=1'
        );
        
        $result = $db->getAData('contact',$value,$condition);
        
        return $result;
        
    }
    
    // get all
    public function getAll(){
        $db = Database();
        
        $value = "contact_id,contact_name,contact_phone,contact_email,contact_address,contact_content, contact_update_date, contact_update_ip";
        
        $condition = array(
            'where'     => 'contact_status=1'
        );
        
        $result = $db->getSData('contact',$value,$condition);
        
        return $result;
    }
    
}