<?php

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <title>Document</title>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#db").change(function () {
                let name = $("#db").val();
                $.ajax({
                    url: "index.php",
                    method:"POST",
                    data: { database: name },
                    success: function(data) {
                        data=JSON.parse(data)
                        data.forEach(function (table) {
                            $("#table").append('<option>'+table.tablesname+ '</option>')
                            $("#table").addClass(`${table.TABLE_SCHEMA}`)
                        })
                    }
                });
            })
            //table change function
            $("#table").change(function () {
                let table = $("#table").val();
                let name = $("#table").attr("class");
                $.ajax({
                    url: "index.php",
                    method: "POST",
                    data: {database:name,tbName:table},
                    success:function (table) {
                        console.log(table);
                        table=JSON.parse(table)
                        table.forEach(function (table) {
                            console.log(table)
                        })
                    }
                })
            })

        })


    </script>

</head>
<body>
    <form method="post" name="" action="/create-record">
        <div>
            <label>databse</label>
            <select name="database" id="db">
                <option disabled>select database</option>
                <?php foreach ($allDB as $allDBs):?>
                    <option value="<?php echo $allDBs["Database"]?>"><?php echo $allDBs["Database"]?></option>
                <?php endforeach;?>

            </select>
            <label>select table</label>
            <select id="table" name="table-name">
                <option selected >

                </option>

            </select>
            <div id="coulmn">

            </div>
        </div>
    <h1></h1>
    </form>
</body>
</html>