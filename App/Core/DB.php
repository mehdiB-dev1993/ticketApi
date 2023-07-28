<?php
namespace App\Core;

use App\Config\DB_Config;
use PDO;

class DB
{

    public $Connector;
    public function __construct()
    {
     $this->Connector = DB_Config::getInstance();

    }


    public function Create($tableName,$data)
    {
        $columns = array_keys($data);
        $query = "INSERT INTO $tableName (" . implode(', ', $columns) . ") VALUES (:" . implode(', :', $columns) . ")";

        $stmt = $this->Connector->Connector->prepare($query);

        foreach ($data as $key => $val) {
            $stmt->bindValue(':'. $key, $val);

        }
        $stmt->execute();
        return  $this->Connector->Connector->lastInsertId();


    }

    public function Read($query,$fetch='')
    {

        $statement = $this->Connector->Connector->prepare($query);
        $statement->execute();
        if ($statement->rowCount() > 0) {
            if ($fetch != '') {
                $result = $statement->fetch(PDO::FETCH_ASSOC);
            } else {
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            }
            return $result;
        }


        return null;

    }

    public function Update($tableName,$data,$condition)
    {
        $query = "UPDATE $tableName SET ";


        $updates = array();
        foreach ($data as $column => $value) {
            $updates[] = "$column = :$column";
        }
        $query .= implode(", ", $updates);

        // اضافه کردن شرط به کوئری
        if (!empty($condition)) {
            $query .= " WHERE $condition";
        }

        // آماده‌سازی و اجرای کوئری با استفاده از PDO
        $stmt = $this->Connector->Connector->prepare($query);
        foreach ($data as $column => $value) {
            $stmt->bindValue(":$column", $value);
        }

        if ($stmt->execute()) {
            return true; // بروزرسانی با موفقیت انجام شد
        } else {
            return false; // خطا در بروزرسانی
        }

    }

    public function Delete($tableName)
    {
        $idColumn = 'id';
        $recordId = $_REQUEST['id'];

        // تهیه کوئری DELETE داینامیک
        $query = "DELETE FROM $tableName WHERE $idColumn = :id";

        // آماده‌سازی کوئری با استفاده از PDO
        $stmt = $this->Connector->Connector->prepare($query);

        // بایند کردن شناسه رکورد به پارامتر :id
        $stmt->bindValue(':id', $recordId);

        // اجرای کوئری
        if ($stmt->execute()) {
            echo "رکورد با شناسه $recordId با موفقیت حذف شد.";
        } else {
            echo "خطا در حذف رکورد با شناسه $recordId.";
        }
    }


}
