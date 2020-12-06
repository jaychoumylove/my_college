<?
	header("content-type:text/html;charset=utf-8");
	require('../application/config/MYSQLPDO.class.php');
	require('../application/config/model.class.php');
	require('../application/admin/model/classModel.class.php');
	$majorsDment=$_GET["majorsDepartment"];
	$the_M=new classModel;
	$data_M=$the_M->searchDM($majorsDment);
	$option_M="<option value=''>请选择</option>";
    foreach($data_M as $v_M){
		$option_M.="<option value='".$v_M['classNumber']."'>".$v_M['classCoursesName']."</option>";
	}
	echo $option_M;
?>