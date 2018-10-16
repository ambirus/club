<?php

namespace src\models\strategies;

class NonMoveStrategy implements DancingStrategy
{
    public function making()
    {
        echo 'Действие: просто стоит' . "\n";
    }
}