<?php

$mainValue = $_POST['mainValue'];
$response = [
    'mainValue' => $mainValue,
];

echo json_encode($response);
