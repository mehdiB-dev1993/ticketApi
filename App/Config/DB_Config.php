<?php
namespace App\Config;

use App\Config\Define;
use PDO;

class DB_Config
{


    public $Connector;
    public static $instance;
    private $Sn;
    private $DB;
    private $Un;
    private $PW;

    public function __construct()
    {
       $this->Sn = Define::GetServerName();
       $this->DB = Define::GetDbName();
       $this->Un = Define::GetUsername();
       $this->PW = Define::GetPassword();
       $this->Setup();

    }

    public function Setup()
    {
        try {
            $this->Connector = new PDO("mysql:host = $this->Sn ;dbname=$this->DB;",$this->Un,$this->PW);
            $this->Connector->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo 'connected';
        }catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }



}
