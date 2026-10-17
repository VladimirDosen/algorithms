<?php

declare(strict_types=1);

require_once __DIR__ . '/Node.php';

class UnsortedSinglyLinkedList
{
    protected ?Node $head;

    public function __construct()
    {
        $this->head = null;
    }

    public function insert(mixed $value): void
    {
        $current = $this->head;

        if ($current === null) {
            $this->head = new Node($value);

            return;
        }

        while ($current->hasNext()) {
            $current = $current->getNext();
        }

        $current->append(new Node($value));
    }

    public function prepend(mixed $value): void
    {
        $head = $this->head;
        $this->head = new Node($value, $head);
    }

    public function search(mixed $value): mixed
    {
        $current = $this->head;

        while ($current->hasNext()) {
            if ($current->getValue() === $value) {
                return $value;
            }

            $current = $current->getNext();
        }

        return null;
    }

    public function delete(mixed $value): void
    {
        $current = $this->head;
        $previous = null;

        if ($current === null) {
            throw new \Exception('List is empty');
        }

        while ($current !== null) {
            if ($current->getValue() === $value) {
                if ($previous === null) {
                    $this->head = $current->getNext();
                } else {
                    $previous->append($current->getNext());
                }

                return;
            }

            $previous = $current;
            $current = $current->getNext();
        }

        throw new \Exception('Value not deleted: ' . $value);
    }

    public function traverse(callable $callback): void
    {
        $current = $this->head;

        if ($current === null) {
            echo "\n\n<br><br>No nodes\n\n<br>";

            return;
        }

        while ($current !== null) {
            $callback($current->getValue());
            $current = $current->getNext();
        }
    }
}
