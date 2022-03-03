<?php

namespace Tests\BookTest;

use App\Book;
use PHPUnit\Framework\TestCase;

class BookTest extends TestCase
{
    public function testSetName()
    {
        $book = new Book();
        $book->setName("Сollection of tales");

        $this->assertEquals("Сollection of tales", $book->getName());
    }

    public function testSetAuthors()
    {
        $book = new Book();
        $book->setAuthors(array("A. Pushkin", "A. Chekhov"));

        $this->assertEquals(array("A. Pushkin", "A. Chekhov"), $book->getAuthors());
    }

    public function testSetPublisher()
    {
        $book = new Book();
        $book->setPublisher("AST");

        $this->assertEquals("AST", $book->getPublisher());
    }

    public function testSetYear()
    {
        $book = new Book();
        $book->setYear(2022);

        $this->assertEquals(2022, $book->getYear());
    }
}
