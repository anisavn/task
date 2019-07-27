<?php 
function bilangan_prima($limit) 
{ 
        $prima = array(); $i=1; echo $i.' '; $i++; 
        do { 
            $prima[$i] = true; 
            $akarLimit = (int)sqrt($limit); $i++; 
            } 
            
        while($i <= $limit); $i=2; 
        do 
        { if ($prima[$i]) 
            { $j=$i*$i; 
                do 
                { 
                    $prima[$j] = false; $j+=$i; 
                }
                while($j<=$limit); 
            } 
            
            $i++; 
            
        } 
        
        while($i<=$akarLimit); 
        $i = 0; 
        foreach ($prima as $bilangan=>$status) 
        { 
            if($status) 
            { echo "$bilangan "; $i++; }
        } 
    
} 
        
        bilangan_prima(50); 
?>

