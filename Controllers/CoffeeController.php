<?php
namespace App\Controllers;

use App\Models\CoffeeModel;
use App\Entities\CoffeeEntity;
//Contains non-database related function for the Coffee page
class  CoffeeController extends BaseController
{

    function CreateOverviewTable()
    {
        $coffeeArray = $this->GetCoffeeByType('%');
        $this->tpl->assign('coffeeArray', $coffeeArray);
        $result = $this->tpl->fetch('Table.tpl');
        return $result;
    }

    function CreateCoffeeDropdownlist()
    {
        $coffeeModel = new CoffeeModel();
        $valueArry = $this->GetCoffeeTypes();
        $this->tpl->assign('valueArry', $valueArry);
        $result = $this->tpl->fetch('coffeeDropdownlist.tpl');
        return $result;
    }

    function console_log( $data ){
        echo '<script>';
        echo 'console.log('. json_encode( $data ) .')';
        echo '</script>';
    }

    function CreateCoffeeTables($types)
    {
        $coffeeModel = new CoffeeModel();
        $coffeeArray = $coffeeModel->GetCoffeeByType($types);
        $this->tpl->assign('coffeeArray', $coffeeArray);
        $result = $this->tpl->fetch('coffeeTable.tpl');
        return $result;
    }
    function CreateProductList()
    {
        $coffeeModel = new CoffeeModel();
        $coffeeArray = $coffeeModel->GetCoffeeByType("%");
        $this->tpl->assign('coffeeArray', $coffeeArray);
        $result = $this->tpl->fetch('products.tpl');
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

    //<editor-fold desc="Set Methods">
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

