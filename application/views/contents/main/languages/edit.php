<html>
    <head>     
        <script src="http://localhost/langdb/media/js/jquery-1.11.1.min.js"></script>

        
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
                $rgenre = $this->langdb_model->get_genre($this->uri->segment(3,0));
                foreach($rgenre->result() as $genre){
                ?>                
                                <tr>
                    <td width="100" class="crud-label">Genre</td>
                    <td>
                                                <div class="form" style="">
                        <input type="text"
                               class="
                                                              "
                               name="genre" value="<?=$genre->genre;?>"/>
                        </div>
                                            </td>
                </tr>
                                
                <tr>
                    <td> </td>
                    <td colspan="2" align="right"><input class="button right btn btn-primary" type="submit" 
                                           onclick="
                                                $(this).hide();
                                               $.post('<?=base_url();?>main/update_genre',
                                               {
                                               id: '<?=$genre->id;?>'
                                                                               
                                               ,genre: $('input[name=genre]').val()
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
