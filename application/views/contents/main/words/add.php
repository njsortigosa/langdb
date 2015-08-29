<html>
    <head>     
    </head>
    <body>
<div class="crud-form">
    <div class="crud-header">
        <?=$header;?>
    </div>
    <div class="crud-content">
        <table border="0" width='400px'>
            <tbody>
                                <tr>
                    <td width="100" class="crud-label">Word</td>
                    <td>
                                                <div class="form" style="">
                        <input type="text" name="word"                                
                               class="form-control
                                                              "
                               value=""/>
                        </div>
                                            </td>
                </tr>
                                <tr>
                    <td width="100" class="crud-label">Meaning</td>
                    <td>
                                                <textarea name="meaning"
                                  class="form-control mceNoEditor"
                                  ></textarea>
                                            </td>
                </tr>
                                <tr>
                    <td width="100" class="crud-label">Sample Sent</td>
                    <td>
                                                <textarea name="sample_sent"
                                  class="form-control mceNoEditor"
                                  ></textarea>
                                            </td>
                </tr>
                                <tr>
                    <td width="100" class="crud-label">English Equivalent</td>
                    <td>
                                                <div class="form" style="">
                        <input type="text" name="english_equiv"                                
                               class="form-control
                                                              "
                               value=""/>
                        </div>
                                            </td>
                </tr>
                                <tr>
                    <td width="100" class="crud-label">Loan Word</td>
                    <td>
                                                <input type="checkbox" name="isloan_word" value="1" />
                                            </td>
                </tr>
                                <tr>
                    <td width="100" class="crud-label">Display in Search Result</td>
                    <td>
                                                <input type="checkbox" name="isdisplay" value="1" />
                                            </td>
                </tr>
                                <tr>
                    <td width="100" class="crud-label">Standard Spelling</td>
                    <td>
                                                <div class="form" style="">
                        <input type="text" name="std_spelling"                                
                               class="form-control
                                                              "
                               value=""/>
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
                             <option value="<?=$value[0];?>"><?=$value[1];?></option>
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
                             <option value="<?=$value[0];?>"><?=$value[1];?></option>
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
                             <option value="<?=$value[0];?>"><?=$value[1];?></option>
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
                                               $.post('<?=base_url();?>main/save_word',
                                               {
                                                
                                                                                                      word: $('input[name=word]').val()                                                                                                
                                                                                                      ,meaning: $('textarea[name=meaning]').val()                                                                                                    
                                                                                                      ,sample_sent: $('textarea[name=sample_sent]').val()                                                                                                    
                                                                                                      ,english_equiv: $('input[name=english_equiv]').val()                                                                                                    
                                                                                                      ,isloan_word: ($('input[name=isloan_word]').is(':checked')==true?'1':'0')                                                                                                    
                                                                                                      ,isdisplay: ($('input[name=isdisplay]').is(':checked')==true?'1':'0')                                                                                                    
                                                                                                      ,std_spelling: $('input[name=std_spelling]').val()                                                                                                    
                                                                                                      ,pri_pos_id: $('select[name=pri_pos_id]').val()                                                                                                    
                                                                                                      ,sec_pos_id: $('select[name=sec_pos_id]').val()                                                                                                    
                                                                                                      ,domain_id: $('select[name=domain_id]').val()                                                                                                                                                  },function(){
                                                    window.location.reload(true);
                                               });
                                           "
                                           value="Create" /></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
  </body>
</html>
