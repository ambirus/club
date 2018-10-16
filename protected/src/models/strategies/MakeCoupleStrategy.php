<?php

namespace src\models\strategies;

class MakeCoupleStrategy implements DancingStrategy
{
    public function making()
    {
        echo 'Действие: создаёт пару' . "\n";
    }
}