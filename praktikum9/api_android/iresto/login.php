<?php
// $_SERVER untuk menampilkan data dari server (sebuah fungsi)
// Returns the request method used to access the page (such as POST)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // menangkap data dari post
    $id_user = $_POST['id_user'];
    $password = $_POST['password'];

    // menyertakan sebuah file PHP kedalam file PHP lainnya
    require_once 'koneksidb.php';

    // query database
    $sql = "    SELECT *
                FROM tb_user tu
                WHERE tu.id_user = '$id_user' ;";

    // menjalankan query (mengambil data)
    $response = mysqli_query($conn, $sql);

    // membuat array
    $result = array();
    $result['login'] = array();

    // jika data baris yang ada didalam variable response 1 
    if (mysqli_num_rows($response) === 1) {

        // Array asosiatif adalah array yang tidak menggunakan angka sebagai kunci di setiap nilainya.
        // mengorversi array menjadi array asosiatif
        $row = mysqli_fetch_assoc($response);

        // jika paswordnya benar 
        if (password_verify($password, $row['password'])) {

            // mengambil data di database dimasukkan ke variable index berupa array
            $index['nama_user'] = $row['nama_user'];
            $index['id_user'] = $row['id_user'];

            // menambahkan array
            array_push($result['login'], $index);

            // membuat array untuk di transfer ke API
            $result["success"] = "1";
            $result["message"] = "success";

            // mengkorvesi data array dari $result menjadi data json / text dan data di echo
            echo json_encode($result);

            // menutup koneksi
            mysqli_close($conn);
        } else {
            // membuat array untuk di transfer ke API
            $result["success"] = "0";
            $result["message"] = "error";

            // mengkorvesi data array dari $result menjadi data json / text dan data di echo
            echo json_encode($result);

            // menutup koneksi
            mysqli_close($conn);
        }
    }
}
