<?php
/**1. Write a Reusable  PHP Function that can check Even & Odd Number And Return Decision
 
2. 1+2+3...…….100  Write a loop to calculate the summation of the series

*/

/**  Problem 1 Solution
* Write a Reusable  PHP Function that can check Even & Odd Number And Return Decision
*/

function isEven(int $n){
    if($n%2==0){
        return "{$n} is an even number.";
    }
    return "{$n} is an Odd number.";
}

echo isEven(12);


/**  Problem 2 Solution
*  1+2+3...…….100  Write a loop to calculate the summation of the series
* 5+4+3+2+1 = 15
*/

$endNumber = 100;
$startNumber = 1;
$sum = 0;

for($i= $endNumber; $i>=$startNumber; $i--){   
    $sum +=$i; 
}
echo "\nSummation = {$sum}";

