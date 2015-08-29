<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function build_filter($query,$name,$ses){
    $fields = $query->list_fields();    
    $x = 0;
    $assoc_field[] = "";
    foreach($fields as $field){
        $assoc_field[$x] = $field;
        $x++;
    }
    ?>



<select name="opt_<?=$name;?>" size="3" multiple="multiple" style="">
    <option <?=(is_array($ses)===true && $ses[0]=='A')?"selected=selected":"";?> value="A" onclick="
                if($(this).is(':selected')==true){
                    if (event.ctrlKey || event.metaKey) {

                    }else{
                         $('select[name=opt_<?=$name;?>] option').removeAttr('selected');
                    }
                    // alert('checked');
                    $('select[name=opt_<?=$name;?>] option').removeAttr('selected');
                    $(this).attr('selected', 'selected');
                    var checked_<?=$name;?> = [];
                                $('select[name=opt_<?=$name;?>] option[selected]').each(function ()
                                         {
                                             checked_<?=$name;?>.push($(this).val());
                                         });
                                $.post('<?=base_url();?>main/set_session',{
                                    'sess': 'opt_<?=$name;?>',
                                    'sess_data': checked_<?=$name;?>
                                },function(data){                                
                                  //window.location.reload(true);
                                });
                 }else{
                                 $.post('<?=base_url();?>main/set_session',{
                                    'sess': 'opt_<?=$name;?>',
                                    'sess_data': ''
                                },function(data){                                
                                  //window.location.reload(true);
                                });
                             } 
            ">All</option>
    <option <?=(is_array($ses)===true && $ses[0]=='N')?"selected=selected":"";?> value="N" onclick="
                if($(this).is(':selected')==true){
                    if (event.ctrlKey || event.metaKey) {

                    }else{
                         $('select[name=opt_<?=$name;?>] option').removeAttr('selected');
                    }
                    // alert('checked');
                    $('select[name=opt_<?=$name;?>] option').removeAttr('selected');
                    $(this).attr('selected', 'selected');
                    var checked_<?=$name;?> = [];
                                $('select[name=opt_<?=$name;?>] option[selected]').each(function ()
                                         {
                                             checked_<?=$name;?>.push($(this).val());
                                         });
                                //alert(checked);
                                $.post('<?=base_url();?>main/set_session',{
                                    'sess': 'opt_<?=$name;?>',
                                    'sess_data': checked_<?=$name;?>
                                },function(data){                                
                                  //window.location.reload(true);
                                });
                 }else{
                                 $.post('<?=base_url();?>main/set_session',{
                                    'sess': 'opt_<?=$name;?>',
                                    'sess_data': ''
                                },function(data){                                
                                  //window.location.reload(true);
                                });
                             } 
            ">None</option>
    <?php
    foreach($query->result_array() as $row){
        ?>
               <option value="<?=$row[$assoc_field[0]];?>" 
                       <?php

                       if(is_array($ses)){
                            foreach ($ses as $sel=>$val){
                                if($val==$row[$assoc_field[0]]){
                                    echo "selected=selected";
                                }
                            }
                       }
                       ?>
                       onclick="
                            if($(this).is(':selected')==true){
                                if (event.ctrlKey || event.metaKey) {

                                }else{
                                     $('select[name=opt_<?=$name;?>] option').removeAttr('selected');
                                }

                                $('select[name=opt_<?=$name;?>] option[value=N]').removeAttr('selected');
                                $('select[name=opt_<?=$name;?>] option[value=A]').removeAttr('selected');
                                $(this).attr('selected', 'selected');
                                var checked_<?=$name;?> = [];
                                $('select[name=opt_<?=$name;?>] option[selected=selected]').each(function ()
                                         {
                                             checked_<?=$name;?>.push($(this).val());
                                         });
                                //alert(checked);
                                $.post('<?=base_url();?>main/set_session',{
                                    'sess': 'opt_<?=$name;?>',
                                    'sess_data': checked_<?=$name;?>
                                },function(data){                                
                                  //window.location.reload(true);
                                });

                             }else{
                                 $.post('<?=base_url();?>main/set_session',{
                                    'sess': 'opt_<?=$name;?>',
                                    'sess_data': ''
                                },function(data){                                
                                  //window.location.reload(true);
                                });
                             } 
                        "><?=$row[$assoc_field[1]];?></option>
    <?php } ?>
</select>

<?php
}

function pivot_table($query,$float=null,$offset=null){
     $fields = $query->list_fields();
    ?>
<table class="table table-bordered table-hover <?=($float==true)?"floathead":"";?>" style="width:100%!important;">
    <thead>
        <tr>
            <?php foreach($fields as $field){ ?>
            <th><?=str_replace("_"," ",$field);?></th>
            <?php } ?>
        </tr>
    </thead>    
    <tbody>
        <?php
        $tmp[] = "";
       $x = 0;
        foreach($fields as $field){
            $tmp[$field] = "";
            $assoc_field[$x] = $field;
            $x++;
        }
        $rin = 0;
        $GTOTAL = Array();
        foreach($query->result_array() as $row){
            $x =0;
            foreach($fields as $field){
                
                if($tmp[$field]!=$row[$field]){
                    $z = $x+1;
                    if($z<sizeof($assoc_field)){             
                        $tmp[$assoc_field[$z]] = "";
                    }
                }
                $x++;
            }
            ?>
        <!--
        <tr>
        <?php
        $y = 0;
        foreach($fields as $field){
            $arrow = $query->row_array(($rin+1));
            if($row[$field]!=$arrow[$field] && $y<=(sizeof($fields)-6)){
         ?>
            <td>TOTAL <?=$row[$field]?></td>
        <?php
                
            }else{
                ?>
            <td>
                <?php
                if($row[$field]!=$arrow[$field] && $totals[$field]!=0.00){
                    //echo $totals[$field];
                }
                ?>
            </td>
                    <?php
            }
        $y++; }
        ?>
        
        </tr>
       -->
        <tr>
            <?php foreach($fields as $field){ ?>
            
            <td style="border-left:1px solid!important;
                <?=((is_decimal($row[$field]))?"text-align:right!important;"
                    :"");?>
                <?=($tmp[$field]!=$row[$field] || 
                            is_decimal($row[$field])===true || ($row[$field]=="" && $tmp[$field]!=""))
                    ?"border-top:1px solid!important":
                        "border-top:0;border-bottom:0!important;";?>">
                <?=($tmp[$field]!=$row[$field] 
                                || is_decimal($row[$field])===true)
                ?((is_decimal($row[$field]))?number_format($row[$field],2)
                                :$row[$field]):"";?>
            </td>
            <?php 
                $tmp[$field] = $row[$field];
                if(is_decimal($row[$field])){
                   // $totals[$field] += $row[$field];
                    if(isset($GTOTAL[$field])){
                    $GTOTAL[$field] += $row[$field];
                    }else{
                      $GTOTAL[$field] = $row[$field];   
                    }
                }
            }
            ?>
        </tr>
        <?php $rin++; } ?>
        <tr style="background: #00cc99;color:#fff;font-weight: bold;">
            <td colspan="<?=sizeof($fields)-$offset;?>">GRAND TOTAL</td>
            <?php foreach($fields as $field){ ?>
            <?php if(isset($GTOTAL[$field])){ ?>
            <td style="text-align: right!important;"><?=number_format($GTOTAL[$field],2);?></td>
            <?php } ?>
            <?php } ?>
        </tr>
    </tbody>
</table>
<?php
}

function is_decimal( $val )
{
    return ((is_numeric( $val ) && strpos($val,"."))?true:false);
}

function highlightWords($text, $words)
{
        /*** loop of the array of words ***/
        foreach ($words as $word)
        {
                /*** quote the text for regex ***/
                $word = preg_quote($word);
                /*** highlight the words ***/
                $text = preg_replace("/\b($word)\b/i", '<span class="highlight_word">\1</span>', $text);
        }
        /*** return the text ***/
        return $text;
}
function highlightColorWords($text, $words, $colors=null)
{
        if(is_null($colors) || !is_array($colors))
        {
                $colors = array('yellow', 'pink', 'green');
        }

        $i = 0;
        /*** the maximum key number ***/
        $num_colors = max(array_keys($colors));

        /*** loop of the array of words ***/
        foreach ($words as $word)
        {
                /*** quote the text for regex ***/
                $word = preg_quote($word);
                /*** highlight the words ***/
                $text = preg_replace("/\b($word)\b/i", '<span class="highlight_'.$colors[$i].'">\1</span>', $text);
                if($i==$num_colors){ $i = 0; } else { $i++; }
        }
        /*** return the text ***/
        return $text;
}
function show_levels($parent,$level_array){
        $obj =& get_instance();
        $has_childs = false; 
        //this prevents printing 'ul' if we don't have subcategories for this category

        //use global array variable instead of a local variable to lower stack memory requierment

        foreach($level_array as $key => $value)
        {
                if ($value['parent'] == $parent) 
                {       
                        //if this is the first child print '<ul>'  
                        if ($has_childs === false)
                        {
                                //don't print '<ul>' multiple times 
                                $has_childs = true;
                                echo '<ul '.(($value['parent']==$parent)?"class='treeview'":"").'>';
                        }
                        ?>
                         <li ><b>[<?=$key;?>]</b> - <?=$value['name'];?> - [<?=$value['parent'];?>]
                             
                            <a href="<?=base_url();?><?=$value['controller'];?>/add_<?=$value['variable'];?>/<?=$key;?>" title="Add Child" class="fancybox"><i class="btn-icon-only icon-plus"> </i></a>
                             <a href="<?=base_url();?><?=$value['controller'];?>/edit_<?=$value['variable'];?>/<?=$key;?>" title="Edit" class="fancybox"><i class="btn-icon-only icon-edit"> </i></a>
                                    <a href="javascript:;" class="" title="Delete"
                                       onclick ="
                                        var agree=confirm('Do you want to DELETE the record?');
                                        if (agree){
                                            $.post(
                                                    '<?=base_url();?>main/delete_item',
                                                    {
                                                        table: '<?=$value['table'];?>',
                                                        id_name: '<?=$value['id_name'];?>',
                                                        id: '<?=$key;?>'
                                                    },function(data){
                                                        window.location.reload(true);
                                                    }
                                                );
                                        }
                                    "
                                       ><i class="btn-icon-only icon-remove"> </i></a>
                             <?php
                        show_levels($key,$level_array);
                        //call function again to generate nested list for subcategories belonging to this category
                        echo '</li>';
                }
        }
        if ($has_childs === true) echo '</ul>';
//generate menu starting with parent categories (that have a 0 parent)
}

function create_menu($parent,$level_array,$class=null){
        $obj =& get_instance();
        $has_childs = false; 
        //this prevents printing 'ul' if we don't have subcategories for this category

        //use global array variable instead of a local variable to lower stack memory requierment

        foreach($level_array as $key => $value)
        {
                if ($value['parent'] == $parent) 
                {       
                        //if this is the first child print '<ul>'  
                        if ($has_childs === false)
                        {
                                //don't print '<ul>' multiple times 
                                $has_childs = true;
                                echo '<ul '.(($value['parent']==$parent)?"class='".((isset($class))?$class:"")."'":"").'>';
                        }
                        ?>
                         <li><a title="" href="<?=($value['path']!="")?base_url().$value['path']:"javascript:;";?>"><?=$value['name'];?></a>
                             <?php
                        create_menu($key,$level_array);
                        //call function again to generate nested list for subcategories belonging to this category
                        echo '</li>';
                }
        }
        if ($has_childs === true) echo '</ul>';
//generate menu starting with parent categories (that have a 0 parent)
}

function budget_year(){
        $obj =& get_instance();
    return $obj->input->cookie('byear');
}

function acct_code_dashed($code) {
  $numbers_only = preg_replace("/[^\d]/", "", $code);
  return preg_replace("/^1?(\d{1})(\d{2})(\d{2})(\d{3})(\d{2})$/", "$1-$2-$3-$4-$5", $numbers_only);
}

function conv_status($code) {
	switch($code) {
		case "S":
			return "Submitted";
			break;
		case "C":
			return "Cancelled";
			break;
		case "A":
			return "Approved";
			break;
		default:
			return "Draft";
	}
}

function conv_status_admin($code,$user=null) {
	switch($code) {
		case "S":
			return "Pending for Approval";
			break;
		case "C":
			return "Cancelled";
			break;
		case "A":
			return "Approved";
			break;
		default:
			return "Draft";
	}
}

function show_ordinal($num) {
	$the_num = (string) $num;
	$last_digit = substr($the_num, -1, 1);
	switch($last_digit) {
		case "1":
			$the_num.="st";
			break;
		case "2":
			$the_num.="nd";
			break;
		case "3":
			$the_num.="rd";
			break;
		default:
			$the_num.="th";
	}
	return $the_num;
}

function get_numdays($days){
    $days = explode('/', $days);
    
    return sizeof($days);
}
function time_differ($fr,$to){
		$fH = strtotime($fr);
		$tH = strtotime($to);
		$time = explode(":",date('H:i', mktime(date('H',$tH)-date('H',$fH),date('i',$tH)-date('i',$fH))));
		$dec = ((int)$time[1] / 60) * 100;
		return (int)$time[0].'.'.$dec;
	}

function conv_yesno($yesno){
    switch($yesno){
        case 1:
            return 'YES';
            break;
        case 0:
            return 'NO';
            break;
    }
}        
        
function clean_text($text){
    $text = str_replace('Ã‘', 'Ñ', $text);
    return $text;
}

function random_color() {
 $c = '';
for ($i = 0; $i<6; $i++) {
$c .= dechex(rand(0,15));
}
return "#".$c;
}

function isValidUser(){
    $obj =& get_instance();	
    return $obj->ion_auth->logged_in();
}

function is_admin(){
    $obj =& get_instance();	
    return $obj->ion_auth->is_admin();
}

function in_group($check_group, $id=false, $check_all = false){
    $obj =& get_instance();	
    return $obj->ion_auth->in_group($check_group, $id=false, $check_all = false);
}

function getUserProperty($prop){
    $obj =& get_instance();
    $user = $obj->ion_auth->user()->row();
    return $user->$prop;
}

function GetServerStatus($site, $port)
{
$status = array("OFFLINE", "ONLINE");
$fp = @fsockopen($site, $port, $errno, $errstr, 2);
if (!$fp) {
    return $status[0];
} else
  { return $status[1];}
}

function get_server(){
    return "http://".$_SERVER['HTTP_HOST'];
}

function magic_input($controller,$id,$pref_text,$pref_input,$value,$table,$field,$id_name){
   ?>
        <span style="min-width: 20px !important;min-height: 10px !important;" id="<?=$pref_text."_".$id;?>" 
              onclick="$(this).hide();$('#<?=$pref_input."_".$id;?>').show().focus();">
            &nbsp;<?=$value;?>
        </span>
        <input class="magic_input" size="<?=strlen($value)-3;?>" 
               onBlur="
                   $(this).hide();
                   $('#<?=$pref_text."_".$id;?>').show().text($(this).val());
                   $.post('<?=get_server().base_url().$controller;?>',
                   {
                       'table':'<?=$table;?>',
                       'field':'<?=$field;?>',
                       'update_value':$('input[name=<?=$pref_input."_".$id;?>]').val(),
                       'id_name':'<?=$id_name;?>',
                       'id':'<?=$id;?>'
                   },function(data){
                       
                   });
               " 
               id="<?=$pref_input."_".$id;?>"  
               type="text" name="<?=$pref_input."_".$id;?>" 
               value="<?=$value;?>" />
   <?php  
}

function sortarray($val){
    
	$min = 0;
	for ($out=0; $out < sizeof($val); $out ++){
		$min = $out;
		for ($in = $out + 1; $in < sizeof($val); $in ++){
			if ($val[$in] > $val[$min]){
				$min = $in;
			}
		}		
		$temp = $val[$out];
		$val[$out] = $val[$min];
		$val[$min] = $temp;
	}
	return $val;	
}

function sortarrayback($val){
	$min = 0;
	for ($out=0; $out < sizeof($val); $out ++){
		$min = $out;
		for ($in = $out + 1; $in < sizeof($val); $in ++){
			if ($val[$in] < $val[$min]){
				$min = $in;
			}
		}
		$temp = $val[$out];
		$val[$out] = $val[$min];
		$val[$min] = $temp;
	}
	return $val;
}

function isunique($num, $array){
	for ($x = 0; $x < sizeof($array); $x ++){
		if (($array[$num] == $array[$x]) && ($num != $x)){			
			return false;
		}
	}
	return true;
}

function getranks($sorted, $unsorted){
	$searched[] = 0;
	$ranked[] = 0;

	for ($i=0; $i<sizeof($unsorted); $i++){
		if (isunique($i, $unsorted) == true){
			for ($k=0; $k<sizeof($sorted); $k++){
				if ($sorted[$k] == $unsorted[$i]){
					$ranked[$i] = $k+1;
					break;
				}
			}
		}
		else {
			for ($s=0; $s<sizeof($searched); $s++){
				if ($unsorted[$i] != $searched[$s]){
					$search = $unsorted[$i];
					$searched[] = $search;


					for ($j=0; $j<sizeof($sorted); $j++){
						if ($unsorted[$i] == $sorted[$j]){
							$dups[] = $j+1;
						}
					}
					$sum = 0;
					for ($d=0; $d<sizeof($dups); $d++){
						$sum += $dups[$d];
					}
					$newrank = $sum / sizeof($dups);
					for ($r=0; $r<sizeof($unsorted); $r++){
						if ($search == $unsorted[$r]){
							$ranked[$r] = number_format($newrank, 1);
						}
					}
					unset($dups);
				}
			}
		}
	}
	return $ranked;
}

function show_alt($count,$class_name){
    if($count%2){
        return $class_name;
    }
}

?>
