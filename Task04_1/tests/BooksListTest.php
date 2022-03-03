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
            ->setPublisher("AST")->setYear(2005);
        $book2 -> setName("Collection")->setAuthors(array("A.B. Games"))
            ->setPublisher("Weird Tales")->setYear(1926);
        $book3 -> setName("Princes")
            ->setAuthors(array("A.Make", "G.Moner", "L.Niolit"))
            ->setPublisher("University")->setYear(2008);
        $booksList -> add($book1);
        $booksList -> add($book2);
        $booksList -> add($book3);

        $this->assertSame(
            "Id: 8" . "\n" .
            "Название: Magic tales. The Tale of Tsar Saltan; Tale of the fisherman; Tale of the Dead Tsar" . "\n" .
            "Автор 1: A. Pushkin" . "\n" .
            "Издательство: AST" . "\n" .
            "Год: 2022",
            $booksList -> current() -> __toString()
        );
        $this -> assertSame(4, $booksList -> key());
        return $booksList;
    }

    public function testNext(BooksList $booksList)
    {
        $booksList->next();
        $this->assertSame(
            "Id: 4" . "\n" .
            "Название: The Cherry Orchard" . "\n" .
            "Автор 1: A. Chekhov" . "\n" .
            "Издательство: AST" . "\n" .
            "Год: 2022",
            $booksList -> current() -> __toString()
        );
        $booksList->next();
        $this->assertSame(
            "Id: 5" . "\n" .
            "Название: Day Watch" . "\n" .
            "Автор 1: V. Vasilyev" . "\n" .
            "Автор 2: S. Lukyanenko" . "\n" .
            "Издательство: AST" . "\n" .
            "Год: 2022",
            $booksList -> current() -> __toString()
        );

        return $booksList;
    }

    public function testValidAndRewind(BooksList $booksList)
    {
        $booksList -> next();
        $this -> assertSame(false, $booksList -> valid());
        $booksList -> rewind();
        $this -> assertSame(true, $booksList -> valid());
        $this -> assertSame(
            "Id: 3" . "\n" .
            "Название: The biggest book of fairy tales" . "\n" .
            "Автор 1: A. Barto" . "\n" .
            "Автор 2: A. Usachev" . "\n" .
			"Автор 3: A. Pushkin" . "\n" .
            "Издательство: ROSMEN" . "\n" .
            "Год: 2020",
            $booksList->current()->__toString()
        );
    }
}
