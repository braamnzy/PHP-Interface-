<?php

interface IteratorInterface {
    public function hasNext();   // cek apakah masih ada elemen berikutnya
    public function next();      // ambil elemen berikutnya
    public function reset();     // kembali ke awal iterasi
}

class ListIterator implements IteratorInterface {
    private $items = [];
    private $position = 0;

    public function __construct($items) {
        $this->items = array_values($items); // pastikan index berurutan
        $this->position = 0;
    }

    public function hasNext() {
        return $this->position < count($this->items);
    }

    public function next() {
        if ($this->hasNext()) {
            return $this->items[$this->position++];
        }
        return null;
    }

    public function reset() {
        $this->position = 0;
    }
}


class main {
    public static function main(){
        $data = [10, 20, 30, 40, 50];
        $iterator = new ListIterator($data);

        while ($iterator->hasNext()) {
            echo $iterator->next() . " ";
        }

        $iterator->reset();
        echo "\nSetelah reset:\n";

        while ($iterator->hasNext()) {
            echo $iterator->next() . " ";
        }
    }
}

main::main();
?>
