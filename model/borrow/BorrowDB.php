<?php

class BorrowDB
{
    private $conn;

    public function __construct()
    {
        $db = new DBConnect();
        $this->conn = $db->connect();
    }

/// HIỂN THỊ
    public function getList()
    {
        $sql = "
            SELECT b.borrowCode, u.userName, bo.bookName, b.borrowDate,b.deadlineDay
            FROM borrow b
            INNER JOIN user u
            ON b.userCode = u.userCode
            INNER JOIN books bo
            ON b.bookCode = bo.bookCode
            ORDER by u.userName DESC
                ";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $arr = [];
        foreach ($result as $item) {
            $borrowList = $this->createBorrowFromResult($item);
            array_push($arr, $borrowList);
        }
        return $arr;
    }


    public function createBorrowFromResult($item)
    {
        $borrowList = new BorrowList($item['userName'],
            $item['bookName'],
            $item['borrowDate'],
            $item['deadlineDay']
        );
        $borrowList->setBorrowCode($item['borrowCode']);
        return $borrowList;
    }

    //ADD

    public function add($borrow)
    {
        $sql = "INSERT INTO borrow(userCode, borrowDate, deadlineDay,bookCode) 
                VALUE (:userCode, :borrowDate, :deadlineDay,:bookCode)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':userCode', $borrow->getUserCode());
        $stmt->bindParam(':borrowDate', $borrow->getBorrowDate());
        $stmt->bindParam(':deadlineDay', $borrow->getDeadlineDay());
        $stmt->bindParam(':bookCode', $borrow->getBookCode());
        $stmt->execute();
    }

    //EDIT
    public function getBorrowById($borrowCode)
    {
        $sql = "
            SELECT b.borrowCode, u.userCode, b.borrowDate, b.deadlineDay,bo.bookCode
            FROM borrow b
            INNER JOIN user u
            ON b.userCode = u.userCode
            INNER JOIN books bo
            ON b.bookCode = bo.bookCode
             WHERE borrowCode = $borrowCode
                ";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        $borrow = new Borrow($result['userCode'],
            $result['borrowDate'],
            $result['deadlineDay'],
            $result['bookCode']
        );
        $borrow->setBorrowCode($result['borrowCode']);
        return $borrow;
    }


    public function edit($borrowCode, $borrow)
    {

        $sql = "
        UPDATE `borrow` SET `userCode` = :userCode, `borrowDate` = :borrowDate, 
        `deadlineDay` = :deadlineDay, `bookCode` = :bookCode
        WHERE `borrow`.`borrowCode` = :borrowCode
      ";


        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':userCode', $borrow->getUserCode());
        $stmt->bindParam(':borrowDate', $borrow->getBorrowDate());
        $stmt->bindParam(':deadlineDay', $borrow->getDeadlineDay());
        $stmt->bindParam(':bookCode', $borrow->getBookCode());
        $stmt->bindParam(':borrowCode', $borrowCode);
        $stmt->execute();
    }

    //DELETE
    public function delete($borrowCode)
    {

        $sql = "DELETE FROM `borrow` WHERE borrowCode = $borrowCode";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
    }
}





?>






