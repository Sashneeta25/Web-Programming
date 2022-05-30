<?php

header("Content-Type: application/json;Charset=UTF-8");
require 'database.php';

$Json = array();
if (isset($_GET['search'])) {
	
	$field = ['fld_product_product_Type', 'fld_product_material' , 'fld_product_style'];
	$search = htmlspecialchars($_GET['search']);
	$data = explode(" ", $search);

	$type = (isset($data[0]) ? $data[0] : '');
	$material = (isset($data[1]) ? $data[1] : '');
	$style = (isset($data[2]) ? $data[2] : '');

	try {
		
		$queries = array();
		foreach($data as $dat){
			$queries[] = "SELECT * FROM `tbl_products_a174559_pt2` WHERE {$field[0]} LIKE '%{$dat}%' OR {$field[1]} LIKE '%{$dat}%' OR {$field[2]} LIKE '%{$dat}%'";
		}
		$sql = implode(' UNION ',$queries);//kalo nk tukr ni jadi INTERSECT untuk dapat refined search
		$stmt = $conn->prepare($sql);


		//penting for both cara
		$stmt->execute();
		$res = $stmt->fetchAll(PDO::FETCH_ASSOC);

		$Json = array('status' => 200, 'data' => $res);
	} catch (PDOException $e) {
		$Json = array('status' => 400, 'data' => $e->getMessage());
	}

}

if (isset($Json))
	echo json_encode($Json);