<?php
namespace App\Controllers;

use App\Models\CoffeeModel;
use App\Entities\CoffeeEntity;
/**
  * Containing functions for the pages relating to coffee object
  */
class  CoffeeController extends BaseController
{

    //Renders list of coffee for managing
    function CreateOverviewTable()
    {
        $coffeeArray = $this->GetCoffeeByType('%');
        $this->tpl->assign('coffeeArray', $coffeeArray);
        $result = $this->tpl->fetch('Table.tpl');
        return $result;
    }
    
     //Create dropdown list of types of coffee
    function CreateCoffeeTypeDropdownlist()
    {
        $coffeeModel = new CoffeeModel();
        $valueArry = $this->GetCoffeeTypes();
        $this->tpl->assign('valueArry', $valueArry);
        $result = $this->tpl->fetch('CoffeeDropdownlist.tpl');
        return $result;
    }

    //Fill page with coffees of the selected type
    function CreateCoffeeTables($types)
    {
        $coffeeModel = new CoffeeModel();
        $coffeeArray = $coffeeModel->GetCoffeeByType($types);
        $this->tpl->assign('coffeeArray', $coffeeArray);
        $result = $this->tpl->fetch('CoffeeTable.tpl');
        return $result;
    }

    //Renders list of coffee products that are used for order
    function CreateProductList()
    {
        $coffeeModel = new CoffeeModel();
        $coffeeArray = $coffeeModel->GetCoffeeByType("%");
        $this->tpl->assign('coffeeArray', $coffeeArray);
        $result = $this->tpl->fetch('Products.tpl');
        return $result;
    }

    //Returns list of files in a folder
    function GetImages(){
        //Select folder to scan
        $handle = opendir("Images/Coffee");

        //Read all files and store names in array
        while($image = readdir($handle))
        {
            $images[] = $image;
        }

        closedir($handle);

        //Exclude all filenames where filename length < 3
        $imageArray = array();
        foreach($images as $image)
        {
            if(strlen($image) > 2)
            {
                array_push($imageArray, $image);
            }
        }
        return $imageArray;
    }

    function InsertCoffee() {
        $name = $_POST["txtName"];
        $type = $_POST["ddlType"];
        $price = $_POST["txtPrice"];
        $roast = $_POST["txtRoast"];
        $country = $_POST["txtCountry"];
        $image = $_POST["ddlImage"];
        $review = $_POST["txtReview"];

        $coffee = new CoffeeEntity (-1, $name, $type, $price, $roast, $country, $image, $review);
        $coffeeModel = new CoffeeModel();
        $coffeeModel->InsertCoffee($coffee);
    }

    function UpdateCoffee($id) {
        $name = $_POST["txtName"];
        $type = $_POST["ddlType"];
        $price = $_POST["txtPrice"];
        $roast = $_POST["txtRoast"];
        $country = $_POST["txtCountry"];
        $image = $_POST["ddlImage"];
        $review = $_POST["txtReview"];

        $coffee = new CoffeeEntity ($id, $name, $type, $price, $roast, $country, $image, $review);
        $coffeeModel = new CoffeeModel();
        $coffeeModel->UpdateCoffee($id, $coffee);
    }

    function DeleteCoffee($id) 
    {
        $coffeeModel = new CoffeeModel();
        $coffeeModel->DeleteCoffee($id);
    }

    function GetCoffeeById($id) {
        $coffeeModel = new CoffeeModel();
        return $coffeeModel->GetCoffeeById($id);
    }

    function GetCoffeeByType($type) {
        $coffeeModel = new CoffeeModel();
        return $coffeeModel->GetCoffeeByType($type);
    }

    function GetCoffeeTypes() {
        $coffeeModel = new CoffeeModel();
        return $coffeeModel->GetCoffeeTypes();
    }
}

?>

