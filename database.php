<?php

define("SERVERNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "root");
define("DBNAME", "test");

function getDBConnection() {
    try {
        $conn = new PDO("mysql:host=" . SERVERNAME .";dbname=" . DBNAME, USERNAME, PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }
}

function test() {
    $conn = getDBConnection();

    $stmt = $conn->prepare("SELECT * FROM files");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    var_dump($stmt->fetchAll());
}