<?php

namespace App;

use App\QueueInterface;

class Queue implements QueueInterface
{
    private $queue = array();

    public function __construct(...$elements)
    {
        $this->enqueue(...$elements);
    }

    public function enqueue(...$elements)
    {
        foreach ($elements as $elem) {
            array_push($this->queue, $elem);
        }
    }

    public function dequeue()
    {
        if (!isset($this->queue[0])) {
            return null;
        }

        return array_shift($this->queue);
    }

    public function peek()
    {
        if (!isset($this->queue[0])) {
            return null;
        }

        return $this->queue[0];
    }

    public function isEmpty()
    {
        return !isset($this->queue[0]);
    }

    public function copy(): Queue
    {
        return new Queue(...$this->queue);
    }

    public function __toString(): string
    {
        $string = "[";
        $arrow = "<-";
        for ($i = 0; $i < count($this->queue); $i++) {
            if ($i == count($this->queue) - 1) {
                $arrow = "";
            }
            $string = $string . $this->queue[$i] . $arrow;
        }
        $string .= "]";
        return $string;
    }
}
