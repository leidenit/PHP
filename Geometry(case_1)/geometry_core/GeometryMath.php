<?php

class GeometryMath
{
    public static function circleMove($radius,$angle,$point,$x_resize,$y_resize){
        //Двигаем в соответствии с угловой скоростью
        $x_point = round($point['x'] + $x_resize*$radius*sin(deg2rad($angle)), 0);
        $y_point = round($point['y'] + $y_resize*$radius*cos(deg2rad($angle)), 0);
        return ['x'=>$x_point, 'y'=>$y_point];
    }

    public static function writeRawPoointList($center,$rad,$num_point,$start_angle,$x_resize,$y_resize)
    {
        //Получаем основные точки(углы)
        $angle = 360/($num_point-1);
        $sum_angel = $start_angle;
        $first_point = ['x'=>$center['x'],'y'=> $center['y']];
        $points_mass = [$first_point];
        for($i = 0; $i< $num_point-1;$i++)
        {
            $points_mass[] = GeometryMath::circleMove($rad,$sum_angel,$first_point,$x_resize,$y_resize);
            $sum_angel+=$angle;
        }

        return $points_mass;
    }

    public static function line($point_1,$point_2){
        //Получаем оптимальную линию между двумя точками
        $points_mass=[];
        $x0 = $point_1['x'];
        $x1 = $point_2['x'];
        $y0 = $point_1['y'];
        $y1 = $point_2['y'];
        $dx = abs($x1-$x0);
        $dy = abs($y1-$y0);
        if($x0 < $x1){$sx=1;}else{$sx=-1;}
        if($y0 < $y1){$sy=1;}else{$sy=-1;}
        $err = $dx-$dy;

        while(true){
            $points_mass[] = ['x'=>$x0,'y'=>$y0];
            if (($x0==$x1) && ($y0==$y1)){ break;}
            $e2 = 2*$err;
            if ($e2 > -$dy){ $err -= $dy; $x0  += $sx; }
            if ($e2 < $dx){ $err += $dx; $y0  += $sy; }
        }
        return $points_mass;
    }
}