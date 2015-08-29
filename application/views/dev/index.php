<form action="<?=base_url();?>dev/fields" method="post">
<table>
    <tr>
        <td>
            Table
        </td>
        <td>
            <select name="table">
                <?php
                 $rtables = mysql_query("show tables;");
                 while($tables=  mysql_fetch_array($rtables)){
                     ?>
                 <option><?=$tables[0];?></option>
                 <?php
                 }
                 ?>
             </select>
        </td>
    </tr>
    <tr>
        <td colspan="2" align="right"><input type="submit" value="Next" /></td>
    </tr>
</table>
</form>
