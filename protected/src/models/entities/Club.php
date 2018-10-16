<?php

namespace src\models\entities;

use Exception;

class Club
{
	private $_playlist;
	private $_visitors;
	private $_tmpVisitors = [];

    public function setPlaylist(Playlist $playlist)
	{
		$this->_playlist = $playlist;
	}

	public function setVisitors(Group $group)
	{
		$this->_visitors = $group;
	}

	public function getVisitors() : Group
    {
        return $this->_visitors;
    }

    public function getTmpVisitors()
    {
        return $this->_tmpVisitors;
    }

    public function setTmpVisitors($newTmpVisitors)
    {
        $this->_tmpVisitors = $newTmpVisitors;
    }

	public function playMusic()
	{
		if ($this->_playlist === null || sizeof($this->_playlist) == 0)
		    throw new Exception('Плейлист не создан - нечего проигрывать!');

        $playlist = $this->_playlist->get();

		foreach ($playlist as $music) {
		    echo 'Проигрывается музыка: ' . $music->getTitle() . ', жанр: ' . $music->getGenre() . "\n";
            $this->_notifyObservers($music);
        }
	}

	private function _notifyObservers(Music $music)
    {
        $visitors = $this->_visitors->get();

        if (sizeof($visitors) > 0) {
            $this->_tmpVisitors = $visitors;
            foreach ($visitors as $visitor) {
                $visitor->dance($this, $music);
            }
        }
    }
	
}