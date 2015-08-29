<?php
$allotment_id = $this->uri->segment(3,0);
$active_ppa = $this->session->userdata('active_ppa');
?>

                            <?php $rba_ppa = $this->budget->get_ba_ppas($allotment_id);
                            $ppa = 0;
                            foreach($rba_ppa->result() as $ba_ppa){ ?>
                           <? $arppa[$ppa] = $ba_ppa->ppa;?>
                            <? //"test[$ppa]"."<br />";?>
                                                               
                            <?php $rba_ppa_rc = $this->budget->get_ba_ppa_rcs($ba_ppa->idba_ppa);
                            $rc = 0;
                            foreach($rba_ppa_rc->result() as $ba_ppa_rc){ ?>
                           <? $arrc[$rc] = $ba_ppa_rc->responsibility_center;?>
                                <? //"test[$ppa][$rc]"."<br />";?>                                
                            <?php $rba_rc_activity = $this->budget->get_ba_rc_activities($ba_ppa_rc->idba_ppa_rc);
                            $act = 0;
                            foreach($rba_rc_activity->result() as $ba_rc_activity){ ?>
                           <? $aract[$act] = $ba_rc_activity->activity;?>
                               <? //"test[$ppa][$rc][$act]"."<br />";?>                                
                            <?php $rba_rc_activity_class = $this->budget->get_ba_allotment_class($ba_rc_activity->idba_rc_activity);
                            $ac = 0;
                            foreach($rba_rc_activity_class->result() as $ba_rc_activity_class){ ?>
                           <?php $arac[$ac] = $ba_rc_activity_class->description;?></td>
                               <? //"test[$ppa][$rc][$act][$ac]"."<br />";?>   
                            <? $aramounts[$ppa][$rc][$act][$ac] = number_format($ba_rc_activity_class->total,2);?>
                                                               
                            <?php $ac++; } ?>
                            <?php $act++; } //end of RC Activities ?>
                            <?php $rc++; } //end of RCs ?>
                            <?php $ppa++; } ?>   

<?php
for ($i = 0; $i < sizeof($arrc); $i++)
        {
            echo "<br />" . $arrc . "\t";            
            for($j = 0; $j < sizeof($aract); $j++)
            {                
                echo $aract[$i][$j] ."\t";
                for ($k = 0; $k < sizeof($arac); $k++)
                {
                    for( $m = 0; $m < sizeof($aramounts); $m++)
                    {
                        echo $arac[$k].": ". $aramounts[$i][$j][$k][$m]."<br />"; //. ": ". $aramounts[$i][$j][$k][$m];
                    }
                }
            }
        }      

?>
                       

