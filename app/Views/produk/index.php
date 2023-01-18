<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<?php
$session = session();

?>

<div class="container pt-5">
    <a href="<?= base_url('produk/tambah');?>" class="btn btn-success mb-2">Tambah Data</a>
    <div class="card">
        <div class="card-header bg-info text-white">
            <h4 class="card-title">Data Barang</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>File Gambar</th>
                            <th>Kategori</th>
                            <th>Action</th>
                        </tr> 
                    </thead>
                    <tbody>
                        <?php $no=1; foreach ($produk as $p) : ?>
                            <tr>
                                <td><?= $no;?></td>
                                <td><?= $p['nama'];?></td>
                                <td><?= $p['harga'];?></td>
                                <td><?= $p['stok'];?></td>
                                <td>
                                <img src="<?= base_url('uploads/' . $p['gambar'] . '') ?>" width=100px height=100px alt="">
                                </td>
                                <td><?= $p['id_kategori'];?></td>
                                <td>
                                    <a href="<?= base_url('produk/edit/'.$p['id']);?>" 
                                    class="btn btn-success">
                                    Edit</a>
                                    <a title="Delete" href="<?= base_url('produk/delete/'.$p['id']);?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ?')">Delete</a>

                                </td>

                            </tr>
                        <?php endforeach ?>
                    </tbody>  

                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>