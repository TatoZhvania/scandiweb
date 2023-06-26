<?php

namespace App\Controllers;

use App\Core\App;
use Error;

class ProductController
{
    public function index()
    {
        $productData = App::get('database')->selectAll('products');
        return view('index', ['productData' => $productData]);
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $sku = $_POST['sku'];
            if ($this->isUniqueSKU($sku)) {
                App::get('database')->insert('products', [
                    'name' => $_POST['name'],
                    'sku' => $sku,
                    'price' => $_POST['price'],
                    'type' => $_POST['type'],
                    'size' => $_POST['size'],
                    'height' => $_POST['height'],
                    'width' => $_POST['width'],
                    'length' => $_POST['length'],
                    'weight' => $_POST['weight']
                ]);


                $response = ['success' => true];
            } else {
                $response = ['success' => false];
            }

            header('Content-Type: application/json');
            echo json_encode($response);
            return;
        }
    }


    private function isUniqueSKU($sku)
    {
        $existingProduct = App::get('database')->selectByColumn('products', 'sku', $sku);
        return empty($existingProduct);
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idsToDelete = $_POST['delete_checkbox'];
            if (!empty($idsToDelete)) {
                foreach ($idsToDelete as $id) {
                    App::get('database')->delete('products', $id);
                }
            }
        }

        return redirect('');
    }
}
