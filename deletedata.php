<?php
define(filename, "data.txt");
define(maxlength, 1024);
define("max", 11000);
define("separator", ",");
$entityBody = file_get_contents('php://input');
$entityBody = substr($entityBody, 0, maxlength);
$newcsv = "";
$newentries = 0;
$invalidinput = false;
if (is_numeric($entityBody) && $entityBody >= 0)
{
    $index = $entityBody;
    if (($handle = fopen(filename, "r")) !== FALSE)
    {
        while (($data = fgetcsv($handle, max, separator)) !== FALSE)
        {
            $num = count($data);
            for ($c=0; $c < $num; $c++)
            {
                if ($c != $index)
                {
                    if ($c > 0 && $newentries > 0)
                    {
                        $newcsv = $newcsv . separator;
                    }
                    $newcsv = $newcsv . $data[$c];
                    $newentries++;
                }
            }
        }
        fclose($handle);
    }
}
else if ($entityBody === "")
{ // DELETE all ($newcsv stays empty)
    $newcsv = "";
}
else
{
    $invalidinput = true;
}

// Make sure the file exists
if (is_writable(filename) && $invalidinput !== true)
{

    // Create filename and open it in write-mode
    if (!$handle = fopen(filename, "w"))
    {
        // "Cannot open file!";
        exit;
    }

    // Write $entries to the open file.
    if (!fwrite($handle, $newcsv))
    {
        // "Error writing to file!";
    }

    // "Done, entry was put into the file!"

    fclose($handle);

}
else
{
    // "Cannot write to file (not writable)!";
}
?>