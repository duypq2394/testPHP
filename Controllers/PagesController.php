<?php
namespace App\Controllers;

use App\Models\CoffeeModel;
use App\Models\OrderModel;
use App\Controllers\CoffeeController;
use App\Controllers\OrderController;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
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
    $title = "Coffee Overview";
    $coffeeTables = $coffeeController->CreateCoffeeTables();
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
      header("location: ?action=loginManagement");
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

    if(isset($_POST["addCoffee"])) 
    {
      echo '<script>';
        echo 'console.log('. json_encode('kkk' ) .')';
        echo '</script>';
      if(empty($_POST["txtName"])) 
      {
        $this->tpl->assign('nameErr', "コーヒ名を入力してください");
      } else {
        echo '<script>';
        echo 'console.log('. json_encode('ddd' ) .')';
        echo '</script>';
        $coffeeController->InsertCoffee();
      }
    }
    
    $this->tpl->assign('title', $title);
    $this->tpl->assign('images',$images);
    $this->tpl->assign('valueArray', $valueArray);
    $this->tpl->assign('date',date("Y/m/d"));
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
      $_POST = array();
    }

    //Update coffee product's information by it's own id
    if(isset($_POST["coffeeId"])) {
      $id = (int)$_POST["coffeeId"];
      $coffeeController->UpdateCoffee($id);
     
      $content = $this->tpl->fetch('pages/CoffeeAdd.tpl');
      $_POST = array();
    }

    $this->tpl->assign('content', $content);
    $this->tpl->display('Template.tpl' );
  }

  //Render coffee over view page for management
  public function coffeeOverView()
  {
    $coffeeController = new CoffeeController($this->url, $this->action);
    
    if(isset($_POST['searchName']))
    {
      $coffeeTables = $coffeeController->CreateOverViewTable($_POST['searchName']);
      $_POST = array();
    }
    else{
      $coffeeTables = $coffeeController->CreateOverViewTable('');
    }

    if(isset($_POST['delete']))
    {
      $coffeeController->DeleteCoffee($_POST["delete"]);
      header('Location: ?action=coffeeOverView');
    }

    if(isset($_POST['downloadListCoffee']))
    {
      $coffeeController->downloadListCoffee();
    }

    $title = "Manage coffee objects";
    $content = $coffeeTables;
    $this->tpl->assign('title', $title);
    $this->tpl->assign('content', $content);
    $this->tpl->display('Template.tpl' );
    $_POST = array();
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
        $_POST = array();
        //Returning to management page
        header("location: ?action=management");
        
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
    $productList = $coffeeController->CreateProductList();
   
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
      $_POST = array();
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
      $_POST = array();
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
  
  public function contact() {
    $mail = new PHPMailer(true);
    
    if(isset($_POST['sendEmail']))
    {
      try {
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                     
        $mail->isSMTP();                                           
        $mail->Host       = 'smtp.gmail.com';               
        $mail->SMTPAuth   = true;                                
        $mail->Username   = 'simple.cofeeshop@gmail.com';                    
        $mail->Password   = 'zaTbej-dogcyk-vuwdi3';                           
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;      
        $mail->Port       = 465;                            

        $mail->setFrom('from@example.com', 'Coffee Shop');
        $mail->addAddress('simple.coffeeshop@gmail.com');           
        $mail->addReplyTo('simple.coffeeshop@gmail.com', 'Coffee Shop');
        
        $title = mb_encode_mimeheader($_POST['title'], "ISO-2022-JP");
        $mail->isHTML(true);                                  
        $mail->Subject = $title;
        $mail->Body    = $_POST['message'];
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        if(!empty($_POST['addedEmail'])) { 
          if (!filter_var($_POST['addedEmail'], FILTER_VALIDATE_EMAIL)) {
            $this->tpl->assign('emailErr', "メールアドレスの形式が正しくありません");
          } else {
            switch ($_POST['otherEmail']) {
              case 1:
                  $mail->addAddress($_POST['addedEmail']);  
                  break;
              case 2:
                  $mail->addCC($_POST['addedEmail']);
                  break;
              case 3:
                  $mail->addBCC($_POST['addedEmail']);
                  break;
              default:
                  break;
            }
          }
        }
        if(empty($_POST['title'])) {
          $this->tpl->assign('titleErr', "件名を入力してください");
        }
        if(empty($_POST['message'])) {
          $this->tpl->assign('messageErr', "メッセージを入力してください");
        }
        $mail->send();
        header("location: ?action=contact");
      } catch (Exception $e) {
          // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
          echo '<script>';
          echo 'console.log('. json_encode($mail->ErrorInfo) .')';
          echo '</script>';
      }
      
      // error_reporting(E_ALL);
      // ini_set('display_errors', true);
    }
    $content = $this->tpl->fetch('pages/emailForm.tpl');
    $this->tpl->assign('title', $title);
    $this->tpl->assign('content', $content);
    $this->tpl->display('Template.tpl' );
  }
  public function error()
  {
    $this->tpl->display('error.tpl' );
  }
}