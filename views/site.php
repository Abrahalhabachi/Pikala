<header>
<nav>
    <ul class="left_side">
        <li><a href="<?=$_SERVER['PHP_SELF']?>?p=home">Home</a></li>
        <li><a href="<?=$_SERVER['PHP_SELF']?>?p=share">Share your Bike</a></li>
    </ul>
    
    <div class="right_side">
        <ul>
            <li><a href="<?=$_SERVER['PHP_SELF']?>?p=user">Account</a></li>
        </ul>
        <form action="<?=$_SERVER['PHP_SELF'].'?p=home';?>" method="post">
            <input type="submit" name="submitLogout" value="logout">
        </form>
    </div>
</nav>
</header>

<main>

<?php
switch($page)
{
case 'about':
    include (VIEWPATH.'pages/about.php');
    break;

case 'contact':
    include (VIEWPATH.'pages/contact.php');
    break;

case 'events':
    include (VIEWPATH.'pages/events.php');
    break;

case 'home':
    include (VIEWPATH.'home.php');
    break;

case 'privacy':
    include (VIEWPATH.'pages/privacy.php');
    break;

case 'result':
    include (VIEWPATH.'result.php');
    break;

case 'share':
    include (VIEWPATH.'pages/share.php');
    break;

case 'sitemap':
    include (VIEWPATH.'pages/sitemap.php');
    break;

case 'support':
    include (VIEWPATH.'pages/support.php');
    break;

case 'user':
    include (VIEWPATH.'pages/user.php');
    break;

default:
    include (VIEWPATH.'home.php');
    break;
}


?>

</main>

<footer>

</footer>