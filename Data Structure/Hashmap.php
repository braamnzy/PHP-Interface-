<?php

interface InterfaceMap {
    public function put($key, $value);    // Menyimpan pasangan key-value
    public function get($key);            // Mengambil nilai berdasarkan key
    public function remove($key);         // Menghapus elemen berdasarkan key
    public function containsKey($key);    // Mengecek apakah key ada
    public function size();               // Mengembalikan jumlah elemen
    public function getAll();             // Mengembalikan seluruh isi HashMap
}

class HashMap implements InterfaceMap {
    private $data = [];

    public function put($key, $value) {
        // Simpan data (jika key sama, nilainya diperbarui)
        $this->data[$key] = $value;
    }

    public function get($key) {
        // Ambil nilai berdasarkan key
        return $this->data[$key] ?? null;
    }

    public function remove($key) {
        // Hapus data berdasarkan key
        if ($this->containsKey($key)) {
            unset($this->data[$key]);
            return true;
        }
        return false;
    }

    public function containsKey($key) {
        // Cek apakah key ada di HashMap
        return array_key_exists($key, $this->data);
    }

    public function size() {
        // Hitung jumlah elemen
        return count($this->data);
    }

    public function getAll() {
        // Kembalikan seluruh isi HashMap
        return $this->data;
    }
}

class Main {
    public static function main() {
        $map = new HashMap();

        // Menambahkan data
        $map->put("nama", "Zefa");
        $map->put("umur", 19);
        $map->put("jurusan", "Teknik Komputer");

        echo "Isi HashMap saat ini:\n";
        print_r($map->getAll());

        // Mengambil data
        echo "Nama: " . $map->get("nama") . "\n";
        echo "Apakah key 'umur' ada? " . ($map->containsKey("umur") ? "Ya" : "Tidak") . "\n";

        // Menghapus data
        echo "Menghapus key 'umur'...\n";
        $map->remove("umur");

        echo "Isi HashMap setelah penghapusan:\n";
        print_r($map->getAll());

        // Ukuran HashMap
        echo "Jumlah elemen dalam HashMap: " . $map->size() . "\n";
    }
}

Main::main();

?>
