<?php

namespace Application\Core;

use Application\Controller\ViewNews;


class Route
{
    public function routeProcessing(array $routes, array $segments, $array): bool
    {
//        echo ViewNews::class;
        foreach ($routes as $value) {

            if ($value == $segments[0]) {
                // (new ViewNews)->viewList();
                // (new $class)->$function();
                $class = new $array['controller'];

                $function = $array['method'];

                (new $class)->$function();

            } else {
                echo "404";
            }

        }
        return false;
    }
}