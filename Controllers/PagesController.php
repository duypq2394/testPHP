<?php
namespace App\Controllers;

use App\Models\CoffeeModel;
use App\Controllers\CoffeeController;
use App\Controllers\OrderController;
error_reporting(0);
session_start();
class PagesController extends BaseController
{
  public function index()
  {
    $title = "Home";
    $content = $this->tpl->fetch('pages/index.tpl');
    $this->tpl->assign('title', $title);
    $this->tpl->assign('content', $content);
    $this->tpl->display('Template.tpl' );
  }

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
  

    $title = "Coffee overview";
    $content = $coffeeController->CreateCoffeeDropdownlist().$coffeeTables;

   
    // $content = $this->tpl->fetch('pages/coffee.tpl');
    $this->tpl->assign('title', $title);
    $this->tpl->assign('content', $content);
    $this->tpl->display('Template.tpl' );
  }

  public function management()
  { 
    if((isset($_COOKIE["username"]) && isset($_COOKIE["password"])) ||
    (isset($_SESSION["username"]) && isset($_SESSION["password"]))){
      $title = "Manage coffee objects";
      $content = $this->tpl->fetch('pages/management.tpl');
      $this->tpl->assign('title', $title);
      $this->tpl->assign('content', $content);
      $this->tpl->display('Template.tpl');       
    }else {
      header("location: loginManagement");
    }
  }

  public function coffeeAdd()
  {
    $coffeeController = new CoffeeController($this->url, $this->action);
    $coffeeModel = new CoffeeModel();
    $valueArray = $coffeeModel->GetCoffeeTypes();
    $title = 'Add a new Coffee';
    $images = $coffeeController->GetImages();

    if(isset($_POST["txtName"])) $coffeeController->InsertCoffee();
    
    $this->tpl->assign('title', $title);
    $this->tpl->assign('images',$images);
    $this->tpl->assign('valueArray', $valueArray);
    $content = $this->tpl->fetch('pages/coffeeAdd.tpl');
    $this->tpl->assign('content', $content);
    $this->tpl->display('Template.tpl' );
  }

  public function coffeeUpdate()
  {
    $coffeeController = new CoffeeController($this->url, $this->action);
    $coffeeModel = new CoffeeModel();
    $valueArray = $coffeeModel->GetCoffeeTypes();
    $images = $coffeeController->GetImages();
    $title = "Update Title";
    $this->tpl->assign('title', $title);
    $this->tpl->assign('images',$images);
    $this->tpl->assign('valueArray', $valueArray);


    if (isset($_POST["update"])) {
      $coffee = $coffeeController->GetCoffeeById($_POST["update"]);
      $this->tpl->assign('coffee', $coffee);
      $content = $this->tpl->fetch('pages/coffeeUpdate.tpl');
    }
    if(isset($_POST["intId"])) {
      $this->UpdateCoffee($_POST["intId"]);
      $content = $this->tpl->fetch('pages/coffeeAdd.tpl');
    }

    $this->tpl->assign('content', $content);
    $this->tpl->display('Template.tpl' );
  }

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

  public function loginManagement()
  {
    if(isset($_POST['username'])){
      if($_POST['username'] == 'admin' && $_POST['password'] == 'admin'){
        
        $_SESSION["username"] = $_POST["username"];
        $_SESSION["password"] = $_POST["password"];


        if(isset($_POST['remember'])){
          setcookie ("username", $_POST['username'], time() + (86400 * 30), "/");
          setcookie ("password", $_POST['password'], time() + (86400 * 30), "/");
        }
      
        header("location: management");
  
      }else {
        $this->tpl->assign("error", "ユーザー名またはパスワードが間違っています。");
      }
    }

    $title = "Login";
    $content = $this->tpl->fetch('pages/login.tpl');
    $this->tpl->assign('title', $title);
    $this->tpl->assign('content', $content);
    $this->tpl->display('Template.tpl' );
  }

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
    $productList = $this->tpl->fetch('products.tpl');
   
    $this->tpl->assign('title', $title);
    $this->tpl->assign('content', $productList);
    $this->tpl->display('Template.tpl' );
  }

  public function error()
  {
    $this->tpl->display('error.tpl' );
  }
}