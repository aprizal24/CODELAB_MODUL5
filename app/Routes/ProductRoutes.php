<?php

namespace app\Routes;

include "/Users/rian/Documents/MyDoc/Semester 5/PraktikumProgramweb/MODUL5/app/Controller/ProductController.php";

use app\Controller\ProductController;

class ProductRoutes
{
    public function handle($method, $path)
    {
        // jika request method get dan path sama dengan '/api/product'
        if ($method === 'GET' && $path === '/api/product') {
            $controller = new ProductController();
            echo $controller->index();
        }

        // jika request method get dan path mengandung '/api/product/'
        if ($method === 'GET' && strpos($path, '/api/product/') === 0) {
            // extract ID dari path
            $pathParts = explode('/', $path);
            $id = $pathParts[count($pathParts) - 1];

            $controller = new ProductController();
            echo $controller->getById($id);
        }

        // jika request method post dan path sama dengan '/api/product'
        if ($method === 'POST' && $path === '/api/product') {
            $controller = new ProductController();
            echo $controller->insert();
        }

        // jika request method put dan path mengandung '/api/product/'
        if ($method === 'PUT' && strpos($path, '/api/product/') === 0) {
            // extract ID dari path
            $pathParts = explode('/', $path);
            $id = $pathParts[count($pathParts) - 1];

            $controller = new ProductController();
            echo $controller->update($id);
        }

        // jika request method delet dan path mengandung '/api/product/'
        if ($method === 'DELETE' && strpos($path, '/api/product/') === 0) {
            // extrac ID dari path
            $pathParts = explode('/', $path);
            $id = $pathParts[count($pathParts) - 1];

            $controller = new ProductController();
            echo $controller->delete($id);
        }
    }
}
