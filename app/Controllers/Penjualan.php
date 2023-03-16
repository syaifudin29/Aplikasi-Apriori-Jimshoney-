<?php

namespace App\Controllers;

class Penjualan extends BaseController
{
    public function index()
    {
        if (session()->has('id_user') == false) {
            return redirect()->to('/login'); 
        }
    	$penjualan = $this->penjualanModel->join('produk', 'produk.id_produk=penjualan.id_produk')->where('status', '1')->findAll();
    	$id_trans = $this->penjualanModel->select('distinct(id_penjualan) as id_penjualan, tanggal')->where('status', '1')->findAll();
    	$data = ['menu' => 'penjualan',
    			 'penjualan' => $penjualan,
    			 'id_trans' => $id_trans
    			];
        return view('penjualan', $data);
    }

    public function produk()
    {
    	$penjualan = $this->penjualanModel->join('produk', 'produk.id_produk=penjualan.id_produk')->where('status', '0')->findAll();
    	$juml = $this->penjualanModel->select('distinct(id_penjualan)')->join('produk', 'produk.id_produk=penjualan.id_produk')->where('status', '1')->findAll();
    	$produk = $this->produkModel->findAll();
    	$data = ['menu' => 'penjualan',
    			 'penjualan' => $penjualan,
    			 'produk' => $produk,
    			 'juml' => $juml
    			];
        return view('penjualan_tambah', $data);
    }

    public function produktambah($id)
    {
    	//menampilkan list produk transaksi yang aktif
    	$produk = $this->produkModel->where('is_delete', '0')->findAll();
    	$data = [
    			 'produk' => $produk,
    			 'id_penjualan' => $id
    			];
    	return view('penjualan_tambah_produk', $data);
    }
    
     public function produkproses()
    {	
    	//cek data ada enggak
    	$penjualan = $this->penjualanModel->join('produk', 'produk.id_produk=penjualan.id_produk')->where('status', '0')->findAll();
    	foreach ($penjualan as $key) {
    		if ($this->request->getVar('id_produk') == $key['id_produk']) {
    			return redirect()->to('/transaksi/produk');
    		}
    	}
    	//proses tambah produk list ket transaksi tambah produk
		$data = ['id_produk' => $this->request->getVar('id_produk'), 
				 'jumlah' => $this->request->getVar('jumlah'),
				 'id_penjualan' => $this->request->getVar('id_penjualan'),
				 'status' => '0',    
				];
		$this->penjualanModel->save($data);
		return redirect()->to('/transaksi/produk');
    }

    //menghapus daftar produk di list transaksi tambah produk
    public function produkdelete($id, $tran){
    	$this->penjualanModel->where('id_penjualan', $tran)->where('id_produk', $id)->delete();
    	return redirect()->to('/transaksi/produk');

    }

    //tambah transaksi
    public function tambah()
    {	

    	$penjualan = $this->penjualanModel->join('produk', 'produk.id_produk=penjualan.id_produk')->where('status', '0')->findAll();

    	foreach ($penjualan as $key) {
    		$this->penjualanModel->update($key['id'], ['status' => '1', 'tanggal' => $this->request->getVar('tanggal')]);
    	}
    	return redirect()->to('/transaksi');
    }

    public function delete($id)
    {	

    	$penjualan = $this->penjualanModel->where('status', '1')->findAll();

    	foreach ($penjualan as $key) {
    		if ($key['id_penjualan'] == $id) {
    			$this->penjualanModel->delete($key['id']);
    		}
    	}
    	return redirect()->to('/transaksi');
    }
}
