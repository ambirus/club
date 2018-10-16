<?php

namespace src\models\entities;

class Music
{
	private $_title;
	private $_genre;

	public function __construct($title = 'Неизвестен - Без названия', $genre = 'pop')
	{
		$this->_title = $title;
		$this->_genre = $genre;
	}

	public function getTitle() : string
	{
		return $this->_title;
	}

	public function getGenre() : string
	{
		return $this->_genre;
	}
}