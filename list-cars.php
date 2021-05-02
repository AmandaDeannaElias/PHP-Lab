<?php
use Cars\Model\{Database, Cars};

require_once 'vendor/autoload.php';
require_once "Library/form-functions.php";

$c = new Cars();
$makes = $c->getMakes(Database::getDb());

$make = $_GET['make'] ?? "";
if(isset($_GET['make'])){
   $cars = $c->getCarsinMake(Database::getDb(), $_GET['make']);
} else {
    $cars =  $c->getAllCars(Database::getDb());
}
?>

<html lang="en">
<head>
    <title>Cars</title>
    <meta name="description" content="Car List">
    <meta name="keywords" content="Make, Model, Year">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
<p class="h1 text-center">Car List</p>
<div class="m-1">
<form action="" method="get">
    <div class="form-group">
        <label for="make">Make :</label>
        <select  name="make" class="form-control"
                 id="make" >
            <?php echo  populateDropdown($makes, $make) ?>
        </select>
        <span style="color: red">
            </span>
    </div>
    <input type="submit" class="button btn btn-primary" name="carinmake" value= "Car Makes" />
    </form>
    <table class="table table-bordered tbl">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Make</th>
            <th scope="col">Model</th>
            <th scope="col">Year</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($cars as $car) { ?>
            <tr>
                <th><?= $car->id; ?></th>
                <td><?= $car->make; ?></td>
                <td><?= $car->model; ?></td>
                <td><?= $car->year; ?></td>
                <td>
                    <form action="./update-car.php" method="post">
                        <input type="hidden" name="id" value="<?= $car->id; ?>"/>
                        <input type="submit" class="button btn btn-primary" name="updateCar" value="Update"/>
                    </form>
                </td>
                <td>
                    <form action="./delete-car.php" method="post">
                        <input type="hidden" name="id" value="<?= $car->id; ?>"/>
                        <input type="submit" class="button btn btn-danger" name="deleteCar" value="Delete"/>
                    </form>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <a href="./addcar.php" id="btn_addCar" class="btn btn-success btn-lg float-right">Add Car</a>

</div>
</body>
</html>