<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ContentPlanner;
use App\Models\ContentPillar;
use App\Models\ContentType;
use App\Models\Status;
use CodeIgniter\HTTP\ResponseInterface;

class ContentPlannerController extends BaseController
{
    public function index()
    {
        $modelCPillar = new ContentPillar();
        $modelCType = new ContentType();
        $modelStatus = new Status();

        $content_pillar = $modelCPillar->findAll();
        $content_type = $modelCType->findAll();
        $status = $modelStatus->findAll();

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
            'content_type' => $this->request->getPost('content_type'),
            'content_pillar' => $this->request->getPost('content_pillar'),
            'status' => $this->request->getPost('status'),
            'caption' => $this->request->getPost('caption'),
            'cta_link' => $this->request->getPost('cta_link'),
            'hashtag' => $this->request->getPost('hashtag'),
        ];

        $model = new ContentPlanner();
        $model->insert($data);

        return redirect()->to('/content-planner');
    }
}
