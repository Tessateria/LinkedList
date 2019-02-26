<?php
require_once __DIR__.'/LinkedList.php';

$linkedList = new LinkedList();
$linkedList->append("new item1");
$linkedList->append("new item2");
$linkedList->append("new item3");
$linkedList->deleteAt("new item2");

print_r($linkedList);