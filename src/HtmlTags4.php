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
    return null;
}

function emptyTagsCount(string $tagName, $html)
{
    return null;
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
