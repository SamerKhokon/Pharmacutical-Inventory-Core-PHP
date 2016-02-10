<?php   $h = date('h')+6;
          
              if($h>24) {
			    $h = $h-24; 
			  }else{
			    $h=$h;
			  }     
echo $h.":".date("i:s");?>