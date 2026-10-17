<?php
declare(strict_types=1);

require_once __DIR__ . '/UnsortedSinglyLinkedList.php';

class SortedSinglyLinkedList extends UnsortedSinglyLinkedList
{
    public function insert(mixed $value): void
    {
        $current = $this->head;
        $previous = null;

        if ($current === null) {
            $this->head = new Node($value);

            return;
        }

        while ($current !== null) {
            if ($current->getValue() >= $value) {
                if ($previous === null) {
                    $this->head = new Node($value, $current);
                } else {
                    $previous->append(new Node($value, $current));
                }

                return;
            }

            $previous = $current;
            $current = $current->getNext();
        }

        if ($previous === null) {
            $this->head = new Node($value);
        } else {
            $previous->append(new Node($value, $current));
        }
    }
}
