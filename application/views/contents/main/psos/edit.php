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
                $rpos = $this->langdb_model->get_pos($this->uri->segment(3,0));
                foreach($rpos->result() as $pos){
                ?>                
                                <tr>
                    <td width="100" class="crud-label">Part of Speech</td>
                    <td>
                                                <div class="form" style="">
                        <input type="text"
                               class="form-control 
                                                              "
                               name="pos" value="<?=$pos->pos;?>"/>
                        </div>
                                            </td>
                </tr>
                                
                <tr>
                    <td> </td>
                    <td colspan="2" align="right"><input class="button right btn btn-primary" type="submit" 
                                           onclick="
                                                $(this).hide();
                                               $.post('<?=base_url();?>main/update_pos',
                                               {
                                               id: '<?=$pos->id;?>'
                                                                               
                                               ,pos: $('input[name=pos]').val()
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
