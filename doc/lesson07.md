# src/HtmlTags5.php

Реализуйте функцию `extractHeaders()`, которая извлекает тексты всех заголовков `h2` из переданного HTML и возвращает HTML в котором каждый из этих текстов обернут в `p`.

Например такой HTML в строковом представлении `<h2>header1</h2><h2>header2</h2><p>content</p>` превратится в такой `<p>header1</p><p>header2</p>`.

## Примеры
```php
<?php
 
use function Php\Html\Tags\HtmlTags\make;
use function Php\Html\Tags\HtmlTags\append;
use function Php\Html\Tags\HtmlTags\node;
use function Php\Html\Tags\HtmlTags\reduce;
use function Php\Html\Tags\HtmlTags\toString as htmlToString;
 
$html1 = append(make(), node('h2', 'header1'));
$html2 = append($html1, node('h2', 'header2'));
$html3 = append($html2, node('p', 'content'));
// <h2>header1</h2><h2>header2</h2><p>content</p>
 
htmlToString(extractHeaders($html3));

// <p>header1</p><p>header2</p>
```

Реализуйте функцию `wordsCount()`, которая считает вхождения слова в определенный тег. Для подсчета слов в тексте одного тега воспользуйтесь функцией `substr_count()`.

## Примеры
```php
<?php
 
use function Php\Html\Tags\HtmlTags\make;
use function Php\Html\Tags\HtmlTags\append;
use function Php\Html\Tags\HtmlTags\node;
 
$html1 = append(make(), node('h2', 'header1 lisp'));
$html2 = append($html1, node('p', 'content'));
$html3 = append($html2, node('h2', 'lisp header2 lisp'));
$html4 = append($html3, node('p', 'content lisp'));
 

wordsCount('h2', 'lisp', $html4); // 3
```

## Подсказки

* Документация [substr_count()](https://www.php.net/manual/ru/function.substr-count.php)
* При необходимости вы можете самостоятельно импортировать функцию toString() из библиотеки hexlet/pairs-data и использовать её для отладки решений. Эта функция возвращает строковое представление списка
* При необходимости вы можете самостоятельно импортировать функцию toString() из библиотеки hexlet/html-tags и использовать её для отладки решений. Эта функция возвращает строковое представление html-списка
* Для разрешения противоречий в случае импорта нескольких функций с одинаковыми именами используйте псевдонимы (aliases)