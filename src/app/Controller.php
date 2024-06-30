<?php

class Controller
{
    public function view(string $view, string $title, array $data=[])
    {
        ob_start();
        extract($data);
        $body = './view/'.$view.'.php';
        require './view/template.php';
        $content = ob_get_contents();
        ob_end_clean();
        echo $content;
    }

    public function response($data)
    {
        echo json_encode($data);
    }

}