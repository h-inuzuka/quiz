<?php
namespace Common;

class Common
{

    static public function getTargetColumn($arrayList, $targetColumn)
    {
        $arrayTarget = array();
        foreach ($arrayList as $arrayLine) {
            array_push($arrayTarget, $arrayLine[$targetColumn]);
        }
        
        return $arrayTarget;
    }
}

