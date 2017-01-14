<?PHP
session_start();
//Dat gia tri cho duong dan khoi dong Web admin
define( '_AK_MOS_', 1 );
//Kiem tra dang nhap
include("./includes/session_check.php");
//Kiem tra Language
require("./includes/lang_check.php");
//Ket noi database-------------------------------------------
require("../includes/_conn.php");

		$filename = 'QuanLySanPham_Web_'.date("h-i-s_d-m-y");   //File Name
		//header info for browser
		header("Cache-Control: public"); 
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
		header("Content-Disposition: attachment; filename=$filename.xls");  
		header("Pragma: no-cache"); 
		header("Expires: 0");
		echo stripslashes(sprintf("<?xml version=\"1.0\" encoding=\"%s\"?\>\n<Workbook xmlns=\"urn:schemas-microsoft-com:office:spreadsheet\" xmlns:x=\"urn:schemas-microsoft-com:office:excel\" xmlns:ss=\"urn:schemas-microsoft-com:office:spreadsheet\" xmlns:html=\"http://www.w3.org/TR/REC-html40\">","UTF-8"));
		echo "\n<Worksheet ss:Name=\"San phẩm\">\n<Table>\n";
		/*******Start of Formatting for Excel*******/   
		//define separator (defines columns in excel & tabs in word)
		$sep = "\t"; //tabbed character
		//start of printing column names as names of MySQL fields
		if($result = $db->get_results("SELECT A.`sanpham_id`,B.`loaisanpham_title`,A.`sanpham_title`,A.`sanpham_price`,A.`sanpham_priceold`,A.`sanpham_images`,A.`sanpham_note`,A.`sanpham_content` FROM `".$tbfix."sanpham` AS A, `".$tbfix."loaisanpham` AS B WHERE A.`loaisanpham_id`=B.`loaisanpham_id` ORDER BY A.`sanpham_id`"))
		{
			echo 'Mã sản phẩm '.$sep.' Loại sản phẩm '.$sep.' Tên sản phâm '.$sep.' Giá bán sản phẩm '.$sep.' Giá cũ sản phẩm '.$sep.' Hình ảnh '.$sep.' Mô tả nhanh '.$sep.' Mô tả chi tiết '.$sep.'';
			print("\n");    
	//end of printing column names  
	//start while loop to get data
				echo "<Row>\n";
					echo "<Cell><Data ss:Type=\"String\">STT</Data></Cell>\n";
					echo "<Cell><Data ss:Type=\"String\">Loại sản phẩm</Data></Cell>\n";
					echo "<Cell><Data ss:Type=\"String\">Tên sản phẩm</Data></Cell>\n";
					echo "<Cell><Data ss:Type=\"String\">Giá bán sản phẩm</Data></Cell>\n";
					echo "<Cell><Data ss:Type=\"String\">Giá cũ sản phẩm</Data></Cell>\n";
					echo "<Cell><Data ss:Type=\"String\">Hình ảnh</Data></Cell>\n";
					echo "<Cell><Data ss:Type=\"String\">Mô tả nhanh</Data></Cell>\n";
					echo "<Cell><Data ss:Type=\"String\">Mô tả chi tiết</Data></Cell>\n";
				echo "</Row>\n";
				$i = 0;
			foreach($result as $result){
				$i = $i+1;
				echo "<Row>\n";
					//ID
					echo "<Cell><Data ss:Type=\"Number\">".$i."</Data></Cell>\n";
					//LOẠI SẢN PHẨM
					if(!isset($result->loaisanpham_title)){echo "<Cell><Data ss:Type=\"String\">NULL</Data></Cell>\n";}
					else if($result->loaisanpham_title!=""){echo "<Cell><Data ss:Type=\"String\">".htmlspecialchars_decode($result->loaisanpham_title)."</Data></Cell>\n";}
					else{echo "<Cell><Data ss:Type=\"String\"></Data></Cell>\n";}
					//TEN SẢN PHẨM
					if(!isset($result->sanpham_title)){echo "<Cell><Data ss:Type=\"String\">NULL</Data></Cell>\n";}
					else if($result->sanpham_title!=""){echo "<Cell><Data ss:Type=\"String\">".htmlspecialchars_decode($result->sanpham_title)."</Data></Cell>\n";}
					else{echo "<Cell><Data ss:Type=\"String\"></Data></Cell>\n";}
					//GIA SẢN PHẨM
					if(!isset($result->sanpham_price)){echo "<Cell><Data ss:Type=\"String\">NULL</Data></Cell>\n";}
					else if($result->sanpham_price!=""){echo "<Cell><Data ss:Type=\"String\">".htmlspecialchars_decode($result->sanpham_price)."</Data></Cell>\n";}
					else{echo "<Cell><Data ss:Type=\"String\"></Data></Cell>\n";}
					//GIA SẢN PHẨM
					if(!isset($result->sanpham_priceold)){echo "<Cell><Data ss:Type=\"String\">NULL</Data></Cell>\n";}
					else if($result->sanpham_priceold!=""){echo "<Cell><Data ss:Type=\"String\">".htmlspecialchars_decode($result->sanpham_priceold)."</Data></Cell>\n";}
					else{echo "<Cell><Data ss:Type=\"String\"></Data></Cell>\n";}
					//IMAGE SẢN PHẨM
					if(!isset($result->sanpham_images)){echo "<Cell><Data ss:Type=\"String\">NULL</Data></Cell>\n";}
					else if($result->sanpham_images!=""){echo "<Cell><Data ss:Type=\"String\">".htmlspecialchars_decode($result->sanpham_images)."</Data></Cell>\n";}
					else{echo "<Cell><Data ss:Type=\"String\"></Data></Cell>\n";}
					//NOTE SẢN PHẨM
					if(!isset($result->sanpham_note)){echo "<Cell><Data ss:Type=\"String\">NULL</Data></Cell>\n";}
					else if($result->sanpham_note!=""){echo "<Cell><Data ss:Type=\"String\">".htmlspecialchars_decode($result->sanpham_note)."</Data></Cell>\n";}
					else{echo "<Cell><Data ss:Type=\"String\"></Data></Cell>\n";}
					//CONTENT SẢN PHẨM
					if(!isset($result->sanpham_content)){echo "<Cell><Data ss:Type=\"String\">NULL</Data></Cell>\n";}
					else if($result->sanpham_content!=""){echo "<Cell><Data ss:Type=\"String\">".htmlspecialchars_decode($result->sanpham_content)."</Data></Cell>\n";}
					else{echo "<Cell><Data ss:Type=\"String\"></Data></Cell>\n";}
				echo "</Row>\n";
			}   
		}
		echo "</Table>\n</Worksheet>\n";
		echo '</Workbook>';
?>
