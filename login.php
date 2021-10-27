<?php
	session_start();
	ob_start();
	if(isset($_GET['po']))
{
   echo '<script language="javascript">';
   echo 'alert("BẠn Đã Nhập Sai Tài Khoản!!!!")';			 
	echo '</script>';               
}
	if(isset($_COOKIE['ht']))
	{
		$_SESSION['idNguoiDung']=$_COOKIE['id'];
		$_SESSION['HoTen']=$_COOKIE['ht'];
		
		//Gia han cookie:
		setcookie("ht",$_SESSION['HoTen'],time()+60*60*24*7);
		setcookie("id",$_SESSION['idNguoiDung'], time()+60*60*24*7);
	}
	
	if(isset($_SESSION['idNguoiDung'])) header("location:index.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bài Test ap</title>
<link rel="stylesheet" type="text/css" href="css/theme1.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script>
   var StyleFile = "theme" + document.cookie.charAt(6) + ".css";
   document.writeln('<link rel="stylesheet" type="text/css" href="css/' + StyleFile + '">');
</script>
<style>
*{ margin:auto}
#main{ width:800px; height:200px}
#form1{ background-color:#9FC}
</style>
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="css/ie-sucks.css" />
<![endif]-->

</head>

<body>
<div id="container">
    
    <!--menu-->
    <div id="header">
        	<h2 >TRANG QUẢN TRỊ  </h2>
    <div id="topmenu">
    
    
            	
    </div>
</div>
    <!--//menu-->
	
        <div id="wrapper">
            <div id="content">
                
              
          </div>
        </div>
	 <!--footer-->
     <div id="footer">	
        <div id="main">


	<form method="POST" action="process.php" id="form1">
	<fieldset>
	    <legend style="color:#F00; font-weight:bold; font-size:large;">Đăng nhập</legend>
	    	<table style="margin-left:150px; border:hidden;" border="-10px">
	    		<tr>
	    			<td style=" font-size:17px">Username</td>
	    			<td><input type="text" name="email" size="30" id="email"></td>
	    		</tr>
	    		<tr>
	    			<td style="font-size:17px">Password</td>
	    			<td><input type="password" name="password" size="30" id="password"></td>
                    
                  
	    		</tr>
                <tr>
                
                 <td><input type="checkbox" name="quenmk" id="quenmk"><label for="quenmk">Remember </label></td>
                </tr>
	    		</table>
	    			<input style=" margin-left:300px" name="login"  type="submit" value="Đăng Nhập">
                    <input style=" margin-left:0px" name="btn_submit"  type="submit" value="Đăng Ký"><br />
                    <a href="#" style="margin-left:320px; padding-top:10px; font-size:12px; font-weight:bold">Quên Mật Khẩu</a>
	    		
	    	
  </fieldset>
  </form>
 </div>
        <div id="credits">
   		Thiết kế bởi phong9xok@gmail.com</a>
        </div>
        <div id="styleswitcher">
            <ul>
                <li><a href="javascript: document.cookie='theme='; window.location.reload();" title="Default" id="defswitch">d</a></li>
                <li><a href="javascript: document.cookie='theme=1'; window.location.reload();" title="Blue" id="blueswitch">b</a></li>
                <li><a href="javascript: document.cookie='theme=2'; window.location.reload();" title="Green" id="greenswitch">g</a></li>
                <li><a href="javascript: document.cookie='theme=3'; window.location.reload();" title="Brown" id="brownswitch">b</a></li>
                <li><a href="javascript: document.cookie='theme=4'; window.location.reload();" title="Mix" id="mixswitch">m</a></li>
            </ul>
        </div><br />

 </div>
     <!--//footer-->
</div>
</body>
</html>