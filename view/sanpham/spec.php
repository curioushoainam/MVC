<?php 

$detail = explode('>>>|', $noi_dung_chi_tiet);
// echo'["noi_dung_chi_tiet"] => ';
// viewArr($detail);exit();
$nd = array();
$i = 0;
if(count($detail) > 1){
    foreach($detail as $item){
        if(isset($item) && $item){
            $groups = explode('|||', rtrim($item,'|||'));
            $j = 0;
            foreach($groups as $gr){
                $nd[$i][$j] = explode('||', $gr); 
                $j += 1;
            }
             $i += 1;
            
        }        
    }
}

// echo'nd => ';
// viewArr($nd); exit();
$count = count($nd);
$mid = floor($count/2);
?>



<div>
    <div class="col-md-6">
        <?php 
        for ($n=0; $n<$mid; $n++){
            $item = $nd[$n];
            $no = count( $item);
        ?>
        <div>
            <h5><b><?= $item[0][1] ?></b></h5>
            <table class="table">
                <tbody>
                <?php 
                for ($i=1;$i<$no;$i++ ){                    
                ?>
                <tr>
                    <td class="leftCol success col-sm-5" style="font-size: 14px"><?= $item[$i][1] ?></td>
                    <td class="rightCol"><?= $item[$i][2] ?></td>
                </tr> 
                <?php 
                   
                }  
                ?>              
                </tbody>
            </table>            
        </div>
        <?php 
        }       
         ?>  
    </div>

    <div class="col-md-6">
        <?php 
        for ($n=$mid; $n<$count; $n++){
            $item = $nd[$n];
            $no = count( $item);
        ?>
        <div>
            <h5><b><?= $item[0][1] ?></b></h5>
            <table class="table">
                <tbody>
                <?php 
                for ($i=1;$i<$no;$i++ ){                    
                ?>
                <tr>
                    <td class="leftCol success col-sm-5" style="font-size: 14px"><?= $item[$i][1] ?></td>
                    <td class="rightCol"><?= $item[$i][2] ?></td>
                </tr> 
                <?php 
                   
                }  
                ?>              
                </tbody>
            </table>            
        </div>
        <?php 
        }       
         ?>
    </div>
</div>

