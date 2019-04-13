<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="<?php echo base_url() . 'Makanan/tambah_aksi/'; ?>" method="post">
        <button><a href="<?php echo base_url() . 'Makanan/'; ?>">Kembali</a></button>
        <table>
            <tr>
                <td>kode makanan :</td>
                <td><input type="text" name="id_mkn"></td>
            </tr>
            <tr>
                <td>nama :</td>
                <td><input type="text" name="nm_mkn"></td>
            </tr>
            <tr>
                <td>deskripsi :</td>
                <td><input type="text" name="desk_mkn"></td>
            </tr>
            <tr>
                <td>harga :</td>
                <td><input type="number" name="hrg_mkn"></td>
            </tr>
            <tr>
                <td>foto :</td>
                <td><input type="text" name="foto_mkn"></td>
            </tr>
        </table>
        <button type="submit">Tambah</button>
    </form>
</body>

</html> 