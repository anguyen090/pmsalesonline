<?PHP

    /**
     * Author: Nguyễn Minh Trực
     * Creat date: 08-08-2015
     */
     
class HienThiViTri extends Database {
    
    public function __construct(){
        parent::__construct();
    }
    
    /**
     * Properties
     * Tương ứng với các trường trong database
     */
    private $hienthivitri_id;
    private $boxhienthi_id;
    private $hienthivitri_column;
    private $hienthivitri_content;
    private $hienthivitri_position;
    
    /**
     * Properties GET SET
     */
    //$hienthivitri_id
    public function setHienthivitri_id($hienthivitri_id){
        $this->hienthivitri_id = $hienthivitri_id;
    }
    
    public function getHienthivitri_id(){
        return $this->hienthivitri_id;
    }
    
    //$boxhienthi_id
    public function setBoxhienthi_id($boxhienthi_id){
        $this->boxhienthi_id = $boxhienthi_id;
    }
    
    public function getBoxhienthi_id(){
        return $this->boxhienthi_id;
    }
    
    //$hienthivitri_column
    public function setHienthivitri_column($hienthivitri_column){
        $this->hienthivitri_column = $hienthivitri_column;
    }
    
    public function getHienthivitri_column(){
        return $this->hienthivitri_column;
    }
    
    //$hienthivitri_content
    public function setHienthivitri_content($hienthivitri_content){
        $this->hienthivitri_content = $hienthivitri_content;
    }
    
    public function getHienthivitri_content(){
        return $this->hienthivitri_content;
    }
    
    //$hienthivitri_position
    public function setHienthivitri_position($hienthivitri_position){
        $this->hienthivitri_position = $hienthivitri_position;
    }
    
    public function getHienthivitri_position(){
        return $this->hienthivitri_position;
    }
    
    /**
     * Thuộc tính lớp
     * Các hàm cần thiết trong class
     */
     /**
        hienthivitri_id
        boxhienthi_id
        hienthivitri_column
        hienthivitri_content
        hienthivitri_position
      */
      
     //Hàm insert
     public function insert(){
        
        $db = new Database();
        
        $value = array(
            'hienthivitri_id'       => null,
            'boxhienthi_id'         => $this->getBoxhienthi_id(),
            'hienthivitri_column'   => $this->getHienthivitri_column(),
            'hienthivitri_content'  => $this->getHienthivitri_content(),
            'hienthivitri_position' => $this->getHienthivitri_position()
        );
        
        $result = $db->insertData('hienthivitri',$value);
        
        return $result;
        
     }
     
     //Hàm update
     public function update($id){
        
        $db = new Database();
        
        $value = array(
            'boxhienthi_id'         => $this->getBoxhienthi_id(),
            'hienthivitri_column'   => $this->getHienthivitri_column(),
            'hienthivitri_content'  => $this->getHienthivitri_content(),
            'hienthivitri_position' => $this->getHienthivitri_position()
        );
        
        $condition = array(
            'where'     => 'hienthivitri_id='.intval($id)
        );
        
        $result = $db->updateData('hienthivitri',$value,$condition);
        
        return $result;
        
     }
     
     //Ham delete by boxhienthi_id
     public function delete($id){
        $db = new Database();
        
        $condition = array(
            'where' =>  'boxhienthi_id='.intval($id) 
        );
        
        $result = $db->deleteData('hienthivitri',$condition);
     }
     
     //Get arecord
     public function getARecord($value){
        
        $db = new Database();
        
        $condition = array(
            'order_by'      => 'hienthivitri_id DESC',
            'limit_start'   => 0,
            'limit_end'     => 1
        );
        
        $result = $db->getAData('hienthivitri', $value, $condition);
        
        return $result;
     }
     
     //Get arecord by id
     public function getARecordByID($id, $value){
        
        $db = new Database();
        
        $condition = array(
            'where'     => 'hienthivitri_id='.intval($id)
        );
        
        $result = $db->getAData('hienthivitri',$value,$condition);
        
        return $result;
        
     }
     
     //Get All Record
     public function getAll($value){
        
        $db = new Database();
        
        $condition = array(
            'order_by'  => 'hienthivitri_position ASC'
        );
        
        $result = $db->getSData('hienthivitri', $value, $condition);
        
        return $result;
        
     }
     
     /**
      * Hàm lấy tất cả record ra theo diều kiện là position và cols
      * Position: Hiển thị theo vị trí nào trong 14 vị trí đã quy định sẵn
      * Cols: Mỗi một vị trí quy định sẵn các cols để định dạng css và cũng là điều kiện để get data
      */
     public function getAllByPosition($id,$position,$value){
        
        $db = new Database();
        
        $condition = array(
            'where'     => '`hienthivitri_position`="'.$position.'" AND `boxhienthi_id` = '.intval($id),
            'order_by'  => 'hienthivitri_position ASC'
        );
        
        $result = $db->getSData('hienthivitri', $value, $condition);
        
        return $result;
     }
     
     //Layout show
     public function positionShow($boxID, $position){
        if($vitri = $this->getAllByPosition($boxID,$position))
        {
        //Khởi tao các mãng vị trí
            $position = array();
            $i=0;
            foreach ($vitri as $vitri)
			{
                $i++;
                $position[] = array($vitri->hienthivitri_position => $vitri->hienthivitri_content);
            }
   
        }
            
        return $position;
     }
}