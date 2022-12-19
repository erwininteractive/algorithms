<?php
/**
 * @author Andrew S Erwin
 * @link https://gitlab.com/andrewthecoder
 *  
 * Backtracking algorithm to solve sudoku puzzles!
 */

$puzzle = [
    [0,0,7,0,0,3,5,0,0],
    [6,0,5,4,0,8,3,0,2],
    [0,0,4,5,2,0,9,0,6],
    [0,0,0,0,7,1,2,0,9],
    [0,0,0,0,0,0,0,0,0],
    [8,0,9,2,3,0,0,0,0],
    [9,0,1,0,8,5,6,0,0],
    [7,0,3,9,0,2,8,0,5],
    [0,0,8,7,0,0,1,0,0]
];

$s = new Sudoku($puzzle);
print $s->showSolved();

class Sudoku
{
    protected $sudoku = [];
    protected $solved = [];

    public function __construct(array $puzzle)
    {
        $this->sudoku = $puzzle;
    }
    
    private function isPossible(int $x, int $y, int $n): bool
    {
        foreach (range(0, 8) as $i)
        { 
			if ($this->sudoku[$y][$i] == $n)
            {
                return false;
            }
        }

        foreach (range(0, 8) as $i)
        {
            if ($this->sudoku[$i][$x] == $n)
            {
                return false;
            }
        }

        $x0 = (floor($x / 3) * 3);
        $y0 = (floor($y / 3) * 3);

        foreach (range(0, 2) as $i)
        {
            foreach (range(0, 2) as $j)
            {
                if ($this->sudoku[$y0 + $i][$x0 + $j] == $n)
                {
                    return false;
                }
            }
        }

        return true;
    }

    private function solve()
    {
        foreach (range(0, 8) as $y)
        {
            foreach (range(0, 8) as $x)
            {
                if($this->sudoku[$y][$x] == 0)
                {
                    foreach (range(1, 9) as $n)
                    {
                        if($this->isPossible($x, $y, $n))
                        {
                            /*  
                             * Seems to work, let's set it and keep going!
                            */
                            $this->sudoku[$y][$x] = $n;
                            
                            /* KEEP GOING! */
                            $this->solve();
                            
                            /*
                             * It didn't work! Putting it back to 0
                            */
                            $this->sudoku[$y][$x] = 0;
                        }
                    }

                    return;
                }
            }
        }
        
        $this->solved = $this->sudoku;
    }

    private function arrayToMatrix(array $array)
    {
        foreach ($array as $row)
        {
            foreach ($row as $node)
            {
                print $node . " ";
            }

            print PHP_EOL;
        }
    }

    public function showSolved()
    {
        $this->solve();
        return $this->arrayToMatrix($this->solved);
    }
}
