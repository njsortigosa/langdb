<html>
    <head>     
    </head>
    <body>
<div class="crud-form">
    <div class="crud-header">
        <?=$header;?>
    </div>
    <div class="crud-content">
        <table border="0">
            <tbody>
                                <tr>
                    <td width="100" class="crud-label">Title</td>
                    <td>
                                                <div class="form" style="">
                        <input type="text" name="title"                                
                               class="form-control
                                                              "
                               value=""/>
                        </div>
                                            </td>
                </tr>
                                <tr>
                    <td width="100" class="crud-label">Author</td>
                    <td>
                                                <div class="form" style="">
                        <input type="text" name="author"                                
                               class="form-control
                                                              "
                               value=""/>
                        </div>
                                            </td>
                </tr>
                                <tr>
                    <td width="100" class="crud-label">Year</td>
                    <td>
                                                <div class="form" style="">
                        <input type="text" name="year"                                
                               class="form-control
                                                              "
                               value=""/>
                        </div>
                                            </td>
                </tr>
                                <tr>
                    <td width="100" class="crud-label">Content</td>
                    <td>
                        <textarea cols="100" rows="10" name="content"
                                  class="form-control mceNoEditor"
                                  ></textarea>
                                            </td>
                </tr>
                                <tr>
                    <td width="100" class="crud-label">Language</td>
                    <td>
                                                <select class="form-control" name="language_id">                            
                                                        <?php
                             $rvalue = mysql_query("select * from ldb_language");
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
                    <td width="100" class="crud-label">Genre</td>
                    <td>
                                                <select class="form-control" name="genre_id">                            
                                                        <?php
                             $rvalue = mysql_query("select * from ldb_genre");
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
                                               $.post('<?=base_url();?>main/save_text',
                                               {
                                                
                                                                                                      title: $('input[name=title]').val()
                                                                                                
                                                                                                      ,author: $('input[name=author]').val()
                                                                                                    
                                                                                                      ,year: $('input[name=year]').val()
                                                                                                    
                                                                                                      ,content: $('textarea[name=content]').val()
                                                                                                    
                                                                                                      ,language_id: $('select[name=language_id]').val()
                                                                                                    
                                                                                                      ,genre_id: $('select[name=genre_id]').val()
                                                                                                                                                  },function(){
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
