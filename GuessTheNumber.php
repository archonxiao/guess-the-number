<?php

function randomNumber($length = 5): string
{
    $string = "";
    for ($i = 0; $i < $length; $i++) {
        $random = (string)rand(1, 8);
        if (strpos($string, $random) !== false) {
            $i--;
        } else {
            $string .= $random;
        }
    }
    return $string;
}

$secretStr = randomNumber();
$secretArr = str_split($secretStr);
echo "A new secret 5-digit number has been generated.\n";

$inputStr = '';
while ($inputStr !== $secretStr) {
    $input = readline('Please guess what the number is: ');
    $inputStr = substr($input, 0, 5);
    $inputArr = str_split($inputStr);
    $valueMatchCnt = 0;
    $positionMatchCnt = 0;

    foreach ($inputArr as $index => $digit) {
        if (array_search($digit, $secretArr) !== false) {
            if ($secretArr[$index] === $digit) {
                $positionMatchCnt++;
            } else {
                $valueMatchCnt++;
            }
        }
    }
    echo "Perfect match(es): " . $positionMatchCnt . "\n";
    echo "Value match(es): " . $valueMatchCnt . "\n";
}

echo "You got it! Well done!\n";
