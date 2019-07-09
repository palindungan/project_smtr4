<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Daftar Barang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<body>
    <ul>Daftar Barang
        <?php foreach($item as $row){ ?>
        <li> 
         <?php echo $row->id_barang."</br>";
         echo $row->nama_barang."</br>";
         echo $row->jumlah_barang."</br>";
         echo $row->id_pembeli."</br>";
         echo $row->harga_barang."</br>";}?>
         </li>
    </ul>
</body>
</html>