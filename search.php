<?php

require_once 'vendor/autoload.php';

use App\PersonRegister;

$personRegister = new PersonRegister('files/data.csv');

$personFound = NULL;

if (isset($_GET['search-submit'])) {
    $personFound = $personRegister->search($_GET['personalId']);
}

if (isset($_POST['delete'])) {
    $personRegister->delete($personFound);
    header('Location: index.php');
}

?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU"
      crossorigin="anonymous">

<?php if ($personFound === NULL): ?>
    <p>Such person was not found</p>
<?php else: ?>
    <h3>Name: <p><?php echo $personFound->getName() ?></p></h3>
    <h3>Surname: <p><?php echo $personFound->getSurname() ?></p></h3>
    <h3>Personal ID: <p><?php echo $personFound->getPersonalNumber() ?></p></h3>
    <h3>Extra info: <p><?php echo $personFound->getExtraInfo() ?></p></h3>


    <form class="w-25 ms-1" method="post" action="/">
        <label for="delete">Delete this person from register</label>

        <button type="submit" name="delete" class="btn btn-primary">Delete</button>
    </form>
<?php endif; ?>
