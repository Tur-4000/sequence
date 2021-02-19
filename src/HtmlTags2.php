<?php

namespace App\HtmlTags;

use function Php\Pairs\Data\Lists\l;
use function Php\Pairs\Data\Lists\head;
use function Php\Pairs\Data\Lists\tail;
use function Php\Pairs\Data\Lists\cons;
use function Php\Pairs\Data\Lists\reverse;
use function Php\Pairs\Data\Lists\isEmpty;
use function Php\Html\Tags\HtmlTags\getName;
use function Php\Html\Tags\HtmlTags\getValue;
use function Php\Html\Tags\HtmlTags\node;
use function Php\Html\Tags\HtmlTags\is;

// BEGIN (write your solution here)
function map($dom, callable $func)
{
    if (isEmpty($dom)) {
        return l();
    }

    $newNode = $func(head($dom));

    return cons($newNode, map(tail($dom), $func));
/*
 * решение учителя
 * Итеративный процесс (рекурсивно)
function map($elements, callable $func)
{
    $iter = function ($items, $acc) use (&$iter, $func) {
        if (isEmpty($items)) {
            return reverse($acc);
        }

        return $iter(tail($items), cons($func(head($items)), $acc));
    };

    return $iter($elements, l());
}
*/
}

function mirror($dom)
{
    return map($dom, function ($node) {
        $body = getValue($node);
        $mirroredBody = strrev($body);
        return node(getName($node), $mirroredBody);
    });
}
// END

function b2p($elements)
{
    if (isEmpty($elements)) {
        return l();
    }

    $element = head($elements);
    if (is('blockquote', $element)) {
        $newElement = node('p', getValue($element));
    } else {
        $newElement = $element;
    }

    return cons($newElement, b2p(tail($elements)));
}
