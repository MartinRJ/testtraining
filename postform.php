<?php
define(printformdata1, "The following data was submitted:\nFirst name: ");
define(printformdata2, "\nCity: ");
define(htmlform, '<!doctype html>
<html>
  <head>
    <title>Form</title>
  </head>
  <body>
    <h3>POST form</h3>
    <form action="#" method="POST">
        <input type="text" name="firstname">&nbsp;First&nbsp;name<br/>
        <input type="text" name="city">&nbsp;City<br/>
        <input type="submit" value="Submit">
    </form>
  </body>
</html>');

if (isset($_POST["firstname"]) && !empty($_POST["firstname"]) && isset($_POST["city"]) && !empty($_POST["city"]))
{ // Form - submission
    echo printformdata1 . $_POST["firstname"] . printformdata2 . $_POST["city"];

}
else
{ // Print html form
    echo htmlform;
}
?>