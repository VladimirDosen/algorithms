<?php
declare(strict_types=1);

require_once __DIR__ . '/Node.php';
require_once __DIR__ . '/UnsortedDoublyLinkedList.php';
require_once __DIR__ . '/SortedDoublyLinkedList.php';

# Unsorted Linked List
echo "\n\n<br><br>^^^^^^^^^UNSORTED-LINKED-LIST:\n\n<br>";

# 1. Empty list
echo "\n\n<br><br>^^^^^^^^^Example 1:\n\n<br>";
$value = 1;
$unsortedLinkedList = new UnsortedDoublyLinkedList();
$unsortedLinkedList->insertHead($value);
$unsortedLinkedList->traverse(function (mixed $value) {
    echo "Value: " . $value . "<br>";
});


# 2. Not an empty list
echo "\n\n<br><br>^^^^^^^^^Example 2:\n\n<br>";
$value = 50;
$unsortedLinkedList = new UnsortedDoublyLinkedList();
$unsortedLinkedList->insertHead($value);
for ($i = 0; $i < 10; $i++) {
    $unsortedLinkedList->insertHead(random_int(1, 100));
}
$unsortedLinkedList->traverse(function (mixed $value) {
    echo "Value: " . $value . "<br>";
});

# 3. Search not an empty list
echo "\n\n<br><br>^^^^^^^^^Example 3:\n\n<br>";
$value = 50;
$unsortedLinkedList = new UnsortedDoublyLinkedList();
$unsortedLinkedList->insertHead($value);
for ($i = 0; $i < 10; $i++) {
    $unsortedLinkedList->insertTail(random_int(1, 100));
}
$value = $unsortedLinkedList->search($value);
echo "Value found: " . $value . "<br>";


# 4. Search a linked list, but not a member
echo "\n\n<br><br>^^^^^^^^^Example 4:\n\n<br>";
$value = 50;
$unsortedLinkedList = new UnsortedDoublyLinkedList();
$unsortedLinkedList->insertHead($value);
for ($i = 0; $i < 10; $i++) {
    $unsortedLinkedList->insertTail(random_int(1, 100));
}
$value = $unsortedLinkedList->search(200);
echo "Value not found: " . 200 . "<br>";


# 5. Delete a member from a linked list
echo "\n\n<br><br>^^^^^^^^^Example 5:\n\n<br>";
$value = 50;
$unsortedLinkedList = new UnsortedDoublyLinkedList();
$unsortedLinkedList->insertHead($value);
for ($i = 0; $i < 10; $i++) {
    $unsortedLinkedList->insertTail(random_int(1, 100));
}
$unsortedLinkedList->delete(50);
$unsortedLinkedList->traverse(function (mixed $value) {
    echo "Value: " . $value . "<br>";
});

# 6. Delete a non-existing member from a linked list
echo "\n\n<br><br>^^^^^^^^^Example 6:\n\n<br>";
$value = 50;
$unsortedLinkedList = new UnsortedDoublyLinkedList();
$unsortedLinkedList->insertHead($value);
for ($i = 0; $i < 10; $i++) {
    $unsortedLinkedList->insertTail(random_int(1, 100));
}
try {
    $unsortedLinkedList->delete(200);
} catch (\Exception $e) {
    echo $e->getMessage() . "<br>";
}


# Sorted Linked List
echo "\n\n<br><br>^^^^^^^^^SORTED-LINKED-LIST:\n\n<br>";

# 1. Empty list
echo "\n\n<br><br>^^^^^^^^^Example 1:\n\n<br>";
$value = 1;
$sortedLinkedList = new SortedDoublyLinkedList();
$sortedLinkedList->insert($value);
$sortedLinkedList->traverse(function (mixed $value) {
    echo "Value: " . $value . "<br>";
});


# 2. Not an empty list
echo "\n\n<br><br>^^^^^^^^^Example 2:\n\n<br>";
$value = 50;
$sortedLinkedList = new SortedDoublyLinkedList();
$sortedLinkedList->insert($value);
for ($i = 0; $i < 10; $i++) {
    $number = random_int(1, 100);
    $sortedLinkedList->insert($number);
}
$sortedLinkedList->traverse(function (mixed $value) {
    echo "Value: " . $value . "<br>";
});

# 3. Search not an empty list
echo "\n\n<br><br>^^^^^^^^^Example 3:\n\n<br>";
$value = 50;
$sortedLinkedList = new SortedDoublyLinkedList();
$sortedLinkedList->insert($value);
for ($i = 0; $i < 10; $i++) {
    $sortedLinkedList->insert(random_int(1, 100));
}
$value = $sortedLinkedList->search($value);
echo "Value found: " . $value . "<br>";

# 4. Search a linked list, but not a member
echo "\n\n<br><br>^^^^^^^^^Example 4:\n\n<br>";
$value = 50;
$sortedLinkedList = new SortedDoublyLinkedList();
$sortedLinkedList->insert($value);
for ($i = 0; $i < 10; $i++) {
    $sortedLinkedList->insert(random_int(1, 100));
}
$value = $sortedLinkedList->search(200);
echo "Value not found: " . 200 . "<br>";


# 5. Delete a member from a linked list
echo "\n\n<br><br>^^^^^^^^^Example 5:\n\n<br>";
$value = 50;
$sortedLinkedList = new SortedDoublyLinkedList();
$sortedLinkedList->insert($value);
for ($i = 0; $i < 10; $i++) {
    $sortedLinkedList->insert(random_int(1, 100));
}
$sortedLinkedList->delete(50);
$sortedLinkedList->traverse(function (mixed $value) {
    echo "Value: " . $value . "<br>";
});

# 6. Delete a non-existing member from a linked list
echo "\n\n<br><br>^^^^^^^^^Example 6:\n\n<br>";
$value = 50;
$sortedLinkedList = new SortedDoublyLinkedList();
$sortedLinkedList->insert($value);
for ($i = 0; $i < 10; $i++) {
    $sortedLinkedList->insert(random_int(1, 100));
}
try {
    $sortedLinkedList->delete(200);
} catch (\Exception $e) {
    echo $e->getMessage() . "<br>";
}
