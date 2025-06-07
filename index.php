<?php 
include("dataBase.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>
<h1 class="top-heading">TODO LIST APPLICATION</h1>
    <div class="container">
        <form action="handleAction.php" method="post">
            <div class="input-container">
                <input type="text" name="inputBox" id="inputBox" >
                <button type="submit" name="add" id="add">ADD</button>
            </div>
            <ul class="list">
                <?php 
                $itemList = get_items();
                while($row = $itemList -> fetch_assoc())
                {
                ?>
                <li class="item">
                    <p><?php echo $row["item"] ?></p>
                    <div class="icon-container">
                        <button type="submit" name="checked" id="check" value="<?php echo $row["id"] ?>"><i class="fa-solid fa-circle-check"></i></button>
                        <button type="submit" name="deleted" id="delete" value="<?php echo $row["id"] ?>"><i class="fa-solid fa-trash"></i></button>
                    </div>
                </li>
                <?php } ?>
            </ul>
            <hr>
            <ul class="list">
                <?php 
                $itemList = get_items_checked();
                while($row = $itemList -> fetch_assoc())
                {
                ?>
                <li class="item fade">
                    <p class=deleted-text><span><?php echo $row["item"] ?></span></p>
                    <div class="icon-container">
                        <button type="submit" id="check"><i class="fa-solid fa-circle-check hidden"></i></button>
                        <button type="submit" id="delete"  name="deleted" value="<?php echo $row["id"]?>"><i class="fa-solid fa-trash"></i></button>
                    </div>
                </li>
                <?php } ?>

            </ul>
        </form>
    </div>
</body>
</html>