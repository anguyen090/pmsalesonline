<?PHP
/**
 * Author: Nguyễn Minh Trực
 * Date: 16/07/2015
 * Conect database
*/

class Database {
    
    private $server = SERVER;
    private $database = DATABASE;
    private $userdata = USERDATA;
    private $passdata = PASSDATA;
    public $tbfix = TBFIX;
    public $db;
    
    //Khi hàm khai báo không có bi?n, mu?n s? d?ng bi?n dã khai báo thì ph?i s? d?ng $this->bi?n
    public function __construct() {
        return $this->openConnect();
    }
    
    public function openConnect(){
        $this->db = new ezSQL_mysql($this->userdata,$this->passdata,$this->database,$this->server);
        return  $this->db;
    }
    
    /**
     * Chức năng insert CSDL
     * $table: bảng cần insert
     * $parameters: Các trường giá trị của bảng
     * $value: mãng các giá trị cần
     */
    
    public function insertData($table, $value=array()) 
    {
        //Khai báo một array lưu giá trị
        $values = array();
        //Duyệt qua tất cả các giá trị của $value
        foreach($value as $key=>$val) {
            //Bỏ qua các ký tự đặc biệt của biến val
            //$val = mysql_real_escape_string($val);
            //Lưu từng phần tử vào mản values
            $values[] = "`$key`='$val'";
        }
        if($insert = $this->db->query("INSERT INTO ".$this->tbfix.$table." SET ".implode(',',$values)))
        {
            return true;
        }
    }
    
    /**
     * Chức năng update CSDL
     * $table: bảng cần insert
     * $value: Các giá trị cần thay đổi
     * $condition: Các điều kiện cần
     */
    public function updateData($table, $value=array(), $condition=array()) 
    {
        //Xử lý giá trị value
        //Khai báo một array để lưu giá trị
        $values = array();
        //Duyệt qua tất cả các phần tử của value
        foreach($value as $key=>$val){
            //Bỏ qua các ký tự đặc biệt của $val
            //$val = mysql_real_escape_string($val);
            //Lưu từng phần tử vào mảng values
            $values[] = "`$key`='$val'";    
        }
        
        //Xử lý giá trị điều kiện $condition
        $where = isset($condition['where']) ? ' WHERE ' . $condition['where'] : '';
        //$order_by = isset($condition['order_by']) ? 'ORDER BY ' . $condition['order_by'] : '';
        //$limit = isset($condition['limit_start']) && isset($condition['limit_end']) ? 'LIMIT ' . $condition['limit_start'] . ',' . $condition['limit_end'] : '';

        
        if($update = $this->db->query("UPDATE `".$this->tbfix.$table."` SET ".implode(',',$values) . $where))
        {
            return $update;
        }
    }
    
    /**
     * Chức năng delete CSDL
     * $table: bảng cần delete
     * $condition: Các điều kiện cần
     */
     public function deleteData($table, $condition=array()){
        //Xử lý giá trị điều kiện $condition
        $where = isset($condition['where']) ? 'WHERE ' . $condition['where'] : '';
        
        if($delete = $this->db->query("DELETE FROM `" . $this->tbfix.$table . "`" . $where)){
            return $delete;
        }
     }
    
    /**
     * Chức năng Lấy dữ liệu 1 dòng.
     * $table: Bảng dữ liệu cần lấy
     * $value: Các giá trị cần lấy
     * $condition: Các điều kiện cần
     */
     public function getAData($table, $value, $condition=array())
     {
        //Xử lý biên array $condition.
        $where = isset($condition['where']) ? 'WHERE ' . $condition['where'] : '';
        $order_by = isset($condition['order_by']) ? ' ORDER BY ' . $condition['order_by'] : '';
        $limit = isset($condition['limit_start']) && isset($condition['limit_end']) ? ' LIMIT ' . $condition['limit_start'] . ',' . $condition['limit_end'] : '';
        
        if($getA = $this->db->get_row("SELECT ".$value." FROM  `".$this->tbfix.$table . "`" . $where . $order_by . $limit))
        {
            return $getA;
        }
     }
     
     /**
     * Chức năng Lấy dữ liệu nhiều dòng.
     * $table: Bảng dữ liệu cần lấy
     * $value: Các giá trị cần lấy
     * $condition: Các điều kiện cần
     */
     public function getSData($table, $value, $condition=array())
     {
        //Xử lý biên array $condition.
        $where = isset($condition['where']) ? ' WHERE ' . $condition['where'] : '';
        $order_by = isset($condition['order_by']) ? ' ORDER BY ' . $condition['order_by'] : '';
        $limit = isset($condition['limit_start']) && isset($condition['limit_end']) ? ' LIMIT ' . $condition['limit_start'] . ',' . $condition['limit_end'] : '';
        if($getS = $this->db->get_results("SELECT ".$value." FROM  `".$this->tbfix.$table."`" . $where . $order_by . $limit))
        {
            return $getS;
        }
     }
     
     /**
     * Đếm giá trị theo điều kiện
     * $table: Bảng dữ liệu cần lấy
     * $value: Các giá trị cần lấy
     * $condition: Các điều kiện cần
     */
     public function countData($table, $value, $condition=array())
     {
        //Xử lý biên array $condition.
        $where = isset($condition['where']) ? 'WHERE ' . $condition['where'] : '';
        $order_by = isset($condition['order_by']) ? ' ORDER BY ' . $condition['order_by'] : '';
        $limit = isset($condition['limit_start']) && isset($condition['limit_end']) ? ' LIMIT ' . $condition['limit_start'] . ',' . $condition['limit_end'] : '';
        
        if($countA = $this->db->get_var("SELECT ".$value." FROM  `".$this->tbfix.$table . "`" . $where . $order_by . $limit))
        {
            return $countA;
        }
     }
     
     /**
      * Hàm lấy giá trị id lớn nhất trong bảng dữ liệu
      */
     public function getMaxID($table,$value){
        
        if($getMax = $this->db->get_var("SELECT MAX(".$value.") FROM  `".$this->tbfix.$table."`")){
            
            return $getMax;
        
        }
     }
     
     /**
      * Hàm select dữ liệu từ 2 bảng
      */
     public function getSData2Table($table=array(), $value, $geton, $condition=array()){
        
        $tables = array();
        
        foreach($table as $key=>$val){
            
            $tables[] = "$key $val";
        }
        
        $where = isset($condition['where']) ? ' WHERE ' . $condition['where'] : '';
        
        $order_by = isset($condition['order_by']) ? ' ORDER BY ' . $condition['order_by'] : '';
        
        $limit = isset($condition['limit_start']) && isset($condition['limit_end']) ? ' LIMIT ' . $condition['limit_start'] . ',' . $condition['limit_end'] : '';
        
        $result = $this->db->get_results(
            "SELECT "
                .$value.
            " FROM "
                .$this->tbfix.$tables[0].
            " INNER JOIN "
                .$this->tbfix.$tables[1].
            " ON "
                .$geton.$where.$order_by.$limit
        );
        
        return $result;
     } 
      
     /**
      * Hàm select dữ liệu từ nhiều bảng (INNER JOIN)
      */
     public function getSDataMultipleTable($table=array(),$join=array(),$condition=array()){
        
     }
    
}