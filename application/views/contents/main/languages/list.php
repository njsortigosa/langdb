<div class="row">
    <div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title"> <i class="glyphicon glyphicon-th-list"></i>
              Manage Languages</h3>
           </div>
        <div class="panel-body">
                    <table class="table table-striped table-bordered" style="width:100%!important;">
                        <thead>
                            <tr>
                                                                <th>Language</th>
                                                                <th style="text-align: center;" width="100px">
                                    <a href="<?=base_url();?>main/add_language" class="btn btn-sm btn-success fancybox"><i class="glyphicon glyphicon-plus"> </i></a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $rlanguage = $this->langdb_model->get_languages();
                            foreach($rlanguage->result() as $language){ ?>
                            <tr>
                                                                
                                                                        <td><?=$language->language;?></td>
                                                                                                <td style="text-align: center;" class="td-actions">
                                    <a href="<?=base_url();?>main/edit_language/<?=$language->id;?>" title="Edit" class="btn btn-sm btn-warning fancybox"><i class="glyphicon glyphicon-edit"> </i></a>
                                    <a href="javascript:;" class="btn btn-danger btn-sm" title="Delete"
                                       onclick ="
                                        var agree=confirm('Do you want to DELETE the record?');
                                        if (agree){
                                            $.post(
                                                    '<?=base_url();?>main/delete_item',
                                                    {
                                                        table: 'ldb_language',
                                                        id_name: 'id',
                                                        id: '<?=$language->id;?>'
                                                    },function(data){
                                                        window.location.reload(true);
                                                    }
                                                );
                                        }
                                    "
                                       ><i class="glyphicon glyphicon-remove"> </i></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>  
                </div>
      </div>
    </div>
          <!-- /widget -->
</div>
