<?php
define(username, "user");
define(password, "secretpassword");
define(bearer, "EXAMPLETOKEN");
define(htmlform, '<!doctype html>
<html>
  <head>
    <title>Form</title>
  </head>
  <body>
    <h3>POST form</h3>
    <form action="#" method="POST">
        <input type="text" name="username">&nbsp;Username<br/>
        <input type="text" name="password">&nbsp;Password<br/>
        <input type="submit" value="Submit">
    </form>
  </body>
</html>');

if (isset($_POST["username"]) && !empty($_POST["username"]) && isset($_POST["password"]) && !empty($_POST["password"]))
{ // Form - submission
    if ($_POST["username"] == username && $_POST["password"] == password)
    {
      echo bearer;
    }
    else
    { // Wrong username/password
      echo htmlform;
    }
}
else
{ // Print html form
    echo htmlform;
}
?>