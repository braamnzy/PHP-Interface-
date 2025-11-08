<?php

interface Collection {
    public function add($item);
    public function remove($item);
    public function getAll();
    public function contains($item);
    public function size();
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
}


class main {
    public static function main(){
        $ListA = new ListCollection();
        for($i = 0; $i < 6; $i++){
            $ListA->add($i);
        }
        print_r($ListA->getAll());
        $ListA->remove(5);
        print_r($ListA->getAll());
        echo "Mengandung 2? ";
        echo $ListA->contains(2) ? "Ya" : "Tidak"; 
        echo "\n"; 
        echo "Ukuran Array: " .$ListA->size();
    }
}

main::main();
?>
