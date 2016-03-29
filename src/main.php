<?php

namespace Src;

use Src\CombinationGenerator;

require_once 'CombinationGenerator.php';

while (true) {
    $length = trim(fgets(STDIN));
    $number = trim(fgets(STDIN));

    $lengths = [];
    for ($i = 0; $i < $number; $i++) {
        $lengths[] = trim(fgets(STDIN));
    }
    $combination = new CombinationGenerator($lengths);
    echo $combination->count($length, 3);
    return;
}

