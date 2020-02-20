<?php
error_reporting(0);
require_once '../models/Database.php';
require_once '../controllers/EmployeerController.php';

$db = new Database();
$employeer = new EmployeerController();
$employeers = $employeer->read($db);

if (isset($_GET['delete'])){
    
    $id = trim($_GET['delete']);

    $result = $employeer->delete($db,$id);

    if($result) {
        header("Location: list.php");
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
          rel="stylesheet" 
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" 
          crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-1.12.3.min.js"
		    integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ="
		    crossorigin="anonymous">
    </script>
    <title>List page</title>
</head>
<body class="container">
    <span class='naw-brend'>TeamScale</span>
    <div class='row'>
        <div class="col-md-8">
            <table class="table">
                <thead>
                    <td>Номер</td>
                    <td>Имя</td>
                    <td>Фамилия</td>
                    <td>Отчество</td>
                    <td>#</td>
                    <td>#</td>
                </thead>
                <?php foreach ($employeers as $employeer): ?>
                <tr>
                    <td><?php echo $employeer['id'];?></td>
                    <td><?php echo $employeer['fname'];?></td>
                    <td><?php echo $employeer['sname'];?></td>
                    <td><?php echo $employeer['pname'];?></td>
                    <td>
                    <a href="?delete=<?php echo $employeer['id'];?>" class="btn btn-primary">Удалить</a>
                    </td>
                    <td>
                    <!-- <a href="?update=<?php echo $employeer['id'];?>" class="btn btn-danger">Изменить</a> -->
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>   
</body>
</html>