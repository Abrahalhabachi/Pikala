<?php

session_start();
require_once './core/path_config.php';
require_once './core/db_config.php'; 
require_once './core/register_function.php';
require_once './core/login_function.php';
require_once './core/logout_function.php';


if (isset($_POST['submitLogin']))
{
    $error=true;
    $user = logIn($error);
    if(!$error)
    {
        $_SESSION['user'] = $user;

    }
}

if (isset($_POST['submitRegister']))
{
    $error=true;
    $user = pre_register($error);
    // if(!$error)
    // {
    //     $_SESSION['user'] = $user;

    // }
}

$loggedIn = isset($_SESSION['user']);
$title = $_GET['p'] ?? 'home';

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styles/style.css">
    <title><?=$title?></title>
</head>
<body>



<?php

$page = $_GET['p'] ?? 'home';
if($loggedIn)
{
    include (VIEWPATH.'site.php');
}
else
{
    switch($page)
    {
        case 'page1':
        include (VIEWPATH.'header.php');
        include (VIEWPATH.'pages/page1.php');
        break;
    
        case 'page2':
        include (VIEWPATH.'header.php');
        include (VIEWPATH.'pages/page2.php');
        break;
    
        case 'register':
        include (VIEWPATH.'header.php');
        include (VIEWPATH.'register.php');
        break;
        
        case 'login':
        include (VIEWPATH.'header.php');
        include (VIEWPATH.'login.php');
        break;

        case 'result':
        include (VIEWPATH.'header.php');
        include (VIEWPATH.'result.php');
        break;

        case 'home':
        include (VIEWPATH.'header.php');
        include (VIEWPATH.'home.php');
        break;
    
        default:
        include (VIEWPATH.'header.php');
        include (VIEWPATH.'home.php');
        break;
            
    }
}
?>


<?php if(isset($error) && $error !== false) : ?>
            <div class="error">
                <span onclick="{this.parentNode.parentNode.removeChild(this.parentNode);}">
                    x
                </span>
                <?=$error?>
            </div>
        <?php endif; ?>

</main>
    
<footer>
    <?php
    include (VIEWPATH.'footer.php');
    ?>
</footer>

</body>
</html>