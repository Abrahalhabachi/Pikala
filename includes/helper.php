<?php if(isset($_POST['pwd'])&&isset($_POST['pwd2'])&&($_POST['pwd2']!==$_POST['pwd']))
$error="The passwords don't match"?>


<?php

require_once './includes/functions.php';
const _PATH = './includes/usersDB.txt';


/* BEGIN: sending data after button click*/
if(isset($_POST['sendForm']))
{   
    
    $uname = htmlspecialchars($_POST['uname']);
    $pwd = htmlspecialchars($_POST['pwd']);
    $pwd2 = htmlspecialchars($_POST['pwd2']);
    $email = htmlspecialchars($_POST['email']);
    /*if(isset($_POST['prozent']))
    {
        $in_percent=1;
    }
    else $in_percent=0;*/

    $check= ['#', '>', '<', '^', '*', '%', '$', '&'];

    /*checks if the input data is free from special characters*/
    if(validateInput($uname, $check)&&validateInput($email,$check)&&validateInput($pwd,$check)&&validateInput($pwd2,$check))
    
    {   /*checks if the passwords match*/
        if($pwd === $pwd2)
        {   
            
            /*write the data in the file*/
            $data = $uname .'#'. $email .'#'. $pwd;
        
            $file = fopen(_PATH, 'a+');
            fwrite($file, $data.PHP_EOL);
            fclose($file);
        }

        /*throws error if the grade is greater than 5 and not in percent*/
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
/* END: sending data after button click*/

/* BEGIN: reading data from file*/
$content = [];
$keys = ['uname', 'email', 'pwd'];

$file=fopen(_PATH, 'r');
while($line = fgets($file))
{
    $content[]= array_combine($keys, explode('#',$line));
}

fclose($file);

usort($content, 'sortByName');

/* END: reading data from file*/
?>