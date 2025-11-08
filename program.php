<?php

// ------------------ ANTARMUKA (INTERFACE) ------------------
interface CollectionInterface {
    public function add($item);
    public function remove($item);
    public function size();
}

interface ListInterface extends CollectionInterface {
    public function get($index);
}

interface QueueInterface extends CollectionInterface {
    public function enqueue($item);
    public function dequeue();
}

interface MapInterface {
    public function put($key, $value);
    public function get($key);
}

interface IteratorInterface {
    public function hasNext();
    public function next();
}

// ------------------ IMPLEMENTASI MANUAL: MyList ------------------
class MyList implements ListInterface, IteratorInterface {
    private $elements = [];  
    private $cursor = 0;      

    public function add($item) {
        $this->elements[] = $item;
    }

    public function remove($item) {
        $idx = array_search($item, $this->elements, true);
        if ($idx !== false) {               
            unset($this->elements[$idx]);
            $this->elements = array_values($this->elements);
            if ($this->cursor > count($this->elements)) {
                $this->cursor = count($this->elements);
            }
        }
    }

    public function size() {
        return count($this->elements);
    }

    public function get($index) {
        return $this->elements[$index];
    }

    public function hasNext() {
        return $this->cursor < $this->size();
    }

    public function next() {
        return $this->elements[$this->cursor++];
    }
}

// ------------------ IMPLEMENTASI STRUKTUR BAWAAN PHP ------------------

// ArrayList
function getArrayList() {
    return ["Lula", "Delavia", "Informatika"];
}

// LinkedList
function getLinkedList() {
    $list = new SplDoublyLinkedList();
    $list->push("Jumat");
    $list->push("Sabtu");
    $list->push("Minggu");
    return $list;
}

// Stack
function getStack() {
    $stack = new SplStack();
    $stack->push("Item P");
    $stack->push("Item Q");
    $stack->push("Item R");
    return $stack;
}

// Queue
function getQueue() {
    $queue = new SplQueue();
    $queue->enqueue("Queue A");
    $queue->enqueue("Queue B");
    $queue->enqueue("Queue C");
    return $queue;
}

// HashMap
function getHashMap() {
    return [
        "nama" => "Lula Delavia",
        "shift" => "Shift B",
        "matkul" => "Basis Data"
    ];
}
