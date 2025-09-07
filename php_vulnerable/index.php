<?php
$servername = 'db';
$username = 'root';
$password = 'rootpassword';
$dbname = 'testdb';

$conn = new mysqli( $servername, $username, $password, $dbname );
if ( $conn->connect_error ) {
    die( 'Connection failed: ' . $conn->connect_error );
}

if ( isset( $_GET[ 'user' ] ) ) {
    $user = $_GET[ 'user' ];
    
    $sql = "SELECT * FROM users WHERE username = '$user'";
    $result = $conn->query( $sql );
    if ( $result->num_rows > 0 ) {
        while( $row = $result->fetch_assoc() ) {
            echo 'ID: ' . $row[ 'id' ] . ' - Username: ' . $row[ 'username' ] . '<br>';
        }
    } else {
        echo 'No user found.';
    }
}
?>
<style>
body {
    font-family: Arial, sans-serif;
    background: #f4f4f4;
    padding: 40px;
}

.container {
    background: #fff;
    padding: 28px 24px;
    border-radius: 10px;
    box-shadow: 0 2px 12px rgba( 0, 0, 0, 0.08 );
    max-width: 400px;
    margin: 60px auto;
    text-align: center;
}

h2 {
    color: #007bff;
    margin-bottom: 18px;
}

p.info {
    color: #555;
    margin-bottom: 22px;
    font-size: 15px;
}

input[ type = 'text' ] {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    width: 100%;
    margin-bottom: 14px;
}

input[ type = 'submit' ] {
    background: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 10px;
    font-size: 16px;
    cursor: pointer;
    width: 100%;
    transition: background 0.2s;
}

input[ type = 'submit' ]:hover {
    background: #0056b3;
}
</style>
<div class = 'container'>
<h2>Buscar usuario en la base de datos</h2>
<p class = 'info'>Formulario vulnerable a <b>SQL Injection</b>. Ingresa un nombre de usuario para buscarlo en
la base de datos.<br>Ejemplo: <code>admin</code> o prueba con <code>' OR '1'='1</code></p>
<form method = 'get'>
<input type = 'text' name = 'user' placeholder = 'Username'>
<input type = 'submit' value = 'Buscar'>
</form>
</div>