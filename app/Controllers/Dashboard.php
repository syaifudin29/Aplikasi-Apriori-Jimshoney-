<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function __construct(){
    
    }
    public function index()
    {
         if (session()->has('id_user') == false) {
            return redirect()->to('/login'); 
        }

        $barang = $this->produkModel->findAll();
        $penjualan = $this->penjualanModel->findAll();
        $transaksi = $this->penjualanModel->join('produk', 'produk.id_produk=penjualan.id_produk')->findAll();
        $total = 0;
        foreach ($transaksi as $key) {
            $total = $total+($key['harga']*$key['jumlah']);
        }

    	$data = ['menu' => 'dashboard', 'jmlbarang' => $barang, 'jmlpenjualan' => $penjualan, 'jmlhasil' => $total];
        return view('dashboard', $data);
    }
}
