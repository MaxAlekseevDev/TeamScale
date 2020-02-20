<?php
error_reporting(0);
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
    <title>Main page</title>
</head>
<body class="container">
    <span class='naw-brend'>TeamScale</span>
    <div class="row">
        <div class='col-md-4'>
            <!-- <span class="" id="msg"></span> -->
            <form action="" class="form-group" id="createEmployeer">
                First name<input type="text" name="fname" id="" class="form-control col-12" required>
                Second name <input type="text" name="sname" id="" class="form-control col-12" required>
                Middle name <input type="text" name="mname" id="" class="form-control col-12" required></br/>
                <input type="submit" value="Создать" class="btn btn-info">
            </form>
        <a href="/views/list.php" class="btn btn-success">Посмотреть пользователей</a>
        </div>
        <div class="col-md-6">
            <form action="" class="form-group" id="searchForm">
                Поиск<input type="text" name="search" id="search" class="form-control col-12" required><br/>
                <input type="submit" value="Искать" class="btn btn-info">
            </form>
        <br/>
        <ul id='results'>
        </ul>
        </div>
    </div>
    <script>
    //create new employeer
       $('#createEmployeer').submit(function(){
            $.post(
                '../functions/ajax.php', 
                $("#createEmployeer").serialize(),        
            function(msg) { 
                    alert("Пользователь создан");
                    location.reload(true);
                }
            );
            return false;

        });

// search employeer
$(function() {

    $("#searchForm").submit(function() {
        $("#results").empty();
        var searchString    = $("#search").val();
        var data            = 'search=' + searchString;

        if(searchString) {
            $.ajax({
                type: "POST",
                url: "../functions/search.php",
                data: data,
            success: function(html){
                $("#results").show();
                $("#results").append(html);
                }
            });
        }
        return false;
    });
});

    </script>
    </div>   
</body>
</html>