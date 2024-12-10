![image](https://github.com/user-attachments/assets/d8a720a3-4ec7-44c6-8063-ae06f81a578e)# Lab10Web
```
Nama: Sartika Agustin
Nim: 312310174
Kelas: TI.23.A2
```
# PRAKTIKUM
## Membuat file mobil.php
![image](https://github.com/user-attachments/assets/024112bd-7dc0-4edf-ba32-e90908ac2edb)
```
<?php
/**program sederhana, pendefinisian dan pemanggilan class */
class Mobil
{
    private $warna;
    private $merk;
    private $harga;

    public function __construct()
    {
        $this->warna = "Biru";
        $this->merk = "BMW";
        $this->harga = "10000000";
    }

    public function gantiWarna ($warnaBaru)
    {
        $this->warna = $warnaBaru;
    }

    public function tampilWarna ()
    {
        echo "Warna mobilnya: " . $this->warna;
    }
}

// membuat objek mobil //
$a = new Mobil();
$b = new Mobil();

// memanggil objek //
echo "<b>Mobil pertama</b><br>";
$a->tampilWarna();
echo "<br>Mobil pertama ganti warna<br>";
$a->gantiWarna("Merah");
$a->tampilWarna();

// memanggil objek ke 2 //
echo "<br><b>Mobil Kedua</b><br>";
$b->gantiWarna("Hijau");
$b->tampilWarna();
?>
```
# Tampilan pada web
![image](https://github.com/user-attachments/assets/92d8ff6f-7278-4ec3-8314-c84aff883ac0)
## Membuat file form.php
![image](https://github.com/user-attachments/assets/01e171f6-c4d4-48f8-a766-39817afefb48)
```
<?php


class Form
{
    private $fields = array();
    private $action;
    private $submit = "Submit Form";
    private $jumField = 0;

    public function __construct($action, $submit) 
    {
        $this->action = $action;
        $this->submit = $submit;
    }

    public function displayForm()
    {
    echo "<form action='" . $this->action . "' method='POST'>";
    echo "<table width='100%' border='0'>";

    for ($j = 0; $j < count($this->fields); $j++) {
        echo "<tr>
                <td align='right'>" . $this->fields[$j]['label'] . ":</td>
                <td><input type='text' name='" . $this->fields[$j]['name'] . "'></td>
              </tr>";
    }

    echo "<tr>
            <td colspan='2'>
                <input type='submit' value='" . $this->submit . "'>
            </td>
          </tr>";
    echo "</table>";
    echo "</form>";
    }

    public function addField($name, $label)
    {
    $this->fields[$this->jumField]['name'] = $name;
    $this->fields[$this->jumField]['label'] = $label;
    $this->jumField++;
    }
}
?>
```
```
File tersebut belum bisa dieksekusi langsung karena hanya berisi deklarasi class,
untuk menggunakannya perlu menggunakan include pada file lain yang akan
menjalankan dan harus dibuat instance object terlebih dahulu.
```
# Membuat file form_input.php
![image](https://github.com/user-attachments/assets/ed88ea83-c022-4836-bf12-5eb31218e7b2)
# Tampilan form
![image](https://github.com/user-attachments/assets/763a6dbd-83e8-4aa7-85fb-821118e8e0d9)

# Tugas
```
Implementasikan dengan praktikum sebelumnya
```
# 1. Buat file config.php
![image](https://github.com/user-attachments/assets/2ef35548-691c-4fb4-af19-27cb942aa8a1)
# 2. Buat file database.php
```
<?php

class Database
{
    protected $conn;

    public function __construct($host, $user, $password, $db_name)
    {
        $this->conn = new mysqli($host, $user, $password, $db_name);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function query($sql)
    {
        return $this->conn->query($sql);
    }

    public function escapeString($value)
    {
        return $this->conn->real_escape_string($value);
    }

    public function closeConnection()
    {
        $this->conn->close();
    }
}

?>
```
# Membuat file class library
```

<?php

class FormLibrary
{
    public static function generateTable($result)
    {
        $tableHTML = '<table class="data-table">
                        <tr>
                            <th>Gambar</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Harga Jual</th>
                            <th>Harga Beli</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>';

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $tableHTML .= '<tr>
                                <td><img src="gambar/' . $row['gambar'] . '" alt="' . $row['nama'] . '"></td>
                                <td>' . $row['nama'] . '</td>
                                <td>' . $row['kategori'] . '</td>
                                <td>' . $row['harga_beli'] . '</td>
                                <td>' . $row['harga_jual'] . '</td>
                                <td>' . $row['stok'] . '</td>
                                <td class="aksi">
                                    <a class="ubah" href="ubah.php?id=' . $row['id_barang'] . '">Ubah</a>
                                    <a class="hapus" href="hapus.php?id=' . $row['id_barang'] . '">Hapus</a>
                                </td>
                            </tr>';
            }
        } else {
            $tableHTML .= '<tr>
                            <td colspan="7">Belum ada data</td>
                        </tr>';
        }
        

        $tableHTML .= '</table>';
        return $tableHTML;
    }

    public static function generateUbah($currentValue, $options)
    {
        $html = '';
        foreach ($options as $value => $label) {
            $selected = ($value == $currentValue) ? 'selected="selected"' : '';
            $html .= "<option value=\"$value\" $selected>$label</option>";
        }
        return $html;
    }
}
?>
```
# Menambahkan file tambah.php, ubah.php, hapus.php, index.php, header.php, kontak.php dan footer.php dari praktikum sebelumnya

# Tampilan index.php
![image](https://github.com/user-attachments/assets/87dc0ad0-d5e8-495a-8d3d-9fefd6895c7b)
# Tampilan about.php
![image](https://github.com/user-attachments/assets/0c8312a6-fb63-45b5-a073-0a64e98bb824)
# Tampilan kontak.php
![image](https://github.com/user-attachments/assets/6371265c-9055-451d-90e7-f8ff731f3dc0)
