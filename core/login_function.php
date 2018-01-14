<?php 


function logIn(&$error)
{
    $pdo = $GLOBALS['pdo'];

    $email = $_POST['validationName'] ?? '';
    $password = $_POST['validationPassword'] ?? '';

    $sql = 'SELECT * FROM customers WHERE email = :email && password = :password';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $email, 'password' => $password]);
    $result = $stmt->fetch();
    if ($result != '')
    {
        $userId = $result['user_id'];
        $error = false;
        return $userId;
    } 
    else
    {
        $error = 'Email/Password Combination False';
    }

    return false;
}

?>