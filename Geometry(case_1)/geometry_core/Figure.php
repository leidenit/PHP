<?php

class Figure
{
    private $params;
    public $type;
    private $points = [];

    public function Figure($type,$params)
    {
        $this->params=$params;
        $this->type=$type;

        //Основопологающик точки(углы для фигуры)
        $orientir = GeometryMath::writeRawPoointList(
            array_key_exists('center',$this->params) ? $this->params['center']:['x'=>0,'y'=>0],
            array_key_exists('radius',$this->params) ? $this->params['radius']:1,
            array_key_exists('points',$this->params) ? $this->params['points']:1,
            array_key_exists('angle',$this->params) ? $this->params['angle']:0,
            array_key_exists('x_res',$this->params) ? $this->params['x_res']:1,
            array_key_exists('y_res',$this->params) ? $this->params['y_res']:1
        );

        //Добавление точек соединяющих линий
        for($i=1; $i<count($orientir)-1; $i++)
        {
            $this->points = array_merge($this->points,GeometryMath::line($orientir[$i],$orientir[$i+1]));
        }
        $this->points = array_merge($this->points,GeometryMath::line(end($orientir),$orientir[1]));
    }

    public function getPoints()
    {
        return $this->points;
    }
}