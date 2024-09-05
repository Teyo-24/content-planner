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
    public function serve($filename)
    {
        $filePath = WRITEPATH . 'uploads/' . $filename;

        if (file_exists($filePath)) {
            return $this->response->download($filePath, null)->setFileName($filename);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function calender()
    {
        $modelCPlanner = new ContentPlanner();
        $modelSosialMedia = new SosialMedia();

        // Mengambil semua data dari tabel content_planner
        $content_planner = $modelCPlanner->findAll();
        $sosial_media = $modelSosialMedia->findAll();

        // Membuat array untuk memetakan nama sosial media ke warna sosial media
        $socialMediaColors = [];
        foreach ($sosial_media as $media) {
            $socialMediaColors[$media['nama_sosial_media']] = $media['warna_sosial_media'];
        }

        // Mengelompokkan data berdasarkan tanggal
        $eventsByDate = [];
        foreach ($content_planner as $event) {
            $date = date('Y-m-d', strtotime($event['created_at']));
            if (!isset($eventsByDate[$date])) {
                $eventsByDate[$date] = [];
            }
            $eventsByDate[$date][] = [
                'file_content' => $event['file_content'],
                'sosial_media' => $event['sosial_media'],
                'content_type' => $event['content_type'],
                'content_pillar' => $event['content_pillar'],
                'status' => $event['status'],
                'caption' => $event['caption'],
                'cta_link' => $event['cta_link'],
                'hashtag' => $event['hashtag'],
                'created_at' => $event['created_at'],
            ];
        }

        $data['eventsByDate'] = $eventsByDate;
        $data['socialMediaColors'] = $socialMediaColors;

        return view('content-planner/content-calendar', $data);
    }

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

        return view('content-planner/content-planners', $data);
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

        return redirect()->to('/');
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

    public function add_sosial_media()
    {
        $data = [
            'nama_sosial_media' => $this->request->getPost('nama_sosial_media'),
            'warna_sosial_media' => $this->request->getPost('warna_sosial_media'),
        ];

        $this->sosialMediaModel->insert($data);
        return $this->response->setJSON(['status' => 'success']);
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

    public function delete_sosial_media()
    {
        $id = $this->request->getPost('id');
        $this->sosialMediaModel->delete($id);
        return $this->response->setJSON(['status' => 'success']);
    }

    public function add_content_type()
    {
        $data = [
            'nama_content_type' => $this->request->getPost('nama_content_type'),
        ];

        $this->contentTypeModel->insert($data);
        return $this->response->setJSON(['status' => 'success']);
    }

    public function update_content_type()
    {
        $id = $this->request->getPost('id');
        $column = $this->request->getPost('column');
        $value = $this->request->getPost('value');

        if (in_array($column, ['nama_content_type'])) {
            $this->contentTypeModel->update($id, [$column => $value]);
            return $this->response->setJSON(['status' => 'success']);
        }

        return $this->response->setJSON(['status' => 'failed'], 400);
    }

    public function delete_content_type()
    {
        $id = $this->request->getPost('id');
        $this->contentTypeModel->delete($id);
        return $this->response->setJSON(['status' => 'success']);
    }

    public function add_content_pillar()
    {
        $data = [
            'nama_content_pillar' => $this->request->getPost('nama_content_pillar'),
        ];

        $this->contentPillarModel->insert($data);
        return $this->response->setJSON(['status' => 'success']);
    }

    public function update_content_pillar()
    {
        $id = $this->request->getPost('id');
        $column = $this->request->getPost('column');
        $value = $this->request->getPost('value');

        if (in_array($column, ['nama_content_pillar'])) {
            $this->contentPillarModel->update($id, [$column => $value]);
            return $this->response->setJSON(['status' => 'success']);
        }

        return $this->response->setJSON(['status' => 'failed'], 400);
    }

    public function delete_content_pillar()
    {
        $id = $this->request->getPost('id');
        $this->contentPillarModel->delete($id);
        return $this->response->setJSON(['status' => 'success']);
    }

    public function add_status()
    {
        $data = [
            'nama_status' => $this->request->getPost('nama_status'),
        ];

        $this->statusModel->insert($data);
        return $this->response->setJSON(['status' => 'success']);
    }

    public function update_status()
    {
        $id = $this->request->getPost('id');
        $column = $this->request->getPost('column');
        $value = $this->request->getPost('value');

        if (in_array($column, ['nama_status'])) {
            $this->statusModel->update($id, [$column => $value]);
            return $this->response->setJSON(['status' => 'success']);
        }

        return $this->response->setJSON(['status' => 'failed'], 400);
    }

    public function delete_status()
    {
        $id = $this->request->getPost('id');
        $this->statusModel->delete($id);
        return $this->response->setJSON(['status' => 'success']);
    }

    public function kpi()
    {
        return view('content-planner/input-kpi');
    }
}
