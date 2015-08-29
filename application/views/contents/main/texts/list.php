<div class="row">
    <div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title"> <i class="glyphicon glyphicon-th-list"></i>
              Manage Texts</h3>
           </div>
        <div class="panel-body">
                    <table class="table table-striped table-bordered" style="width:100%!important;">
                        <thead>
                            <tr>
                                                                <th>Title</th>
                                                                <th>Author</th>
                                                                <th>Year</th>
                                                                <th>Content</th>
                                                                <th>Language</th>
                                                                <th>Genre</th>
                                                                <th style="text-align: center;" width="100px">
                                    <a href="<?=base_url();?>main/add_text" class="btn btn-sm btn-success fancybox"><i class="glyphicon glyphicon-plus"> </i></a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $rtext = $this->langdb_model->get_texts();
                            foreach($rtext->result() as $text){ ?>
                            <tr>
                                                                
                                                                        <td><?=$text->title;?></td>
                                                                                                
                                                                        <td><?=$text->author;?></td>
                                                                                                
                                                                        <td><?=$text->year;?></td>
                                                                                                
                                                                        <td><?=nl2br($text->content);?> <?=str_word_count($text->content);?></td>
                                                                                                
                                                                        <td><?=$text->language;?></td>
                                                                                                
                                                                        <td><?=$text->genre;?></td>
                                                                                                <td style="text-align: center;" class="td-actions">
                                    <a href="<?=base_url();?>main/edit_text/<?=$text->id;?>" title="Edit" class="btn btn-sm btn-warning fancybox"><i class="glyphicon glyphicon-edit"> </i></a>
                                    <a href="javascript:;" class="btn btn-danger btn-sm" title="Delete"
                                       onclick ="
                                        var agree=confirm('Do you want to DELETE the record?');
                                        if (agree){
                                            $.post(
                                                    '<?=base_url();?>main/delete_item',
                                                    {
                                                        table: 'text',
                                                        id_name: 'id',
                                                        id: '<?=$text->id;?>'
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
