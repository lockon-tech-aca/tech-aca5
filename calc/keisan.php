 <?php

function ConvRPN($expression) {
    //文字列の空白をなくす
    $expression = preg_replace('/\s/', '', $expression);
    //要素ごとに配列へ挿入
    preg_match_all('/[0-9]+|\+|-|\*|\/|\(|\)/', $expression, $matches);
    $parts = $matches[0];
    
     
    $stack = [];
    $output = [];
     
    $priorities = [ '/' => 2, '*' => 2, '+' => 1, '-' => 1, '(' => -1, ')' => -1 ];
     
    foreach ($parts as $part) {
        if (is_numeric($part)) {
            $output[] = $part;
        } else if($part == '(') {
            $stack[] = $part;
        } else if($part == ')') {
            while (count($stack) > 0) {
                $end = end($stack);
                if($end == '(') {
                    array_pop($stack);
                    break;
                } else {
                    $output[] = array_pop($stack);
                }
            }
        } else {
            if (!empty($stack)) {
                while (true) {
                    $end = end($stack);
                    if ($end && $priorities[$part] <= $priorities[$end]) {
                        $output []= array_pop($stack);
                    } else {
                        break;
                    }
                }
            }
            $stack[] = $part;
        }
    }
     
    while (count($stack) > 0) {
        $output[] = array_pop($stack);
    }
     
    return implode(' ', $output);
}

function calcRPN($expression) {
    $parts = preg_split('/\s/', $expression, -1, PREG_SPLIT_NO_EMPTY);
    $stack = [];
 
    foreach ($parts as $part) {
        if (is_numeric($part)) {
            $stack[] = $part;
        } else {
            $b = (float)array_pop($stack);
            $a = (float)array_pop($stack);
             
            switch ($part) {
                case "+":
                    $x = $a + $b;
                    break;
                case "-":
                    $x = $a - $b;
                    break;
                case "*":
                    $x = $a * $b;
                    break;
                case "/":
                    $x = $a / $b;
            }
            array_push($stack, $x);
        }
    }
 
    return $stack[0];
}

?>
