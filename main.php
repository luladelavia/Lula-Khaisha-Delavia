<?php

include_once "program.php";

echo "=== DEMO MyList (Interface) ===\n";
$list = new MyList();
$list->add("Item A");
$list->add("Item B");
$list->add("Item C");

while ($list->hasNext()) {
    echo $list->next() . PHP_EOL;
}

echo "\n=== DEMO ArrayList ===\n";
$arrayList = getArrayList();
print_r($arrayList);

echo "\n=== DEMO LinkedList ===\n";
foreach (getLinkedList() as $element) {
    echo $element . PHP_EOL;
}

echo "\n=== DEMO Stack (POP) ===\n";
$stackInstance = getStack();
echo $stackInstance->pop() . PHP_EOL;

echo "\n=== DEMO Queue (DEQUEUE) ===\n";
$queueInstance = getQueue();
echo $queueInstance->dequeue() . PHP_EOL;

echo "\n=== DEMO HashMap ===\n";
$hashMap = getHashMap();
print_r($hashMap);