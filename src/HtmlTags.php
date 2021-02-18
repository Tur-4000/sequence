<?php

/* lesson 3 */
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
function node($name, $value)
{
    return null;
}

function getName($node)
{
    return null;
}

function getValue($node)
{
    return null;
}

function append($dom, $node)
{
    return $dom;
}

function toString($dom)
{
    return $dom;
}
// END
