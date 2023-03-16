<?php

namespace App\Controllers;

class Barang extends BaseController
{

    public function index()
    {
        if (session()->has('id_user') == false) {
            return redirect()->to('/login'); 
        }
    	$produk = $this->produkModel->findAll();
    	$data = ['menu' => 'barang',
    			 'produk' => $produk
    			];
        return view('barang', $data);
    }

    public function tambah()
    {
    	$data = ['nama' => $this->request->getVar('nama'),
    			 'harga' => $this->request->getVar('harga'),
    			 'berat' => $this->request->getVar('berat'),
				 'jenis' => $this->request->getVar('jenis'),
    			];
       	$this->produkModel->save($data);
		
       	return redirect()->to('/barang');
    }

    public function edit()
    {
    	$data = ['nama' => $this->request->getVar('nama'),
    			 'harga' => $this->request->getVar('harga'),
    			 'berat' => $this->request->getVar('berat'),
				 'jenis' => $this->request->getVar('jenis'),
    			];
       	$this->produkModel->update($this->request->getVar('id_produk'), $data);
       	return redirect()->to('/barang');
    }

    public function delete($id)
    {
       	$this->produkModel->delete($id);
       	return redirect()->to('/barang');
    }

}
