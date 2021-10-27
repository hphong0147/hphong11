<?php
	$link=@mysqli_connect("localhost", "root", "") or die ("Kết nối đến Server thất bại!");
	       mysqli_select_db($link,"banhang") or die ("Csdl không tồn tại!");
	
		//Thiet lap bang ma:
		mysqli_query($link,"set names 'UTF8'");
?>