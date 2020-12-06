<?php
/**
 * @
 * @Description:
 * @Copyright (C) 2011 helloweba.com,All Rights Reserved.
 * -----------------------------------------------------------------------------
 * @author: Liurenfei (lrfbeyond@163.com)
 * @Create: 2012-5-1
 * @Modify:
*/
include_once ("connect.php");

$action = $_GET['action'];
if ($action == 'import') { //导入XLS
    include_once("excel/reader.php");
	$tmp = $_FILES['file']['tmp_name'];
	if (empty ($tmp)) {
		echo '请选择要导入的Excel文件！';
		exit;
	}
	
	$save_path = "xls/";
	$file_name = $save_path.date('Ymdhis') . ".xls";
	if (copy($tmp, $file_name)) {
		$xls = new Spreadsheet_Excel_Reader();
		$xls->setOutputEncoding('utf-8');
		$xls->read($file_name);
		$data_values="";
		for ($i=2; $i<=$xls->sheets[0]['numRows']; $i++) {
			$name = $xls->sheets[0]['cells'][$i][1];
			$sex = $xls->sheets[0]['cells'][$i][2];
			$age = $xls->sheets[0]['cells'][$i][3];
			$data_values .= "('$name','$sex','$age'),";
		}
		$data_values = substr($data_values,0,-1); //去掉最后一个逗号
		$query = mysql_query("insert into ceshi (name,sex,age) values $data_values");//批量插入数据表中
	    if($query){
		    echo '导入成功！';
	    }else{
		    echo '导入失败！';
	    }
	}
} elseif ($action=='export') { //导出XLS
    $result = mysql_query("select * from classes");
    $str = "课程编号\t课程名称\t授课人\t\n";
    $str = iconv('utf-8','gb2312',$str);
    while($row=mysql_fetch_array($result)){
        $classNo = iconv('utf-8','gb2312',$row['classNo']);
        $classCourseName = iconv('utf-8','gb2312',$row['classCourseName']);
		$classTeacherName = iconv('utf-8','gb2312',$row['classTeacherName']);
    	$str .= $classNo."\t".$classCourseName."\t".$classTeacherName."\t\n";
    }
    $filename = date('Ymd').'.xls';
    exportExcel($filename,$str);
}


function exportExcel($filename,$content){
 	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Content-Type: application/vnd.ms-execl");
	header("Content-Type: application/force-download");
	header("Content-Type: application/download");
    header("Content-Disposition: attachment; filename=".$filename);
    header("Content-Transfer-Encoding: binary");
    header("Pragma: no-cache");
    header("Expires: 0");

    echo $content;
}
?>
