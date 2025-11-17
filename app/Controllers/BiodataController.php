<?php

namespace App\Controllers;

use App\Controllers\RestfulController;
use App\Models\MBiodata;

class BiodataController extends RestfulController
{
    protected $format = 'json';

    // ============================
    // GET /biodata  → List All
    // ============================
    public function index()
    {
        $model = new MBiodata();
        $biodata = $model->findAll();
        return $this->respond([
            'status' => true,
            'data' => $biodata
        ]);
    }

    // ============================
    // POST /biodata  → Create
    // ============================
    public function create()
    {
        $data = [
            'nama'           => $this->request->getVar('nama'),
            'alamat'         => $this->request->getVar('alamat'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'nomor_telepon'  => $this->request->getVar('nomor_telepon'),
        ];

        $model = new MBiodata();

        if (!$model->validate($data)) {
            return $this->failValidationErrors($model->errors());
        }

        $model->insert($data);
        $biodata = $model->find($model->getInsertID());

        return $this->respondCreated([
            'status'  => true,
            'message' => 'Data berhasil ditambahkan',
            'data'    => $biodata
        ]);
    }

    // ============================
    // GET /biodata/list
    // ============================
    public function list()
    {
        $model = new MBiodata();
        $biodata = $model->findAll();
        return $this->respond([
            'status' => true,
            'data'   => $biodata
        ]);
    }

    // ============================
    // GET /biodata/detail/{id}
    // ============================
    public function detail($id = null)
    {
        $model = new MBiodata();
        $biodata = $model->find($id);

        if ($biodata) {
            return $this->respond([
                'status' => true,
                'data'   => $biodata
            ]);
        }

        return $this->failNotFound("Data Biodata dengan ID $id tidak ditemukan");
    }

    // ============================
    // PUT /biodata/ubah/{id}
    // ============================
    public function ubah($id = null)
    {
        $model = new MBiodata();

        if ($model->find($id) === null) {
            return $this->failNotFound("Data Biodata dengan ID $id tidak ditemukan");
        }

        $data = [
            'nama'           => $this->request->getVar('nama'),
            'alamat'         => $this->request->getVar('alamat'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'nomor_telepon'  => $this->request->getVar('nomor_telepon'),
        ];

        $model->update($id, $data);
        $biodata = $model->find($id);

        return $this->respond([
            'status'  => true,
            'message' => 'Data berhasil diubah',
            'data'    => $biodata
        ]);
    }

    // ============================
    // DELETE /biodata/hapus/{id}
    // ============================
    public function hapus($id = null)
    {
        $model = new MBiodata();

        if ($model->find($id) === null) {
            return $this->failNotFound("Data Biodata dengan ID $id tidak ditemukan");
        }

        $model->delete($id);

        return $this->respondDeleted([
            'status'  => true,
            'message' => "Data Biodata dengan ID $id berhasil dihapus"
        ]);
    }
}
