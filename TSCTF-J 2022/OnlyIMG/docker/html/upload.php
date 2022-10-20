<?php

$blacklist = array("ph","htm","ini","js","jtml", "as","cer", "swf");

if ($_FILES["file"]["error"] > 0) 
{
    echo "Error !" . "<br>";
}

else
{
    if($_FILES["file"])
    {
        $dst = './'.substr(md5($_SERVER["REMOTE_ADDR"]),0,6);
        $fileinfo = array($_FILES["file"]["name"],$dst);
        $file_name = trim($_FILES['file']['name']);
        foreach ($blacklist as $blackitem) 
        { 
            if (preg_match('/' . $blackitem . '/im', $file_name)) 
            { 
                die("Upload Fail , Do not upload strange file ~");
            }
        }

        $tmp_name = $_FILES["file"]["tmp_name"];
        $contents = file_get_contents($tmp_name);
        if (mb_strpos($contents, "<?p") !== FALSE) 
        {
            die("Upload Fail , Why is there PHP code in your pic ?");
        }

        if (!is_dir($dst)) 
        {
            mkdir($dst);
        }
        move_uploaded_file($_FILES["file"]["tmp_name"],"$fileinfo[1]/$fileinfo[0]");
        $msg="Upload Success ! Your file name is : %s";
        foreach($fileinfo as $key => $value)
        {
            $msg = sprintf($msg, $value);                  
        }
        echo $msg;
        echo "<br>But I don't know where it stores......";
    }
    else
    {
        echo "Please select your file to upload first !" . "<br>";
    }
}
