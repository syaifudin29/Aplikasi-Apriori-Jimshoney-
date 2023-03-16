<?php

namespace App\Controllers;

class Login extends BaseController
{

    public function index()
    {
    	if (session()->has('id_user') != false) {
            return redirect()->to('/'); 
        }
    	$data = ['menu' => 'login'];
        return view('login', $data);
    }
    public function proses(){
    	$username = $this->request->getVar('username');
    	$pass = md5($this->request->getVar('password'));
    	$data = $this->userModel->where('username', $username)->where('password', $pass)->findAll();
    	if (count($data) != 0) {
    		session()->set(['id_user' => $data[0]['id_user']]);
    		return redirect()->to('/');	
    	}else{
    		session()->setFlashdata('info', 'Data kosong.');
			return redirect()->to('/login');
    	}
    }
    public function logout(){
    	session()->destroy();
    	return redirect()->to('/login');	
    }
}
