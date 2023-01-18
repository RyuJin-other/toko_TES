<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<?php
$session = session();

?>
<div class="container p-5">
    <a href="<?= base_url('produk');?>" class="btn btn-secondary mb-2">Kembali</a>
    <div class="card">
        <div class="card-header bg-info text-white">
            <h4 class="card-title">Edit Barang : </h4>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('produk/update');?>">
                <div class="form-group">
                    <label for="">Nama Barang</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Harga</label>
                    <input type="number" name="harga" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Stok</label>
                    <input type="number" name="stok" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Gambar Produk</label>
                    <input type="text" name="gambar" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Kategori</label>
                    <input type="number" name="kategori" class="form-control" required>
                </div>
                <button class="btn btn-success">update Data</button>
            </form>
            
        </div>
    </div>
</div>
<?= $this->endSection() ?>
