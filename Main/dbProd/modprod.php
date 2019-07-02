<?php
$servername = "localhost";
$username = "FrankHesse";
$password = "proveneet";
$dbname = "proveneet";

$conn = new mysqli($servername, $username, $password, $dbname);

$name = $_POST['name'];
$code = $_POST['nextcode'];
$oldcode = $_POST['code'];
$price = $_POST['price'];
$cat = $_POST['cat'];
$provider = $_POST['provider'];

if ($code == $oldcode){
	$sql = "UPDATE products SET Nombre = '$name', Codigo = '$oldcode', Precio = '$price',
Categoria = '$cat', Proveedor = '$provider' WHERE Codigo = '$oldcode'"; 

if ($conn->query($sql) === TRUE) {
    echo "Producto modificado exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

else{

$sql = "UPDATE products SET Nombre = '$name', Codigo = '$code', Precio = '$price',
Categoria = '$cat', Proveedor = '$provider' WHERE Codigo = '$oldcode'"; 

if ($conn->query($sql) === TRUE) {
    echo "Producto modificado exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

mysqli_close($conn);
?>