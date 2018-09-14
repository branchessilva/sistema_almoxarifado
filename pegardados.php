<?php
if(isset($_POST["campo"])) {
    echo "Os campos que você adicionou são:<br><br>";
    
    // Faz loop pelo array dos campos:
    foreach($_POST["campo"] as $campo) {
        echo $campo."<br>";
    }
}else{
	echo "Você não adicionou dados em nenhum campo!";
}
?>