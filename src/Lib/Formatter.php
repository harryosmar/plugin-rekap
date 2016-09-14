<?php

namespace PluginRekap\Libraries;

class Formatter {

    /**
     * @var Segments
     */
    private $segments;

    public function __construct(Segments $segments)
    {
        $this->segments = $segments;
    }

    public function format($string){
        if($this->segments->valid($string) === false){
            return null;
        }

        return $this->formatSegments($this->segments->getSegements());
    }

    private function formatSegments($segments){
        $result = [];

        foreach($segments as $segment){
            $this->formatSegment($segment, $result);
        }

        return $result;
    }

    private function formatSegment($segment, &$result){
        $left = $segment['left'];
        $right = $segment['right'];

        $right_arr = explode('.', $right);

        foreach($right_arr as $index=>$value){
            $substr_left = substr($left, $index);
            $result[] = sprintf('%d|%d', intval($substr_left), intval($value));
        }
    }

}