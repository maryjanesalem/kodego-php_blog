<?php
function dbConnect() {
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'blogs');

    // define('DB_SERVER', 'localhost:3306');
    // define('DB_USERNAME', 'root');
    // define('DB_PASSWORD', '5?d=?xqx{g~@xPX[');
    // define('DB_NAME', 'id20297617_blogs');

    // $dbserver = "localhost";
    // $dbusername = "id20297617_root";
    // $dbpwd = "5?d=?xqx{g~@xPX[";
    // $dbname = "id20297617_blogs";
    
    $connect = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    // $connect = mysqli_connect($dbserver, $dbusername, $dbpwd, $dbname);
    
    if ($connect === false) {
        echo "Cannot Connect to the database";
    }
    else{
        return $connect;
    }
}
?>