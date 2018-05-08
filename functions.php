<?php
function findAndCompare($url1,$url2){
   
    $anchors1 = get_anchors_from_url($url1);
    $anchors2 = get_anchors_from_url($url2);
    $arr = get_arrays_from_anchors($anchors1,$anchors2);
    return $arr;
}

function download_to_csv($input_array, $output_file_name, $delimiter)
    {
        $temp_memory = fopen('php://memory', 'w');
        // loop through the array
        foreach ($input_array as $line) {
            // use the default csv handler
            fputcsv($temp_memory, $line, $delimiter);
        }

        fseek($temp_memory, 0);
        ob_clean();
        // modify the header to be CSV format
        header('Content-Type: application/csv');
        header('Content-Disposition: attachement; filename="' . $output_file_name . '";');
        // output the file to be downloaded
        fpassthru($temp_memory);
        fclose($temp_memory);
    }
function get_anchors_from_url($url){
    libxml_use_internal_errors(true);    
    $dom = new DOMDocument();
    $dom->loadHTMLFile($url);
    $arr = array();
    // Iterate over all the <a> tags
    foreach($dom->getElementsByTagName('a') as $link) {
        // insert the <a href> in arr1
        array_push($arr,$link->getAttribute('href'));
    }
    return $arr;
}

function get_arrays_from_anchors($anchors1,$anchors2){
    $arr = array();

    for($i=0;$i<count($anchors1);$i++){
        $max_elem = $anchors2[0];
        $max = 0;
        for($j=0;$j<count($anchors1);$j++) {
            similar_text($anchors1[$i],$anchors2[$j],$perc);
            if($perc>$max){
                $max = $perc;
                $max_elem = $anchors2[$j];
            }
        }
        $tmp = array($anchors1[$i],$max_elem,$max);
        array_push($arr,$tmp);
    }
    return $arr;
}