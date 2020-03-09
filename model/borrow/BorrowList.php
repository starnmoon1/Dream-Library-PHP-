<?php

class BorrowList{
    protected $borrowCode;
    protected $userName;
    protected $bookName;
    protected $borrowDate;
    protected $deadlineDay;

    public function __construct($userName, $bookName,$borrowDate, $deadlineDay)
    {
        $this->userName = $userName;
        $this->bookName = $bookName;
        $this->borrowDate = $borrowDate;
        $this->deadlineDay = $deadlineDay;
    }

    /**
     * @param mixed $borrowCode
     */
    public function setBorrowCode($borrowCode)
    {
        $this->borrowCode = $borrowCode;
    }

    public function getBookName()
    {
        return $this->bookName;
    }

    /**
     * @return mixed
     */
    public function getBorrowCode()
    {
        return $this->borrowCode;
    }

    /**
     * @return mixed
     */
    public function getBorrowDate()
    {
        return $this->borrowDate;
    }

    /**
     * @return mixed
     */
    public function getDeadlineDay()
    {
        return $this->deadlineDay;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->userName;
    }


}