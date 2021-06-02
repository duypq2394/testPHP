<?php
namespace App\Models;
use App\Entities\CoffeeEntity;
/**
  * Contains related function for the Coffee pages
  */
class CoffeeModel extends BaseModel {
    function GetCoffeeTypes()
    {
        $dbh = $this->db->prepare("SELECT DISTINCT type FROM coffee");
        $dbh->execute();
        $types = array();
        foreach ($dbh->fetchAll() as $row) {
            array_push($types, $row[0]);
        }

        return $types;
    }

    function GetCoffeeByType($type)
    {
        $dbh = $this->db->prepare("SELECT * FROM coffee WHERE type LIKE '$type'");
        $dbh->execute();
    
        $coffeeArray = array();

        //Get data from database.
        foreach ($dbh->fetchAll() as $row) {
            $id = $row[0];
            $name = $row[1];
            $type = $row[2];
            $price = $row[3];
            $roast = $row[4];
            $country = $row[5];
            $image = $row[6];
            $review = $row[7];

            //Create coffee objects and store them in an array.
            $coffee = new CoffeeEntity ($id, $name, $type, $price, $roast, $country, $image, $review);
            array_push($coffeeArray, $coffee);
        }
        return $coffeeArray;
    }

    function GetCoffeeById($id)
    {
        $dbh = $this->db->prepare("SELECT * FROM coffee WHERE id = $id");
        $dbh->execute();
        
        //Get data from database.
        foreach ($dbh->fetchAll() as $row) {
            $name = $row[1];
            $type = $row[2];
            $price = $row[3];
            $roast = $row[4];
            $country = $row[5];
            $image = $row[6];
            $review = $row[7];

            //Create coffee objects and store them in an array.
            $coffee = new CoffeeEntity ($id, $name, $type, $price, $roast, $country, $image, $review);
        }
        return $coffee;
    }

    function InsertCoffee(CoffeeEntity $coffee){

        $sql = "INSERT INTO coffee (name, type, price, roast, country, image, review )
                    VALUES (?,?,?,?,?,?,?)";

        $dbh= $this->db->prepare($sql);
        $dbh->execute([$coffee->name, $coffee->type, $coffee->price, $coffee->roast, $coffee->country, "Images/Coffee/".$coffee->image, $coffee->review]);
        
    }
    
    function UpdateCoffee($id, CoffeeEntity $coffee){
        $sql = "UPDATE coffee SET name = ?, type = ?,price = ?,roast = ?,country = ?, image = ?,review = ?
                        WHERE id = ?";

        $dbh= $this->db->prepare($sql);
        $dbh->execute([$coffee->name, $coffee->type, $coffee->price, $coffee->roast, $coffee->country, "Images/Coffee/".$coffee->image, $coffee->review, $id]);
    }

    function DeleteCoffee($id){
        $dbh = $this->db->prepare("DELETE FROM coffee WHERE id = $id");
        $dbh->execute();
    }
}
?>