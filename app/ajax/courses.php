<?php


$name = get('name');


$data = $db->dlookup('subjects, name', 'courses', 'name = ?', [$name] );


$subjects = explode(',', $data['subjects'] );
$sub = [];
foreach ($subjects as $subject) {
  $sub[] = trim( ucwords( implode('/', explode('/', implode(' ', explode('_', $subject) ) ) ) ) );
}




$_data['name'] = ucwords(implode(' ', explode('_', $data['name']) ));
$_data['subjects'] = $sub;

$response['course'] = $_data['name'];
$response['subjects'] = $_data['subjects'];


$ajax_response = $response;
