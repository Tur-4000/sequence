<?php

namespace App\HtmlTags;

use function Php\Html\Tags\HtmlTags\node;
use function Php\Html\Tags\HtmlTags\getValue;
use function Php\Html\Tags\HtmlTags\is;
use function Php\Html\Tags\HtmlTags\map;
use function Php\Html\Tags\HtmlTags\filter;
use function Php\Html\Tags\HtmlTags\reduce;

// BEGIN (write your solution here)
function extractHeaders($html)
{
    $headers = filter($html, fn($node) => is('h2', $node));

    return map($headers, fn($node) => node('p', getValue($node)));
}

function wordsCount(string $tagName, string $word, $html): int
{
    $filtered = filter($html, fn($node) => is($tagName, $node));

    return reduce(
        $filtered,
        fn($node, $acc) => $acc + \substr_count(getValue($node), $word),
        0
    );
/*
 * решение учителя
$filtered = filter($elements, fn($element) => is($tagName, $element));
$values = map($filtered, fn($element) => getValue($element));
return reduce($values, fn($text, $acc) => substr_count($text, $word) + $acc, 0);
*/
}
// END
