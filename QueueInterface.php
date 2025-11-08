<?php

interface Collection {
    public function add($item);
    public function remove($item);
    public function getAll();
    public function contains($item);
    public function size();
}

interface QueueInterface extends Collection {
    public function enqueue($item); // tambah ke belakang
    public function dequeue();      // ambil dari depan
    public function peek();         // lihat elemen depan tanpa hapus
}

class QueueCollection implements QueueInterface {
    private $items = [];

    // dari Collection
    public function add($item){
        $this->enqueue($item); // add = enqueue
    }

    public function remove($item){
        $index = array_search($item, $this->items);
        if ($index !== false){
            unset ($this->items[$index]);
        }
    }

    public function getAll(){
        return $this->items;
    }

    public function contains($item) {
        return in_array($item, $this->items);
    }

    public function size() {
        return count($this->items);
    }

    // dari QueueInterface
    public function enqueue($item) {
        array_push($this->items, $item);
    }

    public function dequeue() {
        if (!empty($this->items)) {
            return array_shift($this->items);
        }
        return null;
    }

    public function peek() {
        return $this->items[0] ?? null;
    }
}


class main {
    public static function main(){
        $queue = new QueueCollection();

        // menambah data ke antrian
        for($i = 1; $i <= 5; $i++){
            $queue->enqueue($i);
        }

        print_r($queue->getAll());
        echo "Elemen terdepan: " . $queue->peek() . "\n";

        echo "Dequeue: " . $queue->dequeue() . "\n";
        print_r($queue->getAll());

        echo "Ukuran Queue: " . $queue->size() . "\n";
        echo "Mengandung 3? " . ($queue->contains(3) ? "Ya" : "Tidak") . "\n";
    }
}

main::main();
?>
