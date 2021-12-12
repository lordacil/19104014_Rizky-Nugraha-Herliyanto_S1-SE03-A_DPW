<?php 
    //memanggil file koneksi 
    include 'koneksi.php';

    //binding form dengan kolom pada table
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];

    //query untuk insert data 
    $sql = "INSERT INTO tb_data(nama, kelas, alamat) VALUES ('$nama', '$kelas', '$alamat')";
    //eksekusi query insert data
    $add = $conn->query($sql);

    //cek kondisi query insert data berhasil atau tidak
    if($add) {
        $conn->close();
        header("location:index.php");
        exit();
    } else {
        echo "Error : ".$conn->error;
        $conn->close();
        exit();
    }
    

?>