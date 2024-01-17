<?php
// namespace App\Controllers;
class CoreController
{
    protected $data = [];

    public function loadview($viewName, $data = []) {
        extract($data);
        include_once '../app/Views/template_header.php';
        include_once '../app/Views/' . $viewName . '.php';
        include_once '../app/Views/template_footer.php';
    }

    public function loadModel($modelName)
    {
        $model = $modelName."Model";
        return new $model();
    }
}