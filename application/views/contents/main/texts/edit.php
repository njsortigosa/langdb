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
                $rtext = $this->langdb_model->get_text($this->uri->segment(3,0));
                foreach($rtext->result() as $text){
                ?>                
                                <tr>
                    <td width="100" class="crud-label">Title</td>
                    <td>
                                                <div class="form" style="">
                        <input type="text"
                               class="form-control 
                                                              "
                               name="title" value="<?=$text->title;?>"/>
                        </div>
                                            </td>
                </tr>
                                <tr>
                    <td width="100" class="crud-label">Author</td>
                    <td>
                                                <div class="form" style="">
                        <input type="text"
                               class="form-control 
                                                              "
                               name="author" value="<?=$text->author;?>"/>
                        </div>
                                            </td>
                </tr>
                                <tr>
                    <td width="100" class="crud-label">Year</td>
                    <td>
                                                <div class="form" style="">
                        <input type="text"
                               class="form-control 
                                                              "
                               name="year" value="<?=$text->year;?>"/>
                        </div>
                                            </td>
                </tr>
                                <tr>
                    <td width="100" class="crud-label">Content</td>
                    <td>
                                                <textarea cols="100" rows="10" name="content"
                                  class="mceNoEditor"
                                  ><?=$text->content;?></textarea>
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
                             <option <?=($text->ldb_language_id==$value[0])?"selected":"";?> value="<?=$value[0];?>"><?=$value[1];?></option>
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
                             <option <?=($text->ldb_genre_id==$value[0])?"selected":"";?> value="<?=$value[0];?>"><?=$value[1];?></option>
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
                                               $.post('<?=base_url();?>main/update_text',
                                               {
                                               id: '<?=$text->id;?>'
                                                                               
                                               ,title: $('input[name=title]').val()
                                                                                
                                               ,author: $('input[name=author]').val()
                                                                                
                                               ,year: $('input[name=year]').val()
                                                                                
                                               ,content: $('textarea[name=content]').val()
                                                                                
                                               ,language_id: $('select[name=language_id]').val()
                                                                                
                                               ,genre_id: $('select[name=genre_id]').val()
                                                                                               },function(){
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
