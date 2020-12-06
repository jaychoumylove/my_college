<?
	class quitController{
		function quitAction(){
			//session_start();
			unset($_SESSION["name"]);
			unset($_SESSION["powerLv"]);
			exit("<script>alert('退出成功！');window.location.href='index.php'</script>");
		}
	}
?>