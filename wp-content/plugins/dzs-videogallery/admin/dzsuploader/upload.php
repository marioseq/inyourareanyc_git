<?php

/*
 * DZS Upload
 * version: 1.0
 * author: digitalzoomstudio
 * website: http://digitalzoomstudio.net
 *
 * Dual licensed under the MIT and GPL licenses:
 *   http://www.opensource.org/licenses/mit-license.php
 *   http://www.gnu.org/licenses/gpl.html
 */

$disallowed_filetypes = array('.php', '.exe');
$upload_dir = 'upload';
function get_theheaders() {
    //$headers = array();
    //print_r($_SERVER);
    return $_SERVER;
}  




if(isset($HTTP_POST_FILES['file_field']['tmp_name'])){
    $file_name =  $HTTP_POST_FILES['file_field']['name'];
    $file_name = str_replace(" ","_",$file_name); // strip spaces
    $path= $upload_dir . "/".$file_name;
        //print_r($HTTP_POST_FILES);


    $sw=false;
    
    foreach($disallowed_filetypes as $dft){
        $pos = strpos($file_name, $dft);
        if($pos!==false){
            $sw=true;
        }
    }
        
    if($sw==true) {  
        die('<div class="error">invalid extension - disallowed_filetypes</div><script>hideFeedbacksCall()</script>');  
    }
    if(!is_writable($upload_dir)) {
        die('<div class="error">dir not writable - check permissions</div><script>hideFeedbacksCall()</script>');
    }




    if(copy($HTTP_POST_FILES['file_field']['tmp_name'], $path)){
    echo '<div class="success">file uploaded</div><script>top.hideFeedbacksCall();</script>';
    }else{
    echo '<div class="error">file could not be uploaded</div><script>window.hideFeedbacksCall()</script>';
    }

}else{
$headers = get_theheaders();
//print_r($headers);
$file_name = $headers['HTTP_X_FILE_NAME'];
    $file_name = str_replace(" ","_",$file_name); // strip spaces
$target=$upload_dir . "/".$file_name;


    $sw=false;
    
    foreach($disallowed_filetypes as $dft){
        $pos = strpos($file_name, $dft);
        if($pos!==false){
            $sw=true;
        }
    }
        
    if($sw==true) {  
        die('<div class="error">invalid extension - disallowed_filetypes</div>');  
    }
    if(!is_writable($upload_dir)) {
        die('<div class="error">dir not writable - check permissions</div>');
    }


//echo $target;
		$content = file_get_contents("php://input");
                
        if(file_put_contents($target,$content)){
            echo 'mdap';
        }else{
            echo 'not';
        }



}