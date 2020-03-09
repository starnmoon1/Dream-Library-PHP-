<?php


class Categories
{
    private $categoryCode;
    private $categoryName;

    public function __construct($categoryName)
    {
        $this->categoryName =$categoryName;
    }

    /**
     * @param mixed $categoryName
     */
    public function setCategoryName($categoryName)
    {
        $this->categoryName = $categoryName;
    }

    /**
     * @param mixed $categoryCode
     */
    public function setCategoryCode($categoryCode)
    {
        $this->categoryCode = $categoryCode;
    }

    /**
     * @return mixed
     */
    public function getCategoryName()
    {
        return $this->categoryName;
    }

    /**
     * @return mixed
     */
    public function getCategoryCode()
    {
        return $this->categoryCode;
    }
}