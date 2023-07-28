<?php

namespace App\Models;


use App\Core\DB;

class AuthenticationModel

{

    public function login()
    {
       $db = new DB();
       $username = $_REQUEST['username'];
       $password = $_REQUEST['password'];
      // $query = "select * from users u inner JOIN user_role ur on u.id = ur.userID where u.username = '$username' and u.password = '$password'";
        $query = "SELECT * FROM
                            (
                        SELECT b.userID,b.username,b.password,b.title AS aliasName,GROUP_CONCAT(p.title) AS ACL  FROM
                            (
                                SELECT * FROM
                                        (SELECT u.id AS userID,u.username,u.password,u.fullName,ur.aliasName FROM users u INNER JOIN user_role ur ON u.id = ur.userID)a INNER JOIN role r ON a.aliasName = r.id)
                                                    b INNER JOIN permission p ON b.aliasName = p.roleID GROUP BY b.userID) c WHERE c.username = '$username' AND c.password = '$password'";
       return $db->Read($query);

    }

}
