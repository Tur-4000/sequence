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
    // if (isEmpty($list)) {
    //     throw new Exception('Передан пустой список!');
    // }

//     $iter = function ($list) {
//         return isEmpty($list) ? $list : l(head($list));
//     };

//     $tail = tail($list);


//     return cons($iter($tail), head($list));
}

function concat($list1, $list2)
{
    return null;
}
// END
