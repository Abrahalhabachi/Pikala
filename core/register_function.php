<?php 

include_once 'functions.php';

function register(&$error){
    
    
    $email = htmlspecialchars($_POST['email']);
    $fname = htmlspecialchars($_POST['fname']);
    $lname = htmlspecialchars($_POST['lname']);
    $pwd = ($_POST['pwd']);
    $pwd2 = ($_POST['pwd2']);
    $street = htmlspecialchars($_POST['street']);
    $house_n = htmlspecialchars($_POST['house_n']);
    $city = htmlspecialchars($_POST['city']);
    $zip_code = htmlspecialchars($_POST['zip_code']);
    
    $check= ['#', '>', '<', '^', '*', '%', '$', '&', '/'];

    $user = new user($fname, $lname, $email, $pwd, $street, $house_n, $city, $zip_code);

    /*checks if the input data is free from special characters*/
    if(validateInput($email,$check)&&validateInput($fname,$check)&&validateInput($lname,$check))    
    {   /*checks if the passwords match*/
        if($pwd === $pwd2)
        {   

            if ($user->find() != '')
            {
                $error = 'Email already registered';
            } 
            else
            {
                $error = false;
                $user->save();
            }
        
            return false;
        }

        else $error = "The passwords don't match";
    }
    else
    {   
        /*throws an error if special characters have been used*/
        $error = 'Ihre eingaben dürfen keine der folgenden Sonderzeichen beinhaleten:<br>';
        foreach($check as $checkvalue)
        {
            $error .= ',' . $checkvalue . ' ';
        }
    }
}


// function register($email, $fname, $lname, $pwd, $street, $house_n, $city, $zip_code)
// {
//     $pdo = $GLOBALS['pdo'];

//     $sql = 'INSERT INTO `users` (first_name, last_name, email, password, street, house_number, city, zip_code)
//     VALUES (:first_name, :last_name, :email, :password, :street, :house_number, :city, :zip_code)';
//     $stmt = $pdo->prepare($sql);

//     try
//     {
//         $stmt->execute(['first_name' => $fname, 'last_name' => $lname, 'email' => $email,'password' => $pwd,
//             'street' => $street, 'house_number' => $house_n, 'city' => $city, 'zip_code' => $zip_code]);
//     }
//     catch (PDOException $e)
//     {
//         die('Cant Write to DATABASE' . $e->getMessage() );
//     }
// }
    
?>