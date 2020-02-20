<?php
require_once '../controllers/EmployeerController.php';
require_once '../models/Database.php';


$firstName = trim($_POST['fname']);
$secondName = trim($_POST['sname']);
$middleName = trim($_POST['mname']);

$db = new Database();
$employeer = new EmployeerController();
$result = $employeer->create($db, $firstName, $secondName, $middleName);

if ($result) {

    echo 'Пользователь создан';

}else {
    
    echo 'Пользователь не создан';
}
