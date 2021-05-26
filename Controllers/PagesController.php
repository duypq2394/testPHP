<?php
namespace App\Controllers;

use App\Models\CoffeeModel;
use App\Controllers\CoffeeController;
error_reporting(0);
session_start();
class PagesController extends CoffeeController
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
    if(isset($_POST['types']))
    {
      //Fill page with coffees of the selected type
      $coffeeTables = $this->CreateCoffeeTables($_POST['types']);
    }
    else{
      //Page is loaded for the first time, no type selected -> Fetch all types
      $coffeeTables = $this->CreateCoffeeTables('%');
    }
  

    $title = "Coffee overview";
    $content = $this->CreateCoffeeDropdownlist().$coffeeTables;

   
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
    $coffeeModel = new CoffeeModel();
    $valueArray = $coffeeModel->GetCoffeeTypes();
    $title = 'Add a new Coffee';
    $images = $this->GetImages();

    if(isset($_POST["txtName"])) $this->InsertCoffee();
    
    $this->tpl->assign('title', $title);
    $this->tpl->assign('images',$images);
    $this->tpl->assign('valueArray', $valueArray);
    $content = $this->tpl->fetch('pages/coffeeAdd.tpl');
    $this->tpl->assign('content', $content);
    $this->tpl->display('Template.tpl' );
  }

  public function coffeeUpdate()
  {
    $coffeeModel = new CoffeeModel();
    $valueArray = $coffeeModel->GetCoffeeTypes();
    $images = $this->GetImages();
    $title = "Update Title";
    $this->tpl->assign('title', $title);
    $this->tpl->assign('images',$images);
    $this->tpl->assign('valueArray', $valueArray);


    if (isset($_POST["update"])) {
      $coffee = $this->GetCoffeeById($_POST["update"]);
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
    if(isset($_POST['delete']))
    {
      $this->DeleteCoffee($_POST["delete"]);
    }
    $title = "Manage coffee objects";
    $content = $this->CreateOverViewTable();
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

  public function error()
  {
    $this->tpl->display('error.tpl' );
  }
}