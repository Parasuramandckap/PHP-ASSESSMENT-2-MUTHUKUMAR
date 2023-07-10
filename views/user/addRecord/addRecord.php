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
    <form method="post">
        <select>
            <?php foreach ($allDB as $allDBs):?>
                <option onchange="<?php $name =new UserModel();?>"><?php echo $allDBs["Database"]?></option>
            <?php endforeach;?>
        </select>
        <?php
            $query = new UserModel();
           $result = $query->database->query("SHOW TABLES from a2d");
           $result =$result->fetchAll(PDO::FETCH_ASSOC);
            if($result):
        ?>
        <select>
            <?php
                foreach ($result as $results){
                    echo '<option value="', $results['Tables_in_a2d'], '">', $results['Tables_in_a2d'], '</option>';
                }
            ?>
        </select>
            <?php endif ?>


    </form>
</body>
</html>