<?php

interface InterfaceQueue {
    public function enqueue($item); // Menambahkan elemen ke belakang antrian
    public function dequeue();      // Menghapus elemen dari depan antrian
    public function peek();         // Melihat elemen depan tanpa menghapus
    public function isEmpty();      // Mengecek apakah antrian kosong
    public function size();         // Mengembalikan jumlah elemen
    public function getAll();       // Menampilkan semua elemen
}

class Queue implements InterfaceQueue {
    private $data = [];

    public function enqueue($item) {
        // Tambahkan elemen ke belakang antrian
        $this->data[] = $item;
    }

    public function dequeue() {
        // Hapus elemen dari depan antrian dan kembalikan nilainya
        if (!$this->isEmpty()) {
            return array_shift($this->data);
        }
        return null;
    }

    public function peek() {
        // Lihat elemen paling depan tanpa menghapus
        if (!$this->isEmpty()) {
            return $this->data[0];
        }
        return null;
    }

    public function isEmpty() {
        // Cek apakah antrian kosong
        return empty($this->data);
    }

    public function size() {
        // Jumlah elemen dalam antrian
        return count($this->data);
    }

    public function getAll() {
        // Tampilkan semua elemen dalam antrian
        return $this->data;
    }
}

class Main {
    public static function main() {
        $queue = new Queue();

        // Tambahkan beberapa elemen
        $queue->enqueue("A");
        $queue->enqueue("B");
        $queue->enqueue("C");

        print_r($queue->getAll());

        // Menghapus elemen paling depan
        echo "Elemen yang dihapus dari antrian: " . $queue->dequeue() . "\n";

        print_r($queue->getAll());

        echo "Elemen paling depan sekarang adalah: " . $queue->peek() . "\n";
        echo "Jumlah elemen dalam antrian: " . $queue->size() . "\n";
        echo "Apakah antrian kosong? " . ($queue->isEmpty() ? "Ya" : "Tidak") . "\n";
    }
}

Main::main();

?>
