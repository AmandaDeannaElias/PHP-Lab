<?php
use Cars\Model\{Database, Cars};
require_once 'vendor/autoload.php';
require_once 'Library/form-functions.php';

$c = new Cars();
$makes = $c->getMakes(Database::getDb());

if(isset($_POST['addCar'])){

$make = $_POST['make'];
$model = $_POST['model'];
$year = $_POST['year'];

$db = Database::getDb();
       $s = new Cars();
       $c = $s->addCar($make, $model, $year, $db);

if($c){
    echo "Added Car sucessfully";
} else {
    echo "Problem adding Car";
}

}
?>
<html lang="en">

<head>
    <title>Cars</title>
    <meta name="description" content="cars">
    <meta name="keywords" content="make, model, year">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css" type="text/css">
</head>

<body>

<div>
    <form action="" method="post">

        <div class="form-group">
            <label for="make">Make :</label>
            <select class="form-control" name="make" id="make" >
                <?php echo populateDropdown($makes) ?>
            </select>
            <span style="color: red">

            </span>
        </div>
        <div class="form-group">
            <label for="model">Model :</label>
            <input type="text" class="form-control" id="model" name="model"
                   value="" placeholder="Enter model">
            <span style="color: red">

            </span>
        </div>
        <div class="form-group">
            <label for="year">Year :</label>
            <input type="text" name="year" value="" class="form-control"
                   id="year" placeholder="Enter year">
            <span style="color: red">

            </span>
        </div>
        <a href="./list-cars.php" id="btn_back" class="btn btn-success float-left">Back</a>
        <button type="submit" name="addCar"
                class="btn btn-primary float-right" id="btn-submit">
            Add Car
        </button>
    </form>
</div>


</body>
</html
