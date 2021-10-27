<?php
session_start();
ob_start();
include("connect.php");
date_default_timezone_set("Asia/Ho_Chi_Minh"); //Thiet lap lai mui gio

//Xu ly them 1 the loai moi:
if(isset($_POST['themtl']))
{
	$sl="insert into nn_chungloai values(NULL, '{$_POST['TenCL']}', '{$_POST['ThuTu']}',{$_POST['AnHien']})";
	if(mysqli_query($link,$sl))
		header("location:index.php?key=tl"); //ham chuyen trang
	else
		echo $sl;
}

//Xu ly xoa 1 the loai:
if(isset($_GET['xoatl']))
{
	$sl="delete from nn_chungloai where idCL=".$_GET['xoatl'];
	if(mysqli_query($link,$sl))
	 	header("location:index.php?key=tl");
	else echo $sl;
}

//Xu ly cap nhat 1 the loai:
if(isset($_POST['suatl']))
{
	$sl="update nn_chungloai set TenCL='{$_POST['TenCL']}', ThuTu={$_POST['ThuTu']}, AnHien={$_POST['AnHien']} where idCL={$_POST['idCL']}";
	if(mysqli_query($link,$sl))
		header("location:index.php?key=tl"); //ham chuyen trang
	else
		echo $sl;
}

//Xu ly them 1 loai san pham moi:
if(isset($_POST['themlt']))
{
	$sl="insert into nn_loaisp values(NULL, '{$_POST['idCL']}', '{$_POST['TenLoai']}', {$_POST['ThuTu']}, {$_POST['AnHien']})";
	$idCL=$_POST['idCL'];
	if(mysqli_query($link,$sl))
		header("location:index.php?key=lt&idCL=$idCL");
	else
		echo $sl;
}

//Xu ly xoa 1 loai sp:
if(isset($_GET['xoalt']))
{
	$sl="delete from nn_loaisp where idLoai=".$_GET['xoalt'];
	$idCL=$_GET['idCL'];
	if(mysqli_query($link,$sl))
	 	header("location:index.php?key=lt&idCL=$idCL");
	else echo $sl;
}

//Xu ly cap nhat 1 loai sp:
if(isset($_POST['sualt']))
{
	$idLoai=$_POST['idLoai'];
	$sl="update nn_loaisp set TenLoai='{$_POST['TenLoai']}', ThuTu={$_POST['ThuTu']}, AnHien={$_POST['AnHien']} where idLoai=$idLoai";
	$idCL=$_POST['idCL'];
	if(mysqli_query($link,$sl))
		header("location:index.php?key=lt&idCL=$idCL");
	else
		echo $sl;
}

//Xoa san pham:
if(isset($_GET['xoasp']))
{
	$sl="delete from nn_sanpham where idSP=".$_GET['xoasp'];
	$idCL=$_GET['idCL'];
	$idLoai=$_GET['idLoai'];
	if(mysqli_query($link,$sl)) 
		header("location:index.php?key=sp&idCL=$idCL&idLoai=$idLoai");
			else {echo $sl;}
}

// Them san pham:
if(isset($_POST['themsp']))
{
	if(isset($_FILES['ufile']))
	{
		//Thiet lap duong link de up file vao - cu the hon la de cho ham move_uploaded_file thuc hien:
		$target="../upload/sanpham/";
		$tenfile=basename($_FILES['ufile']['name']);
		$target.=$tenfile;
		
		//Thiet lap duong link de dua vao csdl:
		$urlhinh=$tenfile;
		
		//Lay thoi gian hien tai va dinh dang theo cu phap tren csdl:
		$ngay=date("Y-m-d h:i:s",time());
		
		$idCL=$_POST['idCL'];
		$idLoai=$_POST['idLoai'];
		if(move_uploaded_file($_FILES['ufile']['tmp_name'],$target))
		{
			//Neu up file thanh cong thi tien hanh insert du lieu vao bang:
			$sl="insert into nn_sanpham values(NULL, '{$_POST['idLoai']}', '{$_POST['TenSP']}', '{$_POST['Gia']}', '{$_POST['MoTa']}', NULL,'$urlhinh', '$ngay', 100, NULL, 0, 0, {$_POST['AnHien']})";
			if(mysqli_query($link,$sl)) header("location: index.php?key=sp&idCL=$idCL&idLoai=$idLoai");
			else {echo $sl;unlink($target);}
		}
		else echo "Upfile that bai!";
	}
}

// Xu ly Sua San Pham:
if(isset($_POST['suasp']))
{
	if(isset($_FILES['ufile'])&&$_FILES['ufile']['name']!="")
	{
		//Co chon file anh moi
		
		$target="../upload/sanpham/";
		$tenfile=basename($_FILES['ufile']['name']);
		$target.=$tenfile;
		$urlhinh="".$tenfile;
		
		if(move_uploaded_file($_FILES['ufile']['tmp_name'],$target))
		{
			$sl="update nn_sanpham set TenSP='{$_POST['TenSP']}', Gia='{$_POST['Gia']}', MoTa='{$_POST['MoTa']}', UrlHinh='$urlhinh', idLoai={$_POST['idLoai']}, AnHien={$_POST['AnHien']} where idSP={$_POST['idSP']}";
			//Neu muon loai bo hinh cu (vi da cap nhat hinh moi) thi thuc hien thao tac:
			//Select urlHinh from tin where idTin={$_POST['idTin']}: de lay urlHinh cua hinh cu va cung cap cho ham unlink de xoa hinh
			
			if(mysqli_query($link,$sl)) 
			{
				//unlink urlHinh cu duoc lay tu tren
				header("location:index.php?key=sp&idCL=".$_POST['idCL']."&idLoai=".$_POST['idLoai']);
			}
			else {echo $sl;unlink($target);}
		}
		else echo "Upfile that bai";
		
	}
	else
	{
		//Khong chon file anh moi
		
		$sl="update nn_sanpham set TenSP='{$_POST['TenSP']}', Gia='{$_POST['Gia']}', MoTa='{$_POST['MoTa']}', idLoai={$_POST['idLoai']}, AnHien={$_POST['AnHien']} where idSP={$_POST['idSP']}";
			if(mysqli_query($link,$sl)) header("location:index.php?key=sp&idCL=".$_POST['idCL']."&idLoai=".$_POST['idLoai']);
			else {echo $sl;}
		
	}
}
//Login
if(isset($_POST['login']))
{
	$email=$_POST['email'];
	$pass=($_POST['password']);
	
	if ($email == "" || $pass =="") {
				{echo '<script language="javascript">';
			   echo 'alert("BẠn Đã Nhập Sai Tài Khoản!!!!")';			 
				echo '</script>'; }  
		}else{
			$sql = "select * from nn_quantri where Email='$email' and MatKhau='$pass'";
			$query = mysqli_query($link,$sql);
			$num_rows = mysqli_num_rows($query);
			if ($num_rows==0) {
				
				  header("location:login.php?po=ki");
			}else{
				$sl="select * from nn_quantri where Email='$email' and MatKhau='$pass'";
	$kq=mysqli_query($link,$sl);
	if(mysqli_num_rows($kq))
	{
		$d=mysqli_fetch_array($kq);
		$_SESSION['HoTen']=$d['HoTen'];
		$_SESSION['idNguoiDung']=$d['idNguoiDung'];
		
		if(isset($_POST['quenmk']))
		{
			setcookie("ht",$_SESSION['HoTen'], time()+60*60*24*7);
			setcookie("id",$_SESSION['idNguoiDung'], time()+60*60*24*7);
		}
		
		header("location:index.php");
	} else header("location:login.php");
				//tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
				$_SESSION['username'] = $username;
                // Thực thi hành động sau khi lưu thông tin vào session
                // ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
                header("Location: index.php");
			      }
		
		
	}


	
	
}
//Thoat dang nhap
if(isset($_POST['thoat']))
{
	unset($_SESSION['HoTen']);
	unset($_SESSION['idNguoiDung']);
	
	if(isset($_COOKIE['ht']))
	{
		setcookie("ht","",time()-1);
		setcookie("id","",time()-1);
	}
	
	header("location:login.php");
}


?>



