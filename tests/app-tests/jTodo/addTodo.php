<?php
$todoName = $_POST['name'];
$todoNote = $_POST['note'];
if (isset($_POST['completed']))
    $todoComplete = "true";
else
    $todoComplete = "false";

echo "<pre>";
echo "\n" . $todoName;
echo "\n" . $todoNote;
echo "\n" . $todoComplete;
echo "</pre>";
header("Location: /");
?>