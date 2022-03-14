<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\BooksList;
use App\Book;

class BooksListTest extends TestCase
{
    public function testAddAndCount()
    {
        $book = new Book();
        $booksList = new BooksList();
        $booksList->add($book);
        $this->assertSame(1, $booksList->count());
    }

    public function testGet()
    {
        $book = new Book();
        $booksList = new BooksList();
        $book->setName("Сollection of tales")->setAuthors(array("A. Pushkin", "A. Chekhov"))
            ->setPublisher("AST")->setYear(2022);
        $booksList->add($book);
        $this -> assertInstanceOf(Book::class, $booksList -> get(1));
    }

    public function testStore()
    {
        $book = new Book();
        $booksList = new BooksList();
        $book->setName("Сollection of tales")->setAuthors(array("A. Pushkin", "A. Chekhov"))
            ->setPublisher("AST")->setYear(2022);
        $booksList->add($book);
        $this -> assertSame(null, $booksList -> store("output"));
    }

    public function testLoad()
    {
        $booksList = new BooksList();
        $booksList->load("output");
        $this->assertSame(1, $booksList->count());
        $this->assertInstanceOf(Book::class, $booksList->get(1));
    }

    public function testCurrentAndKey()
    {
        $book1 = new Book();
        $book2 = new Book();
        $book3 = new Book();
        $booksList = new BooksList();
        $book1 -> setName("Сollection of tales")->setAuthors(array("A. Pushkin", "L. Tolstoy"))
            ->setPublisher("AST")->setYear(2022);
        $book2 -> setName("A large library of the best books in the world about happiness")->setAuthors(array("Heidt Jonathan", "Jasanov Alan", "Esfahani Emily Smith"))
            ->setPublisher("AST")->setYear(2022);
        $book3 -> setName("The twelve Chairs")
            ->setAuthors(array("Evgeny Petrov", "Ilya Ilf"))
            ->setPublisher("University")->setYear(2008);
        $booksList -> add($book1);
        $booksList -> add($book2);
        $booksList -> add($book3);

        $this->assertSame(
            "Id: 8" . "\n" .
            "Название: Сollection of tales" . "\n" .
            "Автор 1: A. Pushkin" . "\n" .
			"Автор 2: L. Tolstoy" . "\n" .
            "Издательство: AST" . "\n" .
            "Год: 2022",
            $booksList -> current() -> __toString()
        );
        $this -> assertSame(8, $booksList -> key());
		$booksList -> store("output");
        return $booksList;
    }

    public function testNext()
    {
		$booksList = new BooksList();
        $booksList->load("output");
		$booksList->next();
        $this->assertSame(
            "Id: 9" . "\n" .
            "Название: A large library of the best books in the world about happiness" . "\n" .
            "Автор 1: Heidt Jonathan" . "\n" .
			"Автор 2: Jasanov Alan" . "\n" .
			"Автор 3: Esfahani Emily Smith" . "\n" .
            "Издательство: AST" . "\n" .
            "Год: 2022",
            $booksList -> current() -> __toString()
        );
        $booksList->next();
        $this->assertSame(
            "Id: 10" . "\n" .
            "Название: The twelve Chairs" . "\n" .
            "Автор 1: Evgeny Petrov" . "\n" .
            "Автор 2: Ilya Ilf" . "\n" .
            "Издательство: University" . "\n" .
            "Год: 2008",
            $booksList -> current() -> __toString()
        );

        return $booksList;
    }

    public function testValidAndRewind()
    {
		$booksList = new BooksList();
        $booksList->load("output");
        $booksList -> next();
        $this -> assertSame(true, $booksList -> valid());
        $booksList -> rewind();
        $this -> assertSame(true, $booksList -> valid());
        $this -> assertSame(
            "Id: 8" . "\n" .
            "Название: Сollection of tales" . "\n" .
            "Автор 1: A. Pushkin" . "\n" .
			"Автор 2: L. Tolstoy" . "\n" .
            "Издательство: AST" . "\n" .
            "Год: 2022",
            $booksList->current()->__toString()
        );
    }
}
