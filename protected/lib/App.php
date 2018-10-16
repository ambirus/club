<?php

namespace lib;

use lib\routers\ConsoleRouter;

class App
{
    public function run()
    {
        (new ConsoleRouter())->execute();
    }

}