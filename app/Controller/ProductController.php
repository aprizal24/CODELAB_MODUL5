<?php

namespace app\Controller;

include "/Users/rian/Documents/MyDoc/Semester 5/PraktikumProgramweb/MODUL5/app/Models/Product.php";
include "/Users/rian/Documents/MyDoc/Semester 5/PraktikumProgramweb/MODUL5/app/Traits/ApiResponseFormatter.php";

use app\Models\Product;
use app\Traits\ApiResponseFormatter;

class ProductController
{
    // Pakai traits yang sudah dibuat
    use ApiResponseFormatter;

    public function index()
    {
        // Definisikan object model yang sudah dibuat
        $productModel = new Product();
        // Panggil fungsi GET ALL product
        $response = $productModel->findAll();
        var_dump($response);
        // Return $response dengan melakukan formatting terlebih dahulu menggunakan Traits yang sudah dipanggil
        return $this->apiResponse(200, "success", $response);
    }

    public function getById($id)
    {
        $productModel = new Product();
        $response = $productModel->findById($id);
        return $this->apiResponse(200, "success", $response);
    }

    public function insert()
    {
        // tangkap input json
        $jsonInput = file_get_contents('php://input');
        $inputData = json_decode($jsonInput, true);
        // Validasi apakah input valid
        if (json_last_error()) {
            return $this->apiResponse(400, "error invalid input", null);
        }

        // Lanjut jika tidak eror
        $productModel = new Product();
        $response = $productModel->create([
            "product_name" => $inputData['product_name']
        ]);

        return $this->apiResponse(200, "success", $response);
    }

    public function update($id)
    {
        // Tangkap input json
        $jsonInput = file_get_contents("php://input");
        $inputData = json_decode($jsonInput, true);
        // Validasi apakah input valid 
        if (json_last_error()) {
            return $this->apiResponse(400, "error invalid input", null);
        }

        // Lanjut jika tidak error
        $productModel = new Product();
        $response = $productModel->update([
            "product_name" => $inputData['product_name']
        ], $id);

        return $this->apiResponse(200, "success", $response);
    }

    public function delete($id)
    {
        $productModel = new Product();
        $response = $productModel->destroy($id);

        return $this->apiResponse(200, "success", $response);
    }
}
