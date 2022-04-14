<?php
$data = array(
    0,
    'name' => $_POST['name'],
    'surname' => $_POST['surname'],
    'email' => $_POST['email'],
    'phone' => $_POST['phone'],
    'subject' => $_POST['subjects'],
    'payment' => $_POST['payment'],
    'mailing' => $_POST['mailing'],
    date('l jS \of F Y h:i:s A'),
    $_SERVER['REMOTE_ADDR'],
);

$path = '../../forms_files';
$filename = 'result.txt';
$target = $path . '/' . $filename;

$out = fopen($target, 'a');
fputcsv($out, $data);
fclose($out);


header('Location: ../php/index.php');

