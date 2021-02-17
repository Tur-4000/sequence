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
    if (isEmpty($list1)) {
        return $list2;
    }
    if (isEmpty($list2)) {
        return $list1;
    }
/* Так тоже работает
    $coll1 = explode(', ', trim(listToString($list1), '()'));
*/

    $head = head($list1);
    $tail = tail($list1);
    $coll1[] = $head;
    while (!isEmpty($tail)) {
        $head = head($tail);
        $tail = tail($tail);
        $coll1[] = $head;
    }
    $arr1 = array_reverse($coll1);

    $result = array_reduce(
        $arr1,
        fn($acc, $item) => cons($item, $acc),
        $acc = $list2
    );

    return $result;

    /* Шутка, но тесты проходит :-)
    $newLst = trim(listToString($list1), '()') . ', ' . trim(listToString($list2), '()');
    return '(' . trim($newLst, ', ') . ')';
    */
}
// END
