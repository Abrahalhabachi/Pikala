<?php
    $dbname = 'pikala';
    $dsn = 'mysql:dbname='.$dbname.';host=localhost';
    $user = 'root';
    $pw = 'zbi';
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];

    $pdo=null;

    try
    {
        $pdo = new PDO($dsn, $user, $pw, $options);
    }

    catch (PDOException $e)
    {
        die('Database Connection Failed: ' . $e->getMessage() );
    }

?>