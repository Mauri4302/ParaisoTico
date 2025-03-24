<?php
class Blog
{
    private $toursFile;
    private $imagesDir;

    public function __construct()
    {
        $this->toursFile = __DIR__ . '/../../app/Views/Data/tours.json'; // Ruta al archivo JSON
        // $this->imagesDir = __DIR__ . '/../../app/Views/Img/blog/'; // Ruta a las imágenes
        // $this->toursFile = './app/Views/Data/tours.json'; // Ruta al archivo JSON
        $this->imagesDir = '/app/Views/Img/blog/'; // Ruta a las imágenes
    }

    public function getTours()
    {
        // Cargar los datos del archivo JSON
        if (file_exists($this->toursFile)) {
            $jsonData = file_get_contents($this->toursFile);
            $tours = json_decode($jsonData, true);
            return $tours ?? [];
        }
        return [];
        
    }

    public function getImagePath($index)
    {
        // Obtener la ruta de la imagen correspondiente
        // $imagePath = $this->imagesDir . 'image_blog_' . $index . '.jpg';
        // return file_exists($imagePath) ? $imagePath : null;
        $imagePath = '/app/Views/Img/blog/image_blog_' . $index . '.jpg';
        return file_exists(__DIR__ . '/../../' . $imagePath) ? $imagePath : null;
    }
}
?>