<?php
	if($_REQUEST["key"]==hash('sha256', 'Jasper')){
		$DBH = new PDO("mysql:host=rdbms.strato.de;dbname=DB3416198", "U3416198", "alabama1");
		$sql="SELECT id, gekackt, timestamp FROM jasperkh ORDER BY timestamp DESC";
		$stmt=$DBH->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_OBJ);
		$stmt->execute();
		$result=$stmt->fetchAll();
		echo json_encode($result);
	} else {
		echo "Falscher Key";
	}
?>