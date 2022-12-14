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
echo form_open_multipart($this->uri->segment(1).'/pembayaran');
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
echo form_open('surat/pembayaran');
?>
<div class="col-sm-6">    
<table class="table table-bordered">
    <tr  class="success"><th colspan="3">Data Mahasiswa </th></tr>
    <tr><td width="120">NIM Mahasiswa</td><td> <?php echo inputan('text', 'nim','col-sm-6','Masukan Nim..', 1, '','');?> <input type="submit" value="OK" name="submit" class="btn btn-danger"> <?php echo anchor('surat/reset','Reset',array('class'=>'btn btn-danger'));?></td>
        <td wisth="90" align="center" rowspan="3"><img src="<?php echo base_url()?>assets/images/noprofile.gif" width="85"></td>
    </tr>
    <tr><td>Nama</td><td>  : <?php echo $statuss=="kosong"?"":strtoupper($profile['nama'])?></td></tr>
    <tr><td>Prodi /Konsentrasi</td><td> : <?php echo $statuss=="kosong"?"":strtoupper($profile['nama_konsentrasi'].' / '.$profile['nama_prodi'])?></td></tr>
 
</table>
</form>
</div>
<?php
echo form_open('surat/pembayaran');
?>
<div class="col-sm-6">
    <table class="table table-bordered">
        <tr  class="success"><th colspan="2">Form Pengajuan</th></tr>
        <tr><td width="130">Jenis Pengajuan</td><td>
            <?php echo buatcombo('jenis','pengajuan_jenis_surat','col-sm-6','keterangan','jenis_bayar_id','',array('id'=>'jenis_pembayaran')); ?>
         <tr><td>Semester</td><td>  
				<div class="col-md-6">
				  <?php echo form_dropdown('semester',$semester,'',"class='form-control'")?>
		
                    </select>
                </div>
            </td></tr>
       
        <tr><td>Jumlah</td><td><?php echo inputan('text', 'jumlah','col-sm-3','QTY.', 1, '','');?> <input type="submit" name="submit2" value="Simpan" class="btn btn-danger"></td></tr>
    </table>
</div>
</form>
<?php
if($statuss!="kosong"){
?>
 

<table class="table table-bordered">
    <tr class="success"><th colspan="7">Riwayat Pengajuan Surat Detail</th></tr>
    <tr><th width="10">No</th>
        <th width="500">Jenis Pengajuan Surat</th>
        <th width="120">Tanggal</th>
        <th width="160">Jumlah</th>
        <th width="200">Petugas</th>
		<th width="200">Status</th>
		<th width="10">Operasi</th></tr>
    <?php
    $i=1;
    
    foreach ($transaksi as $r)
    {
        $smt=$r->jenis_bayar_id==3?$r->semester:'';
        echo "<tr>
            <td>$i</td>
            <td>".  strtoupper($r->keterangan)." $smt</td>
            <td>".  tgl_indo($r->tanggal)."</td>
            <td>".rp((int)$r->jumlah)."</td>
            <td>".  strtoupper($r->nama)."</td>
			<td>".  strtoupper($r->status)."</td>
            <td align='center'>".anchor('surat/delete/'.$r->pembayara_detail_id,'<i class="fa fa-trash-o"></i>',array('title'=>'Hapus Catatan'))."</td></tr>";
		
        $i++;
    }
    ?> 
</table>


<?php
}
else
{
?>

<?php } ?>
