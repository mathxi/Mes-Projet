<!DOCTYPE html>
<?php
    $date=getdate() ;   
    var_dump($date);
    
    $datetime= $date['year'].'-'.$date['mon'].'-'.$date['mday'].' '.$date['hours'].':'.$date['minutes'].':'.$date['seconds']; //.':0000'
    echo $datetime;
    
 ?>      
    </body>
</html>
