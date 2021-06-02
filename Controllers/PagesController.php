<?php
namespace App\Controllers;

use App\Models\CoffeeModel;
use App\Models\OrderModel;
use App\Controllers\CoffeeController;
use App\Controllers\OrderController;
error_reporting(0);
session_start();
/**
  * Rendering pages
  */
class PagesController extends BaseController
{
  //Render home page
  public function index()
  {
    $title = "Home";
    $content = $this->tpl->fetch('pages/index.tpl');
    $this->tpl->assign('title', $title);
    $this->tpl->assign('content', $content);
    $this->tpl->display('Template.tpl' );
  }

  //Render coffee products introduction (製品の紹介) page
  public function coffee()
  {
    $coffeeController = new CoffeeController($this->url, $this->action);
    if(isset($_POST['types']))
    {
      //Fill page with coffees of the selected type
      $coffeeTables = $coffeeController->CreateCoffeeTables($_POST['types']);
    }
    else{
      //Page is loaded for the first time, no type selected -> Fetch all types
      $coffeeTables = $coffeeController->CreateCoffeeTables('%');
    }
  

    $title = "Coffee Overview";
    $content = $coffeeController->CreateCoffeeTypeDropdownlist().$coffeeTables;

    $this->tpl->assign('title', $title);
    $this->tpl->assign('content', $content);
    $this->tpl->display('Template.tpl' );
  }

  //Render management (管理) page
  public function management()
  { 
    //Check Session and Cookie
    if((isset($_COOKIE["username"]) && isset($_COOKIE["password"])) ||
    (isset($_SESSION["username"]) && isset($_SESSION["password"]))){
      $title = "Manage coffee objects";
      $content = $this->tpl->fetch('pages/Management.tpl');
      $this->tpl->assign('title', $title);
      $this->tpl->assign('content', $content);
      $this->tpl->display('Template.tpl');       
    }else {
      //Return to login page
      header("location: loginManagement");
    }
  }

  //Render adding coffee  page
  public function coffeeAdd()
  {
    $coffeeController = new CoffeeController($this->url, $this->action);
    $coffeeModel = new CoffeeModel();

    $title = 'Add a new Coffee';
    //$valueArray = $coffeeModel->GetCoffeeTypes();
    $valueArray=['Classic','Espresso','Latte'];
    $images = $coffeeController->GetImages();

    if(isset($_POST["txtName"])) $coffeeController->InsertCoffee();
    
    $this->tpl->assign('title', $title);
    $this->tpl->assign('images',$images);
    $this->tpl->assign('valueArray', $valueArray);
    $content = $this->tpl->fetch('pages/CoffeeAdd.tpl');
    $this->tpl->assign('content', $content);
    $this->tpl->display('Template.tpl' );
  }

  //Render updating coffee  page
  public function coffeeUpdate()
  {
    $coffeeController = new CoffeeController($this->url, $this->action);
    $coffeeModel = new CoffeeModel();

    $title = "Update Title";
    // $valueArray = $coffeeModel->GetCoffeeTypes();
    $valueArray=['Classic','Espresso','Latte'];
    $images = $coffeeController->GetImages();

    $this->tpl->assign('title', $title);
    $this->tpl->assign('images',$images);
    $this->tpl->assign('valueArray', $valueArray);

    //Render the coffee product's information to users check and edit
    if (isset($_POST["update"])) {
      $coffee = $coffeeController->GetCoffeeById($_POST["update"]);
      $this->tpl->assign('coffee', $coffee);
      $content = $this->tpl->fetch('pages/CoffeeUpdate.tpl');
    }

    //Update coffee product's information by it's own id
    if(isset($_POST["coffeeId"])) {
      $id = (int)$_POST["coffeeId"];
      $coffeeController->UpdateCoffee($id);
     
      $content = $this->tpl->fetch('pages/CoffeeAdd.tpl');
    }

    $this->tpl->assign('content', $content);
    $this->tpl->display('Template.tpl' );
  }

  //Render coffee over view page for management
  public function coffeeOverView()
  {
    $coffeeController = new CoffeeController($this->url, $this->action);
    if(isset($_POST['delete']))
    {
      $coffeeController->DeleteCoffee($_POST["delete"]);
    }
    $title = "Manage coffee objects";
    $content = $coffeeController->CreateOverViewTable();
    $this->tpl->assign('title', $title);
    $this->tpl->assign('content', $content);
    $this->tpl->display('Template.tpl' );
  }

  //Login to enter management page
  public function loginManagement()
  {
    if(isset($_POST['username'])){
      if($_POST['username'] == 'admin' && $_POST['password'] == 'admin'){
        
        $_SESSION["username"] = $_POST["username"];
        $_SESSION["password"] = $_POST["password"];

        //If 'remember' box is checked, user name and password are saved for a day
        if(isset($_POST['remember'])){
          setcookie ("username", $_POST['username'], time() + (3600 * 24), "/");
          setcookie ("password", $_POST['password'], time() + (3600 * 24), "/");
        }
        
        //Returning to management page
        header("location: management");
  
      }else {
        $this->tpl->assign("error", "ユーザー名またはパスワードが間違っています。");
      }
    }

    $title = "Login";
    $content = $this->tpl->fetch('pages/Login.tpl');
    $this->tpl->assign('title', $title);
    $this->tpl->assign('content', $content);
    $this->tpl->display('Template.tpl' );
  }

  //Render shop（ショップ）page
  public function shop()
  {

    $coffeeController = new CoffeeController($this->url, $this->action);
    $orderController = new OrderController($this->url, $this->action);
    $coffeeModel = new CoffeeModel();

    $title = "shop";
    if($_POST["txtName"]) {
      $error = $orderController->InsertOrder();
    }
    if(isset($error)){
      $this->tpl->assign('error', $error);
    }

    $coffeeArray = $coffeeModel->GetCoffeeByType("%");
    $this->tpl->assign('coffeeArray', $coffeeArray);
    $productList = $this->tpl->fetch('Products.tpl');
   
    $this->tpl->assign('title', $title);
    $this->tpl->assign('content', $productList);
    $this->tpl->display('Template.tpl' );
  }

  //Render list of order
  public function orderList(){
   
    $orderController = new OrderController($this->url, $this->action);
    $orderModel = new OrderModel();
    if(isset($_POST['finish']))
    {
      $orderController->DeleteOrder($_POST["finish"]);
    }
    $title = "List of orders";
    $content = $orderController->CreateOrderList();
    $this->tpl->assign('title', $title);
    $this->tpl->assign('content', $content);
    $this->tpl->display('Template.tpl' );

  }

  public function uploadImage(){
    if (isset($_POST["submit"])) {
      $fileType = $_FILES["file"]["type"];
  
      if (($fileType == "image/gif") ||
              ($fileType == "image/jpeg") ||
              ($fileType == "image/jpg") ||
              ($fileType == "image/png")) {
          //Check if file exists
          if (file_exists("Images/Coffee/" . $_FILES["file"]["name"])) {
              echo '<script>alert("ファイルが存在していました。")</script>';
          } else {
              move_uploaded_file($_FILES["file"]["tmp_name"], "Images/Coffee/" . $_FILES["file"]["name"]);
              echo '<script>alert("アップロードが完了しました")</script>';
          }
      }
    }
    $title = "Upload new image";
    $content = $this->tpl->fetch('pages/upLoadImage.tpl');
    $this->tpl->assign('title', $title);
    $this->tpl->assign('content', $content);
    $this->tpl->display('Template.tpl' );
  
  }
  
  //Render "about" (お店について) page
  public function about(){
    $title = "About";
    $content = '<div id="maps"></div>';
    $this->tpl->assign('title', $title);
    $this->tpl->assign('content', $content);
    $this->tpl->display('Template.tpl' );
  }
  
  public function error()
  {
    $this->tpl->display('error.tpl' );
  }
}