<?
	class model{
		protected $mysqlpdo;
		public function __construct(){
			$params_arr=array('user'=>'root','pwd'=>'root','dbname'=>'my_college');
			$this->mysqlpdo=MYSQLPDO::getInstance($params_arr);
		}
	}


?>