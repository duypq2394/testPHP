<?php

namespace App\Models;
use App\Entities\CoffeeEntity;

use App\Classes\Database;

abstract class BaseModel {

    protected $db;

    function __construct(){
        
        $this->db = Database::connect();
    }
}