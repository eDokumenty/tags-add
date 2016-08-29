<?php

/**
 * 
 * @param string $image path to file
 * @param string $mime
 * @return string IMAGE URI DATABASE64
 */
function getDataURI($image, $mime = '') {
    return 'data: '.(function_exists('mime_content_type') ? mime_content_type($image) : $mime).';base64,'.base64_encode(file_get_contents($image));
}

function writeHeadlines (){
    /*$i = 0;
    foreach( $data as $row ){
        foreach ( $row as $k => $v ){
            if( $i < 1 ){
                
            }
        }
        $i++;
    }*/
    echo '<th>sada</th><th>sad</th>';
}