<?php

namespace src\models\strategies;

class ForeverAloneStrategy implements DancingStrategy
{
    public function making()
    {
        echo 'Действие: танцует один' . "\n";
    }
}