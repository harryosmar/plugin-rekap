<?php

namespace PluginRekap\Libraries;

class Segments {

    private $segments = [];

    public function valid($string){
        $string = (string) $string;

        if(!$string){
            return false;
        }

        $segments = explode(' ', $string);

        foreach($segments as $segment){
            if($this->validateStringSegment($segment) === false){
                return false;
            }
        }

        return true;
    }

    /**
     * @return array exampe array(['left'=>'1234', ''right'=>'5.5.5'], ...)
     */
    public function getSegements(){
        return $this->segments;
    }

    /**
     * @param $segment example : 1234x5.5.5
     * @return bool
     */
    private function validateStringSegment($segment){
        if(preg_match('/([0-9]{2,4})x((\d)+(\.\d)?(\.\d)?)+/', $segment, $matches)){
            /** example 1234 */
            $left_segment = $matches[1];

            /** example 5.5.5 */
            $right_segment = $matches[2];

            $this->segments[] = [
                'left' => $left_segment,
                'right' => $right_segment
            ];

            return true;
        }

        return false;
    }

}