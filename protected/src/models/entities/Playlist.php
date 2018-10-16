<?php

namespace src\models\entities;

use Exception;

class Playlist
{
    private $_list = [];

	public function addMusic(Music $music)
	{
		$this->_list[] = $music;
	}
	
	public function deleteMusic(Music $music)
	{
		if (sizeof($this->_list) == 0)
		    throw new Exception('Нечего удалять - плейлист пуст!');

		foreach ($this->_list as $index => $item) {
		    if ($item === $music) {
		        unset($this->_list[$index]);
		        break;
            }
        }
	}

	public function get() : array
    {
        return $this->_list;
    }
}