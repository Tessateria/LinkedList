<?php

class SeparateNode
{
    private $value;
    private $next = null;
    private $previous = null;


    public function setValue($value): void
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getNext()
    {
        return $this->next;
    }

    public function setNext($next): void
    {
        $this->next = $next;
    }

    public function getPrevious()
    {
        return $this->previous;
    }

    public function setPrevious($previous): void
    {
        $this->previous = $previous;
    }
}