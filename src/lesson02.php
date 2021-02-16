<?php

namespace App\Solution;

use function Php\Pairs\Data\Lists\l;
use function Php\Pairs\Data\Lists\cons;
use function Php\Pairs\Data\Lists\head;
use function Php\Pairs\Data\Lists\tail;
use function Php\Pairs\Data\Lists\isEmpty;
use function Php\Pairs\Data\Lists\toString as listToString;

// BEGIN (write your solution here)
function has($list, $value): bool
{
    if (isEmpty($list)) {
        return false;
    }

    return (head($list) === $value) ? true : has(tail($list), $value);
}

function reverse($list)
{
    if (isEmpty($list)) {
        return l();
    }

    $iter = function ($reversed, $lst) use (&$iter) {
        if (isEmpty($lst)) {
            return $reversed;
        }

        $head = head($lst);
        $tail = tail($lst);
        $newList = cons($head, $reversed);

        return $iter($newList, $tail);
    };

    $end = head($list);
    $tail = tail($list);
    $reversed = l($end);

    return $iter($reversed, $tail);
}

function concat($list1, $list2)
{
    \print_r(PHP_EOL . "-=START=-" . PHP_EOL);
    $newLst = trim(listToString($list1), '()') . ', ' . trim(listToString($list2), '()');
    \print_r($newLst);
    \print_r(PHP_EOL . "-==END==-" . PHP_EOL);
    return '(' . trim($newLst, ', ') . ')';
}
// END
