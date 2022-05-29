<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;

use App\Models\Master_data_productModel;
use App\Models\Master_kategori_productModel;

class Pages extends BaseController
{
    protected $dataMasterModel;
    protected $dataMasterKategoriModel;

    public function __construct()
    {
        $this->dataMasterModel = new Master_data_productModel;
        $this->dataMasterKategoriModel = new Master_kategori_productModel;
        $this->db = db_connect();
    }
    public function index()
    {
        $showdata = $this->dataMasterModel->findAll();

        $data = [
            'tittle' => 'Home ~ Majoo',
            'showdata' => $showdata
        ];


        // dd($data);


        if (!session()->has('username')) {
            return view('Pages/show_produk', $data);
        }
        $data['username']  = session()->get('username');

        return view('Pages/show_produk_admin', $data);
    }



    public function data_produk()
    {

        if (!session()->has('username')) {
            return redirect()->to('/login');
        }
        $data['username']  = session()->get('username');

        $dataMaster = $this->dataMasterModel->findAll();

        $data = [
            'tittle' => 'Master Product',
            'dataMaster' => $dataMaster
        ];



        return view('Pages/data_produk.php', $data);
    }



    public function kategori()
    {
        if (!session()->has('username')) {
            return redirect()->to('/login');
        }
        $data['username']  = session()->get('username');

        $dataMasterkategori = $this->dataMasterKategoriModel->findAll();
        $data = [
            'tittle' => 'master kategori',
            'dataMasterkategori' => $dataMasterkategori
        ];

        //dd($data);

        return view('Pages/kategori', $data);
    }

    public function create()
    {

        if (!session()->has('username')) {
            return redirect()->to('/login');
        }
        $data['username']  = session()->get('username');

        $data = [
            'tittle' => 'Form Tambah Data',
            'validation' => \Config\Services::validation()
        ];

        return view('Pages/create', $data);
    }

    public function create_kategori()
    {

        if (!session()->has('username')) {
            return redirect()->to('/login');
        }
        $data['username']  = session()->get('username');

        $data = [
            'tittle' => 'Form Tambah Kategori',
            'validation' => \Config\Services::validation()
        ];

        return view('Pages/create_kategori', $data);
    }



    public function save()
    {
        if (!session()->has('username')) {
            return redirect()->to('/login');
        }
        $data['username']  = session()->get('username');

        if (!$this->validate([
            'namaproduk' => [
                'rules' => 'required|is_unique[master_data_product.nama_product]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                    'is_unique' => '{field} sudah ada di database'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.'
                ]
            ],
            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.'
                ]
            ],
            'kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.'
                ]
            ],
            'gambar' => [
                'rules' => 'uploaded[gambar]|max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Gambar tidak boleh kosong.',
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang Anda pilih bukan gambar',
                    'mime_in' => 'Yang Anda pilih bukan gambar',
                ]
            ]

        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/pages/create')->withInput()->with('validation', $validation);
            return redirect()->to('/pages/create')->withInput();
        }

        //ambil gambar
        $filegambar = $this->request->getFile('gambar');

        if ($filegambar->getError() === 4) {
            $namaGambar = 'default.png';
        } else {

            $namaGambar = $filegambar->getRandomName();

            $filegambar->move('img', $namaGambar);
        }




        $this->dataMasterModel->save([
            'nama_product' => $this->request->getVar('namaproduk'),
            'deskripsi_product' => $this->request->getVar('deskripsi'),
            'harga_product' => $this->request->getVar('harga'),
            'kategori' => $this->request->getVar('kategori'),
            'gambar' => $namaGambar
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/Pages/data_produk');
    }

    public function save_kategori()
    {
        if (!session()->has('username')) {
            return redirect()->to('/login');
        }
        $data['username']  = session()->get('username');

        if (!$this->validate([
            'kategori_product' => [
                'rules' => 'required|is_unique[Master_kategori_product.kategori_product]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                    'is_unique' => '{field} sudah ada di database'
                ]
            ]

        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/Pages/create_kategori')->withInput()->with('validation', $validation);
        }

        $this->dataMasterKategoriModel->insert([
            'kategori_product' => $this->request->getVar('kategori_product'),
            'id_kategori' => $this->request->getVar('kategori_product')


        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/Pages/kategori');
    }

    public function ajaxSearch()
    {
        $request = service('request');
        $postData = $request->getPost();
        $response = array();

        $data = array();

        $builder = $this->db->table("Master_kategori_product");


        if (isset($postData['query'])) {

            $query = $postData['query'];

            // Fetch record
            $builder->select('*');
            $builder->like('kategori_product', $query, 'both');
            $query = $builder->get();
            $data = $query->getResult();
        } else {

            // Fetch record
            $builder->select('*');
            $query = $builder->get();
            $data = $query->getResult();
        }

        foreach ($data as $hasil) {
            $tampunghasil[] = array(
                "id" => $hasil->id_kategori,
                "text" => $hasil->kategori_product,
            );
        }

        $response['data'] = $tampunghasil;

        return $this->response->setJSON($response);
    }

    public function delete($id_product)
    {
        if (!session()->has('username')) {
            return redirect()->to('/login');
        }
        $data['username']  = session()->get('username');

        $this->dataMasterKategoriModel->delete($id_product);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/Pages/kategori');
    }

    public function edit($id_kategori)
    {
        if (!session()->has('username')) {
            return redirect()->to('/login');
        }
        $data['username']  = session()->get('username');

        $data = [
            'tittle' => 'Form Ubah Data',
            'validation' => \Config\Services::validation(),
            'data_produk' => $this->dataMasterKategoriModel->find($id_kategori)
        ];

        //dd($data);

        return view('Pages/edit_kategori', $data);
    }


    public function update($id_kategori)
    {
        if (!session()->has('username')) {
            return redirect()->to('/login');
        }
        $data['username']  = session()->get('username');

        // $data = [
        //     'tittle' => 'Form Ubah Data',
        //     'validation' => \Config\Services::validation(),
        //     'data_produk' => $this->dataMasterKategoriModel->find($id_kategori)
        // ];

        //dd($this->request->getVar());


        $this->dataMasterKategoriModel->save([

            'id_kategori' => $id_kategori,
            'kategori_product' => $this->request->getVar('kategori_product')

        ]);

        session()->setFlashdata('pesan', 'Data berhasil diupdate.');

        return redirect()->to('/Pages/kategori');
        //return view('Pages/edit_kategori', $data);
    }
}
