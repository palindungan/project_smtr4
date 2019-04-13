<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>kode makanan</th>
                <th>nama</th>
                <th>deskripsi</th>
                <th>harga</th>
                <th>foto</th>
                <th>edit</th>
                <th>hapus</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tbl_makanan as $key) {
                # code...
                ?>
            <tr>

                <td><?php echo $key->id_mkn ?></td>
                <td><?php echo $key->nm_mkn ?></td>
                <td><?php echo $key->desk_mkn ?></td>
                <td><?php echo $key->hrg_mkn ?></td>
                <td><?php echo $key->foto_mkn ?></td>
                <td><?php echo anchor('Makanan/edit/' . $key->id_mkn, 'Edit'); ?></td>
                <td><?php echo anchor('Makanan/hapus_aksi/' . $key->id_mkn, 'Hapus'); ?></td>
            </tr>
            <?php 
        } ?>
        </tbody>
    </table>
    <button><a href="<?php echo base_url() . 'Makanan/tambah/' ?>">Tambah Makanan</a></button>
</body>

</html> 