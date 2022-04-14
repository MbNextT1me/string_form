<?php
$directory = '../../forms_files/';
$filename = 'result.txt';
$target = $directory . $filename;

$counter = 1;

$row = 1;
if (($handle = fopen($target, "r")) !== FALSE) {
    while (($data = fgetcsv($handle)) !== FALSE) {
        $num = count($data);
        if($data[0] == 0) {
            echo "<tr>";
            echo "<td><input type='checkbox' name='{$counter}'></td>";
            $row++;
            echo "<td>" . $counter . "</td>";
            for ($c = 1; $c < $num; $c++) {
                echo "<td>" . $data[$c] . "</td>";
            }
            $counter++;
            echo "</tr>";
        }
    }
}


