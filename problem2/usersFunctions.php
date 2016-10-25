<?php 
require 'User.php';

//insert user in database
if ( $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['userForm'])) {
    $user = new User();

    $name = $_POST['name'];
    $age = $_POST['age'];
    $jobTitle = $_POST['job_title'];
    $insertedOn = new Datetime('now');
    $lastUpdated = new Datetime('now');

    $user->insertUser(array('name' => $name, 'age' => $age, 'job_title' => $jobTitle, 'inserted_on' => $insertedOn, 'last_updated' => $lastUpdated)); 
}

//find user by id
$userId = 6;
$user->findUserById($userId);