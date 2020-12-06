<?
	header("content-type:text/html;charset=utf-8");
	require('../application/config/MYSQLPDO.class.php');
	require('../application/config/model.class.php');
	require('../application/admin/model/majorsModel.class.php');
	$majorsDepartment=$_GET["majorsDepartment"];
	$the_MA=new majorsModel;
	$data_MA=$the_MA->searchDM($majorsDepartment);
	$option="<option value=''>请选择</option>";
    foreach($data_MA as $v_MA){
		$option.="<option value='".$v_MA['major_Number']."'>".$v_MA['majorsName']."</option>";
	}
	echo $option;
?>