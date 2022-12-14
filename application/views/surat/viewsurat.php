<script src="<?php echo base_url()?>assets/js/jquery.min.js"> </script>
<script>
function simpanstatus(id)
{
     var nilaidosen=$("#dosenid"+id).val();
    $.ajax({
    url:"<?php echo base_url();?>jadwalkuliah/simpandosen",
    data:"id=" + id +"&nilai_dosen="+nilaidosen ,
    success: function(html)
    { 
         $("#hasil").html(html);
    }
          });  
}
</script>
<?php
$status=array(0=>'Lunas',1=>'Pembayaran Ke 1',2=>'Pembayaran Ke 2',3=>'Pembayaran Ke 3',4=>'Pembayaran Ke 4');
echo form_open('surat/viewsurat');
?>
<table class="table table-bordered">
    <tr class="success"><td colspan="2">LAPORAN PENGAJUAN SURAT</td></tr>
    <tr><td width="150">Tanggal Mulai</td><td><?php echo inputan('text', 'tanggal1','col-sm-3','Tanggal Awal ..', 1, $tanggal1,array('id'=>'datepicker'));?></td></tr>
     <tr><td>Tanggal Sampai</td><td><?php echo inputan('text', 'tanggal2','col-sm-3','Tanggal Akhir ..', 1, $tanggal2,array('id'=>'datepicker1'));?></td></tr>
     <tr><td colspan="2"><input type="submit" name="submit" value="Preview" class="btn btn-danger  btn-sm"> <colspan="2"><?php echo anchor('surat/clear','Reset',array('class'=>'btn btn-danger'));?>
             
         </td></tr>
</table>
</form>
<?php
if(isset($_POST['submit']))
{

?>
<table class="table table-bordered">
    <tr class="success"><th colspan="8">Riwayat Pengajuan Surat Detail</th></tr>
    <tr><th width="10">No</th>
        <th width="150">Jenis Pengajuan Surat</th>
        <th width="120">Tanggal</th>
        <th width="50">Jumlah</th>
        <th width="200">Pemohon</th>
		<th width="85">Status</th>
		<th width="10">Proses</th></tr>
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
									
            <td align='center'>".anchor('surat/edit/'.$r->pembayara_detail_id,'<i class="fa fa-pencil-square-o"></i>',array('title'=>'Proses Pengajuan')).
			
			
			"</tr>";	
        $i++;
    }
    ?> 
</table>

<?php } ?>


