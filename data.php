<?php
if($_POST){
    $string = $_POST["string"];
    $lon = $_POST["long"];
}

foreach (permute($string,$lon) as $permutation){
    echo $permutation."\n";
}

function permute ($str, $long)
{
    $exit = array();

    if ($str and ($long > 0)) {
        if (is_string($str)) {
            $strlong = strlen($str);
            $char = str_split($str);
        } else {
            return $exit;
        }
        if ($strlong < 2) return $exit;
        $punt = array_fill(-1, $long + 1, 0);
        $iter = pow($strlong, $long);

        $strlong--;
        $long--;

        for ($i = 0; $i < $iter; $i++) {
            $result = "";
            for ($c = 0; $c <= $long; $c++) {
                $result .= $char[$punt[$c]];
            }
            $exit[] = $result;

            $c = $long;
            do {
                $punt[$c]++;
                if ($punt[$c] <= $strlong) {
                    break;
                } else {
                    $punt[$c] = 0;
                    $c--;
                }
            } while (TRUE);
        }
    }
    return $exit;
}