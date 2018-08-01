<?php
    if(!empty($_POST['code'])) {
        require("executor.php");
        $output = Brainfuck($_POST['code']);
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BrainFuck Executor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <form method="POST">
        <input type="text" placeholder="+++++++[>+++++++++<-]" name="code">
        <input type="submit">
    </form>
    <?php if(!empty($output)):?>
    <h3>output :</h3>
    <p><?= $output ?></p>
    <?php endif ?>
</body>
</html>