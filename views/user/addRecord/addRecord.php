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
                        })
                    }
                });
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
<script type="text/javascript">
            //table change function

    $("#table").change(function () {
        let table = $("#table").val();
        let name = $("#db").val();
        $.ajax({
            url: "index.php",
            method: "POST",
            data:{database:name,tbName:table},

        }).done(function(data) {
            data=JSON.parse(data)
            console.log(data);

            /* 
            I'm facing this kind of i don't know how to slove it
            
                    Uncaught SyntaxError: Unexpected non-whitespace character after JSON at position 54
            at JSON.parse (<anonymous>)
            at Object.<anonymous> (add-row:93:23)
            at fire (jquery-3.7.0.js:3213:31)
            at Object.fireWith [as resolveWith] (jquery-3.7.0.js:3343:7)
            at done (jquery-3.7.0.js:9617:14)
            at XMLHttpRequest.<anonymous> (jquery-3.7.0.js:9878:9)
            */
        })
    })
</script>
</body>
</html>