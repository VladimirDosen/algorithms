<?php
declare(strict_types=1);

class Node
{
    public function __construct(
        private readonly mixed $value,
        private ?Node          $next = null,
    )
    {
    }

    public function getNext(): ?Node
    {
        return $this->next;
    }

    public function hasNext(): bool
    {
        return $this->next !== null;
    }

    public function getValue(): mixed
    {
        return $this->value;
    }

    public function append(Node $node): self
    {
        $this->next = $node;

        return $this;
    }
}
