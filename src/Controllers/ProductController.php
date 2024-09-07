<?php
namespace Src\Controllers;

use Rakit\Validation\Validator;
use Src\Commons\Debug;
use Src\Models\Catalogue;
use Src\Models\Product;

class ProductController extends BaseController
{
    private $product;
    private $catalogue;

    const PATH_VIEW = 'admin.products.';
    const PATH_UPLOAD = 'assets/images/products/';

    public function __construct()
    {
        $this->product = new Product();
        $this->catalogue = new Catalogue();
    }

    public function index()
    {
        $data = $this->product->getAllProducts();
        // Debug::dd($data);

        return $this->view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    public function create()
    {
        $catalogues = $this->catalogue->all();
        // Debug::dd($catalogues);
        return $this->view(self::PATH_VIEW . __FUNCTION__, compact('catalogues'));
    }

    public function store()
    {
        $validator = new Validator;

        $validation = $validator->make(
            $_POST +
            $_FILES,
            [
                'name' => 'required',
                'image' => 'required|mimes:jpg,png,jpeg,webp',
                'price' => 'required|numeric',
                'description' => 'required',
                'catalogue_id' => 'required',
            ]
        );

        $validation->validate();


        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->toArray();
            // Debug::dd($_SESSION['errors']);
            return $this->redirect('error', $_SESSION['errors'], 'admin/product/create');
        }

        $data = [
            'name' => $_POST['name'],
            'price' => $_POST['price'],
            'description' => $_POST['description'],
            'catalogue_id' => $_POST['catalogue_id'],
        ];

        if (!empty($_FILES['image']) && $_FILES['image']['size'] > 0) {
            $image = $_FILES['image'];
            $data['image'] = $image['name'];
        }

        // Debug::dd($data);

        $is_create = $this->product->insert($data);

        if ($is_create && isset($image)) {
            move_uploaded_file($image['tmp_name'], self::PATH_UPLOAD . $image['name']);
        }

        return $this->redirect('success', 'Create product successfully', 'admin/product');
    }

    public function show($id)
    {
        $data = $this->product->getOneProduct($id);
        // Debug::dd($data);

        return $this->view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    public function edit($id)
    {
        $catalogues = $this->catalogue->all();
        $data = $this->product->getOneProduct($id);
        // Debug::dd($data);

        return $this->view(self::PATH_VIEW . __FUNCTION__, compact('data', 'catalogues'));
    }

    public function update($id)
    {
        $validator = new Validator;

        $validation = $validator->make(
            $_POST +
            $_FILES,
            [
                'name' => 'required',
                'image' => 'mimes:jpg,png,jpeg,webp',
                'price' => 'required|numeric',
                'description' => 'required',
                'catalogue_id' => 'required',
            ]
        );

        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->toArray();
            // Debug::dd($_SESSION['errors']);
            return $this->redirect('error', $_SESSION['errors'], 'admin/product/edit/' . $id);
        }

        $data = [
            'name' => $_POST['name'],
            'price' => $_POST['price'],
            'description' => $_POST['description'],
            'catalogue_id' => $_POST['catalogue_id'],
        ];

        $product = $this->product->getOneProduct($id);
        // Debug::dd($product);

        if (!empty($_FILES['image']) && $_FILES['image']['size'] > 0) {
            $current_img = self::PATH_UPLOAD . $product['image'];
            // Debug::dd($current_img);

            if (file_exists($current_img)) {
                unlink($current_img);
            }

            $image = $_FILES['image'];
            $data['image'] = $image['name'];
        } else {
            $data['image'] = $product['image'];
        }

        // Debug::dd($data);

        $is_update = $this->product->update($id, $data);

        if ($is_update && isset($image)) {
            move_uploaded_file($image['tmp_name'], self::PATH_UPLOAD . $image['name']);
        }

        return $this->redirect('success', 'Create product successfully', 'admin/product');
    }

    public function delete($id)
    {
        $product = $this->product->getOneProduct($id);
        $current_img = self::PATH_UPLOAD . $product['image'];

        if (file_exists($current_img)) {
            unlink($current_img);
        }

        $this->product->delete($id);

        return $this->redirect('success', 'Delete product successfully', 'admin/product');
    }

    public function search()
    {

        $key = $_GET['search'];

        $data = $this->product->getProductsByName($key);

        return $this->view('admin.products.index', compact('data'));
    }

    public function searchByCatalogue($catalogue_id){
        $data = $this->product->getProductsByCatalogue($catalogue_id);

        return $this->view('admin.products.index', compact('data'));
    }
}