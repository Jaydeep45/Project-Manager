<?php

    // create a zip file
    $zipfile = "Zipfile/".$_GET['project'];
    touch($zipfile);

    $zip = new ZipArchive;
    $this_zip = $zip->open($zipfile);

    if($this_zip) {
        $folder = opendir("Upload/".$_GET['project']);
        if($folder) {
            while(($files = readdir($folder)) !== false) {
                if($files !== '.' && $files !== '..' ) {
                    $zip->addFile("Upload/".$_GET['project']."/".$files, $files);
                }
            }
        }
        closedir($folder);
    }
    if(file_exists($zipfile)) {
        header("Content-type: application/zip"); 
        header("Content-Disposition: attachment; filename=".$_GET['project'].".zip"); 
        header("Pragma: no-cache"); 
        header("Expires: 0");     
        readfile($zipfile);

        unlink($zipfile);
    }
?>