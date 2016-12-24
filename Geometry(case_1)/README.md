# Фигуры 
![N|Solid](http://www.imgzilla.ru/image.uploads/2016-12-24/original-30bd3d541846cfa60e42cdfbd632ddd7.png)
```sh
$figures = [
    ['type' => 'circle', 'params' => [
       'center'=>['x'=>100,'y'=>100],
       'radius'=>80,
       'points'=>40
    ]],
    ['type' => 'rectangle', 'params' =>[
        'center'=>['x'=>100,'y'=>100],
        'radius'=>80,
        'points'=>4
    ]],
    ['type' => 'rectangle', 'params' => [
        'center'=>['x'=>100,'y'=>100],
        'radius'=>80,
        'points'=>4,
        'angle'=>180
    ]],
    ['type' => 'some_name', 'params' => [
        'center'=>['x'=>100,'y'=>100],
        'radius'=>80,
        'points'=>5,
    ]],
    ['type' => 'some_name', 'params' => [
        'center'=>['x'=>100,'y'=>100],
        'radius'=>80,
        'points'=>5,
        'angle'=>45
    ]],
    ['type' => 'some_name', 'params' => [
        'center'=>['x'=>100,'y'=>100],
        'radius'=>30,
        'points'=>40
    ]],
];
```
![N|Solid](http://www.imgzilla.ru/image.uploads/2016-12-24/default-cc5a681b54880199cbc26eb4cbf36903.png)
```sh
$figures = [
    ['type' => 'ellipse', 'params' => [
        'center'=>['x'=>100,'y'=>100],
        'radius'=>80,
        'points'=>40,
        'x_res'=>1.1,
        'y_res'=>0.9
    ]],
    ['type' => 'ellipse', 'params' => [
        'center'=>['x'=>100,'y'=>100],
        'radius'=>80,
        'points'=>40,
        'x_res'=>1.2,
        'y_res'=>0.8
    ]],
    ['type' => 'test', 'params' => [
        'center'=>['x'=>100,'y'=>100],
        'radius'=>80,
        'points'=>6,
        'x_res'=>1.2,
        'y_res'=>0.8
    ]],
];
```
Данный модуль позволяет выводить в точечном виде любые равносторонние фигуры, элипсы, окружности. На вход может получать различный набор параметров.

  - Один метод на много случаев
  - Абсолютно чистый php,даже без использования image
  
### Алгоритм Брезенхе́ма  
![N|Solid](https://upload.wikimedia.org/wikipedia/commons/thumb/c/c2/LineBresenham.gif/336px-LineBresenham.gif)
Алгоритм Брезенхе́ма определяеткакие точки двумерного растра нужно закрасить, чтобы получить близкое приближение прямой линии между двумя заданными точками.
### Геометрическая основа
![N|Solid](http://youclever.org/website/youclever/var/custom/file/2014/06/152.png)
В основе всего кода лежит метод получение точек относительно центрального положения и использование угловой скорости(в нашем случае смещение координат по x и y). Зная координаты центральной точки мы можем получать координаты точек на окружности с любым интервалом(в нашем случае углом).

Для любой вписанной фигуры шаг угла будет составлять 360, поделеённое на количество углов:
> step = 360/angle_count

![N|Solid](https://ege-ok.ru/wp-content/uploads/2012/03/opisanokr1.jpeg)
Таким методом мы можем получить точки любой равносторонней фигуры, нам потребуется формула изменения координат на окружности:

> x = x0 + R * sin(angel)
y = y0 + R * sin(angel)

Если нам надо использовать эту формулу для эллипса, то надо дабавить коэффициэнты

> x = x0 + x_coeff * R * sin(angel)
y = y0 + y_coeff * R * sin(angel)

