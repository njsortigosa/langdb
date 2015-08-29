<div class="row">
    <div class="col-md-7">
    <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Panel title</h3>
        </div>
        <div class="panel-body">
          Panel content
        </div>
      </div>
    </div>
    <div class="col-md-5">
    <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Multi-Language Dictionary</h3>
        </div>
        <div class="panel-body">
            <form method="post" action="">
                <div class="form-group">
                <input type="text" class="form-control" name="search" placeholder="Enter a Word" />
                </div>
                <div class="form-group">
                    <label for="language">Language</label>
                    <select class="form-control" id="language" name="language">
                        <?php
                        $rlang = $this->langdb_model->get_languages();
                        foreach($rlang->result() as $lang){
                        ?>
                        <option value="<?=$lang->id;?>"><?=$lang->language;?></option>
                        <?php } ?>
                     </select>
                </div>
                <div class="form-group" style="text-align: right;">
                <button type="button" class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>
      </div>
        
    <div class="panel panel-default">
        <div class="panel-body">
            <table class="table table-bordered table-condensed">
                <thead>
                    <tr>
                        <th>Language</th>
                        <th>Texts</th>
                        <th>Total Words</th>
                        <th>Word Forms</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                    </tr>
                    <tr>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                    </tr>
                </tbody>
            </table>
        </div>
      </div>
    </div>
</div>