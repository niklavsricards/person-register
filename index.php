<?php

require_once 'vendor/autoload.php';

use App\Person;
use App\PersonRegister;

$personRegister = new PersonRegister('files/data.csv');

if (isset($_POST['submit'])) {

    $person = new Person(
        $_POST['name'],
        $_POST['surname'],
        $_POST['personalId'],
        $_POST['extraInfo']
    );

    $personRegister->add($person);
}

if (isset($_GET['search-submit'])) {
    $personFound = $personRegister->search($_GET['personalId']);
}

?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU"
      crossorigin="anonymous">


<h3 class="ms-1">Add new person to the Person Register: </h3>

<form class="w-25 ms-1" method="post" action="/">
    <div class="mb-3">
        <label for="name" class="form-label">Name: </label>
        <input type="text" class="form-control" id="name" name="name">
    </div>

    <div class="mb-3">
        <label for="surname" class="form-label">Surname: </label>
        <input type="text" class="form-control" id="surname" name="surname">
    </div>

    <div class="mb-3">
        <label for="personalId" class="form-label">Personal ID: </label>
        <input type="text" class="form-control" id="personalId" name="personalId" placeholder="_____-_____">
    </div>

    <div class="mb-3">
        <label for="extraInfo" class="form-label">Extra information: </label>
        <input type="text" class="form-control" id="extraInfo" name="extraInfo">
    </div>

    <button type="submit" name="submit" class="btn btn-primary">Add to register</button>
</form>

<h3 class="ms-1">Search for persons in the Person Register (by Personal ID): </h3>

<form class="w-25 ms-1" method="get" action="search.php">
    <div class="mb-3">
        <label for="personalId" class="form-label">Search by Personal ID: </label>
        <input type="text" class="form-control" id="personalId" name="personalId" placeholder="_____-_____">
    </div>

    <button type="submit" name="search-submit" class="btn btn-primary">Search</button>
</form>