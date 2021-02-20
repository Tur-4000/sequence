<?php

namespace App\HtmlTags;

use function Php\Pairs\Data\Lists\head;
use function Php\Pairs\Data\Lists\tail;
use function Php\Pairs\Data\Lists\isEmpty;
use function Php\Html\Tags\HtmlTags\getValue;
use function Php\Html\Tags\HtmlTags\is;

// BEGIN (write your solution here)
function reduce($html, callable $func, $acc)
{
    $iter = function ($dom, $acc) use (&$iter, $func) {
        if (isEmpty($dom)) {
            return $acc;
        }

        $node = head($dom);
        $newAcc = $func($node, $acc);
        return $iter(tail($dom), $newAcc);
    };

    return $iter($html, $acc);

/*
 * решение учителя
if (isEmpty($elements)) {
        return $acc;
    }

return reduce(tail($elements), $func, $func(head($elements), $acc));
*/
}

function emptyTagsCount(string $tagName, $html)
{
    return reduce($html, function ($tag, $acc) use ($tagName) {
        return (is($tagName, $tag) && getValue($tag) === '') ? $acc + 1 : $acc;
    }, 0);

/*
 * решение учителя
$predicate = function ($element) use ($tagName) {
        return is($tagName, $element) && getValue($element) === '';
    };

return reduce($elements, fn($element, $acc) => $predicate($element) ? $acc + 1 : $acc, 0);
*/
}
// END

function headersCount($tagName, $elements)
{
    $iter = function ($items, $acc) use (&$iter, $tagName) {
        if (isEmpty($items)) {
            return $acc;
        }

        $item = head($items);
        $newAcc = is($tagName, $item) ? $acc + 1 : $acc;
        return $iter(tail($items), $newAcc);
    };

    return $iter($elements, 0);
}
