<?php

namespace src\models;

use src\models\entities\Club;
use src\models\entities\Music;

interface VisitorObserver
{
    public function dance(Club $club, Music $music);
}