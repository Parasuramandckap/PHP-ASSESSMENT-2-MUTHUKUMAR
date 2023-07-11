<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="../../../jquery-1.4.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <title>Document</title>
    <script>
        $(document).ready(function () {
            $("#db").change(function () {
                let name = $("#db").val();
                $.ajax({
                    url:"index.php",
                    method:"POST",
                    data:"database"+name
                }).done(function (database) {
                    console.log(database)
                })
            })
        })
    </script>
</head>
<body>
    <form method="post">
        <div>
            <label>databse</label>
            <select name="database" id="db">
                <?php foreach ($allDB as $allDBs):?>
                    <option ><?php echo $allDBs["Database"]?></option>
                <?php endforeach;?>
            </select>
            <h1 id="demo"></h1>
        </div>
    <h1><?php require "views/user/action.php"?></h1>
    </form>



</body>
</html>