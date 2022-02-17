<?php

namespace App;

interface QueueInterface
{
    public function enqueue(...$elements);
    public function dequeue();
    public function peek();
    public function isEmpty();
    public function copy();
    public function __toString();
}
