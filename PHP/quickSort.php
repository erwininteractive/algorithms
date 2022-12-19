<?php
/**
 * @author Andrew S Erwin
 * @link https://gitlab.com/andrewthecoder
 *  
 * This is actually not, technically speaking a quick sort function. it is a "divide and conquer" hybrid of quick sort and
 * merge sort.
 */

$array = [51158,1856,8459,67957,59748,58213,90876,39621,66570,64204,79935,27892,47615,94706,34201,74474,63968,4337,43688,42685,31577,5239,25385,56301,94083,23232,67025,44044,74813,34671,90235,65764,49709,12440,21165,20620,38265,12973,25236,93144,13720,4204,77026,42348,19756,97222,78828,73437,48208,69858,19713,29411,49809,66174,5257,43340,40565,9592,52328,16677,38386,55416,99519,13732,84076,52905,47662,31805,46184,2811,35374,50800,53635,51886,49052,75197,3720,75045,28309,63771,71526,16122,36625,44654,86814,98845,44637,54955,24714,81960,78095,49048,99711,272,45755,31919,8181,1392,15352,82656,27760,18362,43780,50209,51433,2847,62310,87450,22874,40789,56841,52928,5523,76474,8935,63245,16387,21746,47596,84402,49168,58223,26993,55908,92837,64208,86309,30819,83638,9508,44628,10786,68125,14123,70474,50596,44518,74872,61968,36828,17860,4605,68756,86070,52068,51830,56992,45799,42422,68514,92559,40206,31263,71774,14202,94807,25774,15003,54211,18708,32074,43836,48964,40742,26281,67338,75786,34925,34649,45519,72472,80188,40858,83246,92215,66178,67452,86198,82300,45894,97156,73907,31159,7018,55549,35245,68975,88246,14098,59973,7762,40459,86358,63178,47489,55515,79488,46528,99272,10867,75190,56963,5520,56494,42310,40171,78105,29724,30110,28493,36141,22479,85799,70466,92106,16868,57402,4813,47432,24689,78533,97577,32178,30258,82785,56063,76277,96407,77849,1807,45344,30298,18158,49935,90728,22192,36852,33982,66206,30948,40372,33446,99156,28651,61591,79028,1689,94257,32158,11122,81097,57981,26277,7515,7873,8350,28229,24105,76818,86897,18456,29373,7853,24932,93070,4696,63015,9358,28302,3938,11754,33679,18492,91503,63395,12029,23954,27230,58336,16544,23606,61349,37348,78629,96145,57954,32392,76201,54616,59992,5676,97799,47910,98758,75043,72849,6466,68831,2246,69091,22296,6506,93729,86968,39583,46186,96782,19074,46574,46704,99211,55295,33963,77977,86805,72686];

print implode(',', quickSort($array));
 
/** @param array $input array to be sorted */
function quickSort(array $input)
{
    $lt = [];
    $gt = [];

   /* preserve indexes */
    $key = key($input);

    /* take first value in array as pivot */
    $shift = array_shift($input);

    foreach($input as $value)
    {
        /* split values into 2 arrays less than or greater than the current value */
        $value <= $shift ? $lt[] = $value : $gt[] = $value;
    }

    /* merge the 2 arrays and run again if there are any values left */
    return array_merge(quickSort($lt), [$key => $shift], quickSort($gt));
}
