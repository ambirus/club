<?php

namespace src\models\entities;

use src\models\strategies\ForeverAloneStrategy;
use src\models\strategies\MakeCoupleStrategy;
use src\models\strategies\NonMoveStrategy;
use src\models\VisitorObserver;
use src\models\CoupleChecker;

class Visitor implements VisitorObserver
{
	private $_name;
	private $_gender;
	private $_favoriteGenre;

	public function __construct($name = 'Иван', $gender = 'М', $favoriteGenre = 'pop')
	{
		$this->_name = $name;
        $this->_gender = $gender;
        $this->_favoriteGenre = $favoriteGenre;
	}

	public function getName() : string
    {
        return $this->_name;
    }

    public function getGender() : string
    {
        return $this->_gender;
    }

    public function dance(Club $club, Music $music)
    {
        echo 'Пользователь ' . $this->_name . "\n";

        if ($music->getGenre() == 'romantic' && $club->getTmpVisitors() > 0) {

            $couple = (new CoupleChecker())->find($club, $this);

            if (sizeof($couple) > 0) {
                echo 'У нас есть пара: ' . $couple[0] . ' и ' . $couple[1] . "\n";

                $dancingStrategy = new MakeCoupleStrategy();

            } else $dancingStrategy = new NonMoveStrategy();

        } else if ($music->getGenre() == $this->_favoriteGenre) {

            $dancingStrategy = new ForeverAloneStrategy();

        } else $dancingStrategy = new NonMoveStrategy();

        $dancingStrategy->making();
    }
}