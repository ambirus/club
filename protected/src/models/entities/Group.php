<?php

namespace src\models\entities;

use Exception;

class Group
{
    private $_list = [];

    public function addVisitor(Visitor $visitor)
    {
        $this->_list[] = $visitor;
    }

    public function deleteVisitor(Visitor $visitor)
    {
        if (sizeof($this->_list) == 0)
            throw new Exception('Нечего удалять - группа посетителей пуста!');

        foreach ($this->_list as $index => $item) {
            if ($item === $visitor) {
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