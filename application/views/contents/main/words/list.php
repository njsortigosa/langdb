<div class="row">
    <div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title"> <i class="glyphicon glyphicon-th-list"></i>
              Manage Words</h3>
           </div>
        <div class="panel-body" style="overflow: auto;">
                    <table class="table table-striped table-bordered" style="width:100%!important;">
                        <thead>
                            <tr>
                                                                <th>Word</th>
                                                                <th>Meaning</th>
                                                                <th>Sample Sent</th>
                                                                <th>English Equivalent</th>
                                                                <th>Loan Word</th>
                                                                <th>Display in Search Result</th>
                                                                <th>Standard Spelling</th>
                                                                <th>Primary Part of Speech</th>
                                                                <th>Secondary Part of Speech</th>
                                                                <th>Domain</th>
                                                                <th style="text-align: center;" width="100px">
                                    <a href="<?=base_url();?>main/add_word" class="btn btn-sm btn-success fancybox"><i class="glyphicon glyphicon-plus"> </i></a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $rword = $this->langdb_model->get_words();
                            foreach($rword->result() as $word){ ?>
                            <tr>
                                                                
                                                                        <td><?=$word->word;?></td>
                                                                                                
                                                                        <td><?=nl2br($word->meaning);?></td>
                                                                                                
                                                                        <td><?=nl2br($word->sample_sent);?></td>
                                                                                                
                                                                        <td><?=$word->english_equiv;?></td>
                                                                                                
                                                                        <td><?=conv_yesno($word->isloan_word);?></td>            
                                                                                                
                                                                        <td><?=conv_yesno($word->isdisplay);?></td>            
                                                                                                
                                                                        <td><?=$word->std_spelling;?></td>
                                                                                                
                                                                        <td><?=$word->pos;?></td>
                                                                                                
                                                                        <td><?=$word->secpos;?></td>
                                                                                                
                                                                        <td><?=$word->domain;?></td>
                                                                                                <td style="text-align: center;" class="td-actions">
                                    <a href="<?=base_url();?>main/edit_word/<?=$word->id;?>" title="Edit" class="btn btn-sm btn-warning fancybox"><i class="glyphicon glyphicon-edit"> </i></a>
                                    <a href="javascript:;" class="btn btn-danger btn-sm" title="Delete"
                                       onclick ="
                                        var agree=confirm('Do you want to DELETE the record?');
                                        if (agree){
                                            $.post(
                                                    '<?=base_url();?>main/delete_item',
                                                    {
                                                        table: 'word',
                                                        id_name: 'id',
                                                        id: '<?=$word->id;?>'
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
