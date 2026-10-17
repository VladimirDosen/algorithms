<?php

declare(strict_types=1);

class Node
{
    public function __construct(
        private mixed $value,
        private ?Node $prev = null,
        private ?Node $next = null,
    )
    {
    }

    public function getValue(): mixed
    {
        return $this->value;
    }

    public function getPrev(): ?Node
    {
        return $this->prev;
    }

    public function getNext(): ?Node
    {
        return $this->next;
    }

    public function hasPrev(): bool
    {
        return $this->prev !== null;
    }

    public function hasNext(): bool
    {
        return $this->next !== null;
    }

    public function prepend(?Node $prev): self
    {
        $this->prev = $prev;

        return $this;
    }

    public function append(?Node $next): self
    {
        $this->next = $next;

        return $this;
    }
}
