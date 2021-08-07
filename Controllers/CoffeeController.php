<?php
namespace App\Controllers;

require_once ('./PHPExcel/Classes/PHPExcel/IOFactory.php');
require_once ('./PHPExcel/Classes/PHPExcel.php');

use App\Models\CoffeeModel;
use App\Entities\CoffeeEntity;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
/**
  * Containing functions for the pages relating to coffee object
  */
class  CoffeeController extends BaseController
{
    const PAGESIZE = 9;

    //Renders list of coffee for managing
    function CreateOverviewTable($name)
    {
        if(!isset($_GET['page'])|| $_GET['page' ]== '1'){
            $startPage = 0;
            $currentPage = 1;
        } else {
            $startPage = ($_GET['page'] - 1) * self::PAGESIZE;
            $currentPage = $_GET['page'];
        }
        $coffeeModel = new CoffeeModel();
        $coffeeArray = $coffeeModel->GetCoffeeForOverViewPages($name, $startPage, self::PAGESIZE);
        $numberRows = $coffeeModel->CountRows('%');
        // echo '<script>';
        // echo 'console.log('. json_encode( $numberRows ) .')';
        // echo '</script>';
        $this->tpl->assign('numberRows', $numberRows);
        $this->tpl->assign('pageSize', self::PAGESIZE);
        $this->tpl->assign('page', $currentPage);
        $this->tpl->assign('action',$this->action);
        $paging = $this->tpl->fetch('Paging.tpl');

        $this->tpl->assign('coffeeArray', $coffeeArray);
        $this->tpl->assign('paging', $paging);
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
    function CreateCoffeeTables()
    {
        if(!isset($_GET['page'])|| $_GET['page' ]== '1'){
            $startPage = 0;
            $currentPage = 1;
        } else {
            $startPage = ($_GET['page'] - 1) * self::PAGESIZE;
            $currentPage = $_GET['page'];
        }

        $coffeeModel = new CoffeeModel();
        if(isset($_POST['types']))
        {
          //Fill page with coffees of the selected type
          $coffeeArray = $coffeeModel->GetCoffeeByType($_POST['types'], $startPage, self::PAGESIZE);
          $numberRows = $coffeeModel->CountRows($_POST['types']);
        }
        else{
          //Page is loaded for the first time, no type selected -> Fetch all types
          $coffeeArray = $coffeeModel->GetCoffeeByType('%', $startPage, self::PAGESIZE);
          $numberRows = $coffeeModel->CountRows('%');
        }
        // echo '<script>';
        // echo 'console.log('. json_encode($_POST['types'] ) .')';
        // echo '</script>';
        $this->tpl->assign('numberRows', $numberRows);
        $this->tpl->assign('pageSize', self::PAGESIZE);
        $this->tpl->assign('page', $currentPage);
        $this->tpl->assign('action',$this->action);
        $paging = $this->tpl->fetch('Paging.tpl');

        $this->tpl->assign('coffeeArray', $coffeeArray);
        $this->tpl->assign('paging', $paging);
        $result = $this->tpl->fetch('CoffeeTable.tpl');
        return $result;
    }

    //Renders list of coffee products that are used for order
    function CreateProductList()
    {
        if(!isset($_GET['page'])|| $_GET['page' ]== '1'){
            $startPage = 0;
            $currentPage = 1;
        } else {
            $startPage = ($_GET['page'] - 1) * self::PAGESIZE;
            $currentPage = $_GET['page'];
        }
        $coffeeModel = new CoffeeModel();
        $numberRows = $coffeeModel->CountRows('%');
        $coffeeArray = $coffeeModel->GetCoffeeByType('%', $startPage, self::PAGESIZE);

        $this->tpl->assign('numberRows', $numberRows);
        $this->tpl->assign('pageSize', self::PAGESIZE);
        $this->tpl->assign('page', $currentPage);
        $this->tpl->assign('action',$this->action);
        $paging = $this->tpl->fetch('Paging.tpl');

        $this->tpl->assign('coffeeArray', $coffeeArray);
        $this->tpl->assign('paging', $paging);
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
        $price = floatval($_POST["txtPrice"]);
        $roast = $_POST["txtRoast"];
        $country = $_POST["txtCountry"];
        $image = $_POST["ddlImage"];
        $review = $_POST["txtReview"];
        $date = date("Y/m/d");

        $coffee = new CoffeeEntity (-1, $name, $type, $price, $roast, $country, $image, $review, $date);
        $coffeeModel = new CoffeeModel();
        $coffeeModel->InsertCoffee($coffee);
    }

    function UpdateCoffee($id) {
        $name = $_POST["txtName"];
        $type = $_POST["ddlType"];
        $price = floatval($_POST["txtPrice"]);
        $roast = $_POST["txtRoast"];
        $country = $_POST["txtCountry"];
        $image = $_POST["ddlImage"];
        $review = $_POST["txtReview"];
        $date = $_POST["dateTime"];

        $coffee = new CoffeeEntity ($id, $name, $type, $price, $roast, $country, $image, $review, $date);
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

    public function downloadListCoffee(){
        $coffeeModel = new CoffeeModel();
        $database = $coffeeModel->GetALLCoffee();
        // Create new PHPExcel object
        $objPHPExcel = new \PHPExcel(); 
        //setting column heading

        $objPHPExcel->getActiveSheet()->setCellValue('A1',"ID"); 
        $objPHPExcel->getActiveSheet()->setCellValue('B1',"Name"); 
        $objPHPExcel->getActiveSheet()->setCellValue('C1',"Type"); 
        $objPHPExcel->getActiveSheet()->setCellValue('D1',"Price"); 
        $objPHPExcel->getActiveSheet()->setCellValue('E1',"Roast"); 
        $objPHPExcel->getActiveSheet()->setCellValue('F1',"Country"); 
        $objPHPExcel->getActiveSheet()->setCellValue('G1',"Review"); 
        
        //setting column body
        $i=2; //starting from row 2 bcz row 1 set to header
        foreach($database as $data) {
            $objPHPExcel->getActiveSheet()->setCellValue('A'.$i,$data->id);
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$i,$data->name);
            $objPHPExcel->getActiveSheet()->setCellValue('C'.$i,$data->type);
            $objPHPExcel->getActiveSheet()->setCellValue('D'.$i,$data->price);
            $objPHPExcel->getActiveSheet()->setCellValue('E'.$i,$data->roast);
            $objPHPExcel->getActiveSheet()->setCellValue('F'.$i,$data->country);
            $objPHPExcel->getActiveSheet()->setCellValue('G'.$i,$data->review);
            $i++;
        }

        // Redirect output to a client’s web browser (Excel5)
        header('Content-Encoding: UTF-8');
        header('Content-Type: application/csv; charset=UTF-8');
        header('Content-Disposition: attachment;filename="export.csv"');
        header('Cache-Control: max-age=0');
        
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');
    
        $objWriter->save('php://output');
        exit;
    } 
}

?>

