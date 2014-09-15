<?php
namespace Common;

class Common
{
    static public function getTargetOriginal($arrayList)
    {
        $arrayTarget = array();
        foreach($arrayList as $arrayLine){
            $arrayTarget[] = $arrayLine['original'];
        }
    
        return $arrayTarget;
    }
}

