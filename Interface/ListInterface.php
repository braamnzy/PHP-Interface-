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

class ListCollection implements Collection {
    private $item = [];

    public function add($item){
        //menambahkan item ke array
        $this->item[] = $item;
    }
    public function remove($item){
        $index = array_search($item, $this->item);
        if ($index !== false){
            unset ($this->item[$index]);
        }
    }
    public function getAll(){
        return $this->item;
    }

    public function contains($item) {
        return in_array($item, $this->item);
    }

    public function size() {
        return count($this->item);
    }    

    public function get($index) {
        return $this->item[$index] ?? null;
    }

    public function set($index, $item) {
        if (isset($this->item[$index])) {
            $this->item[$index] = $item;
        }
    }

    public function indexOf($item) {
        $index = array_search($item, $this->item);
        return $index !== false ? $index : -1;
    }
}


class main {
    public static function main(){
        $ListA = new ListCollection();
        for($i = 0; $i < 6; $i++){
            $ListA->add($i);
        }
        print_r($ListA->getAll());
        echo "Elemen ke-2: " . $ListA->get(2) . "\n";
        echo "Index dari 4: " . $ListA->indexOf(4) . "\n";
        $ListA->set(1, 99);
        print_r($ListA->getAll());
    }
}

main::main();
?>
