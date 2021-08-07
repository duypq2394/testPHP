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

    function GetALLCoffee() {
        $dbh = $this->db->prepare("SELECT * FROM coffee");
        $dbh->execute();
        $coffeeArray = array();
        foreach ($dbh->fetchAll() as $row) {
            $id = $row[0];
            $name = $row[1];
            $type = $row[2];
            $price = floatval($row[3]);
            $roast = $row[4];
            $country = $row[5];
            $image = $row[6];
            $review = $row[7];
            $date = $row[8];

            //Create coffee objects and store them in an array.
            $coffee = new CoffeeEntity ($id, $name, $type, $price, $roast, $country, $image, $review, $date);
            array_push($coffeeArray, $coffee);
        }
        // echo '<script>';
        // echo 'console.log('. json_encode( $coffeeArray ) .')';
        // echo '</script>';
        return $coffeeArray;
    }

    function GetCoffeeByType($type,$startRow,$pageSize)
    {
        $dbh = $this->db->prepare("SELECT * FROM coffee WHERE type LIKE '$type' ORDER BY id OFFSET $startRow ROWS FETCH NEXT $pageSize ROWS ONLY ");
        $dbh->execute();
    
        $coffeeArray = array();

        //Get data from database.
        foreach ($dbh->fetchAll() as $row) {
            $id = $row[0];
            $name = $row[1];
            $type = $row[2];
            $price = floatval($row[3]);
            $roast = $row[4];
            $country = $row[5];
            $image = $row[6];
            $review = $row[7];
            $date = $row[8];

            //Create coffee objects and store them in an array.
            $coffee = new CoffeeEntity ($id, $name, $type, $price, $roast, $country, $image, $review, $date);
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
            $price = floatval($row[3]);
            $roast = $row[4];
            $country = $row[5];
            $image = $row[6];
            $review = $row[7];
            $date = $row[8];

            //Create coffee objects and store them in an array.
            $coffee = new CoffeeEntity ($id, $name, $type, $price, $roast, $country, $image, $review, $date);
        }
        return $coffee;
    }

    function GetCoffeeByName($searchName)
    {
        $searchName = mb_convert_encoding($searchName, 'UTF-8');
        $dbh = $this->db->prepare("SELECT * FROM coffee WHERE name LIKE N'%$searchName%'");
        $dbh->execute();
    
        $coffeeArray = array();

        //Get data from database.
        foreach ($dbh->fetchAll() as $row) {
            $id = $row[0];
            $name = $row[1];
            $type = $row[2];
            $price = floatval($row[3]);
            $roast = $row[4];
            $country = $row[5];
            $image = $row[6];
            $review = $row[7];
            $date = $row[8];

            //Create coffee objects and store them in an array.
            $coffee = new CoffeeEntity ($id, $name, $type, $price, $roast, $country, $image, $review, $date);
            array_push($coffeeArray, $coffee);
        }
        return $coffeeArray;
    }

    function InsertCoffee(CoffeeEntity $coffee){

        $sql = "INSERT INTO coffee (name, type, price, roast, country, image, review, date )
                    VALUES (?,?,?,?,?,?,?,?)";

        $dbh= $this->db->prepare($sql);
        $dbh->execute([$coffee->name, $coffee->type, $coffee->price, $coffee->roast, $coffee->country, "Images/Coffee/".$coffee->image, $coffee->review, $coffee->date]);
        
    }
    
    function UpdateCoffee($id, CoffeeEntity $coffee){
        $sql = "UPDATE coffee SET name = ?, type = ?,price = ?,roast = ?,country = ?, image = ?,review = ?, date = ?
                        WHERE id = ?";

        $dbh= $this->db->prepare($sql);
        $dbh->execute([$coffee->name, $coffee->type, $coffee->price, $coffee->roast, $coffee->country, "Images/Coffee/".$coffee->image, $coffee->review, $coffee->date, $id]);
    }

    function DeleteCoffee($id){
        $dbh = $this->db->prepare("DELETE FROM coffee WHERE id = $id");
        $dbh->execute();
    }

    function CountRows($type) {
        $dbh = $this->db->prepare("SELECT COUNT(*) FROM coffee WHERE type LIKE '$type'");
        $dbh->execute();
        $rows = $dbh->fetchAll();
        $numberRows = $rows[0][0];
        // echo '<script>';
        // echo 'console.log('. json_encode( $numberRows ) .')';
        // echo '</script>';
        return $numberRows;
    }

    function GetCoffeeForOverViewPages($searchName, $startRow, $pageSize) {
       
        $searchName = mb_convert_encoding($searchName, 'UTF-8');
        $dbh = $this->db->prepare("SELECT * FROM coffee WHERE name LIKE N'%$searchName%' ORDER BY id OFFSET $startRow ROWS FETCH NEXT $pageSize ROWS ONLY ");
        $dbh->execute();
    
        $coffeeArray = array();
     
        // error_reporting(E_ALL);
		// ini_set('display_errors', true);

        //Get data from database.
        foreach ($dbh->fetchAll() as $row) {
            $id = $row[0];
            $name = $row[1];
            $type = $row[2];
            $price = floatval($row[3]);
            $roast = $row[4];
            $country = $row[5];
            $image = $row[6];
            $review = $row[7];
            $date = $row[8];

            //Create coffee objects and store them in an array.
            $coffee = new CoffeeEntity ($id, $name, $type, $price, $roast, $country, $image, $review, $date);
            array_push($coffeeArray, $coffee);
        
        }
        return $coffeeArray;
    }
}
?>