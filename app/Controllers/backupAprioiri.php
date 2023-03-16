<?php

namespace App\Controllers;

class Apriori extends BaseController
{

    public function index()
    {
        if (session()->has('id_user') == false) {
            return redirect()->to('/login'); 
        }
    	$data = ['menu' => 'apriori'];
        return view('dashboard', $data);
    }

    public function proses()
    {
    	$suport = 0.3;
    	$cofidens = 0.5;
    	$awal = '2022-12-28';
    	$akhir = '2022-12-30';

        //delete data
        $analdata = $this->analisaModel->findAll();
        foreach ($analdata as $key) {
            $this->analisaModel->delete($key['id']);
        }



    	//menampilkan data item set 1
    	$produk = $this->produkModel->findAll();

    	$where = "tanggal BETWEEN '".$awal."' AND '".$akhir."'";
    	$penjualan = $this->penjualanModel->where($where)->where('status', '1')->findAll();
    	
    	//menampilkan data sesuai tanggal
    	$transaksi = $this->penjualanModel->select('distinct(id_penjualan) as id_penjualan')->where($where)->findAll();
    	
    	//hitung jumlah transaksi
    	$penj = $this->penjualanModel->select('distinct(id_penjualan)')->findAll();
    	$jmlpenj = count($penj);

    	$no=1;
    	foreach ($produk as $key) {
    		$total=0;
    		foreach ($penjualan as $keys) {
    			if ($key['id_produk'] == $keys['id_produk']) {
    				$total=$total+1;
    			}
    		}

    			// $data['item1'][$no++] = ['id_produk' => $key['id_produk'],'nama' => $key['nama'], 'total' => ($total/$jmlpenj)];
       //          $hasil = ['kelompok' => 1, 'id_produk' => $key['id_produk'], 'jumlah' => $total, 'itemset' => 1];
       //          $this->analisaModel->save($hasil);


            if (($total/$jmlpenj) >= $suport) {
                $data['item1'][$no++] = ['id_produk' => $key['id_produk'],'nama' => $key['nama'], 'total' => ($total/$jmlpenj)];
                // $hasil[$no++] = ['kelompok' => 1, 'id_produk' => $key['id_produk'], 'jumlah' => ];
                // $this->analisaModel->save()
            }
    	}
        //end item set 1

        //start item set 2
        
        $data['item2']=[];
        $no=1;
        $kode=1;
        foreach ($data['item1'] as $key) {
            foreach ($data['item1'] as $keys) {
                if ($keys['id_produk']!=$key['id_produk']) {
                    if (empty($data['item2'])) {
                        $data['item2'][$no] = ['kode' => $kode++,'id_produk_1' => $key['id_produk'], 'id_produk_2' => $keys['id_produk']];
                    }else{
                    foreach ($data['item2'] as $keyp) {
                        if ($keyp['id_produk_1'] == $keys['id_produk']) {
                            if ($keyp['id_produk_2'] == $key['id_produk']) {
                                # code...
                            }else{
                                $data['item2'][$no] = ['kode' => $kode++, 'id_produk_1' => $key['id_produk'], 'id_produk_2' => $keys['id_produk']];
                            }
                        }
                        if ($keyp['id_produk_2'] == $keys['id_produk']) {
                            if ($keyp['id_produk_1'] == $keys['id_produk']) {
                                # code...
                            }else{
                               $data['item2'][$no] = ['kode' => $kode++, 'id_produk_1' => $key['id_produk'], 'id_produk_2' => $keys['id_produk']];
                            }
                        }
                    }
                }
                    $no++;
                }
            }
        }


         for($i=1; $i<=4; $i++){
           for($j=1; $j<=4-$i; $j++){
             $data['item2'][$no++] = ['kode' => $kode++, 'id_produk_1' => $data['item1'][$i]['id_produk'], 'id_produk_2' => $data['item1'][$j + $i]['id_produk']];
             echo "<br>";
           }
         }
         // dd(0);


        //menghitung item set 2
        $total=0;
        $no=1;

        foreach ($data['item2'] as $keyp) {
            foreach ($penj as $key) {
                $dat1 = $this->penjualanModel->where($where)->where('id_penjualan', $key['id_penjualan'])->where('id_produk', $keyp['id_produk_1'])->findAll();
                if (!empty($dat1)) {
                     $dat2 = $this->penjualanModel->where($where)->where('id_penjualan', $key['id_penjualan'])->where('id_produk', $keyp['id_produk_2'])->findAll();
                     if (!empty($dat2)) {
                         $total=$total+1;
                     }
                }
            }
                $item2[$no++] = ['kode' => $keyp['kode'], 'total' => ($total/5)];
                $total=0;
        }
        
        $no=1;
        foreach ($data['item2'] as $key) {
            foreach ($item2 as $keys) {
                if ($keys['kode'] == $key['kode']) {
                    $data['item2_hasil'][$no++] = ['kode' => $key['kode'], 'id_produk_1' => $key['id_produk_1'], 'id_produk_2' => $key['id_produk_2'], 'total' => $keys['total']];
                }
            }
        }


       
                dd($data);
    	
    }
}
