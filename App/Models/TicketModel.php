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

        $ticketID = $this->db->Create('tickets',$data);

        $query = "SELECT ut.userID,u.fullname,COUNT(ut.ticketID) AS CT 
                    FROM user_ticket ut INNER JOIN users u
                    ON ut.userID = u.id
                    GROUP BY ut.userID ORDER BY CT ASC;";
        $userID = $this->db->Read($query)[0]['userID'];


        $data = array('userID' => $userID ,'ticketID' => $ticketID);
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
