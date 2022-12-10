<?php
require('showTodo.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Test App</h1>
    <p>Hi! This is a test of the app using PHP. Below should be some PHP info. Please have it enabled, else it'll look weird.</p>
    <pre>
        <?php
        
        ?>
    </pre>

    <h2>If you see this, you got a successful connection before, and now you wanna see if the data shows!</h2>
    <p>Lets get you some data here, shall we?</p>
    <dl>
        <dl>Todos</dl>
        <?php
        $t = new Todos();
        ?>
    </dl>

    <h3>Oh you getting fancy now? Wanna add a todo?</h3>
    <p>Well use the form below, silly. Add a new todo item here, and see if your DB connection works.</p>
    <form action="addTodo.php" method="post">
        <fieldset>
            <legend>Add a Todo Item!</legend>
            <label for="name">Todo Name: </label>
            <input type="text" name="name" id="todo-name" required>
            <label for="note">Todo Note: </label>
            <textarea name="note" id="todo-note" cols="30" rows="10"></textarea>
            <input type="checkbox" name="completed" id="todo-completed">
            <label for="completed">Is Completed?</label>
            <input type="submit" value="Add Todo!">
        </fieldset>
    </form>
</body>
</html>