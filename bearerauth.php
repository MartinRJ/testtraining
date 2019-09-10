<?php
define(bearer, "Bearer EXAMPLETOKEN");

if ($_SERVER["HTTP_AUTHORIZATION"] == bearer)
{
    echo "Authenticated!";
}
else
{
    echo "Not authenticated!";
}
?>