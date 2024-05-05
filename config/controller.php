<?php 
    include 'KONEKSI/koneksi.php';
function select($query){

    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
  
    while($row = mysqli_fetch_assoc($result)){
      $rows[] = $row;
    }
  
    return $rows;
  }

function create_barang($post){
    global $conn;

    $nama = $post['nama'];
    $jumlah = $post['jumlah'];
    $harga = $post['harga'];

    $query = "INSERT INTO barang VALUES (NULL, '$nama', '$jumlah', '$harga', CURRENT_TIMESTAMP())";


    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

function update_barang($post){
    global $conn;
    
    $id_barang = $post['id_barang'];
    $nama = $post['nama'];
    $jumlah = $post['jumlah'];
    $harga = $post['harga'];

    $query = "UPDATE barang SET nama = '$nama', jumlah = '$jumlah', harga = '$harga' WHERE id_barang = '$id_barang'";


    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function registrasi($data){
    global $conn;

    $username = strtolower(stripcslashes($data["username"]));
    $password = mysqli_real_escape_string($conn,$data['password']);
    $password2 = mysqli_real_escape_string( $conn, $data['password2']);

    $result =  mysqli_query($conn, "SELECT username FROM user WHERE username='$username'");

    if(mysqli_fetch_assoc($result)){
        echo "
            <script>
                alert('username sudah terdaftar');
            </script>
        ";

        return false;
    }

    if ($password !== $password2){
        echo "
            <script>
                alert('Konformasi password tidak sesuai');
            </script>

        ";

        return false;
    }

    // enskripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO  user VALUES(NULL, '$username', '$password')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows( $conn );
}

function delete_barang($id_barang){
    global $conn;

    $query = "DELETE FROM barang WHERE id_barang = '$id_barang'";

    mysqli_query($conn, $query);

    return mysqli_affected_rows( $conn );

}

?>