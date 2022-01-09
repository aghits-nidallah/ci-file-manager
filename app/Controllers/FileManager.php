<?php

namespace App\Controllers;

use App\Models\FileManagerModel;
use CodeIgniter\RESTful\ResourceController;

class FileManager extends ResourceController
{
    protected $modelName = FileManagerModel::class;

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        return view('FileManager/new', [
            'files' => $this->model->findAll(),
        ]);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $validationRule = ([
            'file' => 'uploaded[file]|is_image[file]|mime_in[file,image/png,image/jpeg,image/jpg]|max_size[file,2048]',
        ]);

        if (!$this->validate($validationRule)) {
            $data = ['errors' => $this->validator->getErrors()];

            return view('FileManager/new', $data);
        }

        try {
            $name = $this->request->getFile('file')->getName();
            $path = $this->request->getFile('file')->store();

            $this->model->insert([
                'name' => $name,
                'path' => $path,
            ]);
        } catch (\Exception $th) {
            return redirect()->to('FileManager/new')->with('errors', ['Gagal mengupload file: ' . $th->getMessage()]);
        }

        return redirect()->to('FileManager/new')->with('success', 'File berhasil diupload');
    }
}
