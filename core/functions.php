<?php 

function sortByName($left, $right)
{
    return strcasecmp($left['uname'], $right['uname']);
}


function validateInput($str, $check)
{
    foreach($check as $checkvalue)
    {
            
        if (strpos($str, $checkvalue) !== false)
        {
            return false;
        }
    }
    return true;
}

?>