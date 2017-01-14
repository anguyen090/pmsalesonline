<?PHP

    /**
     * Author: Nguyễn Minh Trực
     * Creat date: 26-07-2015
     */
     
class CountertDaysClass extends Database {
    
    public function __construct(){
        parent::__construct();
    }
    
    //Properties
    private $id;
    private $date;
    private $sum;
    
    //Properties GET SET
    //$id
    public function setID($id){
        $this->id = $id;
    }
    
    public function getID(){
        return $this->id;
    }
    
    //$date
    public function setDate($set_date){
        $this->date = $set_date;
    }
    
    public function getDate(){
        return date("Y-m-d");
    }
    
    //$sum
    public function setSum($sum){
        $this->sum = $sum;
    }
    
    public function getSum(){
        return $this->sum;
    }
    
    //Methods
    //Function insert
    public function insertDays(){
        $db = new Database();
        $value = array(
            'id'    => NULL,
            'date'  => $this->getDate(),
            'sum'   => $this->getSum()
        );
        $insert = $db->insertData('countert_days', $value);
        return $insert;
    }
    
    //function update
    public function updateDays(){
        $db = new Database();
        $getA = $this->getARecord();
        $sum = $getA->sum  + 1;
        $value = array(
            'sum'   => $sum
        );
        $condition = array(
            'where'     => "`date`='".$this->getDate()."'"
        );
        $update = $db->updateData('countert_days', $value, $condition);
        return $update;
    }
    
    //function delete
    public function delete($date){
        $db = new Database();
        $condition=array(
            'where' => 'date='.$date
        );
        $delete = $db->deleteData('countert_days', $condition);
        return $delete;
    }
    
    //function get a record
    public function getARecord(){
        $db = new Database();
        $value="date, sum";
        $condition=array(
            'order_by'  => 'date DESC',
            'limit_start' => 0,
            'limit_end'     => 1
        );
        $getA = $db->getAData('countert_days', $value, $condition);
        return $getA;
    }
    //function get all
	
    //count all
    public function countAll(){
        
        $db = new Database();
        
        $value = " SUM(sum) ";
        
        $condition = array();
        
        $countall = $db->countData('countert_days',$value, $condition);
        
        $countall = $countall > 0 ? $countall : 0;
        
        return $countall;
        
    }
    //count today
    public function countToDay($date){
        $db = new Database();
        $value = " SUM(sum) ";
        $condition = array(
            'where'     => "`date`='".$date."'"
        );
        $counttd = $db->countData('countert_days', $value, $condition);
        
        $results = $counttd>0 ? $counttd : 0;
        
        return $results;
    }
    //count yesterday
    public function countYesterday($date){
        $db = new Database();
        $value = " SUM(sum) ";
        $condition = array(
            'where'     => "`date`='".$date."'"
        );
        $countyesterday = $db->countData('countert_days', $value, $condition);
        
        $results = $countyesterday > 0 ? $countyesterday : 0;
        
        return $results;
    }
    //count month - tháng này
    public function counterMonth($startOfMonth, $endOfMonth){
        $db = new Database();
        
        $value = " SUM(sum) ";
        
        $condition = array(
            'where'     => "`date`>='".$startOfMonth."' AND `date`<='".$endOfMonth."'"
        );
        
        $countermonth = $db->countData('countert_days', $value, $condition);
        
        $results = $countermonth > 0 ? $countermonth : 0 ;
        
        return $results;
    }
    //count lasmonth - tháng trước
    public function counterLastMonth($startOfMonth, $endOfMonth){
        $db = new Database();
        
        $value = " SUM(sum) ";
        
        $condition = array(
            'where'     => "date>='".$startOfMonth."' AND date <='".$endOfMonth."'"
        );
        
        
        $counterlastmonth = $db->countData('countert_days', $value, $condition);
        
        $results = $counterlastmonth > 0 ? $counterlastmonth : 0 ;
        
        return $results;
    }
    //count week - Tuần này
    public function counterWeek($startDay, $endDay){
        $db = new Database();
        
        $value = " SUM(sum) ";
        
        $condition = array(
            'where'     => "date >='".$startDay."' AND date<='".$endDay."'"
        );
        
        $counterweek = $db->countData('countert_days', $value, $condition);
        
        $results = $counterweek > 0 ? $counterweek : 0 ;
        
        return $results;
        
    }
    //count last week - Tuần Trước
    public function counterLastWeek($startDay, $endDay){
        $db = new Database();
        
        $value = " SUM(sum) ";
        
        $condition = array(
            'where'     => "date >='".$startDay."' AND date<='".$endDay."'"
        );
        
        $couterlastweek = $db->countData('countert_days', $value, $condition);
        
        $results = $couterlastweek > 0 ? $couterlastweek : 0 ;
        
        return $results;
    }
    
}