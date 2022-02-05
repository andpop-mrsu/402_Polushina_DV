<?php

namespace App\Test;

use App\Vector;

function runTest()
{
    $v1 = new Vector(1, 2, -8);
    echo "v1 = " . $v1 . "\n"; // (1, 2, -8)
    
    $v2 = new Vector(7, -6, 0);
    echo "v2 = " . $v2 . "\n"; // (7, -6, 0)

    $vectorAddition = $v1->add($v2);
    $vectorDifference = $v1->sub($v2);
    $vectorNumberProduct = $v1->product(2);
    $scalarProduct = $v1->scalarProduct($v2);
    $vectorProduct = $v1->vectorProduct($v2);

    echo "Сумма векторов\n";
    echo $vectorAddition; // (8, −4, −8)
    echo "\nРазность векторов\n";
    echo $vectorDifference; // (−6, 8, −8)
    echo "\nПроизведение вектора на число\n";
    echo $vectorNumberProduct; // (2, 4, -16)
    echo "\nСкалярное произведение векторов\n";
    echo $scalarProduct; // -5
    echo "\nВекторное произведение\n";
    echo $vectorProduct; // (48;−56;−8)
}
