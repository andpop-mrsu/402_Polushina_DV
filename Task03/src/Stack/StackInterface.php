<?php

namespace App;

interface StackInterface
{
    public function push(...$elements);
    public function pop();
    public function top();
    public function isEmpty();
    public function copy();
    public function __toString();
}
