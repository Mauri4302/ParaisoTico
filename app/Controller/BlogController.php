<?php
// require_once __DIR__ . '/../Models/Blog.php';
require_once 'app/Models/Blog.php';

class BlogController
{
    private $model;

    public function __construct()
    {
        $this->model = new Blog();
    }

    public function blog()
{
    // Obtener los tours desde el modelo
    $tours = $this->model->getTours();

    // Verificar si hay tours
        if (empty($tours)) {
            error_log("No se encontraron tours en el archivo JSON.");
        }
    // Obtener las rutas de las imágenes
    $totalImages = 30;
    foreach ($tours as $index => &$tour) {
        $imageIndex = ($index % $totalImages) + 1;
        $tour['imagePath'] = $this->model->getImagePath($imageIndex);
    }

    // Pasar los datos a la vista
    // include __DIR__ . '/../Views/Login/blog.php';
    include 'app/Views/Login/blog.php';
}
}
?>