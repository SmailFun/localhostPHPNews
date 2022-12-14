<?php

namespace Application\Core;
//ЭТо про шаблонизатор
class Controller
{
    protected function render(string $tmpl, array $params = []): string
    {
        ob_start();
        extract($params);
        require 'application/views/' . $tmpl . '.php';
        return ob_get_clean();
    }
}