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
                    <td width="100" class="crud-label">Domain</td>
                    <td>
                                                <div class="form" style="">
                        <input type="text" name="domain"                                
                               class="form-control
                                                              "
                               value=""/>
                        </div>
                                            </td>
                </tr>
                                <tr>
                    <td> </td>
                    <td colspan="2" align="right"><input class="button right btn btn-primary" type="submit" 
                                           onclick="
                                                $(this).hide();
                                               $.post('<?=base_url();?>main/save_domain',
                                               {
                                                
                                                                                                      domain: $('input[name=domain]').val()
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
