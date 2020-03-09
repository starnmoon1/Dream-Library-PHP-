<?php


class CategoriesDB
{
    private $conn;

    public function __construct()
    {
        $db = new DBConnect();
        $this->conn = $db->connect();
    }

    public function getList(){
        $sql = "SELECT * FROM categories";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $arr=[];
        foreach ($result as $item) {
            $categories = new Categories(
                $item['categoryName']
            );
            $categories->setCategoryCode($item['categoryCode']);
            array_push($arr,$categories);
        }
        return $arr;
    }

}