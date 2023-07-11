<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>    <title>Document</title>
    <style>
        .my_box{
            display: flex;
        }
    </style>
</head>
<body>

    <form action="/create-table" method="post">
        <div>
            <label>Database name</label>
            <select name="database">
            <?php foreach ($allDb as $allDbs):?>
                <option><?php echo $allDbs["Database"]?></option>
            <?php endforeach;?>
            </select>
        </div>
        <div>
            <label>table name</label>
            <input type="text" placeholder="table-name" name="table-name">
        </div>
        <div>
            <div>
                <input type="text" name="clounm-name[]">
                <select name="data-type[]">
                    <option>int</option>
                    <option>varchar(255)</option>
                    <option>datetime</option>
                </select>
            </div>
            <div id="content">

            </div>
        </div>
        <button type="button" id="add" onclick="add_more()">add coulnm</button>
        <button type="submit" name="submit">create table</button>
    </form>
<script type="text/javascript">
    function add_more(){
        var box_count= 1;
        box_count++;
        $("#content").append('<div class="my_box" id="box_loop_'+box_count+'"><div class="field_box"><input type="textbox" name="clounm-name[]" id="name"><select name="data-type[]"><option>int</option><option>varchar(255)</option><option>datetime</option></select></div><div class="button_box"><input type="button"  value="Remove" onclick=remove_more("'+box_count+'")></div></div>');

    }
    function remove_more(box_count){
        $("#box_loop_"+box_count).remove();
    }
</script>
</body>
</html>