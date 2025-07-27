<?php

namespace App\Controllers;

use App\Models\BukuModel;
use CodeIgniter\Controller;

class Buku extends BaseController
{
    protected $bukuModel;

    

public function __construct()
{
    if (!session()->get('isLoggedIn')) {
        redirect()->to('/login')->send();
        exit();
    }
    helper('form');
    $this->bukuModel = new BukuModel();
}

    
    public function index()
    {
        $keyword = $this->request->getGet('keyword');

        
        if ($keyword) {
        
            $buku_query = $this->bukuModel->search($keyword);
        } else {
        
            $buku_query = $this->bukuModel;
        }

        $data = [
            'title'   => 'Daftar Buku Digital',
        
            'buku'    => $buku_query->paginate(5, 'buku'),
            'pager'   => $this->bukuModel->pager,
            'keyword' => $keyword,
        ];

        return view('buku/index', $data);
    }


    public function create()
    {
        $data = [
            'title' => 'Form Tambah Buku',
        ];
        return view('buku/create', $data);
    }


    public function store()
    {
    
        $data = $this->request->getPost();

    
        $this->bukuModel->insert($data);

    
        return redirect()->to('/buku')->with('success', 'Data buku berhasil ditambahkan!');
    }

    
    public function edit($id = null)
    {
        $data = [
            'title' => 'Form Edit Buku',
            'buku'  => $this->bukuModel->find($id),
        ];
        return view('buku/edit', $data);
    }

    
    public function update($id = null)
    {
        $data = $this->request->getPost();
        
        $this->bukuModel->update($id, $data);

        return redirect()->to('/buku')->with('success', 'Data buku berhasil diperbarui!');
    }

    
    public function delete($id = null)
    {
        $this->bukuModel->delete($id);

        return redirect()->to('/buku')->with('success', 'Data buku berhasil dihapus!');
    }
}
