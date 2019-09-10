<?php
define(filename, "data.txt");
define(maxlength, 1024);
define("max", 11000);
define("separator", ",");
define(needle, "=");
$entityBody = file_get_contents('php://input');
$entityBody = substr($entityBody, 0, maxlength);
$pos = strpos($entityBody, needle);
$newcsv = "";
// Make sure the needle exists
if ($pos !== false)
{
    if ($pos > 0)
    {
        $index = substr($entityBody, 0, $pos); // Get the index.
        if (is_numeric($index) && $index >= 0)
        {
            $value = substr($entityBody, $pos+1);

            if (($handle = fopen(filename, "r")) !== FALSE)
            {
                while (($data = fgetcsv($handle, max, separator)) !== FALSE)
                {
                    $num = count($data);
                    for ($c=0; $c < $num; $c++)
                    {
                        if ($c > 0)
                        {
                            $newcsv = $newcsv . separator;
                        }
                        if ($c == $index)
                        {
                            $newcsv = $newcsv . $value;
                        }
                        else
                        {
                            $newcsv = $newcsv . $data[$c];
                        }
                    }
                }
                fclose($handle);
            }

            // Make sure the file exists and the new CSV is not empty.
            if (is_writable(filename) && $newcsv !== "")
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
        }
    }
}
?>