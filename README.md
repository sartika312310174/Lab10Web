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



