<?php

namespace App\Controllers;

class Apriori extends BaseController
{
    public function index()
    {
        if (session()->has('id_user') == false) {
            return redirect()->to('/login'); 
        }
        $transaksi = $this->penjualanModel->select('id_penjualan, count(id_produk) as total')->groupBy('id_penjualan')->findAll();
        
    	$data = ['menu' => 'apriori', 'transaksi' => $transaksi];
        return view('apriori', $data);
    }

    public function proses()
    {   
        $itm1 = $this->itemSatu->findAll();
        foreach ($itm1 as $key) {
            $this->itemSatu->where('id', $key['id'])->delete();
        }
            
        $itm2 = $this->itemDua->findAll();
        foreach ($itm2 as $key) {
            $this->itemDua->where('id', $key['id'])->delete();
        }

        $itm3 = $this->itemTiga->findAll();
        foreach ($itm3 as $key) {
            $this->itemTiga->where('id', $key['id'])->delete();
        }
        $itm4 = $this->itemEmpat->findAll();
        foreach ($itm4 as $key) {
            $this->itemEmpat->where('id', $key['id'])->delete();
        }
        $aso = $this->assoSatu->findAll();
        foreach ($aso as $key) {
            $this->assoSatu->where('id', $key['id'])->delete();
        }
        $aso2 = $this->assoDua->findAll();
        foreach ($aso2 as $key) {
            $this->assoDua->where('id', $key['id'])->delete();
        }
        // dd("");

    	$suport = $this->request->getVar('support');
    	$cofidens = $this->request->getVar('cofidence');
    	$awal = $this->request->getVar('tgl_awal');
    	$akhir = $this->request->getVar('tgl_akhir');

        // $hasil_laporan = $this->hasilModel->where('tanggal_awal', $awal)->where('tanggal_akhir', $akhir)->where('confidence', $cofidens)->where('support', $suport)->findAll();
        // dd($cofidens);
        // if(count($hasil_laporan) != 0){
        //     session()->setFlashdata('info', 'Sudah pernah diproses. Lihat di laporan');
        //     return redirect()->to('/apriori');
        // }

        //delete data
        $analdata = $this->analisaModel->findAll();
        foreach ($analdata as $key) {
            $this->analisaModel->delete($key['id']);
        }

    	//menampilkan data item set 1
    	$produk = $this->produkModel->findAll();

    	$where = "tanggal BETWEEN '".$awal."' AND '".$akhir."'";
    	$penjualan = $this->penjualanModel->where($where)->where('status', '1')->findAll();
    	
        //cek data kosong
        if(count($penjualan) == 0){
            session()->setFlashdata('info', 'Data kosong.');
            return redirect()->to('/apriori');
        }
    	//menampilkan data sesuai tanggal
    	$transaksi = $this->penjualanModel->select('distinct(id_penjualan) as id_penjualan')->where($where)->findAll();
    	
    	//hitung jumlah transaksi
    	$penj = $this->penjualanModel->select('distinct(id_penjualan)')->findAll();
        
    	$jmlpenj = count($penj);

    	$no=1;
         $data['item1'] = [];
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
             $this->itemSatu->insert(['id_produk' => $key['id_produk'], 'jumlah' => $total, 'support' => ($total/$jmlpenj)]);
            if (($total/$jmlpenj) >= $suport) {
                $data['item1'][$no++] = ['id_produk' => $key['id_produk'],'nama' => $key['nama'], 'total' => ($total/$jmlpenj)];
                  $this->itemSatu->set('lolos', '1')->where('id_produk', $key['id_produk'])->update();
               
                // $hasil[$no++] = ['kelompok' => 1, 'id_produk' => $key['id_produk'], 'jumlah' => ];
                // $this->analisaModel->save()
            }else{
                 $this->itemSatu->set('lolos', '0')->where('id_produk', $key['id_produk'])->update();
            }
            
    	}

        //end item set 1

        //start item set 2
        
        $data['item2']=[];
        $no=1;
        $kode=1;
        
        if(count($data['item1']) == 0){
             session()->setFlashdata('info', 'Produk tidak ada yang lolos itemset 1.');
            // dd();
            return redirect()->to('/apriori');
        }
        $jumset1 = count($data['item1']);
         for($i=1; $i<=$jumset1; $i++){
           for($j=1; $j<=$jumset1-$i; $j++){
             $data['item2'][$no++] = ['kode' => $kode++, 'id_produk_1' => $data['item1'][$i]['id_produk'], 'id_produk_2' => $data['item1'][$j + $i]['id_produk']];
            }
         }
      

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
                $item2[$no++] = ['kode' => $keyp['kode'], 'total' => ($total/$jmlpenj), 'jml' => $total];
                //kene
                $total=0;
        }
        
        $no=1;
        foreach ($data['item2'] as $key) {
            foreach ($item2 as $keys) {
                if ($keys['kode'] == $key['kode']) {
                    $data['item2_hasil'][$no++] = ['kode' => $key['kode'], 'id_produk_1' => $key['id_produk_1'], 'id_produk_2' => $key['id_produk_2'], 'total' => $keys['total']];
                    $this->itemDua->insert(['id_produk_1' => $key['id_produk_1'], 'id_produk_2' => $key['id_produk_2'], 'jumlah' => $keys['jml'], 'support' => $keys['total']]);
                }
            }
        }


        //item set 3
        //cek data yang masuk itemset 3
        $no=0;
        $data['item2_lolos'] = [];
        foreach ($data['item2_hasil'] as $key) {
            if ($key['total'] >= $suport) {
                  $data['item2_lolos'][$no++] = ['kode' => $key['kode'], 'id_produk_1' => $key['id_produk_1'], 'id_produk_2' => $key['id_produk_2'], 'total' => $key['total']];
            }
        }
      
        //asosiasi item set 2
        $nok = 1;
        $asosi = [];
         if(count($data['item2_lolos']) == 0){
             session()->setFlashdata('info', 'Produk tidak ada yang lolos itemset 2.');
            // dd();
            return redirect()->to('/apriori');
        }
        foreach ($data['item2_lolos'] as $key) {
            $aso1 = $this->assoSatu->where('id_produk_2', $key['id_produk_2'])->where('id_produk_1', $key['id_produk_1'])->findAll();
            if(count($aso1) == 0){
             $this->assoSatu->insert(['id_produk_2' => $key['id_produk_2'], 'id_produk_1' => $key['id_produk_1']]);
            }
            $aso2 = $this->assoSatu->where('id_produk_2', $key['id_produk_1'])->where('id_produk_1', $key['id_produk_2'])->findAll();
            if(count($aso2) == 0){
             $this->assoSatu->insert(['id_produk_2' => $key['id_produk_1'], 'id_produk_1' => $key['id_produk_2']]);
            }
        }

        //menghitung assosiasi itemset 2
        $data_asso =  $this->assoSatu->findAll();
        $no=0;
        $data['asso_item2'] = [];
        foreach ($data_asso as $key ) {
            $asso1 =  $this->itemDua->where('id_produk_1', $key['id_produk_1'])->where('id_produk_2', $key['id_produk_2'])->findAll();
            if (count($asso1) != 0) {
                $item1 =  $this->itemSatu->where('id_produk', $key['id_produk_1'])->findAll();
                $data['asso_item2'][$no++] = ['id_produk_1' => $key['id_produk_1'],'id_produk_2' => $key['id_produk_2'], 'AB' => $asso1[0]['jumlah'], 'A' => $item1[0]['jumlah'], 'cofidence' => ($asso1[0]['jumlah']/$item1[0]['jumlah'])];
            }
            
            $asso2 =  $this->itemDua->where('id_produk_1', $key['id_produk_2'])->where('id_produk_2', $key['id_produk_1'])->findAll();
            if (count($asso2) != 0) {
                $item1 =  $this->itemSatu->where('id_produk', $key['id_produk_1'])->findAll();
                $data['asso_item2'][$no++] = ['id_produk_1' => $key['id_produk_1'],'id_produk_2' => $key['id_produk_2'], 'AB' => $asso2[0]['jumlah'], 'A' => $item1[0]['jumlah'], 'cofidence' => ($asso2[0]['jumlah']/$item1[0]['jumlah'])];
            }
        }

        //cek cofidense >= $cofeidence
        // dd( $data['asso_item2']);
        $no=0;
        $data['asso_item2_berhasil'] = [];
        foreach ($data['asso_item2'] as $key) {
            if ($key['cofidence'] >= $cofidens) {
                $item1 =  $this->itemDua->where('id_produk_1', $key['id_produk_1'])->where('id_produk_2', $key['id_produk_2'])->findAll();
                if(count($item1) == 0){
                    $item2 =  $this->itemDua->where('id_produk_1', $key['id_produk_2'])->where('id_produk_2', $key['id_produk_1'])->findAll();
                    $data['asso_item2_berhasil'][$no++] = ['id_produk_1' => $key['id_produk_1'],'id_produk_2' => $key['id_produk_2'], 'support' => $item2[0]['support'], 'cofidence' => $key['cofidence'], 'total' => ($item2[0]['support']*$key['cofidence']) ];
                    $this->assoDua->insert(['id_produk_1' => $key['id_produk_1'],'id_produk_2' => $key['id_produk_2'], 'support' => $item2[0]['support'], 'cofidence' => $key['cofidence'], 'total' => ($item2[0]['support']*$key['cofidence']) ]);
                }else{
                    $data['asso_item2_berhasil'][$no++] = ['id_produk_1' => $key['id_produk_1'],'id_produk_2' => $key['id_produk_2'], 'support' => $item1[0]['support'], 'cofidence' => $key['cofidence'], 'total' => ($item1[0]['support']*$key['cofidence']) ];
                    $this->assoDua->insert(['id_produk_1' => $key['id_produk_1'],'id_produk_2' => $key['id_produk_2'], 'support' => $item1[0]['support'], 'cofidence' => $key['cofidence'], 'total' => ($item1[0]['support']*$key['cofidence']) ]);
                }
            }
        }
        //membuat variabel baru untuk nampung data produk yang lolos
        $no=0;
        foreach ($data['item2_lolos'] as $key) {
            $dat3[$no++]=$key['id_produk_1'];
        }

        foreach ($data['item2_lolos'] as $key) {
            $dat3[$no++]=$key['id_produk_2'];
        }

        $dat3 = array_unique($dat3);
        $no=0;
        foreach ($dat3 as $key) {
            $nilaidata3[$no++] = ['id_produk' => $key];
        }
        //end lolos

        // ---------------------------------------------------------------
        //item set 3
        $item_lolos3 = [];
        foreach ($data['item2_lolos'] as $key) {
            array_push( $item_lolos3, $key['id_produk_1']);
        }
        foreach ($data['item2_lolos'] as $key) {
            array_push( $item_lolos3, $key['id_produk_2']);
        }
        $item_lolos3 = array_values(array_unique($item_lolos3));
        $jum = count($item_lolos3);
        // $to=0;
        $item_set3 = [];
        for ($i=0; $i < $jum; $i++) { 
            for ($k=$i+1; $k < $jum; $k++) { 
                for ($l=$k+1; $l < $jum; $l++) { 
                    $dat = ['id_produk_1' => $item_lolos3[$i], 'id_produk_2' => $item_lolos3[$k], 'id_produk_3' => $item_lolos3[$l]];
                    array_push($item_set3, $dat);
                    // $to++;
                }
            }
        }

        $total=0;
        $no=0;
        $data['item3'] = [];
        $data['item3_lolos'] = [];
        foreach ($item_set3 as $key1) {
            foreach ($penj as $key) {
                $dataset31 = $this->penjualanModel->where($where)->where('id_penjualan', $key['id_penjualan'])->where('id_produk', $key1['id_produk_1'])->findAll();
                if(count($dataset31) != 0){
                    $dataset32 = $this->penjualanModel->where($where)->where('id_penjualan', $key['id_penjualan'])->where('id_produk', $key1['id_produk_2'])->findAll();
                    if(count($dataset32) != 0){
                        $dataset33 = $this->penjualanModel->where($where)->where('id_penjualan', $key['id_penjualan'])->where('id_produk', $key1['id_produk_3'])->findAll();
                        if(count($dataset33) != 0){
                            $total++;
                        }
                    }
                }
            }
            $dat = ['id_produk_1' => $key1['id_produk_1'], 'id_produk_2' => $key1['id_produk_2'], 'id_produk_3' => $key1['id_produk_3'], 'total' => $total, 'jumlah' => $total/$jmlpenj];
            array_push($data['item3'], $dat);
            if ($suport <= $total/$jmlpenj) {
                array_push($data['item3_lolos']  , $dat);
            }
            $this->itemTiga->insert(['id_produk_1' => $key1['id_produk_1'], 'id_produk_2' => $key1['id_produk_2'], 'id_produk_3' => $key1['id_produk_3'],'jumlah' => $total, 'support' => $total/$jmlpenj]);
            $total=0;
        }

        // ---------------------------------------------------------------
        //item set 4
        if (isset($data['item3_lolos'])) {
            if(count($data['item3_lolos']) == 1 || count($data['item3_lolos']) == 0){

                $item1 = $this->itemSatu ->join('produk','produk.id_produk=itemset1.id_produk')->findAll();
                $item2 = $this->itemDua->findAll();
                $assoMax = $this->assoDua->select('id_produk_1,id_produk_2, support, cofidence, MAX(total) as total')->findAll();
            }else{
                $item_lolos4 = [];
                foreach ($data['item3_lolos'] as $key) {
                    array_push( $item_lolos4, $key['id_produk_1']);
                }
                foreach ($data['item3_lolos'] as $key) {
                    array_push( $item_lolos4, $key['id_produk_2']);
                }
                foreach ($data['item3_lolos'] as $key) {
                    array_push( $item_lolos4, $key['id_produk_3']);
                }
                
                $item_lolos4 = array_values(array_unique($item_lolos4));
                $jum = count($item_lolos4);
                $to=0;
                $item_set4 = [];
                for ($i=0; $i < $jum; $i++) { 
                    for ($k=$i+1; $k < $jum; $k++) { 
                        for ($l=$k+1; $l < $jum; $l++) { 
                            for ($m=$l+1; $m < $jum; $m++) { 
                                $dat = ['id_produk_1' => $item_lolos4[$i], 'id_produk_2' => $item_lolos4[$k], 'id_produk_3' => $item_lolos4[$l], 'id_produk_4' => $item_lolos4[$m]];
                                array_push($item_set4, $dat);
                                $to++;
                            }
                        }
                    }
                }

                $total=0;
                $no=0;
                $data['item4'] = [];
                $data['item4_lolos'] = [];
                foreach ($item_set4 as $key1) {
                    foreach ($penj as $key) {
                        $dataset31 = $this->penjualanModel->where($where)->where('id_penjualan', $key['id_penjualan'])->where('id_produk', $key1['id_produk_1'])->findAll();
                        if(count($dataset31) != 0){
                            $dataset32 = $this->penjualanModel->where($where)->where('id_penjualan', $key['id_penjualan'])->where('id_produk', $key1['id_produk_2'])->findAll();
                            if(count($dataset32) != 0){
                                $dataset33 = $this->penjualanModel->where($where)->where('id_penjualan', $key['id_penjualan'])->where('id_produk', $key1['id_produk_3'])->findAll();
                                if(count($dataset33) != 0){
                                    $dataset34 = $this->penjualanModel->where($where)->where('id_penjualan', $key['id_penjualan'])->where('id_produk', $key1['id_produk_4'])->findAll();
                                    if(count($dataset34) != 0){
                                        $total++;
                                    }
                                }
                            }
                        }
                    }
                    $dat = ['id_produk_1' => $key1['id_produk_1'], 'id_produk_2' => $key1['id_produk_2'], 'id_produk_3' => $key1['id_produk_3'], 'id_produk_4' => $key1['id_produk_4'], 'total' => $total, 'jumlah' => $total/$jmlpenj];
                    $this->itemEmpat->insert(['id_produk_1' => $key1['id_produk_1'], 'id_produk_2' => $key1['id_produk_2'], 'id_produk_3' => $key1['id_produk_3'], 'id_produk_4' => $key1['id_produk_4'], 'jumlah' => $total, 'support' => $total/$jmlpenj]);
                    array_push($data['item4'], $dat);
                    if ($suport <= $total/$jmlpenj) {
                        array_push($data['item4_lolos']  , $dat);
                    }
                    $total=0;
                }
            }
        }
        // end item set 4
        //assoc item set 3
        if(!isset($data['item4_lolos'])){
                $assoc_lolos3 = [];
                foreach ($data['item3_lolos'] as $key) {
                    array_push( $assoc_lolos3, $key['id_produk_1']);
                }
                foreach ($data['item3_lolos'] as $key) {
                    array_push( $assoc_lolos3, $key['id_produk_2']);
                }
                foreach ($data['item3_lolos'] as $key) {
                    array_push( $assoc_lolos3, $key['id_produk_3']);
                }
                
                $assoc_lolos3 = array_values(array_unique($assoc_lolos3));
                $assoc_itemset3=[];
                $jum = count($assoc_lolos3);
                for ($i=0; $i < $jum; $i++) { 
                    for ($j=0; $j < $jum; $j++) { 
                        if ($j != $i) {
                            for ($k=0; $k < $jum; $k++) {
                                if ($k != $j && $k != $i) {
                                    array_push( $assoc_itemset3, ['id_produk_1' => $assoc_lolos3[$i], 'id_produk_2' => $assoc_lolos3[$j], 'id_produk_3' => $assoc_lolos3[$k]]);
                                }
                            }
                        }
                    }
                }
                $total=0;
                $total2=0;
                $asso_item3 = [];
                foreach ($assoc_itemset3 as $keytri) {
                    foreach ($penj as $key) {
                        $dataset31 = $this->penjualanModel->where($where)->where('id_penjualan', $key['id_penjualan'])->where('id_produk', $keytri['id_produk_1'])->findAll();
                        if(count($dataset31) != 0){
                            $dataset32 = $this->penjualanModel->where($where)->where('id_penjualan', $key['id_penjualan'])->where('id_produk', $keytri['id_produk_2'])->findAll();
                            if(count($dataset32) != 0){
                                $dataset33 = $this->penjualanModel->where($where)->where('id_penjualan', $key['id_penjualan'])->where('id_produk', $keytri['id_produk_3'])->findAll();
                                if(count($dataset33) != 0){
                                    $total++;
                                }
                            }
                        }
                    }
                    foreach ($penj as $key) {
                        $dataset31 = $this->penjualanModel->where($where)->where('id_penjualan', $key['id_penjualan'])->where('id_produk', $keytri['id_produk_1'])->findAll();
                        if(count($dataset31) != 0){
                            $dataset32 = $this->penjualanModel->where($where)->where('id_penjualan', $key['id_penjualan'])->where('id_produk', $keytri['id_produk_2'])->findAll();
                            if(count($dataset32) != 0){
                                $total2++;
                            }
                        }
                    }
                    array_push( $asso_item3, ['id_produk_1' => $keytri['id_produk_1'], 'id_produk_2' => $keytri['id_produk_2'], 'id_produk_3' => $keytri['id_produk_3'], 'ABC' => $total, 'AB' => $total2, 'cofidence' =>  $total/ $total2 ]);
                    $total=0;
                }
                $assoc_item3_final = [];
                foreach ($asso_item3 as $keytri) {
                    if ($cofidens <= $keytri['cofidence']) {
                        array_push($assoc_item3_final, ['id_produk_1' => $keytri['id_produk_1'], 'id_produk_2' => $keytri['id_produk_2'], 'id_produk_3' => $keytri['id_produk_3'],'ABC' => $keytri['ABC'], 'AB' => $keytri['AB'], 'cofidence' =>  $keytri['cofidence'] ]);
                    }
                }
                $data['asso_item3'] = $asso_item3;
                $data['assoc_item3_final'] = $assoc_item3_final;

        }
        // selesai assoc item 3

        // ---------------------------------------------------------------
        //item set 5
        if (isset($data['item4_lolos'])) {
            if(count($data['item4_lolos']) == 1 || count($data['item4_lolos']) == 0){
                // $item1 = $this->itemSatu ->join('produk','produk.id_produk=itemset1.id_produk')->findAll();
                // $item2 = $this->itemDua->findAll();
                // $assoMax = $this->assoDua->select('id_produk_1,id_produk_2, support, cofidence, MAX(total) as total')->findAll();
            }else{
                $item_lolos5 = [];
                foreach ($data['item4_lolos'] as $key) {
                    array_push( $item_lolos5, $key['id_produk_1']);
                }
                foreach ($data['item4_lolos'] as $key) {
                    array_push( $item_lolos5, $key['id_produk_2']);
                }
                foreach ($data['item4_lolos'] as $key) {
                    array_push( $item_lolos5, $key['id_produk_3']);
                }
                foreach ($data['item4_lolos'] as $key) {
                    array_push( $item_lolos5, $key['id_produk_4']);
                }
                
                $item_lolos5 = array_values(array_unique($item_lolos5));
                $jum = count($item_lolos5);
                $to=0;
                $item_set5 = [];
                for ($i=0; $i < $jum; $i++) { 
                    for ($k=$i+1; $k < $jum; $k++) { 
                        for ($l=$k+1; $l < $jum; $l++) { 
                            for ($m=$l+1; $m < $jum; $m++) {
                                for ($n=$m+1; $n < $jum; $n++) { 
                                    $dat = ['id_produk_1' => $item_lolos5[$i], 'id_produk_2' => $item_lolos5[$k], 'id_produk_3' => $item_lolos5[$l], 'id_produk_4' => $item_lolos5[$m], 'id_produk_5' => $item_lolos5[$n]];
                                    array_push($item_set5, $dat);
                                    $to++;
                                } 
                            
                            }
                        }
                    }
                }

                $total=0;
                $no=0;
                $data['item5'] = [];
                $data['item5_lolos'] = [];
                foreach ($item_set5 as $key1) {
                    foreach ($penj as $key) {
                        $dataset31 = $this->penjualanModel->where($where)->where('id_penjualan', $key['id_penjualan'])->where('id_produk', $key1['id_produk_1'])->findAll();
                        if(count($dataset31) != 0){
                            $dataset32 = $this->penjualanModel->where($where)->where('id_penjualan', $key['id_penjualan'])->where('id_produk', $key1['id_produk_2'])->findAll();
                            if(count($dataset32) != 0){
                                $dataset33 = $this->penjualanModel->where($where)->where('id_penjualan', $key['id_penjualan'])->where('id_produk', $key1['id_produk_3'])->findAll();
                                if(count($dataset33) != 0){
                                    $dataset34 = $this->penjualanModel->where($where)->where('id_penjualan', $key['id_penjualan'])->where('id_produk', $key1['id_produk_4'])->findAll();
                                    if(count($dataset34) != 0){
                                        $dataset35 = $this->penjualanModel->where($where)->where('id_penjualan', $key['id_penjualan'])->where('id_produk', $key1['id_produk_5'])->findAll();
                                        if(count($dataset35) != 0){
                                            $total++;
                                        }
                                    }
                                }
                            }
                        }
                    }
                    $dat = ['id_produk_1' => $key1['id_produk_1'], 'id_produk_2' => $key1['id_produk_2'], 'id_produk_3' => $key1['id_produk_3'], 'id_produk_4' => $key1['id_produk_4'], 'id_produk_5' => $key1['id_produk_5'],'total' => $total, 'jumlah' => $total/$jmlpenj];
                    array_push($data['item5'], $dat);
                    if ($suport <= $total/$jmlpenj) {
                        array_push($data['item5_lolos']  , $dat);
                    }
                    $total=0;
                }
                // end item set 5

                 //assoc item set 4
                if(count($data['item5_lolos'])==0){
                        $assoc_lolos4 = [];
                        foreach ($data['item4_lolos'] as $key) {
                            array_push( $assoc_lolos4, $key['id_produk_1']);
                        }
                        foreach ($data['item4_lolos'] as $key) {
                            array_push( $assoc_lolos4, $key['id_produk_2']);
                        }
                        foreach ($data['item4_lolos'] as $key) {
                            array_push( $assoc_lolos4, $key['id_produk_3']);
                        }
                        foreach ($data['item4_lolos'] as $key) {
                            array_push( $assoc_lolos4, $key['id_produk_4']);
                        }
                        $assoc_lolos4 = array_values(array_unique($assoc_lolos4));
                        $assoc_itemset4=[];
                        $jum = count($assoc_lolos4);
                        
                        for ($i=0; $i < $jum; $i++) { 
                            for ($j=0; $j < $jum; $j++) { 
                                if ($j != $i) {
                                    for ($k=0; $k < $jum; $k++) {
                                        if ($k != $j && $k != $i) {
                                            for ($l=0; $l < $jum; $l++) {
                                                if($l != $j && $l != $i && $l != $k)
                                                array_push($assoc_itemset4, ['id_produk_1' => $assoc_lolos4[$i], 'id_produk_2' => $assoc_lolos4[$j], 'id_produk_3' => $assoc_lolos4[$k], 'id_produk_4' => $assoc_lolos4[$l]]);
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        $total=0;
                        $total2=0;
                        $asso_item4 = [];
                        foreach ($assoc_itemset4 as $keytri) {
                            foreach ($penj as $key) {
                                $dataset31 = $this->penjualanModel->where($where)->where('id_penjualan', $key['id_penjualan'])->where('id_produk', $keytri['id_produk_1'])->findAll();
                                if(count($dataset31) != 0){
                                    $dataset32 = $this->penjualanModel->where($where)->where('id_penjualan', $key['id_penjualan'])->where('id_produk', $keytri['id_produk_2'])->findAll();
                                    if(count($dataset32) != 0){
                                        $dataset33 = $this->penjualanModel->where($where)->where('id_penjualan', $key['id_penjualan'])->where('id_produk', $keytri['id_produk_3'])->findAll();
                                        if(count($dataset33) != 0){
                                            $dataset34 = $this->penjualanModel->where($where)->where('id_penjualan', $key['id_penjualan'])->where('id_produk', $keytri['id_produk_4'])->findAll();
                                            if(count($dataset34) != 0){
                                            $total++;
                                            }
                                            
                                        }
                                    }
                                }
                            }
                            foreach ($penj as $key) {
                                $dataset31 = $this->penjualanModel->where($where)->where('id_penjualan', $key['id_penjualan'])->where('id_produk', $keytri['id_produk_1'])->findAll();
                                if(count($dataset31) != 0){
                                    $dataset32 = $this->penjualanModel->where($where)->where('id_penjualan', $key['id_penjualan'])->where('id_produk', $keytri['id_produk_2'])->findAll();
                                    if(count($dataset32) != 0){
                                        $dataset33 = $this->penjualanModel->where($where)->where('id_penjualan', $key['id_penjualan'])->where('id_produk', $keytri['id_produk_2'])->findAll();
                                        if(count($dataset33) != 0){
                                            $total2++;
                                        }
                                    }
                                }
                            }
                            array_push($asso_item4, ['id_produk_1' => $keytri['id_produk_1'], 'id_produk_2' => $keytri['id_produk_2'], 'id_produk_3' => $keytri['id_produk_3'], 'id_produk_4' => $keytri['id_produk_4'],'ABCD' => $total, 'ABC' => $total2, 'cofidence' =>  $total/ $total2 ]);
                            $total=0;
                        }
                }
   
                // final assoc
                $assoc_item4_final = [];
                $no=0;
                $filter_con = []; 
                foreach ($asso_item4 as $keytri) {
                    if ($cofidens <= $keytri['cofidence']) {
                        foreach ($penj as $key) {
                                $dataset31 = $this->penjualanModel->where($where)->where('id_penjualan', $key['id_penjualan'])->where('id_produk', $keytri['id_produk_1'])->findAll();
                                if(count($dataset31) != 0){
                                    $dataset32 = $this->penjualanModel->where($where)->where('id_penjualan', $key['id_penjualan'])->where('id_produk', $keytri['id_produk_2'])->findAll();
                                    if(count($dataset32) != 0){
                                        $dataset33 = $this->penjualanModel->where($where)->where('id_penjualan', $key['id_penjualan'])->where('id_produk', $keytri['id_produk_3'])->findAll();
                                        if(count($dataset33) != 0){
                                            $dataset34 = $this->penjualanModel->where($where)->where('id_penjualan', $key['id_penjualan'])->where('id_produk', $keytri['id_produk_4'])->findAll();
                                            if(count($dataset34) != 0){
                                            $total++;
                                            }
                                            
                                        }
                                    }
                                }
                            }
                        array_push($assoc_item4_final, ['id_produk_1' => $keytri['id_produk_1'], 'id_produk_2' => $keytri['id_produk_2'], 'id_produk_3' => $keytri['id_produk_3'], 'id_produk_4' => $keytri['id_produk_4'],'ABCD' => $keytri['ABCD'], 'ABC' => $keytri['ABC'], 'cofidence' =>  $keytri['cofidence'], 'support' => $total/$jmlpenj]);
                        array_push($filter_con, $keytri['cofidence']);
                        $no=0;
                    }
                }
                
                if(count($filter_con) != 0){
                    $data['hasil_assoc_itemset4'] = [];
                    $filter_con = max($filter_con);
                    foreach ($assoc_item4_final as $key) {
                        if($filter_con == $key['cofidence']){
                            array_push($data['hasil_assoc_itemset4'], ['id_produk_1' => $key['id_produk_1'], 'id_produk_2' => $key['id_produk_2'], 'id_produk_3' => $key['id_produk_3'], 'id_produk_4' => $key['id_produk_4'],'ABCD' => $key['ABCD'], 'ABC' => $key['ABC'], 'cofidence' =>  $key['cofidence'], 'support' => $key['support']]);
                        }
                    }
                }else{
                     $data['hasil_assoc_itemset4'] = [];
                }
                $data['asso_item4'] = $asso_item4;
                $data['assoc_item4_final'] = $assoc_item4_final;
            } 
        }
        
        // dd($data);
        $this->hasilModel->save(['tanggal_awal' => $this->request->getVar('tgl_awal'), 'tanggal_akhir' => $this->request->getVar('tgl_akhir'), 'confidence' => $this->request->getVar('cofidence'), 'support' => $this->request->getVar('support')]);

        $item1 = $this->itemSatu ->join('produk','produk.id_produk=itemset1.id_produk')->findAll();
        $item2 = $this->itemDua->findAll();
        $assoMax = $this->assoDua->select('id_produk_1,id_produk_2, support, cofidence, MAX(total) as total')->findAll();
        $produk = $this->produkModel->findAll();
        
    	$view = ['menu' => 'apriori',
                'data' => $data,
                'produk' => $produk,
                'item1' => $item1,
                'item2' => $item2,
                'assoMax'  => $assoMax 
    			];
        return view('aprioriproses', $view);
        
    } 
}