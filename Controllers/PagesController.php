<?php
namespace App\Controllers;

use App\Models\HomeModel;
use App\Controllers\CoffeeController;
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
    $this->tpl->assign('content', $content);
    $this->tpl->display('Template.tpl' );
  }

  public function error()
  {
    $this->tpl->display('error.tpl' );
  }
}