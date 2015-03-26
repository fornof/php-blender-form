<?php

// 2 inputs in a form 
// validate inputs 


function error($errstr) {
  echo "<b>Error:</b> $errstr";
}
//set_error_handler("error");


// gets an item from the GET REST postback, returns blank if not there
function get($item){
    if (isset($_GET[$item])) {
    return $_GET[$item];
    }else{
       return '';
    }
    
}
// prints out validated output
function get_validate($input){
 $item = get($input);
  if( validate_line($item)){
      echo $item;
      
  }
  else {
      echo '';
      error("$name must be less than 24 chars");
  }
    
}

function validate_line($line, $name="input"){
    // if length is greater than 24 characters, output error
  
        if (preg_match('^(.{1,24})$',$line)){
            
            return false;
        }
        
        else{ return true; }
      
}


function begin(){
   
    $_GET  = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
    $issubmit = get('send');
        
    // if( $issubmit=== '')
    // {
        
    //   return ; 
        
    // }

    $line= get('line1');
    $line2 = get('line2');

    if( validate_line( $line1,'line1'))
    {
        echo "VALID! <br>";
        
    }
    else { 
         echo "INVALID!<br>";
        
    }

}

echo "begin<br>";
begin();
echo "end";
// parse inputs 
// send out input after done.


?>
<html>
    
<head>
    
    <style type="text/css">

  input:required:invalid, input:focus:invalid {
    background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAeVJREFUeNqkU01oE1EQ/mazSTdRmqSxLVSJVKU9RYoHD8WfHr16kh5EFA8eSy6hXrwUPBSKZ6E9V1CU4tGf0DZWDEQrGkhprRDbCvlpavan3ezu+LLSUnADLZnHwHvzmJlvvpkhZkY7IqFNaTuAfPhhP/8Uo87SGSaDsP27hgYM/lUpy6lHdqsAtM+BPfvqKp3ufYKwcgmWCug6oKmrrG3PoaqngWjdd/922hOBs5C/jJA6x7AiUt8VYVUAVQXXShfIqCYRMZO8/N1N+B8H1sOUwivpSUSVCJ2MAjtVwBAIdv+AQkHQqbOgc+fBvorjyQENDcch16/BtkQdAlC4E6jrYHGgGU18Io3gmhzJuwub6/fQJYNi/YBpCifhbDaAPXFvCBVxXbvfbNGFeN8DkjogWAd8DljV3KRutcEAeHMN/HXZ4p9bhncJHCyhNx52R0Kv/XNuQvYBnM+CP7xddXL5KaJw0TMAF8qjnMvegeK/SLHubhpKDKIrJDlvXoMX3y9xcSMZyBQ+tpyk5hzsa2Ns7LGdfWdbL6fZvHn92d7dgROH/730YBLtiZmEdGPkFnhX4kxmjVe2xgPfCtrRd6GHRtEh9zsL8xVe+pwSzj+OtwvletZZ/wLeKD71L+ZeHHWZ/gowABkp7AwwnEjFAAAAAElFTkSuQmCC);
    background-position: right top;
    background-repeat: no-repeat;
    -moz-box-shadow: none;
  }
  input:required:valid {
    background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAepJREFUeNrEk79PFEEUx9/uDDd7v/AAQQnEQokmJCRGwc7/QeM/YGVxsZJQYI/EhCChICYmUJigNBSGzobQaI5SaYRw6imne0d2D/bYmZ3dGd+YQKEHYiyc5GUyb3Y+77vfeWNpreFfhvXfAWAAJtbKi7dff1rWK9vPHx3mThP2Iaipk5EzTg8Qmru38H7izmkFHAF4WH1R52654PR0Oamzj2dKxYt/Bbg1OPZuY3d9aU82VGem/5LtnJscLxWzfzRxaWNqWJP0XUadIbSzu5DuvUJpzq7sfYBKsP1GJeLB+PWpt8cCXm4+2+zLXx4guKiLXWA2Nc5ChOuacMEPv20FkT+dIawyenVi5VcAbcigWzXLeNiDRCdwId0LFm5IUMBIBgrp8wOEsFlfeCGm23/zoBZWn9a4C314A1nCoM1OAVccuGyCkPs/P+pIdVIOkG9pIh6YlyqCrwhRKD3GygK9PUBImIQQxRi4b2O+JcCLg8+e8NZiLVEygwCrWpYF0jQJziYU/ho2TUuCPTn8hHcQNuZy1/94sAMOzQHDeqaij7Cd8Dt8CatGhX3iWxgtFW/m29pnUjR7TSQcRCIAVW1FSr6KAVYdi+5Pj8yunviYHq7f72po3Y9dbi7CxzDO1+duzCXH9cEPAQYAhJELY/AqBtwAAAAASUVORK5CYII=);
    background-position: right top;
    background-repeat: no-repeat;
  }

</style>
    
</head>
<body>
<br>
<br>
    <h1>THE FORM!  </h1>
<form id="lineForm" action="" method="GET" >
    <em>Put what you want to say on line1 and line2</em><br>
    
    <label>Line1 (24 chars):</label><br>
        <input type="text" name=line1 
        value='<?php get_validate('line1'); ?>'
            required pattern=".{1,24}" title="must be 1-24 characters">
        <br>
   <label> Line2 :</label><br>
    <input type="text" name=line2 value='<?php get_validate('line2'); ?>' 
            pattern=".{1,24}" required title="must be 1-24 characters"> 
            
    <button type="submit" name="send" value="send"> Send the pic!</button>
    
</form>
<script>
$("#lineForm").validate();
</script>

</body>
</html>