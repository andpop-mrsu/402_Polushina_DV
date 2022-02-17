<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Stack;

class StackTest extends TestCase
{
    public function testPushAndEmpty()
    {
        $stack = new Stack();
        $this->assertSame(true, $stack->isEmpty());
        $stack->push("10000", 1212);
        $this->assertSame(false, $stack->isEmpty());
    }

    public function testTop()
    {
        $stack = new Stack(1, 2, "34", "567", 8);
        $this->assertSame(8, $stack->top());
    }

    public function testPop()
    {
        $stack1 = new Stack(6, 15, 90, 5, "6448847", 74);
        $stack2 = new Stack();
        $this->assertSame(74, $stack1->pop());
        $this->assertSame("6448847", $stack1->top());
        $this->assertSame(null, $stack2->pop());
    }
	
	public function testPop2()
    {
        $stack1 = new Stack(6, 15, 90, 5, "6448847", 74);
        $stack2 = new Stack();
        $this->assertSame(74, $stack1->pop());
		$this->assertSame("6448847", $stack1->pop());
        $this->assertSame(5, $stack1->top());
        $this->assertSame(null, $stack2->pop());
    }

    public function testTextRepresentation()
    {
        $stack = new Stack(1, 2, 3, "abc");
        $this -> assertSame("[abc->3->2->1]", $stack->__toString());
    }
	
    public function testCopy()
    {
        $stack = new Stack(3, 8, 546, 6, "47389", 876);
        $newStack = $stack->copy();
        $this->assertInstanceOf(Stack::class, $newStack);
        $this->assertSame(false, $newStack->isEmpty());
        $this->assertSame(876, $newStack->top());
    }
}
