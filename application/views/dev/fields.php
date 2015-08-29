<style>
    table th{
        background: #33ccff;
        color: white;
    }
    td{
       border-top: 1px solid #000;
    }
</style>

<form action="<?=base_url();?>dev/codes" method="post">
    <input type="hidden" name="table" value="<?= $this->input->post('table'); ?>" /> 
Variable Name    <input type="text" name="variable_name" value="<?= $this->input->post('table'); ?>" />  <br />  
Plural Variable Name    <input type="text" name="pvariable_name" value="<?= $this->input->post('table'); ?>s" />  <br />  
Controller   <input type="text" name="controller" value="" />  <br />    
Model   <input type="text" name="model" value="" />  <br />    
Header    <input type="text" name="header" value="<?=ucwords(str_replace("_"," ",$this->input->post('table'))); ?>" /> <br />   
Plural Header    <input type="text" name="pheader" value="<?=ucwords(str_replace("_"," ",$this->input->post('table'))); ?>s" />    
<table width="750px" border="0">
    <thead>
    <tr>
        <th>Fields</th>
        <th>Label</th>
        <th>Date</th>
        <th>Select</th>
        <th>Null</th>
        <th>Text</th>
        <th>TinyMCE</th>
        <th>Bool</th>
    </tr>
    </thead>
    <tbody>
    <?php
                 $rfields = mysql_query("show columns from ".$this->input->post('table'));
                 $x = 0;
                 while($fields=  mysql_fetch_array($rfields)){
                     if($fields['Key']=='PRI'){
                         $primary = $fields[0];
                     }
                     ?>
    <tr>
        <td>
               <input type="checkbox" name="field[<?=$x;?>]" value="<?=$fields[0];?>" />
                <input type="hidden" name="primary" value="<?=($fields['Key']=='PRI')?$fields[0]:"";?>" />     
               <?=$fields[0];?>
        </td>
        <td>
            <input type="text" name="label[<?=$x;?>]" value="<?=ucwords(str_replace("_"," ",$fields[0]));?>" />
        </td>
        <td>
               <input type="checkbox" name="isdate[<?=$x;?>]" value="1" />
        </td>
        <td>
               <input type="checkbox" name="select[<?=$x;?>]" value="<?=$fields[0];?>" />    
               <select name="select_table[<?=$x;?>]">
                <?php
                 $rtables = mysql_query("show tables;");
                 while($tables=  mysql_fetch_array($rtables)){
                     ?>
                 <option><?=$tables[0];?></option>
                 <?php
                 }
                 ?>
             </select>
        </td>
        <td>
               <input type="checkbox" name="allownull[<?=$x;?>]" value="1" />
        </td>
        <td>
               <input type="checkbox" name="istext[<?=$x;?>]" value="1" />
        </td>
        <td>
               <input type="checkbox" name="tinymce[<?=$x;?>]" value="1" />
        </td>
        <td>
               <input type="checkbox" name="isbool[<?=$x;?>]" value="1" />
        </td>
    </tr>
                 <?php $x++; } ?>
    <tr>
        <td colspan="8" align="right"><input type="submit" value="Next" /></td>
    </tr>
    </tbody>
</table>


    <input type="hidden" name="primary" value="<?=$primary; ?>" /> 
</form>
