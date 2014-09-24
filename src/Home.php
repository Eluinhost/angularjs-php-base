<?php

namespace Temp\TempApp;


use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class Home
{

    public function me(Request $request, Application $app)
    {
        return $app->json([
            'name' => $app['user']['name'],
            'age' => $app['user']['age']
        ]);
    }
}
