<?php

namespace App;

use App\StackInterface;

class Stack implements StackInterface
{
    private $stack = array();

    public function __construct(...$elements)
    {
        $this->push(...$elements);
    }

    public function push(...$elements)
    {
        foreach ($elements as $elem) {
            array_push($this->stack, $elem);
        }
    }

    public function pop()
    {
        if (count($this->stack) == 0) {
            return null;
        }

        return array_pop($this->stack);
    }

    public function top()
    {
        if (count($this->stack) != 0) {
            return $this->stack[count($this->stack) - 1];
        } else {
            return null;
        }
    }
    public function isEmpty()
    {
        return !isset($this->stack[0]);
    }

    public function copy()
    {
        return new Stack(...$this->stack);
    }

    public function __toString()
    {
        $string = "[";
        $arrow = "->";
        for ($i = count($this->stack) - 1; $i >= 0; $i--) {
            if ($i == 0) {
                $arrow = "";
            }
            $string = $string . $this->stack[$i] . $arrow;
        }
        $string .= "]";
        return $string;
    }
}
