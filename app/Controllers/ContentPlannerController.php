<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ContentPlanner;
use App\Models\SosialMedia;
use App\Models\ContentPillar;
use App\Models\ContentType;
use App\Models\Status;
use CodeIgniter\HTTP\ResponseInterface;

class ContentPlannerController extends BaseController
{
    public function index()
    {
        $modelSosmed = new SosialMedia();
        $modelCPillar = new ContentPillar();
        $modelCType = new ContentType();
        $modelStatus = new Status();

        $sosmed = $modelSosmed->findAll();
        $content_pillar = $modelCPillar->findAll();
        $content_type = $modelCType->findAll();
        $status = $modelStatus->findAll();

        $data['sosmeds'] = $sosmed;
        $data['c_pillars'] = $content_pillar;
        $data['c_types'] = $content_type;
        $data['statuses'] = $status;

        return view('content-planner/content-planner', $data);
    }

    public function add()
    {
        $file = $this->request->getFile('file_content');

        if ($file->isValid() && !$file->hasMoved()) {
            // Pindahkan file ke direktori tujuan, misalnya: 'uploads'
            $fileName = $file->getRandomName();
            $file->move(WRITEPATH . 'uploads', $fileName);
        } else {
            // Jika ada kesalahan dalam pengunggahan file
            return redirect()->back()->with('error', 'Error in file upload');
        }

        $data = [
            'file_content' => $fileName,
            'sosial_media' => $this->request->getPost('sosial_media'),
            'content_type' => $this->request->getPost('content_type'),
            'content_pillar' => $this->request->getPost('content_pillar'),
            'status' => $this->request->getPost('status'),
            'caption' => $this->request->getPost('caption'),
            'cta_link' => $this->request->getPost('cta_link'),
            'hashtag' => $this->request->getPost('hashtag'),
            'created_at' => $this->request->getPost('created_at'),
        ];

        $model = new ContentPlanner();
        $model->insert($data);

        return redirect()->to('/content-planner');
    }

    public function all_input()
    {
        $modelSosmed = new SosialMedia();
        $modelCPillar = new ContentPillar();
        $modelCType = new ContentType();
        $modelStatus = new Status();

        $sosmed = $modelSosmed->findAll();
        $content_pillar = $modelCPillar->findAll();
        $content_type = $modelCType->findAll();
        $status = $modelStatus->findAll();

        $data['sosmeds'] = $sosmed;
        $data['c_pillars'] = $content_pillar;
        $data['c_types'] = $content_type;
        $data['statuses'] = $status;

        return view('content-planner/input-data-content', $data);
    }

    protected $sosialMediaModel;
    protected $contentTypeModel;
    protected $contentPillarModel;
    protected $statusModel;

    public function __construct()
    {
        $this->sosialMediaModel = new SosialMedia();
        $this->contentTypeModel = new ContentType();
        $this->contentPillarModel = new ContentPillar();
        $this->statusModel = new Status();
    }

    public function update_sosial_media()
    {
        $id = $this->request->getPost('id');
        $column = $this->request->getPost('column');
        $value = $this->request->getPost('value');

        if (in_array($column, ['nama_sosial_media', 'warna_sosial_media'])) {
            $this->sosialMediaModel->update($id, [$column => $value]);
            return $this->response->setJSON(['status' => 'success']);
        }

        return $this->response->setJSON(['status' => 'failed'], 400);
    }

    public function add_sosial_media()
    {
        $data = [
            'nama_sosial_media' => $this->request->getPost('nama_sosial_media'),
            'warna_sosial_media' => $this->request->getPost('warna_sosial_media'),
        ];

        $this->sosialMediaModel->insert($data);
        return $this->response->setJSON(['status' => 'success']);
    }
}
