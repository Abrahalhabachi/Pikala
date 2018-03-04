<?php 

function logIn(&$error)
{
    $pdo = $GLOBALS['pdo'];

    $email = $_POST['validationName'] ?? '';
    $password = $_POST['validationPassword'] ?? '';

    $sql = 'SELECT * FROM users WHERE email = :email && password = :password';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $email, 'password' => $password]);
    $result = $stmt->fetch();
    if ($result != '')
    {
        $user = new User($result['first_name'], $result['last_name'], $result['email'], $result['password'],
        $result['street'], $result['house_number'], $result['city'], $result['zip_code'], $result['user_id']);

        //$address = $result['street'] .' '. $result['house_number'].' '. $result['city'];
        //$userData = array($result['user_id'], $result['email'], $result['first_name'], $result['last_name'], $address);
        $error = false;
        return $user;
    } 
    else
    {
        $error = 'Email/Password Combination False';
        return true;
    }
    
}
?>