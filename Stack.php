<?php

interface StackInterface {
    public function push($item);
    public function pop();
    public function peek();
    public function isEmpty();
    public function size();
}

class Stack implements StackInterface {
    private $data = [];

    public function push($item) {
        // menambahkan item ke atas tumpukan
        $this->data[] = $item;
    }

    public function pop() {
        // menghapus dan mengembalikan item paling atas
        if (!$this->isEmpty()) {
            return array_pop($this->data);
        }
        return null;
    }

    public function peek() {
        // melihat item paling atas tanpa menghapus
        if (!$this->isEmpty()) {
            return end($this->data);
        }
        return null;
    }

    public function isEmpty() {
        // memeriksa apakah stack kosong
        return empty($this->data);
    }

    public function size() {
        // menghitung jumlah item dalam stack
        return count($this->data);
    }
}

class main {
    public static function main() {
        $tumpukan = new Stack();
        $tumpukan->push("A");
        $tumpukan->push("B");
        $tumpukan->push("C");

        echo "Elemen paling atas: " . $tumpukan->peek() . "\n";
        echo "Jumlah elemen: " . $tumpukan->size() . "\n";

        echo "Menghapus: " . $tumpukan->pop() . "\n";
        echo "Jumlah setelah pop: " . $tumpukan->size() . "\n";

        echo "Apakah kosong? " . ($tumpukan->isEmpty() ? "Ya" : "Tidak") . "\n";
    }
}

main::main();

?>
