<?php

namespace Src;

class View
{
    private string $view;
    private array $data;

    public function __construct(string $view, array $data = [])
    {
        $this->view = $view;
        $this->data = $data;
    }

    public function __toString(): string
    {
        extract($this->data);

        ob_start();
        require $_SERVER['DOCUMENT_ROOT'] . "/pop-it-mvc/views/" . str_replace('.', '/', $this->view) . '.php';
        return ob_get_clean();
    }
}
