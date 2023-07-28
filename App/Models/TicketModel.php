<?php

namespace App\Models;

use App\Core\DB;

class TicketModel

{
    protected $db;

    public function __construct()
    {
        $this->db = new DB();
    }

    public function GetList()
    {


        $query = "select * from tickets ";
        return $this->db->Read($query);
    }

    public function CreateTicket($data)
    {

        $LastID = $this->db->Create('tickets',$data);
        $data = array('userID' => 0 ,'ticketID' => $LastID);
        $this->db->Create('user_ticket',$data);
        return 'created!';
    }

    public function UpdateTicket($data,$condition)
    {

        $result = $this->db->Update('tickets',$data,$condition);
        return $result;
    }
    public function DeleteTicket()
    {

        $result = $this->db->Delete('tickets');
        return $result;
    }
}
