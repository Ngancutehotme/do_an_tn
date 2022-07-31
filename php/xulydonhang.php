<?php
	session_start();
	require ("../BackEnd/ConnectionDB/DB_driver.php");

	$db = new DB_driver();
	$db->connect();
    if(!isset($_POST['request']) && !isset($_GET['request'])) die(null);

    switch ($_POST['request']) {
    	case 'getall':
				$sql ="SELECT hd.*, sp.TenSP FROM `hoadon` AS hd
				LEFT JOIN chitiethoadon AS cthd ON cthd.MaHD = hd.MaHD
				LEFT JOIN sanpham AS sp ON sp.MaSP = cthd.MaSP";
				$donhang = $db->get_list($sql);
		    	die (json_encode($donhang));
    		break;

		default:
	    		# code...
	    		break;
    }
?>