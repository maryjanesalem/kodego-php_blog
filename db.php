<?php
function dbConnect() {
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'blogs');

    $connect = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    
    if ($connect === false) {
        echo "Cannot Connect to the database";
    }
    else{
        return $connect;
    }
}
?>