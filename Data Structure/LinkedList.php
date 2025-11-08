<?php

interface Collection {
    public function add($item);
    public function remove($item);
    public function getAll();
    public function contains($item);
    public function size();
}

interface ListInterface extends Collection {
    public function get($index);
    public function set($index, $item);
    public function indexOf($item);
}

class Node {
    public $data;
    public $next;

    public function __construct($data) {
        $this->data = $data;
        $this->next = null;
    }
}

class LinkedList implements ListInterface {
    private $head = null;
    private $size = 0;

    // dari Collection
    public function add($item){
        $newNode = new Node($item);

        if ($this->head === null) {
            $this->head = $newNode;
        } else {
            $current = $this->head;
            while ($current->next !== null) {
                $current = $current->next;
            }
            $current->next = $newNode;
        }
        $this->size++;
    }

    public function remove($item){
        $current = $this->head;
        $prev = null;

        while ($current !== null) {
            if ($current->data === $item) {
                if ($prev === null) {
                    $this->head = $current->next;
                } else {
                    $prev->next = $current->next;
                }
                $this->size--;
                return;
            }
            $prev = $current;
            $current = $current->next;
        }
    }

    public function getAll(){
        $result = [];
        $current = $this->head;
        while ($current !== null) {
            $result[] = $current->data;
            $current = $current->next;
        }
        return $result;
    }

    public function contains($item) {
        $current = $this->head;
        while ($current !== null) {
            if ($current->data === $item) {
                return true;
            }
            $current = $current->next;
        }
        return false;
    }

    public function size() {
        return $this->size;
    }

    // dari ListInterface
    public function get($index){
        $current = $this->head;
        $count = 0;
        while ($current !== null) {
            if ($count === $index) {
                return $current->data;
            }
            $count++;
            $current = $current->next;
        }
        return null;
    }

    public function set($index, $item){
        $current = $this->head;
        $count = 0;
        while ($current !== null) {
            if ($count === $index) {
                $current->data = $item;
                return;
            }
            $count++;
            $current = $current->next;
        }
    }

    public function indexOf($item){
        $current = $this->head;
        $index = 0;
        while ($current !== null) {
            if ($current->data === $item) {
                return $index;
            }
            $index++;
            $current = $current->next;
        }
        return -1;
    }
}


class main {
    public static function main(){
        $list = new LinkedList();

        for ($i = 1; $i <= 5; $i++) {
            $list->add($i);
        }

        print_r($list->getAll());
        echo "Elemen ke-2: " . $list->get(1) . "\n";

        $list->set(1, 99);
        print_r($list->getAll());

        echo "Index dari 4: " . $list->indexOf(4) . "\n";

        $list->remove(3);
        print_r($list->getAll());

        echo "Jumlah elemen: " . $list->size() . "\n";
        echo "Apakah mengandung 5? " . ($list->contains(5) ? "Ya" : "Tidak") . "\n";
    }
}

main::main();
?>
