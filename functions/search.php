<?php
require_once '../controllers/EmployeerController.php';
require_once '../models/Database.php';


$search = trim($_POST['search']);

$db = new Database();
$employeer = new EmployeerController();
$result = $employeer->search($db, $search);

if(is_array($result)) {

    $end_result = '';

    foreach($result as $rows) {
        $end_result .= '<li>' .
        " " . $rows['fname'] .
        " " . $rows['sname'] . 
        " " . $rows['pname'] . 
        '</li>';
    }
    
    echo $end_result;

} else{

    echo '<li>По вашему запросу ничего не найдено</li>';
}
    