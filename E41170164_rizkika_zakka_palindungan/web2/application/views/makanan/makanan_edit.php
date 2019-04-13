<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <button><a href="<?php echo base_url() . 'Makanan/'; ?>">Kembali</a></button>
    <form action="<?php echo base_url() . 'Makanan/update_aksi/'; ?>" method="post">

        <table>
            <?php foreach ($data_makanan as $k) {
                # code...
                ?>
            <tr>
                <td>kode makanan :</td>
                <td><input type="text" name="id_mkn" value="<?php echo $k->id_mkn ?>"></td>
            </tr>
            <tr>
                <td>nama :</td>
                <td><input type="text" name="nm_mkn" value="<?php echo $k->nm_mkn ?>"></td>
            </tr>
            <tr>
                <td>deskripsi :</td>
                <td><input type="text" name="desk_mkn" value="<?php echo $k->desk_mkn ?>"></td>
            </tr>
            <tr>
                <td>harga :</td>
                <td><input type="number" name="hrg_mkn" value="<?php echo $k->hrg_mkn ?>"></td>
            </tr>
            <tr>
                <td>foto :</td>
                <td><input type="text" name="foto_mkn" value="<?php echo $k->foto_mkn ?>"></td>
            </tr>
            <?php 
        } ?>
        </table>
        <button type="submit">Simpan</button>
    </form>
</body>

</htm l> 