<?php

namespace App\Controllers;
use App\Models\InpProduk;
use App\Models\KategoriModel;


class Produk extends BaseController
{
    // protected $product;
    function __construct(){
        $this->produk = new InpProduk();
        $this->kategori = new KategoriModel();

    }
    public function index()
	{
		$produk = $this->produk->findAll();
        $kategori = $this->kategori->findAll();
		return view('produk/index',[
            'produk' => $produk,
            'kategori'=> $kategori,
        ]);
	}
    public function tambah()
    {
        return view('produk/tambah');
        # code...
    }
    public function add()
    {
        $model = new InpProduk;
        $data = array(
            'nama' => $this->request->getPost('nama'),
            'harga'         => $this->request->getPost('harga'),
            'stok'         => $this->request->getPost('stok'),
            'gambar'         => $this->request->getPost('gambar'),
            'id_kategori'  => $this->request->getPost('kategori'),
        );
        $model->saveBarang($data);
        echo '<script>
                alert("Sukses Tambah Data Barang");
                window.location="'.base_url('produk').'"
            </script>';

    }
    public function edit($id)
    {
        $model = new InpProduk;
        $getBarang = $model->getBarang($id)->getRow();
        if(isset($getBarang))
        {
            // $data['produk'] = $getBarang;
            // $data['title']  = 'Edit '.$getBarang->nama;

            // echo view('header_view', $data);
            // echo view('edit_view', $data);
            // echo view('footer_view', $data);
        return view('produk/edit');


        }else{

            echo '<script>
                    alert("ID barang '.$id.' Tidak ditemukan");
                    window.location="'.base_url('barang').'"
                </script>';
        }
    }

    public function update()
    {
        $model = new InpProduk;
        $id = $this->request->getPost('id_barang');
        $data = array(
            'nama'          => $this->request->getPost('nama'),
            'harga'         => $this->request->getPost('harga'),
            'stok'          => $this->request->getPost('stok'),
            'gambar'        => $this->request->getPost('gambar'),
            'id_kategori'   => $this->request->getPost('kategori'),
        );
        $model->editBarang($data,$id);
        echo '<script>
                alert("Sukses Edit Data Barang");
                window.location="'.base_url('produk').'"
            </script>';
    }
    public function delete($id)
    {
        $dataProduk = $this->produk->find($id);
        if (empty($dataProduk)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pegawai Tidak ditemukan !');
        }
        $this->produk->delete($id);
        session()->setFlashdata('message', 'Delete Data Pegawai Berhasil');
        return redirect()->to('/produk');
    }
}
