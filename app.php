<?php

require __DIR__ . '/vendor/autoload.php';

//(new Mars\World())->hello();
$rover = new Mars\World();
$position = [1, 2, 'N'];
$command = 'LMLMLMLMM';

$position_2 = [3, 3, 'E'];
$command_2 = 'MMRMMRMRRM';

try {
    echo implode(' ', $rover->index($position, $command)) . '<br>';
    echo implode(' ', $rover->index($position_2, $command_2)) . '<br>';
} catch (Exception $e) {
    echo $e->getMessage();
}

