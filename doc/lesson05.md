# src/HtmlTags.php

Реализуйте и функцию `reduce()` для библиотеки `html-tags`.

## Примеры
```php
<?php
 
use function Php\Html\Tags\HtmlTags\make;
use function Php\Html\Tags\HtmlTags\append;
use function Php\Html\Tags\HtmlTags\node;
 
$html1 = append(make(), node('h1', 'header1'));
$html2 = append($html1, node('h1', 'header2'));
$html3 = append($html2, node('p', 'content'));
 

reduce($html3, fn($element, $acc) => is('h1', $element) ? $acc + 1 : $acc, 0); // 2
```

Реализуйте функцию `emptyTagsCount()`, которая считает количество пустых тегов. Тип тега задается первым параметром функции.

## Примеры
```php
<?php
 
use function Php\Html\Tags\HtmlTags\make;
use function Php\Html\Tags\HtmlTags\append;
use function Php\Html\Tags\HtmlTags\node;
 
$html1 = make();
$html2 = append($html1, node('h1', 'scheme'));
$html3 = append($html2, node('p', 'is a lisp'));
$html4 = append($html3, node('blockquote', ''));
$html5 = append($html4, node('blockquote', ''));
$html6 = append($html5, node('blockquote', 'quote'));
 

emptyTagsCount('blockquote', html6); // 2
```

## Примечание

*    Функцию `headersCount()` можно использовать для наглядного сопоставления частного варианта свёртки с обобщённой реализацией операции отображения (собственно, `reduce()`).

## Подсказки

*    При необходимости вы можете самостоятельно импортировать функцию `toString()` из библиотеки `hexlet/pairs-data` и использовать её для отладки решений. Эта функция возвращает строковое представление списка
*    При необходимости вы можете самостоятельно импортировать функцию `toString()` из библиотеки `hexlet/html-tags` и использовать её для отладки решений. Эта функция возвращает строковое представление html-списка
*   Для разрешения противоречий в случае импорта нескольких функций с одинаковыми именами используйте псевдонимы (aliases)