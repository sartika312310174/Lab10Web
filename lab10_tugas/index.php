<?php
include("database.php");
include("formlibrary.php");

$config = include("config.php");

$db = new Database($config['host'], $config['username'], $config['password'], $config['db_name']);
$sql = 'SELECT * FROM data_barang';
$result = $db->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>
    <style>
        table { border-collapse: collapse; width: 60%; }
        th, td { border: 1px solid #ddd; padding: 5px; text-align: left; }
        th { background-color: #f4f4f4; }
    </style>
</head>
<body>
    <div class="container">
        <?php require('header.php'); ?>
        <h2>Data Barang</h2>
        <div class="main">
            <a class="tambah" href="tambah.php">Tambah Barang</a>
            <?php echo FormLibrary::generateTable($result); ?>
        </div>
        <?php require('footer.php'); ?>
    </div>
</body>

</html>

<?php
// Jangan lupa untuk menutup koneksi setelah selesai menggunakannya
$db->closeConnection();
?>