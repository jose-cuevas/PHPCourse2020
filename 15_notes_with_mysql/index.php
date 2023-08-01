<?php

$connection = require_once 'pdo.php';
$notes = $connection->getNotes();

// echo "<pre>";
// var_dump ($notes);
// echo "</pre>";
?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="create.php" method="POST">
        <div>
            <input type="text" name="" id="" placeholder="Note Title">
        </div>
        <div>
            <textarea name="" id="" cols="30" rows="10" placeholder="Note Description"></textarea>
        </div>

        <div>
            <button>Add note</button>
        </div>

    </form>
    <section>
        <?php foreach ($notes as $note):?>
        <div>
            <p>Title: <?php echo $note['title']?></p>
        </div>
        <div>
            <p>Description: <?php echo $note['description']?></p>
        </div>
        <div>
            <p>Date: <?php echo $note['date']?></p>
        </div>
        <div>
            <button>delete</button>
        </div>
        <?php endforeach;?>
    </section>
</body>

</html>