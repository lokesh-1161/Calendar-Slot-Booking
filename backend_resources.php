<?php
require_once '_db.php';

$scheduler_candiates = $db->query('SELECT * FROM candiate ORDER BY candiate_name');

class Resource {}

$result = array();

foreach($scheduler_candiates as $candiate) {
  $r = new Resource();
  $r->id = $candiate['candiate_id'];
  $r->name = $candiate['candiate_name'];
  $result[] = $r;
}

header('Content-Type: application/json');
echo json_encode($result);

?>
