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
                $rdomain = $this->langdb_model->get_domain($this->uri->segment(3,0));
                foreach($rdomain->result() as $domain){
                ?>                
                                <tr>
                    <td width="100" class="crud-label">Domain</td>
                    <td>
                                                <div class="form" style="">
                        <input type="text"
                               class="form-control 
                                                              "
                               name="domain" value="<?=$domain->domain;?>"/>
                        </div>
                                            </td>
                </tr>
                                
                <tr>
                    <td> </td>
                    <td colspan="2" align="right"><input class="button right btn btn-primary" type="submit" 
                                           onclick="
                                                $(this).hide();
                                               $.post('<?=base_url();?>main/update_domain',
                                               {
                                               id: '<?=$domain->id;?>'
                                                                               
                                               ,domain: $('input[name=domain]').val()
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
