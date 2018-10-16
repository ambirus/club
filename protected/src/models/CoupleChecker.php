<?php

namespace src\models;

use src\models\entities\Club;
use src\models\entities\Visitor;

class CoupleChecker
{
    public function find(Club $club, Visitor $visitor)
    {
        $visitors = $club->getTmpVisitors();

        foreach ($visitors as $k => $anotherVisitor) {

            if ($visitor->getGender() != $anotherVisitor->getGender()) {
                unset($visitors[$k]);
                $club->setTmpVisitors($visitors);

                return [
                    0 => $visitor->getName(),
                    1 => $anotherVisitor->getName()
                ];
            }
        }

        return [];
    }
}