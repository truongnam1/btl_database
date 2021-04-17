<?php
    $subsetSum = array();

    function subsetSum($array, $n, $t) {
        if($t==0) {
            return 1;
        } 
        if($t<0 || $n==-1) {
            unset($GLOBALS['subsetSum'][count($GLOBALS['subsetSum'])-1]);
            return 0;
        }
        if(subsetSum($array, $n-1, $t-$array[$n])==1) {
            //echo $array[$n] . ' ';
            $GLOBALS['subsetSum'][] = $array[$n];
            return 1;
        }
        if(subsetSum($array,$n-1,$t)==1)
            return 1;
        return 0;
    }

    function findIDban($idban_available,$amountPeople){
        $lish_chair = array();
        foreach($idban_available as $index => $value){
            $lish_chair[] = $value;
        };

        //so ghe con lai
        $tong_so_luong_ghe = 0;
        for($i=0 ; $i<count($lish_chair) ; $i++) {
            $tong_so_luong_ghe += $lish_chair[$i];
        }

        //tim so ghe thich hop
        while(!subsetSum($lish_chair, count($lish_chair)-1, $amountPeople)){
            $GLOBALS['subsetSum'] = array();
            if($amountPeople < $tong_so_luong_ghe) {
                $amountPeople++;
            } else {
                break;
            }
        }


        if(count($GLOBALS['subsetSum']) == 0) {
            return array();
        } else {
            $result = array();
            foreach($GLOBALS['subsetSum'] as $value1) {
                foreach($idban_available as $key => $value2) {
                    if($value1 == $value2) {
                        $result[] = $key;
                        goto out_loop;
                    }
                }
                out_loop:;
            }
            return $result;
        }
    }
    // $array = array(1,2,3,4,5,6,7,8,9,10);
    // subsetSum($array,9,20);
    // print_r($subsetSum);
?>