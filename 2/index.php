<?php

use App\Classes\Second;

require __DIR__ . '/vendor/autoload.php';

$array = [4, 5, 8, 9, 1, 7, 2];

print_r(Second::handle($array));
