<?
	header("content-type:text/html;charset=utf-8");
	require('../application/config/MYSQLPDO.class.php');
	require('../application/config/model.class.php');
	require('../application/admin/model/studentModel.class.php');
	$stu_majors=$_GET["stu_majors"];
	$the_ST=new studentModel;
	$data_ST=$the_ST->searchMA($stu_majors);
	$option="<option value=''>请选择</option>";
    foreach($data_ST as $v_ST){
		$option.="<option value='".$v_ST['stu_number']."'>".$v_ST['stu_realname']."</option>";
	}
	echo $option;
?>