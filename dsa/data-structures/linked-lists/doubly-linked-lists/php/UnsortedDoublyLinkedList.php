<?php

declare(strict_types=1);

require_once __DIR__ . '/Node.php';

class UnsortedDoublyLinkedList
{
    public function __construct(
        protected ?Node $head = null,
        protected ?Node $tail = null,
    )
    {
    }

    public function insertHead(mixed $value): void
    {
        if ($this->head === null) {
            $this->head = $this->tail = new Node($value);

            return;
        }

        $this->head->prepend((new Node($value))->append($this->head));
        $this->head = $this->head->getPrev();
    }

    public function insertTail(mixed $value): void
    {
        if ($this->tail === null) {
            $this->head = $this->tail = new Node($value);

            return;
        }

        $this->tail->append((new Node($value))->prepend($this->tail));
        $this->tail = $this->tail->getNext();
    }

    public function insertAfter(mixed $value): void
    {
        if ($this->head === null) {
            return;
        }

        $node = $this->findNode($value);

        if ($node === null) {
            return;
        }

        $newNode = new Node($value);

        $node->append($newNode->prepend($node)->append($node->getNext()));

        if ($node->getNext() === null) {
            $this->tail = $newNode;
        }
    }

    public function search(mixed $value): mixed
    {
        return $this->findNode($value)?->getValue();
    }

    public function delete(mixed $value): void
    {
        $node = $this->findNode($value);

        if ($node === null) {
            throw new \Exception('Node not found for value: '  . $value);
        }

        if (!$node->hasPrev()) {
            $this->head = $node->getNext();
            if (!$node->hasNext()) {
                $this->head = $this->tail = null;
            } else {
                $this->head->prepend(null);
            }
        } else if (!$node->hasNext()) {
            $this->tail = $node->getPrev();
            $this->tail->append(null);
        } else {
            $node->getPrev()->append($node->getNext()->prepend($node->getPrev()));
        }

        unset($node);
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

    private function findNode(mixed $value): ?Node
    {
        $current = $this->head;

        while($current !== null) {
            if ($current->getValue() === $value) {
                return $current;
            }

            $current = $current->getNext();
        }

        return null;
    }
}
