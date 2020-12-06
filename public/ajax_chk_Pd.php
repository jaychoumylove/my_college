<?
	header("content-type:text/html;charset=utf-8");
	require('../application/config/MYSQLPDO.class.php');
	require('../application/config/model.class.php');
	require('../application/admin/model/powerModel.class.php');
	$p=$_GET['p'];
	$the_p=new powerModel;
	$data_p=$the_p->searchRow();
	$row=count($data_p);
    if($row!="0"){
		//print_r($data_p);
		echo @$data_p["c"];//$p;
	}else{
		echo "";
	}
?>