<h2 style="font-weight: normal;"><?php echo $title;?></h2>
<div class="push">
    <ol class="breadcrumb">
        <li><i class='fa fa-home'></i> <a href="javascript:void(0)">Home</a></li>
        <li><?php echo anchor($this->uri->segment(1),$title);?></li>
        <li class="active">Entry Record</li>
    </ol>
</div>


<script src="<?php echo base_url();?>assets/js/1.8.2.min.js"></script>
 
 
  <script>
  $( document ).ready(function() { 
      hidesemster();
  });
</script>

  <script type="text/javascript">
$(document).ready(function(){
  $("#jenis_pembayaran").change(function(){
       hidesemster();
  });
});
</script>

<script type="text/javascript">
function hidesemster()
{
     var jenis_pembayaran=$("#jenis_pembayaran").val();
        if(jenis_pembayaran==3)
            {
                $("#semester").show()
            }
            else
                {
                     $("#semester").hide()
                }
}
</script>
  <?php
echo form_open_multipart($this->uri->segment(3).'surat/editsurat');
echo "<input type='hidden' name='id' value='$r[pembayara_detail_id]'>";
$semester=array(1=>'Semester 1',
                2=>'Semester 2',
                3=>'Semester 3',
                4=>'Semester 4',
                5=>'Semester 5',
                6=>'Semester 6',
                7=>'Semester 7',
                8=>'Semester 8');
if($this->session->userdata('level')==1)
{
    $param="";
}
else
{
    $param=array('pembayara_detail_id'=>$this->session->userdata('keterangan'));
}
?>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Edit Record</h3>
  </div>
<table class="table table-bordered">
    
    <tr>
    <td width="150">Kode / Nama Matakuliah</td><td>
        <?php echo inputan('text', 'kode','col-sm-2','Kode Matakuliah ..', 1, strtoupper($r->status),'');?>
        
    </td>
    </tr>
         <td></td><td colspan="2"> 
            <input type="submit" name="submit" value="simpan" class="btn btn-danger  btn-sm">
            <?php echo anchor($this->uri->segment(3),'kembali',array('class'=>'btn btn-danger btn-sm'));?>
        </td></tr>
    
</table>
</div></div>
</form>
