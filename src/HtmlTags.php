<?php

/**
 * lesson 3 -- HtmlTags
 */

namespace App\HtmlTags;

use function Php\Pairs\Pairs\cons;
use function Php\Pairs\Pairs\car;
use function Php\Pairs\Pairs\cdr;
use function Php\Pairs\Pairs\toString as pairToString;
use function Php\Pairs\Data\Lists\l;
use function Php\Pairs\Data\Lists\head;
use function Php\Pairs\Data\Lists\tail;
use function Php\Pairs\Data\Lists\isEmpty;
use function Php\Pairs\Data\Lists\cons as consList;
use function Php\Pairs\Data\Lists\toString as listToString;

function make()
{
    return l();
}
// BEGIN (write your solution here)
function node(string $tagName, $body)
{
    return cons($tagName, $body);
}

function getName($node): string
{
    return car($node);
}

function getValue($node)
{
    return cdr($node);
}

function append($dom, $node)
{
    return cons($node, $dom);
/* решение учителя
    return consList($element, $dom);
*/
}

function toString($dom): string
{
    if (isEmpty($dom)) {
        return '';
    }

    $iter = function ($dom, $html = '') use (&$iter) {
        if (isEmpty($dom)) {
            return $html;
        }
        $node = head($dom);
        $rest = tail($dom);
        $tag = getName($node);
        $body = getValue($node);
        $newHtml = "<{$tag}>{$body}</{$tag}>{$html}";
        return $iter($rest, $newHtml);
    };

    return $iter($dom);
/* решение учителя
    if (isEmpty($html)) {
        return '';
    }

    $element = head($html);
    $tag = getName($element);
    $value = getValue($element);
    $restOfHtml = toString(tail($html));

    return "{$restOfHtml}<{$tag}>{$value}</{$tag}>";
*/
}
// END
