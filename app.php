<?php

require __DIR__ . '/vendor/autoload.php';

//(new Mars\World())->hello();
$init_point = [0, 0];
$end_point = [5, 5];

$rover = new Mars\World($init_point, $end_point);

$position = [1, 2, 'N'];
$command = 'LMLMLMLMM';

$position_2 = [3, 3, 'E'];
$command_2 = 'MMRMMRMRRM';

try {
    echo implode(' ', $rover->index($position, $command)) . '<br>';
    echo implode(' ', $rover->index($position_2, $command_2)) . '<br>';
//    echo $rover->index($position, $command);
//    echo $rover->index($position_2, $command_2);
} catch (Exception $e) {
    echo $e->getMessage();
}

