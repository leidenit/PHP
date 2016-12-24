<style>
    .td_black{background-color: black;}
    .td_white{background-color: white;}
</style>
<?php
    require('geometry_core/GeometryMath.php');
    require('geometry_core/Write2DMatrix.php');
    require('geometry_core/Figure.php');

    //Фигуры
    $figures = [
        ['type' => 'circle', 'params' => ['center'=>['x'=>100,'y'=>100],'radius'=>80,'points'=>40]],
        ['type' => 'ellipse', 'params' => ['center'=>['x'=>100,'y'=>100],'radius'=>80,'points'=>40,'x_res'=>1.1,'y_res'=>0.9]],
        ['type' => 'ellipse', 'params' => ['center'=>['x'=>100,'y'=>100],'radius'=>80,'points'=>40,'x_res'=>1.2,'y_res'=>0.8]],
        ['type' => 'rectangle', 'params' => ['center'=>['x'=>100,'y'=>100],'radius'=>70,'points'=>5]],
        ['type' => 'rectangle1', 'params' => ['center'=>['x'=>100,'y'=>100],'radius'=>70,'points'=>5,'angle'=>45]],
        ['type' => 'circle', 'params' => ['center'=>['x'=>100,'y'=>100],'radius'=>30,'points'=>40]],
        ['type' => 'dadec', 'params' => ['center'=>['x'=>100,'y'=>100],'radius'=>30,'points'=>8]],
        ['type' => 'test', 'params' => ['center'=>['x'=>100,'y'=>100],'radius'=>20,'points'=>6]],
        ['type' => 'circle', 'params' => ['center'=>['x'=>100,'y'=>100],'radius'=>10,'points'=>10]],
    ];


    //Создаём объекты
    foreach($figures as $item)
    {
        $objects_f[] = new Figure($item['type'],$item['params']);
    }

    //Создаём матрицу
    $main_fiels = new Write2DMatrix(300,300,3,3);

    //Рисуем матрицу с набором фигур
    $main_fiels->writeMatrix($objects_f);

    //Выводим обьъекты
    echo '<pre>';
    print_r($figures);
    echo '</pre>';
?>