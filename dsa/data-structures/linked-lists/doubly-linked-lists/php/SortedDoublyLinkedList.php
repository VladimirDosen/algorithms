<?php

declare(strict_types=1);

require_once __DIR__ . '/UnsortedDoublyLinkedList.php';

class SortedDoublyLinkedList extends UnsortedDoublyLinkedList
{
    public function insert(mixed $value): void
    {
        $current = $this->head;

        if ($current === null) {
            $this->head = $this->tail = new Node($value);

            return;
        }

        while($current !== null) {
            $newNode = new Node($value);

            if ($current->getValue() >= $value) {
                if ($current->getPrev() === null) {
                    $current->prepend($newNode->prepend(null)->append($current));
                    $this->head = $newNode;
                } else {
                    $previous = $current->getPrev();
                    $previous
                        ->append(
                            $newNode->append($current->prepend($newNode))
                                ->prepend($previous)
                        );
                }

                return;
            } else if ($current->getNext() === null) {
                $current->append($newNode->prepend($current)->append(null));
                $this->tail = $newNode;

                return;
            }

            $current = $current->getNext();
        }
    }
}
