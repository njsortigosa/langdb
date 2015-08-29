<html>
    <head>     

        
        <style type="text/css">

        </style>
    </head>
    <body>
<div class="crud-form">
    <div class="crud-header">
        <?=$header;?>
    </div>
    <div class="crud-content">
        <table style="width:400px;margin:auto;" border="0">
            <tbody>
                <?php
                $rword = $this->langdb_model->get_word($this->uri->segment(3,0));
                foreach($rword->result() as $word){
                ?>                
                                <tr>
                    <td width="100" class="crud-label">Word</td>
                    <td>
                                                <div class="form" style="">
                        <input type="text"
                               class="form-control 
                                                              "
                               name="word" value="<?=$word->word;?>"/>
                        </div>
                                            </td>
                </tr>
                                <tr>
                    <td width="100" class="crud-label">Meaning</td>
                    <td>
                                                <textarea name="meaning"
                                  class="form-control mceNoEditor"
                                  ><?=$word->meaning;?></textarea>
                                            </td>
                </tr>
                                <tr>
                    <td width="100" class="crud-label">Sample Sent</td>
                    <td>
                                                <textarea name="sample_sent"
                                  class="form-control mceNoEditor"
                                  ><?=$word->sample_sent;?></textarea>
                                            </td>
                </tr>
                                <tr>
                    <td width="100" class="crud-label">English Equivalent</td>
                    <td>
                                                <div class="form" style="">
                        <input type="text"
                               class="form-control 
                                                              "
                               name="english_equiv" value="<?=$word->english_equiv;?>"/>
                        </div>
                                            </td>
                </tr>
                                <tr>
                    <td width="100" class="crud-label">Loan Word</td>
                    <td>
                                                <input type="checkbox" name="isloan_word" <?=($word->isloan_word=='1')?'checked':'';?> value="1" />
                                            </td>
                </tr>
                                <tr>
                    <td width="100" class="crud-label">Display in Search Result</td>
                    <td>
                                                <input type="checkbox" name="isdisplay" <?=($word->isdisplay=='1')?'checked':'';?> value="1" />
                                            </td>
                </tr>
                                <tr>
                    <td width="100" class="crud-label">Standard Spelling</td>
                    <td>
                                                <div class="form" style="">
                        <input type="text"
                               class="form-control 
                                                              "
                               name="std_spelling" value="<?=$word->std_spelling;?>"/>
                        </div>
                                            </td>
                </tr>
                                <tr>
                    <td width="100" class="crud-label">Primary Part of Speech</td>
                    <td>
                                                <select class="form-control" name="pri_pos_id">
                                                        <?php
                             $rvalue = mysql_query("select * from ldb_pos");
                             while($value=  mysql_fetch_array($rvalue)){
                                 ?>
                             <option <?=($word->pri_pos_id==$value[0])?"selected":"";?> value="<?=$value[0];?>"><?=$value[1];?></option>
                             <?php
                             }
                             ?>
                         </select>
                                            </td>
                </tr>
                                <tr>
                    <td width="100" class="crud-label">Secondary Part of Speech</td>
                    <td>
                                                <select class="form-control" name="sec_pos_id">
                                                        <option value="0">-none-</option>
                                                        <?php
                             $rvalue = mysql_query("select * from ldb_pos");
                             while($value=  mysql_fetch_array($rvalue)){
                                 ?>
                             <option <?=($word->sec_pos_id==$value[0])?"selected":"";?> value="<?=$value[0];?>"><?=$value[1];?></option>
                             <?php
                             }
                             ?>
                         </select>
                                            </td>
                </tr>
                                <tr>
                    <td width="100" class="crud-label">Domain</td>
                    <td>
                                                <select class="form-control" name="domain_id">
                                                        <?php
                             $rvalue = mysql_query("select * from ldb_domain");
                             while($value=  mysql_fetch_array($rvalue)){
                                 ?>
                             <option <?=($word->domain_id==$value[0])?"selected":"";?> value="<?=$value[0];?>"><?=$value[1];?></option>
                             <?php
                             }
                             ?>
                         </select>
                                            </td>
                </tr>
                                
                <tr>
                    <td> </td>
                    <td colspan="2" align="right"><input class="button right btn btn-primary" type="submit" 
                                           onclick="
                                                $(this).hide();
                                               $.post('<?=base_url();?>main/update_word',
                                               {
                                               id: '<?=$word->id;?>'
                                                                               
                                               ,word: $('input[name=word]').val()                                                                                
                                               ,meaning: $('textarea[name=meaning]').val()                                                                                
                                               ,sample_sent: $('textarea[name=sample_sent]').val()                                                                                
                                               ,english_equiv: $('input[name=english_equiv]').val()                                                                                
                                               ,isloan_word: ($('input[name=isloan_word]').is(':checked')==true?'1':'0')                                                                                
                                               ,isdisplay: ($('input[name=isdisplay]').is(':checked')==true?'1':'0')                                                                                
                                               ,std_spelling: $('input[name=std_spelling]').val()                                                                                
                                               ,pri_pos_id: $('select[name=pri_pos_id]').val()                                                                                
                                               ,sec_pos_id: $('select[name=sec_pos_id]').val()                                                                                
                                               ,domain_id: $('select[name=domain_id]').val()                                                                                               },function(){
                                                    window.location.reload(true);
                                               });
                                           "
                                           value="Update" /></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
  </body>
</html>
