<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        $this->id_user = session()->has('id_user');

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
        $this->produkModel = new \App\Models\ProdukModel();
        $this->penjualanModel = new \App\Models\PenjualanModel();
        $this->userModel = new \App\Models\UserModel();
        $this->analisaModel = new \App\Models\AnalisaModel();
        $this->assoSatu = new \App\Models\AssoSatuModel();
        $this->assoDua = new \App\Models\AssoDuaModel();
        $this->itemSatu = new \App\Models\ItemsetSatuModel();
        $this->itemDua = new \App\Models\ItemsetDuaModel();
        $this->itemTiga = new \App\Models\ItemsetTigaModel();
        $this->itemEmpat = new \App\Models\ItemsetEmpatModel();
        $this->hasilModel = new \App\Models\HasilModel();
         
    }
}
