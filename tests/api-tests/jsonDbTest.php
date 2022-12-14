<?php
require($_SERVER['DOCUMENT_ROOT'] . '/api/jsonDb.php');
$jsonDB = new dbConnJagofrJsonDb($_SERVER['DOCUMENT_ROOT'], 'dbs', 'testJsonData.json');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jagofr PHP+JSON DB Test</title>
</head>
<body>
<h1>Json Database Test!</h1>

<h2>Show DataStore!</h2>

<h3>Show DataStore by Name (todoData)</h3>
<?php
$jsonDB->showDataStoreByName("todoData");
?>

<h3>Show DataStore by Name (customerData)</h3>
<?php
$jsonDB->showDataStoreByName("customerData");
?>

<h3>Show DataStore by Name (Default/Null)</h3>
<?php
$jsonDB->showDataStoreByName();
?>

<h3>Show DataStore by Name (Default/Invalid)</h3>
<?php
$jsonDB->showDataStoreByName("invalidData");
?>

<h3>Show DataStore by ID (0)</h3>
<?php
$jsonDB->showDataStoreById(0);
?>

<h3>Show DataStore by ID (1)</h3>
<?php
$jsonDB->showDataStoreById(1);
?>

<h3>Show DataStore by ID (Default/Null)</h3>
<?php
$jsonDB->showDataStoreById();
?>

<h3>Show DataStore by ID (Default/Invalid)</h3>
<?php
$jsonDB->showDataStoreById(-1);
?>

<h2>Get DataStore!</h2>

<h3>Get DataStore by Name (todoData)</h3>
<pre>
<?php
print_r($jsonDB->getDataStoreByName("todoData"));
?>
</pre>

<h3>Get DataStore by Name (customerData)</h3>
<pre>
<?php
print_r($jsonDB->getDataStoreByName("customerData"));
?>
</pre>

<h3>Get DataStore by Name (Default/Null)</h3>
<pre>
<?php
$jsonDB->getDataStoreByName();
?>
</pre>

<h3>Get DataStore by Name (Default/Invalid)</h3>
<pre>
<?php
print_r($jsonDB->getDataStoreByName("invalidData"));
?>
</pre>

<h3>Get DataStore by ID (0)</h3>
<pre>
<?php
print_r($jsonDB->getDataStoreById(0));
?>
</pre>

<h3>Get DataStore by ID (1)</h3>
<pre>
<?php
print_r($jsonDB->getDataStoreById(1));
?>
</pre>

<h3>Get DataStore by ID (Default/Null)</h3>
<pre>
<?php
print_r($jsonDB->getDataStoreById());
?>
</pre>

<h3>Get DataStore by ID (Default/Invalid)</h3>
<pre>
<?php
print_r($jsonDB->getDataStoreById(-1));
?>
</pre>
</body>
</html>