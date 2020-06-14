<?php

$db_exists = file_exists("daypilot.sqlite");

$db = new PDO('sqlite:daypilot.sqlite');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// other init
date_default_timezone_set("UTC");
session_start();

if (!$db_exists) {
    //create the database
    $db->exec("CREATE TABLE candiate (
    candiate_id   INTEGER       PRIMARY KEY AUTOINCREMENT NOT NULL,
    candiate_name VARCHAR (100) NOT NULL
    );");
    
    $db->exec("CREATE TABLE appointment (
    appointment_id              INTEGER       PRIMARY KEY AUTOINCREMENT NOT NULL,
    appointment_start           DATETIME      NOT NULL,
    appointment_end             DATETIME      NOT NULL,
    appointment_patient_name    VARCHAR (100),
    appointment_status          VARCHAR (100) DEFAULT ('free') NOT NULL,
    appointment_patient_session VARCHAR (100),
    candiate_id                   INTEGER       NOT NULL
    );");

    $items = array(
        array('name' => 'candiate 1'),
        array('name' => 'candiate 2'),        
        array('name' => 'candiate 3'),        
        array('name' => 'candiate 4'),        
        array('name' => 'candiate 5'),        
    );
    $insert = "INSERT INTO [candiate] (candiate_name) VALUES (:name)";
    $stmt = $db->prepare($insert);
    $stmt->bindParam(':name', $name);
    foreach ($items as $m) {
      $name = $m['name'];
      $stmt->execute();
    }

}
