<?php

namespace src\controllers;

use lib\Controller;
use src\models\entities\{Club, Playlist, Music, Group, Visitor};

class IndexController extends Controller
{
    public function actionIndex()
    {
        $club = new Club();
        $playlist = new Playlist();

        $playlist->addMusic(new Music());
        $playlist->addMusic(new Music('Scooter - How much is the fish?', 'dance'));
        $playlist->addMusic(new Music('Tiesto - I will be here', 'dance'));
        $playlist->addMusic(new Music('Scooter - Break it up', 'romantic'));

        $club->setPlaylist($playlist);

        $group = new Group();

        $group->addVisitor(new Visitor());
        $group->addVisitor(new Visitor('Василий'));
        $group->addVisitor(new Visitor('Роза', 'Ж'));

        $club->setVisitors($group);

        $club->playMusic();

    }
}