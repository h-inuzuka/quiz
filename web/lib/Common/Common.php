<?php
namespace Common;

class Common
{
    static public function getTargetOriginal($arrayList, $targetCol)
    {
        $arrayTarget = array();
        foreach($arrayList as $arrayLine){
            $arrayTarget[] = $arrayLine[$targetCol];
        }
    
        return $arrayTarget;
    }
}

