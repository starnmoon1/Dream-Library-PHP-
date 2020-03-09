<?php


class Borrow
{
    private $borrowCode;
    private $userCode;
    private $borrowDate;
    private $deadlineDay;
    private $bookCode;

    public function __construct($userCode,$borrowDate,$deadlineDay,$bookCode)
    {
        $this->userCode = $userCode;
        $this->borrowDate = $borrowDate;
        $this->deadlineDay= $deadlineDay;
        $this->bookCode = $bookCode;
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
    public function getBorrowDate()
    {
        return $this->borrowDate;
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
    public function getBookCode()
    {
        return $this->bookCode;
    }

    /**
     * @return mixed
     */
    public function getUserCode()
    {
        return $this->userCode;
    }

    /**
     * @param mixed $borrowCode
     */
    public function setBorrowCode($borrowCode)
    {
        $this->borrowCode = $borrowCode;
    }
}