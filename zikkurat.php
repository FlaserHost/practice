<?php
    $matrix = [[]];
    $input = 5;
    $rowsAndCols = $input * 2 - 1;
    $content = 1;
    $half = ($rowsAndCols - 1) / 2;
    $borderRight = 1;
    $borderBottom = $input - 1;
    $flag = 0;
    
    for($i = 0; $i < $rowsAndCols; $i++)
    {
        for($j = 0; $j < $rowsAndCols; $j++)
        {
            if($j >= 1 && $j < $half + 1 && $i >= 1 && $i < $rowsAndCols - 1)
            {
                if(($j <= $i && $i < $half + 1) || ($i > $half && $j < $half - $flag))
                {
                    $content++;
                }
                $matrix[$i][$j] = $content;
            }
            else if($j > $half && $j < $rowsAndCols - 1 && $i >= 1 && $i < $rowsAndCols - 1)
            {
                if($i == $half && $j > $half)
                {
                    $content--;
                }
                else if(($i > 1 && $i < $half && $j > $rowsAndCols - $borderRight) || ($i > $half && $i < $rowsAndCols - 1 && $j > $rowsAndCols - $borderBottom))
                {
                    $content--;
                }
                $matrix[$i][$j] = $content;
            }
            else
            {
                if($content == 0)
                {
                    $content = 1;
                }
                $matrix[$i][$j] = $content / $content;
            }
        }
        $borderRight++;
        $content = 1;

        if($i > $half)
        {
            $flag++;
            $borderBottom--;
        }
    }

    for($i = 0; $i < $rowsAndCols; $i++)
    {
        for($j = 0; $j < $rowsAndCols; $j++)
        {
           echo $matrix[$i][$j] . ' ';
        }
        echo "\n";
    }
?>