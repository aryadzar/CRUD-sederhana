<?php

session_start();

if(!isset($_SESSION['login'])){
  header('Location: login.php');
}


include 'layout/header.php';



$data_barang = select("SELECT * FROM barang");

?>

    <div class="container mt-5">
      <h1>Data Barang</h1>
      <hr>
      <a href="form-tambah.php" class="btn btn-primary mb-2">Tambah</a>
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Tangal</th>
            <th>Aksi</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <?php $no = 1?>
            <?php foreach($data_barang as $barang) : ?>
            <td><?= $no++; ?></td>
            <td><?= $barang['nama'];?></td>
            <td><?= $barang['jumlah'];?></td>
            <td>Rp. <?= number_format($barang['harga'],2, ',', '.');?></td>
            <td><?= date('d/m/Y H:i:s', strtotime($barang['tanggal']));?></td>
            <td width="15%" class="text-center">
              <a href="form-ubah-barang.php?id_barang=<?= $barang['id_barang']; ?>" class="btn btn-success">Ubah</a>
              <a href="form-hapus-barang.php?id_barang=<?= $barang['id_barang'];?>" class="btn btn-danger" onclick="return confirm('Anda Yakin Menghapus Barang ? ')"> Hapus</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

<?php

include 'layout/footer.php';

?>