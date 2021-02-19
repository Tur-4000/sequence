<?php

namespace App\HtmlTags;

use function Php\Pairs\Data\Lists\l;
use function Php\Pairs\Data\Lists\head;
use function Php\Pairs\Data\Lists\tail;
use function Php\Pairs\Data\Lists\cons;
use function Php\Pairs\Data\Lists\reverse;
use function Php\Pairs\Data\Lists\isEmpty;
use function Php\Html\Tags\HtmlTags\getValue;
use function Php\Html\Tags\HtmlTags\is;
use function Php\Html\Tags\HtmlTags\map;

// BEGIN (write your solution here)
function filter($dom, callable $func)
{
    if (isEmpty($dom)) {
        return l();
    }
/* рекурсивный вариант
    $tag = head($dom);
    $rest = tail($dom);

    if ($func($tag)) {
        return cons($tag, filter($rest, $func));
    }

    return filter($rest, $func);
*/
/* итеративный вариант */

    $iter = function ($dom, $acc) use (&$iter, $func) {
        if (isEmpty($dom)) {
            return reverse($acc);
        }
        $node = head($dom);
        $rest = tail($dom);
        if ($func($node)) {
            return $iter($rest, cons($node, $acc));
        }
        return $iter(tail($dom), $acc);
    };

    return $iter($dom, l());
/*
 * решение учителя
$iter = function ($items, $acc) use (&$iter, $func) {
        if (isEmpty($items)) {
            return reverse($acc);
        }

        $item = head($items);
        $newAcc = $func($item) ? cons($item, $acc) : $acc;

        return $iter(tail($items), $newAcc);
    };

return $iter($elements, l());
*/
}

function quotes($dom)
{
    $cite = filter($dom, fn($tag) => is('blockquote', $tag));

    return map($cite, fn($tag) => getValue($tag));
}
// END

function removeHeaders($elements)
{
    if (isEmpty($elements)) {
        return l();
    }

    $element = head($elements);
    $tailElements = tail($elements);
    if (is('h1', $element)) {
        return removeHeaders($tailElements);
    }
    return cons($element, removeHeaders($tailElements));
}
