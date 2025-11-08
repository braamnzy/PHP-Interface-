<?php

interface Collection {
    public function add($item);
    public function remove($item);
    public function getAll();
    public function contains($item);
    public function size();
}


interface MapInterface extends Collection {
    public function put($key, $value);     // menambah pasangan key-value
    public function get($key);             // ambil value berdasarkan key
    public function removeKey($key);       // hapus berdasarkan key
    public function keySet();              // ambil semua key
    public function values();              // ambil semua value
}

class MapCollection implements MapInterface {
    private $items = [];

    // dari Collection
    public function add($item){
        if (is_array($item) && count($item) === 2) {
            $this->put($item[0], $item[1]);
        }
    }

    public function remove($item){
        $key = array_search($item, $this->items);
        if ($key !== false){
            unset($this->items[$key]);
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

    // dari MapInterface
    public function put($key, $value){
        $this->items[$key] = $value;
    }

    public function get($key){
        return $this->items[$key] ?? null;
    }

    public function removeKey($key){
        if (isset($this->items[$key])) {
            unset($this->items[$key]);
        }
    }

    public function keySet(){
        return array_keys($this->items);
    }

    public function values(){
        return array_values($this->items);
    }
}


class main {
    public static function main(){
        $map = new MapCollection();

        $map->put("A", 10);
        $map->put("B", 20);
        $map->put("C", 30);

        print_r($map->getAll());
        echo "Nilai key B: " . $map->get("B") . "\n";

        $map->removeKey("A");
        print_r($map->getAll());

        print_r($map->keySet());
        print_r($map->values());
    }
}

main::main();
?>
