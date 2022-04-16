<?php
    if(isset($_POST['upload'])) {
        $name = $_POST['project_name'];
        $abst = $_POST['abstract'];
        $tech = $_POST['tech'];
        $file = $_FILES['myfile'];
        $fname = $file['tmp_name'];
        echo $name."\n";
        echo $abst."\n";
        echo $tech."\n";
        echo $fname;
    }