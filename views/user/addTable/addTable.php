<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .filed{
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
        <div class="filed">
           <div>
               <label>column name</label>
               <input type="text" placeholder="coulmn name" name="column-name">
           </div>
            <div>
                <label>datatype</label>
                <select name="data-type">
                    <option>int</option>
                    <option>varchar(200)</option>
                    <option>datetime</option>
                </select>
            </div>
        </div>
        <div class="filed1">

        </div>
<!--        <button id="addmore" type="button">add-more</button>-->
        <br>
        <button type="submit">create table</button>
    </form>
<script type="text/javascript">
    let addmore = document.querySelector("#addmore")
    let container = document.querySelector(".filed1")

    let content = `           <div>
               <label>column name</label>
               <input type="text" placeholder="coulmn name" name="column-name">
           </div>
            <div>
                <label>datatype</label>
                <select name="data-type">
                    <option>int</option>
                    <option>varchar(200)</option>
                    <option>datetime</option>
                </select>
            </div>`
    addmore.addEventListener("click",()=>{
        container.innerHTML += content;
    })
</script>
</body>
</html>