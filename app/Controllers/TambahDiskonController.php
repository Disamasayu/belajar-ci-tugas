<?php

namespace App\Controllers;

use App\Models\TambahDiskonModel;
use CodeIgniter\Controller;

class TambahDiskonController extends BaseController
{
    public function index(){
        $model = new TambahDiskonModel();
        $data['diskon'] = $model->findAll();
        $data['errors'] = session()->getFlashdata('errors');
        return view('v_diskon', $data);
    }

    public function store(){
        $model = new TambahDiskonModel();

        $rules = [
            'tanggal' => 'required|is_unique[TambahDiskon.tanggal]',
            'nominal' => 'required|numeric'
        ];

        $messages = [
            'tanggal' => [
                'required' => 'Tanggal Wajib Diisi',
                'is_unique'=> 'Diskon pada Tanggal ini sudah ada'
            ],
            'nominal' => [
                'required' => 'Nominal wajib diisi',
                'numeric' => 'Nominal harus berupa angka'
            ]
        ];

        if(!$this->validate($rules, $messages)){
            $error = $this->validator->getErrors();
            $messageString = '';
            foreach ($error as $err){
                $messageString .= '<div>' . esc($err) . '</div>';
            }
            return redirect()->to('diskon')->withInput()->with('failed', $messageString);
        }

        $model->save([
            'tanggal'    => $this->request->getPost('tanggal'),
            'nominal'    => $this->request->getPost('nominal'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('diskon')->with('success','Diskon Berhasil Ditambahkan');
    }

    public function update($id){
        $model = new TambahDiskonModel();

        $rules = [
            'nominal' => 'required|numeric'
        ];

        if(!$this->validate($rules)){
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model->update($id,[
            'nominal'     => $this->request->getPost('nominal'),
            'updated_at'  => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('diskon')->with('success','Diskon Berhasil Diperbarui');
    }

    public function delete($id){
        $model = new TambahDiskonModel();
        $model->delete($id);
        return redirect()->to('diskon')->with('success','Diskon Berhasil Dihapus');
    }
}