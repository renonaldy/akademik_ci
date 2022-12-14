 <h2 style="font-weight: normal;"><?php echo $title;?></h2>
<div class="push">
    <ol class="breadcrumb">
        <li><i class='fa fa-home'></i> <a href="./jadwalkuliah">Home</a></li>
        <li><?php echo anchor($this->uri->segment(1),$title);?></li>
        <li class="active">Data</li>
    </ol>
</div>
 <script src="<?php echo base_url()?>assets/js/jquery.min.js"> </script>
<script>
$(document).ready(function(){
  $("#konsentrasi").change(function(){
      loadsemester();
  });
});
</script>
<script>
$(document).ready(function(){
  $("#konsentrasi").change(function(){
      loadmahasiswa();
  });
});
</script>
<script type="text/javascript">
function loadjurusan()
{
     var prodi=$("#prodi").val();   
      $.ajax({
	url:"<?php echo base_url();?>jadwalkuliah/tampilkankonsentrasi",
	data:"prodi=" + prodi ,
	success: function(html)
	{
            $("#konsentrasi").html(html);
             var konsentrasi=$("#konsentrasi").val();
	}
	});
}
</script>
<?php
echo form_open_multipart($this->uri->segment(1).'/post');
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
echo form_open_multipart($this->uri->segment(1).'/post');
if($this->session->userdata('level')==1)
{
    $param="";
}
else
{
    $param=array('prodi_id'=>$this->session->userdata('keterangan'));
}
?>

<div class="col-sm-3">
    <table class="table table-bordered">
    <tr><td>Tahun Akademik <?php echo buatcombo('tahun_akademik', 'akademik_tahun_akademik', '', 'keterangan', 'tahun_akademik_id', '', array('id'=>'tahun_akademik_id'))?></td></tr>
    <tr><td>Jurusan<?php echo buatcombo('jurusan', 'akademik_konsentrasi', '', 'nama_konsentrasi', 'konsentrasi_id', $param, array('id'=>'jurusan'))?></td></tr>
      
    <tr><td><?php echo anchor('jadwalkuliah','<span class="glyphicon glyphicon-plus"></span> Kembali',array('class'=>'btn btn-primary  btn-sm'));?> 
        </td></tr>
</table>
</div>

<div class="col-sm-9">
    <table class="table table-bordered" id="makul">
        <tr><td>Mata Kuliah</td>
                                           <td>
                                               <div class="col-sm-6">
                                                  <?php echo buatcombo('kuliah', 'makul_matakuliah', '', 'nama_makul', 'makul_id',$param,array('id'=>'kuliah'))?>
                                               </div>
                                   
                                        </div></td></tr>
		
        <tr><td>Dosen Pengapu</td><td>
		<div class="col-sm-6">
		<?php echo buatcombo('dosen', 'app_dosen', '', 'nama_lengkap', 'dosen_id', '', array('id'=>'dosen'))?>
		 </div>
		</td></tr>
		
        <tr><td>Hari, Jam Mulai & Selesai</td><td>
                <?php echo buatcombo('hari','app_hari','col-sm-3','hari','hari_id','',''); ?>
                <?php echo inputan('text', 'mulai','col-sm-3','Mulai 00:00', 1, '','');?>
				<?php echo inputan('text', 'selesai','col-sm-3','Selesai 00:00', 1, '','');?>
        </td></tr>
        <tr><td>Ruangan</td><td>
                <?php echo buatcombo('ruangan','app_ruangan','col-sm-3','nama_ruangan','ruangan_id','',''); ?>
            </td></tr>
        <tr><td>Semester</td><td>
		 <div class="col-sm-3">
        <?php echo form_dropdown('semester',$semester,'',"class='form-control'")?>
        </div>
    </td>
    </tr>    
    <tr><td colspan="2">  <input type="submit" name="submit" value="simpan" class="btn btn-danger  btn-sm">
	
	</td></tr>
		<tr>
    
    </table>
</div>
