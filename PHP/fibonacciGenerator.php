<?php
/**
 * @author Andrew S Erwin
 * @link https://github.com/erwininteractive
 *  
 *  Bubble sort is one of the simplest sorting algorithms. We simply swap adjaect elements if they are in the wrong order.
 *  That is, if the current value is greater the next, swap and then go to the next value.
 *  This has a pretty large big O complexity and is thus not great for larger datasets.
 */ 

foreach(loop(100, fib()) as $item) {
    print $item.',';
}

function loop($i, Generator $set) {
    while($i-- > 0 && $set->valid()) {
        yield $set->current();
        $set->next();
    }
}

/* Fibonacci generator */
function fib() {
    yield $i = 0;
    yield $j = 1;

    while(true) {
        yield $k = $i + $j;
        $i = $j;
        $j = $k;
    }
}

