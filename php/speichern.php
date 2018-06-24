<?php
	if($_REQUEST["key"]==hash('sha256', 'Jasper')){
		$DBH = new PDO("mysql:host=rdbms.strato.de;dbname=DB3416198", "U3416198", "alabama1");
		$sql="SELECT id, gekackt, timestamp FROM jasperkh ORDER BY timestamp DESC";
		$sql="INSERT INTO jasperkh (gekackt) VALUES (:gekackt)";
		$stmt=$DBH->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_OBJ);
		$stmt->bindParam(":gekackt", $_REQUEST["gekackt"], PDO::PARAM_INT);
		if($stmt->execute()){
			$sql1="SELECT id, gekackt, timestamp FROM jasperkh ORDER BY timestamp DESC";
			$stmt1=$DBH->prepare($sql1);
			$stmt1->setFetchMode(PDO::FETCH_OBJ);
			$stmt1->execute();
			$result=$stmt1->fetchAll();
			echo json_encode($result);
		}
	} else {
		echo "Falscher Key";
	}
?>