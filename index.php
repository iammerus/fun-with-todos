<?php
require_once __DIR__ . '/app/functions.php';

$items = get_items();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Awesome Todo</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Yeseva+One&display=swap" rel="stylesheet">

       <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="todo-app">

        <h1>My Todo List</h1>

        <form class="add-form" action="">
            <input id="input" type="text" placeholder="Enter todo">
            <button class="add-item-button" type="button">Add</button>
        </form>


        <ul class="items">
            <?php foreach($items as $item): ?>
            <li class="<?= $item[3] ?>"  data-status="<?= $item[3] ?>" data-id="<?= $item[0] ?>" ><?= $item[1] ?></li>
            <?php endforeach; ?>
        </ul>

    </div>

    <script src="assets/js/app.js"></script>
</body>
</html>