<?php
namespace Cars\Model;
class Cars
{
    public function getMakes($db){
        $query = "SELECT *  FROM makes";
        $pdostm = $db->prepare($query);
        $pdostm->execute();

        //fetch all results
        $results = $pdostm->fetchAll(\PDO::FETCH_OBJ);
        return $results;
    }
    public function getCarsinMake($db, $make){
        $query = "SELECT makes.make as make, cars.id, cars.model, cars.year FROM cars, makes where makes.id = cars.make_id AND make_id = :make";
        $pdostm = $db->prepare($query);
        $pdostm->bindValue(':make', $make, \PDO::PARAM_STR);
        $pdostm->execute();
        $c = $pdostm->fetchAll(\PDO::FETCH_OBJ);
        return $c;
    }

    public function getAllCars($dbcon){

        $sql = "SELECT makes.make as make, cars.id, cars.model, cars.year FROM cars, makes where makes.id = cars.make_id ";

        $pdostm = $dbcon->prepare($sql);
        $pdostm->execute();

        $students = $pdostm->fetchAll(\PDO::FETCH_OBJ);
        return $students;
    }

    public function getCarsById($id, $db){
        $sql = "SELECT makes.make as make, cars.id, cars.model, cars.year FROM cars, makes where makes.id = cars.make_id AND cars.id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->execute();
        $s = $pst->fetch(\PDO::FETCH_OBJ);
        return $s;
    }

    public function getCars($dbcon){

        $sql = "SELECT * FROM cars";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->execute();
        
        $cars = $pdostm->fetchAll(\PDO::FETCH_ASSOC);
        return $cars;
    }

    public function addCar($make, $model, $year, $db){

    $sql = "INSERT INTO cars (make_id, model, year)
        VALUES (:make, :model, :year)";
    $pst = $db->prepare($sql);

    $pst->bindParam(':make', $make);
    $pst->bindParam(':model', $model);
    $pst->bindParam(':year', $year);

    $count = $pst->execute();
    return $count;
    }

    public function deleteCar($id, $db){

        $sql = "DELETE FROM cars WHERE id = :id";

        $id = $_POST['id'];
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $count = $pst->execute();
        return $count;

    }

    public function updateCar($id, $make, $model, $year, $db){

        $sql = "UPDATE cars 
                set make_id = :make, 
                model = :model,
                year = :year
                WHERE id = :id
        
        ";

        $pst =   $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->bindParam(':make', $make);
        $pst->bindParam(':model', $model);
        $pst->bindParam(':year', $year);

        $count = $pst->execute();
        return $count;
    }
}