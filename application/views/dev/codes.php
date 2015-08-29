<?php
$label = $this->input->post('label');
$textactive = false;
$dateactive =false;
?>
list.php
<textarea name="list" rows="50" cols="100">
<div class="row">
    <div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title"> <i class="glyphicon glyphicon-th-list"></i>
              Manage <?=$this->input->post('pheader');?></h3>
           </div>
        <div class="panel-body">
                    <table class="table table-striped table-bordered" style="width:100%!important;">
                        <thead>
                            <tr>
                                <?php foreach($this->input->post('field') as $key => $value){ ?>
                                <th><?=$label[$key];?></th>
                                <?php } ?>
                                <th style="text-align: center;" width="100px">
                                    <a href="&lt;?=base_url();?><?=$_POST['controller'];?>/add_<?=$_POST['variable_name'];?>" class="btn btn-sm btn-success fancybox"><i class="glyphicon glyphicon-plus"> </i></a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            &lt;?php $r<?=$_POST['variable_name'];?> = $this-><?=$_POST['model'];?>->get_<?=$_POST['pvariable_name'];?>();
                            foreach($r<?=$_POST['variable_name'];?>->result() as $<?=$_POST['variable_name'];?>){ ?>
                            <tr>
                                <?php foreach($this->input->post('field') as $key => $value){ 
                                    if(isset($_POST['istext'][$key])){
                                        $textactive = true;
                                    }
                                    if(isset($_POST['isdate'][$key])){
                                        $dateactive = true;
                                    }
                                    ?>
                                
                                <?php if(isset($_POST['istext'][$key])){ ?>
                                        <td>&lt;?=nl2br($<?=$_POST['variable_name'];?>-><?=$value;?>);?></td>
                                <?php }else if(isset($_POST['isbool'][$key])){ ?>
                                        <td>&lt;?=conv_yesno($<?=$_POST['variable_name'];?>-><?=$value;?>);?></td>            
                                <?php }else{ ?>
                                        <td>&lt;?=$<?=$_POST['variable_name'];?>-><?=$value;?>;?></td>
                                <?php } ?>
                                <?php } ?>
                                <td style="text-align: center;" class="td-actions">
                                    <a href="&lt;?=base_url();?><?=$_POST['controller'];?>/edit_<?=$_POST['variable_name'];?>/&lt;?=$<?=$_POST['variable_name'];?>-><?=$_POST['primary'];?>;?>" title="Edit" class="btn btn-sm btn-warning fancybox"><i class="glyphicon glyphicon-edit"> </i></a>
                                    <a href="javascript:;" class="btn btn-danger btn-sm" title="Delete"
                                       onclick ="
                                        var agree=confirm('Do you want to DELETE the record?');
                                        if (agree){
                                            $.post(
                                                    '&lt;?=base_url();?>main/delete_item',
                                                    {
                                                        table: '<?=substr($_POST['table'],4);?>',
                                                        id_name: '<?=$_POST['primary'];?>',
                                                        id: '&lt;?=$<?=$_POST['variable_name'];?>-><?=$_POST['primary'];?>;?>'
                                                    },function(data){
                                                        window.location.reload(true);
                                                    }
                                                );
                                        }
                                    "
                                       ><i class="glyphicon glyphicon-remove"> </i></a>
                                </td>
                            </tr>
                            &lt;?php } ?>
                        </tbody>
                    </table>  
                </div>
      </div>
    </div>
          <!-- /widget -->
</div>
</textarea>
<br />
controller
<textarea name="controller" rows="50" cols="100">
//<?=$this->input->post('pheader');?>

        public function <?=$_POST['pvariable_name'];?>()
	{              
                
                $this->load->model('<?=$_POST['model'];?>');
                if(isValidUser()){
                
                $data['page'] = $this->load->view("contents/<?=$_POST['controller'];?>/<?=$_POST['pvariable_name'];?>/list",null,true);    
		$this->load->view($this->container,$data);    
                }else{
                    $this->unAuthorizeduser();
                }
	}
         public function add_<?=$_POST['variable_name'];?>()
	{           
            
            $this->load->model('<?=$_POST['model'];?>');
                if(isValidUser()){
                $data['header'] = "Add <?=$this->input->post('header');?>";
                $this->load->view("contents/<?=$_POST['controller'];?>/<?=$_POST['pvariable_name'];?>/add",$data);    
                }else{
                    $this->unAuthorizeduser();
                }
	}
        public function save_<?=$_POST['variable_name'];?>(){
            
            $this->load->model('<?=$_POST['model'];?>');
            if(isValidUser()){
            $data=array(
                <?php $x=0; foreach($this->input->post('field') as $key => $value){ ?>                                
                                <?php
                                if($x==0){
                                  ?>
                                  '<?=$value;?>' => <?php if(!isset($_POST['allownull'][$key])){ ?>$this->input->post('<?=$value;?>') <?php }else{ ?> ($this->input->post('<?=$value;?>')=="0")?null:$this->input->post('<?=$value;?>') <?php } ?>
                                  <?php
                                }else{
                                ?>
                                  ,'<?=$value;?>' => <?php if(!isset($_POST['allownull'][$key])){ ?>$this->input->post('<?=$value;?>') <?php }else{ ?> ($this->input->post('<?=$value;?>')=="0")?null:$this->input->post('<?=$value;?>') <?php } ?>
                                <?php } ?>
                <?php $x++; } ?>
            );
            }else{
                    $this->unAuthorizeduser();
                }
            
            $this-><?=$_POST['model'];?>->insert_entry('<?=$_POST['table'];?>',$data);
        }
        public function edit_<?=$_POST['variable_name'];?>()
	{           
            
            $this->load->model('<?=$_POST['model'];?>');
                if(isValidUser()){
                $data['header'] = "Edit <?=$this->input->post('header');?>";
                $this->load->view("contents/<?=$_POST['controller'];?>/<?=$_POST['pvariable_name'];?>/edit",$data);    
                }else{
                    $this->unAuthorizeduser();
                }
	}
        
        public function update_<?=$_POST['variable_name'];?>(){
            
            $this->load->model('<?=$_POST['model'];?>');
            $id=$this->input->post('<?=$_POST['primary'];?>');
            if(isValidUser()){
            $data=array(
                <?php $x=0; foreach($this->input->post('field') as $key => $value){ ?>
                                <?php
                                if($x==0){
                                  ?>
                                  '<?=$value;?>' => <?php if(!isset($_POST['allownull'][$key])){ ?>$this->input->post('<?=($_POST['primary']==$value)?$value."val":$value;?>') <?php }else{ ?> ($this->input->post('<?=$value;?>')=="0")?null:$this->input->post('<?=$value;?>') <?php } ?>
                                  <?php
                                }else{
                                ?>
                                  ,'<?=$value;?>' => <?php if(!isset($_POST['allownull'][$key])){ ?>$this->input->post('<?=($_POST['primary']==$value)?$value."val":$value;?>') <?php }else{ ?> ($this->input->post('<?=$value;?>')=="0")?null:$this->input->post('<?=$value;?>') <?php } ?>
                                <?php } ?>
                <?php $x++; } ?>
            );
            
            $this-><?=$_POST['model'];?>->update_entry('<?=$_POST['table'];?>','<?=$_POST['primary'];?>',$id,$data);
            }else{
                    $this->unAuthorizeduser();
                }
        }
        
// END OF <?=$this->input->post('pheader');?>
</textarea> <br />
edit.php
<textarea name="edit" rows="50" cols="100">
<html>
    <head>     

        <?php if($dateactive){ ?>
        <script src="<?=base_url();?>media/js/jquery-1.11.1.min.js"></script>
            <script src="<?=base_url();?>media/js/jquery-ui.min.js"></script>
            <link href="<?=base_url();?>media/css/jquery-ui.min.css" rel="stylesheet"  />
        <?php } ?>

        <style type="text/css">

        </style>
    </head>
    <body>
<div class="crud-form">
    <div class="crud-header">
        &lt;?=$header;?>
    </div>
    <div class="crud-content">
        <table style="width:400px;margin:auto;" border="0">
            <tbody>
                &lt;?php
                $r<?=$_POST['variable_name'];?> = $this-><?=$_POST['model'];?>->get_<?=$_POST['variable_name'];?>($this->uri->segment(3,0));
                foreach($r<?=$_POST['variable_name'];?>->result() as $<?=$_POST['variable_name'];?>){
                ?>                
                <?php foreach($this->input->post('field') as $key => $value){ ?>
                <tr>
                    <td width="100" class="crud-label"><?php $label = $this->input->post('label'); echo $label[$key];?></td>
                    <td>
                        <?php if(isset($_POST['select'][$key])){ ?>
                        <select class="form-control" name="<?=$value;?>">
                            <?php if(isset($_POST['allownull'][$key])){ ?>
                            <option value="0">-none-</option>
                            <?php } ?>
                            &lt;?php
                             $rvalue = mysql_query("select * from <?=$_POST['select_table'][$key];?>");
                             while($value=  mysql_fetch_array($rvalue)){
                                 ?>
                             <option &lt;?=($<?=$_POST['variable_name'];?>-><?=$value;?>==$value[0])?"selected":"";?> value="&lt;?=$value[0];?>">&lt;?=$value[1];?></option>
                             &lt;?php
                             }
                             ?>
                         </select>
                        <?php }else if(isset($_POST['isbool'][$key])){ ?>
                        <input type="checkbox" name="<?=$value;?>" &lt;?=($<?=$_POST['variable_name'];?>-><?=$value;?>=='1')?'checked':'';?> value="1" />
                        <?php }else if(isset($_POST['istext'][$key])){ ?>
                        <textarea name="<?=$value;?>"
                                  class="form-control <?php  if(isset($_POST['tinymce'][$key])){ ?>mceEditor<?php }else{ ?>mceNoEditor<?php } ?>"
                                  >&lt;?=$<?=$_POST['variable_name'];?>-><?=$value;?>;?>&lt;/textarea>
                        <?php }else{ ?>
                        <div class="form" style="">
                        <input type="text"
                               class="form-control 
                               <?php
                               if(isset($_POST['isdate'][$key])){
                               ?>
                               datepicker
                               <?php } ?>
                               "
                               name="<?=$value;?>" value="&lt;?=$<?=$_POST['variable_name'];?>-><?=$value;?>;?>"/>
                        </div>
                        <?php } ?>
                    </td>
                </tr>
                <?php } ?>
                
                <tr>
                    <td>&nbsp;</td>
                    <td colspan="2" align="right"><input class="button right btn btn-primary" type="submit" 
                                           onclick="
                                                $(this).hide();
                                               $.post('&lt;?=base_url();?><?=$_POST['controller'];?>/update_<?=$_POST['variable_name'];?>',
                                               {
                                               <?=$_POST['primary'];?>: '&lt;?=$<?=$_POST['variable_name'];?>-><?=$_POST['primary'];?>;?>'
                                               <?php foreach($this->input->post('field') as $key => $value){ ?>                                
                                               ,<?=($_POST['primary']==$value)?$value."val":$value;?>: <?php if(isset($_POST['isbool'][$key])){ ?>($('input[name=<?=$value;?>]').is(':checked')==true?'1':'0')<?php }else{ ?>$('<?=(isset($_POST['select'][$key]))?"select":((isset($_POST['istext'][$key]))?"textarea":"input")?>[name=<?=$value;?>]').val()<?php } ?>
                                                <?php } ?>
                                               },function(){
                                                    window.location.reload(true);
                                               });
                                           "
                                           value="Update" /></td>
                </tr>
                &lt;?php } ?>
            </tbody>
        </table>
    </div>
</div>
  </body>
</html>
</textarea><br />
add.php
<textarea name="add" rows="50" cols="100">
<html>
    <head>     
    </head>
    <body>
<div class="crud-form">
    <div class="crud-header">
        &lt;?=$header;?>
    </div>
    <div class="crud-content">
        <table border="0">
            <tbody>
                <?php foreach($this->input->post('field') as $key => $value){ ?>
                <tr>
                    <td width="100" class="crud-label"><?php $label = $this->input->post('label'); echo $label[$key];?></td>
                    <td>
                        <?php if(isset($_POST['select'][$key])){ ?>
                        <select class="form-control" name="<?=$value;?>">                            
                            <?php if(isset($_POST['allownull'][$key])){ ?>
                            <option value="0">-none-</option>
                            <?php } ?>
                            &lt;?php
                             $rvalue = mysql_query("select * from <?=$_POST['select_table'][$key];?>");
                             while($value=  mysql_fetch_array($rvalue)){
                                 ?>
                             <option value="&lt;?=$value[0];?>">&lt;?=$value[1];?></option>
                             &lt;?php
                             }
                             ?>
                         </select>
                        <?php }else if(isset($_POST['isbool'][$key])){ ?>
                        <input type="checkbox" name="<?=$value;?>" value="1" />
                        <?php }else if(isset($_POST['istext'][$key])){ ?>
                        <textarea name="<?=$value;?>"
                                  class="form-control <?php  if(isset($_POST['tinymce'][$key])){ ?>mceEditor<?php }else{ ?>mceNoEditor<?php } ?>"
                                  >&lt;/textarea>
                        <?php }else{ ?>
                        <div class="form" style="">
                        <input type="text" name="<?=$value;?>"                                
                               class="form-control
                               <?php
                               if(isset($_POST['isdate'][$key])){
                               ?>
                               datepicker
                               <?php } ?>
                               "
                               value=""/>
                        </div>
                        <?php } ?>
                    </td>
                </tr>
                <?php } ?>
                <tr>
                    <td>&nbsp;</td>
                    <td colspan="2" align="right"><input class="button right btn btn-primary" type="submit" 
                                           onclick="
                                                $(this).hide();
                                               $.post('&lt;?=base_url();?><?=$_POST['controller'];?>/save_<?=$_POST['variable_name'];?>',
                                               {
                                               <?php $x=0; foreach($this->input->post('field') as $key => $value){ ?> 
                                                       <?php if($x==0){ ?>
                                               <?=$value;?>: <?php if(isset($_POST['isbool'][$key])){ ?>($('input[name=<?=$value;?>]').is(':checked')==true?'1':'0')<?php }else{ ?>$('<?=(isset($_POST['select'][$key]))?"select":((isset($_POST['istext'][$key]))?"textarea":"input")?>[name=<?=$value;?>]').val()<?php } ?>
                                               <?php }else{ ?>
                                               ,<?=$value;?>: <?php if(isset($_POST['isbool'][$key])){ ?>($('input[name=<?=$value;?>]').is(':checked')==true?'1':'0')<?php }else{ ?>$('<?=(isset($_POST['select'][$key]))?"select":((isset($_POST['istext'][$key]))?"textarea":"input")?>[name=<?=$value;?>]').val()<?php } ?>
                                                   <?php } ?>
                                                <?php $x++; } ?>
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
</textarea> <br />
model
<textarea name="model" rows="50" cols="100">
//<?=$this->input->post('pheader');?>

    function get_<?=$_POST['pvariable_name'];?>(){
        $sql = "select * from <?=$_POST['table'];?>;";
        return $this->db->query($sql);
    }
    
    function get_<?=$_POST['variable_name'];?>($id){
        $sql = "select * from <?=$_POST['table'];?> where <?=$_POST['primary'];?> = '$id'";
        return $this->db->query($sql);
    }
//End of <?=$this->input->post('pheader');?>
</textarea>