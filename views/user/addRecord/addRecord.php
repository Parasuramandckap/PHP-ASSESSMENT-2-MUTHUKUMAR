<?php
    require "models/UserModel.php";
    $new = new UserModel();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form>
        <div>
            <label>Database Name</label>
            <select onchange="main(this.value)">
                <?php foreach ($databae as $databaes): ?>
                    <option><?php  echo $databaes["Database"]?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div>
            <label>table name</label>
            <?php ?>
        </div>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script type="text/javascript">

        function main(value) {

        }
        // function load_page(pages){
        //     let xhr = new XMLHttpRequest();
        //     xhr.onload =  function () {
        //         if (this.status == 200 && this.readyState == 4){
        //             container.innerText = xhr.responseText;
        //         }
        //         else{
        //             console.warn("somting error");
        //         }
        //     }
        //     xhr.open("get",pages)
        //     xhr.send();
        // }

    </script>
</body>
</html>