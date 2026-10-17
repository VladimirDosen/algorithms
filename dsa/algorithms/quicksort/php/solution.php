<?php
declare(strict_types=1);

$examples = [
    [6, 2, 1, 9, 0, 8, 3, 5, 4, 7],
    [1, 2, 4, -1, 4, 0],
    [0, 0, 1, 1, 2],
    [1, 2, 3, 4, 5, 6]
];

function quicksort(array $unsortedArray): array {
    if (count($unsortedArray) < 2) {
        return $unsortedArray;
    }

    $pivotIndex = intval((count($unsortedArray) / 2));

    $pivot = $unsortedArray[$pivotIndex];

    $less = [];
    $greater = [];

    foreach ($unsortedArray as $index => $number) {
        if ($index === $pivotIndex) {
            continue;
        }

        if ($number < $pivot) {
            $less[] = $number;
        } else {
            $greater[] = $number;
        }
    }

    return array_merge(quicksort($less), [$pivot], quicksort($greater));
}

foreach ($examples as $key => $example) {
    echo "\n\n<br><br>^^^^^^^^^Example: $key\n\n<br>";
    echo " ------ Unsorted array: \n<br>";
    print_r($example);
    echo "\n<br>";

    $result = quicksort($example);

    echo " ------ Sorted array: \n<br>";
    print_r($result);
}