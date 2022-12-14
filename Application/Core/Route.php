<?php

namespace Application\Core;

use Application\Controller\ViewNews;


class Route
{
    private int $counter = 0;

    public function routeProcessing(array $routes, array $uri)
    {
        foreach ($routes as $key => $array)
        {
            if($uri[$this->counter] == $key)
            {
                if($uri[$this->counter +1])
                {
                    $this->counter++;
                    return $this->routeProcessing($array['child'], $uri);
                } else {
                    $class = new $array['controller'];

                    $function = $array['method'];

                    $class->$function();

                    return 0;
                }
            }
        }
      print_r($uri[0]); print_r($key[0]);

        echo '  PAGE NOT FOUND 404';





  /*     echo ViewNews::class;
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
        return false;*/
    }
}