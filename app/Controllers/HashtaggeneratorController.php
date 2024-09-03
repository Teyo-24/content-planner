<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;

class HashtaggeneratorController extends BaseController
{
    public function index()
    {
        return view('hashtag/hashtag');
    }

    public function generate()
    {
        $query = $this->request->getVar('query');

        if (!$query) {
            return $this->response->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST)
                ->setJSON(['error' => 'Query parameter is required']);
        }

        $url = "https://hash-tag-generator.p.rapidapi.com/get_has_tags?query=" . urlencode($query) . "&language=en";

        $options = [
            'http' => [
                'header' => [
                    "x-rapidapi-key: " . getenv('RAPIDAPI_KEY'),
                    "x-rapidapi-host: hash-tag-generator.p.rapidapi.com"
                ]
            ]
        ];

        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);

        if ($response === false) {
            return $this->response->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR)
                ->setJSON(['error' => 'Failed to fetch data from API']);
        }

        return $this->response->setJSON(json_decode($response, true));
    }
}
