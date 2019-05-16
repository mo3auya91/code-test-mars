<?php

declare(strict_types=1);

namespace Mars;

class World
{
    private $init_point;
    private $end_point;

    public function __construct(array $init_point, array $end_point)
    {
        $this->init_point = $init_point;
        $this->end_point = $end_point;
    }

    /**
     * if move not equals 0 then move it one unit
     *
     * @param $x
     * @param $y
     * @param int $move
     * @param string $head
     * @param string $dir
     * @return array
     */
    public function move($x, $y, $head, $dir, $move = 0): array
    {
        $new_head = $head;
        if ($head == 'N') {
            if ($move == 1) {
                $y = $y + 1;
            } else {
                if ($dir == 'R') {//right
                    $new_head = 'E';
                } else {//left
                    $new_head = 'W';
                }
            }
        } elseif ($head == 'E') {
            if ($move == 1) {
                $x = $x + 1;
            } else {
                if ($dir == 'R') {//right
                    $new_head = 'S';
                } else {//left
                    $new_head = 'N';
                }
            }
        } elseif ($head == 'W') {
            if ($move == 1) {
                $x = $x - 1;
            } else {
                if ($dir == 'R') {//right
                    $new_head = 'N';
                } else {//left
                    $new_head = 'S';
                }
            }
        } elseif ($head == 'S') {
            if ($move == 1) {
                $y = $y - 1;
            } else {
                if ($dir == 'R') {//right
                    $new_head = 'W';
                } else {//left
                    $new_head = 'E';
                }
            }
        }
        return [$x, $y, $new_head];
    }

    /**
     * @param array $position
     * @param String $command
     * @return String
     * @throws \Exception
     */
    public function index(array $position, String $command): array
//    public function index(array $position, String $command): ?string
    {
        //$position length must be 3 (x, y, head)
        if (count($position) != 3) {
            throw new \Exception('Position array length must be 3');
        }
        //rover init position and heading
        $x = $position[0];
        $y = $position[1];
        $head = $position[2];
        //convert string to array of charts
        $commands = str_split($command);
        foreach ($commands as $dir) {
            if (!in_array(strtoupper($dir), ['R', 'L', 'M'])) {
                throw new \Exception('Every command letter must consists of these letters (R,L,M)');
            }
            $move = $dir == 'M' ? 1 : 0;

            $new_position = $this->move($x, $y, $head, $dir, $move);

            //set rover in new position and heading
            $x = $new_position[0];
            $y = $new_position[1];
            $head = $new_position[2];
        }
        //array length must be 3 (x, y, head)
        return [$x, $y, $head];
//        return "$x $y $head <br>";
    }
}
