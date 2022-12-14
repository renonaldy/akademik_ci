<h2 style="font-weight: normal;"><?php echo $title;?></h2>
<div class="push">
    <ol class="breadcrumb">
        <li><i class='fa fa-home'></i> <a href="javascript:void(0)">Home</a></li>
        <li><?php echo anchor($this->uri->segment(1),$title);?></li>
      
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
echo form_open_multipart($this->uri->segment(1).'/bayar');
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
    $param=array('prodi_id'=>$this->session->userdata('keterangan'));
}
?>
<?php
echo $this->session->flashdata('pesan');
$status=array(0=>'Lunas',1=>'Pembayaran Ke 1',2=>'Pembayaran Ke 2',3=>'Pembayaran Ke 3',4=>'Pembayaran Ke 4');
?>
<?php
echo form_open('download/bayar');
?>
<div class="col-sm-6">    
<table class="table table-bordered">
    <tr  class="success"><th colspan="3">Penulisan Nama File Upload </th></tr>
    <tr><td width="120">Format Tugas</td><td> NamaMatakuliah_NamaTugas_Nim_Nama </td>
    </tr>
    <tr><td>Informasi</td><td>Informasi_NamaInformasi</td></tr>
	<tr><td>Jurnal</td><td>Jurusan_JudulJurnal</td></tr>
    <td><a href='/akademik/myfile'><input value="UPLOAD-DOWNLOAD" class="btn btn-danger"> </a> </td>
 
</table>
</form>
</div>
<?php
echo form_open('download/bayar');
?>
<div class="col-sm-6">
    <table class="table table-bordered">
        <tr  class="success"><th colspan="2">Download</th></tr>
        <td width="130">Untuk mencari file yang akan di Download tinggal mencari di Kolom search
        yang sudah disediakan berdasarkan kata kunci penulisan file Upload.
		Terima Kasih.</td> 
    </table>
</div>
</form>
<?php
if($statuss!="kosong"){
?>
<?php
}
else
{
?>

<?php } ?>
