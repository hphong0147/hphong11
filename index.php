<?php
	session_start();
	ob_start();
	if(!isset($_SESSION['idNguoiDung'])) header("location:login.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dashboard - Admin Template</title>
<link rel="stylesheet" type="text/css" href="css/theme1.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script>
   var StyleFile = "theme" + document.cookie.charAt(6) + ".css";
   document.writeln('<link rel="stylesheet" type="text/css" href="css/' + StyleFile + '">');
</script>
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="css/ie-sucks.css" />
<![endif]-->

</head>
<?php
	include("connect.php");
	if(isset($_GET['key'])) $key=$_GET['key'];
	else $key="";
?>
<body>
	<div id="container">
    
    <!--menu-->
    <div id="header">
        	<h2>SHOP CÔNG NGHỆ</h2>
    <div id="topmenu">
            	<ul>
                	<li <?php if($key=="") echo 'class="current"'; ?>><a href="index.php">TRANG CHỦ</a></li>
                    <li <?php if($key=="tl"||$key=="tlt"||$key=="tls") echo 'class="current"'; ?>><a href="index.php?key=tl">QUẢN LÝ DANH MỤC</a></li>
                    <li <?php if($key=="lt"||$key=="ltt"||$key=="lts") echo 'class="current"'; ?>><a href="index.php?key=lt">CÁC LOẠI DANH MỤC VÀ SẢN PHẨM</a></li>
                    <li <?php if($key=="sp"||$key=="spt"||$key=="sps") echo 'class="current"'; ?>><a href="index.php?key=sp">QUẢN LÝ CHI TIẾT SẢN PHẨM</a></li>
				  

              </ul>
    </div>
</div>
    <!--//menu-->
	
        <div id="wrapper">
            <div id="content">
			<?php 
			  switch($key)
			  {
				  case "tl": include("theloai.php"); break;
				  case "lt": include("loaisp.php"); break;
				  case "sp": include("sp.php"); break;
				  
				  case "tlt": include("theloai_them.php"); break;
				  case "tls": include("theloai_sua.php"); break;
				  case "ltt": include("loaisp_them.php"); break;
				  case "lts": include("loaisp_sua.php"); break;
				  case "spt": include("sp_them.php"); break;
				  case "sps": include("sp_sua.php"); break;
				  
				  default:include("main.php");
			  }
			?>
          </div>
        </div>
     
	 <!--footer-->
     <div id="footer">	
        
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
