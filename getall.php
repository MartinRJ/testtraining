<?php
// Read contents of database and echo them.
define(filename, "data.txt");
define("linestart", "Entry #");
define("linemid", ":&nbsp;");
define("max", 11000);
define("lineend", "<br/>");
define("separator", ",");
echo ("<!doctype html>
<html>
<head>
<title>Entries</title>
</head>
<body>");

if (($handle = fopen(filename, "r")) !== FALSE)
{
    while (($data = fgetcsv($handle, max, separator)) !== FALSE)
    {
        $num = count($data);
        for ($c=0; $c < $num; $c++)
        {
            echo linestart . ($c+1) . linemid . $data[$c] . lineend;
        }
    }
    fclose($handle);
}

echo ("</body>
</html>");
?>