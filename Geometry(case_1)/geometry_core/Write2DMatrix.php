<?php

class Write2DMatrix
{
    private $col_w = 5;
    private $col_h = 3;

    private $x_length;
    private $y_length;

    private $fill_point = 'td_black';
    private $not_fill_point = 'td_white';

    public function Write2DMatrix($x_matrix_length,$y_matrix_length,$col_w,$col_h)
    {
      $this->x_length = $x_matrix_length;
      $this->y_length = $y_matrix_length;
      $this->col_w = $col_w;
      $this->col_h = $col_h;
    }

    public function setColor($fill,$nfill)
    {
        $this->fill_point = $fill;
        $this->not_fill_point = $nfill;
    }

    public function getPointsByObjects($objects)
    {
        //Получаем список точек по объектам
        $point_list =[];
        foreach($objects as $item)
        {
            $point_list = array_merge($point_list,$item->getPoints());
        }
        return $point_list;
    }

    public function writeMatrix($objects){
        $points = $this->getPointsByObjects($objects);
        echo '<table border="0" cellpadding="0" cellspacing="0">';
        for($y=0; $y < $this->y_length; $y++)
        {
            echo '<tr>';
            for($x=0; $x < $this->x_length; $x++)
            {
                $flag = 1;
                foreach($points as $elem)
                {
                    if($elem['x'] == $x && $elem['y'] == $y)
                    {
                        $flag = 0;
                        echo '<td class="' . $this->fill_point . '" width="' . $this->col_w . '" height="' . $this->col_h . '" ></td>';
                        break;
                    }
                }
                if($flag)
                {
                    echo '<td class="' . $this->not_fill_point . '" width="' . $this->col_w . '" height="' . $this->col_h . '" ></td>';
                }
            }
            echo '</tr>';
        }
        echo '</table>';
    }
}