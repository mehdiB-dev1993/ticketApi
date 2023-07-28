<?php

namespace App\Models;

use App\Core\DB;

class TicketModel

{
    public function GetList()
    {
        $db = new DB();

        $query = "select * from tickets ";
        return $db->Read($query);
    }

    public function CreateTicket($data)
    {
        $db = new DB();

        $LastID = $db->Create('tickets',$data);
        $data = array('userID' => 0 ,'ticketID' => $LastID);
        $db->Create('user_ticket',$data);
        return 'created!';
    }

    public function UpdateTicket($data,$condition)
    {
        $db = new DB();
        $result = $db->Update('tickets',$data,$condition);
        return $result;
    }
    public function DeleteTicket()
    {
        $db = new DB();
        $result = $db->Delete('tickets');
        return $result;
    }
}
