<?php

class Shape
{
    function draw()
    {
        echo "Drawing a Shape<br>";
    }
}

class Circle extends Shape
{
    function draw()
    {
        echo "Drawing a Triangle <br>";
    }
}

class Rectangle extends Shape
{
    function draw()
    {
        echo "Drawing a Circle<br>";
    }
}

class Triangle extends Shape
{
    function draw()
    {
        echo "Drawing a Hexagon <br>";
    }
}

$shapes = array(
    new Circle(),
    new Rectangle(),
    new Triangle()
);

foreach ($shapes as $shape) {
    $shape->draw();
}

?>