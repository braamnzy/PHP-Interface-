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

class ArrayList implements ListInterface {
    private $items = [];

    // dari Collection
    public function add($item){
        $this->items[] = $item;
    }

    public function remove($item){
        $index = array_search($item, $this->items);
        if ($index !== false){
            unset($this->items[$index]);
            $this->items = array_values($this->items); // reset index
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

    // dari ListInterface
    public function get($index){
        return $this->items[$index] ?? null;
    }

    public function set($index, $item){
        if (isset($this->items[$index])) {
            $this->items[$index] = $item;
        }
    }

    public function indexOf($item){
        $index = array_search($item, $this->items);
        return $index !== false ? $index : -1;
    }
}


class main {
    public static function main(){
        $arrayList = new ArrayList();

        for ($i = 1; $i <= 5; $i++) {
            $arrayList->add($i);
        }

        print_r($arrayList->getAll());
        echo "Elemen ke-2: " . $arrayList->get(1) . "\n";

        $arrayList->set(1, 99);
        print_r($arrayList->getAll());

        echo "Index dari 4: " . $arrayList->indexOf(4) . "\n";

        $arrayList->remove(3);
        print_r($arrayList->getAll());

        echo "Jumlah elemen: " . $arrayList->size() . "\n";
        echo "Apakah mengandung 5? " . ($arrayList->contains(5) ? "Ya" : "Tidak") . "\n";
    }
}

main::main();
?>
