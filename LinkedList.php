<?php
require_once __DIR__.'/SeparateNode.php';
class LinkedList
{
    private $head = null;
    private $tail = null;

    public function append($value)
    {
        $newElement = new SeparateNode();
        $newElement->setValue($value);

        if (!empty($this->head)) {
            $this->tail->setNext($newElement);
            $newElement->setPrevious($this->tail);
            $this->tail = $newElement;
        } else {
            $this->head = $newElement;
            $this->tail = $newElement;
        }
    }

    public function prepend($value)
    {
        $obj = new SeparateNode();
        $obj->setValue($value);

        $headObj = $this->head;
        $obj->setNext($headObj);
        $this->head = $obj;
    }

    public function deleteFromHead()
    {
        if (empty($this->head)) {
            throw new RuntimeException("Notice");
        }

        if ($this->head !== $this->tail) {
            $this->head = $this->head->getNext();
            $this->head->setPrevious(null);
        } else {
            $this->head = $this->tail = null;
        }
    }

    public function deleteFromEnd()
    {
        if (empty($this->head)) {
            throw new RuntimeException("Notice");
        }

        if ($this->head !== $this->tail) {
            $this->tail = $this->tail->getPrevious();
            $this->tail->setNext(null);
        } else {
            $this->head = $this->tail = null;
        }
    }

    public function insertAfterAt($value, $at)
    {
        $element = $this->search($at);
        if (is_null($element)){
            throw new RuntimeException("Notice");
        }

        $newElement = new SeparateNode($value);
        $newElement->setValue($value);
        $elementTail = $element->getNext();
        $newElement->setNext($elementTail);
        $newElement->setPrevious($element);
        $element->setNext($newElement);

        if (!is_null($elementTail)) {
            $elementTail->setPrevious($newElement);
        }
    }


    public function insertBeforeAt($value, $at)
    {
        $element = $this->search($at);
        if (is_null($element)){
            throw new RuntimeException("Notice");
        }
        $newElement = new SeparateNode($value);
        $newElement->setValue($value);

        $elementHead = $element->getPrevious();
        $newElement->setPrevious($elementHead);
        $newElement->setNext($element);
        $element->setPrevious($newElement);

        if(!is_null($elementHead)){
            $elementHead->setNext($newElement);
        }

    }

    public function deleteAt($at)
    {
        $element = $this->search($at);
        if (is_null($element)){
            throw new RuntimeException("Notice");
        }
        $elementHead = $element->getPrevious();
        $elementTail = $element->getNext();
        $elementHead->setNext($elementTail);
        $elementTail->setPrevious($elementHead);
    }



    public function search($value)
    {
        if (empty($this->head)) {
            throw new RuntimeException("Notice");
        }

       $currentElement = $this->head;
       do {
           if ($currentElement->getValue() == $value){
               return $currentElement;
           }
       } while ($currentElement = $currentElement->getNext());
       return null;
    }
}