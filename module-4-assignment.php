<?php
/*
  
1.Write a PHP function to sort an array of strings by their length, in ascending order. 
(Hint: You can use the usort() function to define a custom sorting function.)


2.Write a PHP function to concatenate two strings, but with the second string starting from the end of the first string.


3.Write a PHP function to remove the first and last element from an array and return the remaining elements as a new array.


4.Write a PHP function to check if a string contains only letters and whitespace.


5.Write a PHP function to find the second largest number in an array of numbers.


To complete the assignment, create a PHP file and write the code for each of the above functions. You should also include example usage for each function, to show that it is working correctly.
 */


 /*
 Problem 1
1.Write a PHP function to sort an array of strings by their length, in ascending order. 
(Hint: You can use the usort() function to define a custom sorting function.)
*/
echo "\n Solution to problem-1 \n";

function sortStringsByLength($strings) {
    usort($strings, function($a, $b) {
        return strlen($a) - strlen($b);
    });
    return $strings;
}
$strings = array("orange", "banana", "cherry", "avocardo", "apple");
$sortedStrings = sortStringsByLength($strings);
print_r($sortedStrings);




 /*

Problem 2
2.Write a PHP function to concatenate two strings, but with the second string starting from the end of the first string.

*/
echo "\n Solution to problem-2 \n";
$first_string = "The quick brown fox";
$second_string = "Jumped over the lazy dogs";

echo $finalstring = $first_string." ".$second_string;

/*

Problem 3 
3. Write a PHP function to remove the first and last element from an array and return the remaining elements as a new array.

*/

echo "\n Solution to problem-3 \n";
$given_arr = [10,2,4,5,88,345,234,420];

function returnTrimmedArray($arr){
    array_shift($arr); //removes first element
    array_pop($arr);  //removeslastelement
    return $arr;
}

$arr_trim = returnTrimmedArray($given_arr);
print_r($given_arr);
print_r($arr_trim);


/*
Problem 4
4.Write a PHP function to check if a string contains only letters and whitespace.
 */

 echo "\n Solution to problem-4 \n";

function isContainsOnlyLettersAndWhitespace($string) {
    return preg_match('/^[a-zA-Z\s]+$/', $string);
}

$string1 = "Hello World";
$string2 = "11Hello123";
$string3 = "@##Hello_World";

if (isContainsOnlyLettersAndWhitespace($string1)) {
    echo "String 1 contains only letters and whitespace.\n";
} 
else echo "String 1 is not valid.\n";

if (isContainsOnlyLettersAndWhitespace($string2)) {
    echo "String 2 contains only letters and whitespace.\n";
}
else echo "String 2 is not valid.\n";

if (isContainsOnlyLettersAndWhitespace($string3)) {
    echo "String 3 contains only letters and whitespace.\n";
}
else echo "String 3 is not valid.\n";

/*
Problem 5
5.Write a PHP function to find the second largest number in an array of numbers.
*/

echo "\n Solution to problem-5 \n";

function findTheSecondLargest($numbers) {
    $largest = $numbers[0];
    $secondLargest = $numbers[0];
    foreach ($numbers as $number) {
        if ($number > $largest) {
            $secondLargest = $largest;
            $largest = $number;
        } elseif ($number > $secondLargest && $number < $largest) {
            $secondLargest = $number;
        }
    }
    return $secondLargest;
}

$numbers = array(9, 7, 5, 3, 8, 4, 1);
$secondLargest = findTheSecondLargest($numbers);
echo "The second largest number is: " . $secondLargest;
