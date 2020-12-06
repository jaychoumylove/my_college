<?
	header("content-type:text/html;charset=utf-8");
	require('../application/config/MYSQLPDO.class.php');
	require('../application/config/model.class.php');
	require('../application/admin/model/majorsModel.class.php');
	$the_MA=new majorsModel;
	$data_MA=$the_MA->search();
	if($data_MA!=''){
		echo "该专业已存在！";
	}else{
		echo "该专业可以添加！";
	}
?>