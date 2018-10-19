<?php
echo "teste";
	$keyword = strval($_POST['query']);
	$search_param = "{$keyword}%";
	$conn =new mysqli('localhost', 'root', 'admin' , 'sistema_uneb');

	$sql = $conn->prepare("SELECT * FROM itens WHERE nome LIKE '%".$keyword."%' ");
	$sql->bind_param("s",$search_param);			
	$sql->execute();
	$result = $sql->get_result();
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		$countryResult[] = $row["nome"];
		}
		echo json_encode($countryResult);
	}
	$conn->close();
?>

