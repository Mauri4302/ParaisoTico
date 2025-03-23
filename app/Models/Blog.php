<?php
class Blog
{
    private $toursFile;
    private $imagesDir;

    public function __construct()
    {
        // $this->toursFile = __DIR__ . '/../../Views/Data/tours.json'; // Ruta al archivo JSON
        // $this->imagesDir = __DIR__ . '/../../Views/Img/blog/'; // Ruta a las imágenes
        $this->toursFile = 'app/Views/Data/tours.json'; // Ruta al archivo JSON
        $this->imagesDir = 'app/Views/Img/blog/'; // Ruta a las imágenes
    }

    public function getTours()
    {
        // Cargar los datos del archivo JSON
        // if (file_exists($this->toursFile)) {
        //     $jsonData = file_get_contents($this->toursFile);
        //     $tours = json_decode($jsonData, true);
        //     return $tours ?? [];
        // }
        // return [];
        if (file_exists($this->toursFile)) {
        $jsonData = file_get_contents($this->toursFile);
        $tours = json_decode($jsonData, true);

        // Depuración: Verifica si el JSON se decodificó correctamente
        if (json_last_error() === JSON_ERROR_NONE) {
            return $tours;
        } else {
            error_log("Error al decodificar el JSON: " . json_last_error_msg());
            return [];
        }
    } else {
        error_log("El archivo JSON no existe en la ruta: " . $this->toursFile);
        return [];
    }
    }

    public function getImagePath($index)
    {
        // Obtener la ruta de la imagen correspondiente
        $imagePath = $this->imagesDir . 'image_blog_' . $index . '.jpg';
        return file_exists($imagePath) ? $imagePath : null;
    }
}
?>