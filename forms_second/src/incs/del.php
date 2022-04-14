<?php

$data = array();

$directory = "../../forms_files/";
$filename = 'result.txt';
$target = $directory . $filename;

if (!empty($_POST)) {
    $data = $_POST;
}

$counter = 0;
$del_lines = array();

foreach ($data as $k=>$v) {
   $del_lines[$counter] = $k;
   $counter++;
}

$rows = file( $target );
$open=fopen($target,"w");
$counter = 0;
$flag = 0;
foreach( $rows as $rowNr => $row ) {
    if ($row[0] != 0){
        fwrite($open,$row);
        $counter--;
    }
    else if(in_array($counter+1, $del_lines)){
        $row = substr_replace($row, $flag+1, 0, 1);
        fwrite($open,$row);
    }
    else {
        fwrite($open,$row);
    }
    $counter++;
    $flag++;
}

fclose($open);

header('Location: ../php/admin.php');