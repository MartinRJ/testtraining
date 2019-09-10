<?php
define(filename, "data.txt");
define(varname, "entries");
define(maxlength, 1024);
$entries = urldecode(substr($_POST[varname], 0, maxlength));

// Make sure the file exists
if (is_writable(filename))
{

    // Create filename and open it in write-mode
    if (!$handle = fopen(filename, "w"))
    {
        // "Cannot open file!";
         exit;
    }

    // Write $entries to the open file.
    if (!fwrite($handle, $entries))
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