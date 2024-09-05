<?php

namespace Src\Controllers;

use Src\Commons\Debug;
use Src\Models\Catalogue;
use Rakit\Validation\Validator;

class CatalogueController extends BaseController
{
    private $catalogue;

    const PATH_VIEW = 'admin.catalogue.';

    public function __construct()
    {
        $this->catalogue = new Catalogue;
    }

    public function index()
    {
        $data = $this->catalogue->all();
        // Debug::dd($data);

        return $this->view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    public function create()
    {
        return $this->view(self::PATH_VIEW . __FUNCTION__);
    }

    public function store()
    {
        $validator = new Validator;

        $validation = $validator->make(
            $_POST,
            [
                'name' => 'required|min:3|max:255'
            ]
        );

        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->toArray();
            // Debug::dd($_SESSION['errors']);
            return $this->redirect('error', $_SESSION['errors'], 'admin/catalogue/create');
        }

        $data = [
            'name' => $_POST['name']
        ];

        // Debug::dd($data);

        $this->catalogue->insert($data);

        return $this->redirect('success', 'Create catalogue successfully', 'admin/catalogue');
    }

    public function edit($id)
    {
        $data = $this->catalogue->find($id);
        // Debug::dd($data);

        return $this->view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    public function update($id)
    {

        $validator = new Validator;

        $validation = $validator->make(
            $_POST,
            [
                'name' => 'required|min:3|max:255'
            ]
        );

        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->toArray();
            // Debug::dd($_SESSION['errors']);
            return $this->redirect('error', $_SESSION['errors'], 'admin/catalogue/edit/' . $id);
        }

        $data = [
            'name' => $_POST['name']
        ];

        $this->catalogue->update($id, $data);

        return $this->redirect('success', 'Update catalogue successfully', 'admin/catalogue');
    }

    public function delete($id)
    {
        $this->catalogue->delete($id);
        return $this->redirect('success', 'Delete catalogue successfully', 'admin/catalogue');
    }
}
