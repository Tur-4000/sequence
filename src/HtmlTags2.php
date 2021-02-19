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
}

function mirror()
{}
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
