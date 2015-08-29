<div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Library</a></li>
            <li class="active">Data</li>
        </ol>
    </div>
    <div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title"> <i class="glyphicon glyphicon-th-list"></i>
              Manage Genres</h3>
           </div>
        <div class="panel-body">
                    <table class="table table-striped table-bordered" style="width:100%!important;">
                        <thead>
                            <tr>
                                                                <th>Genre</th>
                                                                <th style="text-align: center;" width="100px">
                                                                    <a href="<?=base_url();?>main/add_genre" title="Add" class="btn btn-sm btn-success fancybox"><i class="glyphicon glyphicon-plus"> </i></a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $rgenre = $this->langdb_model->get_genres();
                            foreach($rgenre->result() as $genre){ ?>
                            <tr>
                                                                
                                                                        <td><?=$genre->genre;?></td>
                                                                                                <td style="text-align: center;" class="td-actions">
                                    <a href="<?=base_url();?>main/edit_genre/<?=$genre->id;?>" title="Edit" class="btn btn-sm btn-warning fancybox"><i class="glyphicon glyphicon-pencil"> </i></a>
                                    <a href="javascript:;" class="btn btn-danger btn-sm" title="Delete"
                                       onclick ="
                                        var agree=confirm('Do you want to DELETE the record?');
                                        if (agree){
                                            $.post(
                                                    '<?=base_url();?>main/delete_item',
                                                    {
                                                        table: 'ldb_genre',
                                                        id_name: 'id',
                                                        id: '<?=$genre->id;?>'
                                                    },function(data){
                                                        window.location.reload(true);
                                                    }
                                                );
                                        }
                                    "
                                       ><i class="glyphicon glyphicon-remove"></i></a>
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
