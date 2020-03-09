<?php


class Book
{
    private $bookCode;
    private $bookName;
    private $authorName;
    private $categoryCode;
    private $publishingName;
    private $publishingYear;
    private $description;
    private $bookImage;
    private $categoryName;

    public function __construct($bookName, $authorName, $categoryCode, $publishingName, $publishingYear, $description)
    {
        $this->bookName = $bookName;
        $this->authorName = $authorName;
        $this->categoryCode = $categoryCode;
        $this->publishingName = $publishingName;
        $this->publishingYear = $publishingYear;
        $this->description = $description;
//        $this->bookImage = $bookImage;
    }

    /**
     * @param mixed $categoryCode
     */
    public function setCategoryCode($categoryCode)
    {
        $this->categoryCode = $categoryCode;
    }

    /**
     * @param mixed $bookName
     */
    public function setBookName($bookName)
    {
        $this->bookName = $bookName;
    }

    /**
     * @param mixed $publishingName
     */
    public function setPublishingName($publishingName)
    {
        $this->publishingName = $publishingName;
    }

    /**
     * @param mixed $authorName
     */
    public function setAuthorName($authorName)
    {
        $this->authorName = $authorName;
    }
    /**
     * @param mixed $bookCode
     */
    public function setBookCode($bookCode)
    {
        $this->bookCode = $bookCode;
    }

    /**
     * @param mixed $bookImage
     */
    public function setBookImage($bookImage)
    {
        $this->bookImage = $bookImage;
    }

    /**
     * @param mixed $categoryName
     */
    public function setCategoryName($categoryName)
    {
        $this->categoryName = $categoryName;
    }

    /**
     * @param mixed $publishingYear
     */
    public function setPublishingYear($publishingYear)
    {
        $this->publishingYear = $publishingYear;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
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
    public function getBookCode()
    {
        return $this->bookCode;
    }

    /**
     * @return mixed
     */
    public function getBookName()
    {
        return $this->bookName;
    }

    /**
     * @return mixed
     */
    public function getBookImage()
    {
        return $this->bookImage;
    }

    /**
     * @return mixed
     */
    public function getAuthorName()
    {
        return $this->authorName;
    }

    /**
     * @return mixed
     */
    public function getPublishingName()
    {
        return $this->publishingName;
    }

    /**
     * @return mixed
     */
    public function getPublishingYear()
    {
        return $this->publishingYear;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getCategoryCode()
    {
        return $this->categoryCode;
    }
}
