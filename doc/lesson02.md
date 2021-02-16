Все создаваемые функции, в рамках этого задания, должны быть реализованы независимо друг от друга, то есть их нельзя использовать для реализации друг друга.

## src/lesson02.php

Реализуйте функцию `has()`, которая проверяет, является ли переданное значение элементом списка.

Реализуйте функцию `reverse()`, которая переворачивает список, используя итеративный процесс.

Реализуйте функцию `concat()`, которая соединяет два списка, используя рекурсивный процесс (попробуйте сначала представить, как работала бы функция `copy()`, которая принимает на вход список и возвращает его копию).

## Примеры

``` php
<?php
use function Php\Pairs\Data\Lists\l;

$numbers = l(3, 4, 5, 8);
$numbers2 = l(3, 2, 9);

has($numbers, 8); // true
has($numbers, 0); // false

concat($numbers, $numbers2); // (3, 4, 5, 8, 3, 2, 9)

reverse($numbers2); // (9, 2, 3)
```