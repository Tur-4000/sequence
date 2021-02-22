<?php

namespace App\Select;

use function Php\Pairs\Data\Lists\l;
use function Php\Pairs\Data\Lists\cons as consList;
use function Php\Pairs\Data\Lists\isList;
use function Php\Pairs\Data\Lists\isEmpty;
use function Php\Pairs\Data\Lists\head;
use function Php\Pairs\Data\Lists\tail;
use function Php\Pairs\Data\Lists\concat;
use function Php\Pairs\Data\Lists\toString as listToString;
use function Php\Html\Tags\HtmlTags\is;
use function Php\Html\Tags\HtmlTags\hasChildren;
use function Php\Html\Tags\HtmlTags\children;
use function Php\Html\Tags\HtmlTags\filter;
use function Php\Html\Tags\HtmlTags\reduce;
use function Php\Html\Tags\HtmlTags\toString as htmlToString;

// BEGIN (write your solution here)
function select(string $tagName, $html)
{
    return reduce($html, function ($node, $acc) use ($tagName) {
        if (is($tagName, $node)) {
            return !hasChildren($node) ?
                concat($acc, l($node)) :
                concat(concat($acc, l($node)), select($tagName, children($node)));
        } else {
            return !hasChildren($node) ?
                                  $acc :
                                  concat($acc, select($tagName, children($node)));
        }
    }, l());
}
// END
