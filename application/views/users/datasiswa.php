<h2 style="font-weight: normal;"><?php echo $title;?></h2>
<div class="push">
    <ol class="breadcrumb">
        <li><i class='fa fa-home'></i> <a href="javascript:void(0)">Home</a></li>
        <li><?php echo anchor($this->uri->segment(1),$title);?></li>
        <li class="active">Edit Record</li>
    </ol>
</div>
     <?php
echo form_open('users/datasiswa');
echo "<input type='hidden' name='id' value='$r[mahasiswa_id]'>";
$gender=array(1=>'Laki Laki',2=>'Perempuan');
$kawin=array(1=>'Kawin',2=>'Belum Kawin');
$class="class='form-control'";
?>
 <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Edit Record</h3>
  </div>
  <div class="panel-body">
<table class="table table-bordered">
    <tr>
    <td width="150">Nama Lengkap</td><td>
        <?php echo inputan('text', 'nama','col-sm-4','Nama Lengkap ..', 1, $r['nama'],'');?>
    </td>
    </tr>
 
            <tr>
    <td width="150">NIM </td><td>
        <?php echo inputan('text', 'nidn','col-sm-3','NIM ..', 1, $r['nim'],'');?> 
         
    </td>
    </tr>
     <tr>
    <td width="150">Tempat ,Tanggal Lahir</td><td>
        <?php echo inputan('text', 'tempat_lahir','col-sm-4','Tempat Lahir ..', 1, $r['tempat_lahir'],'');?>
        <?php echo inputan('text', 'tanggal_lahir','col-sm-2','Tanggal Lahir ..', 1, $r['tanggal_lahir'],array('id'=>'datepicker'));?>
    </td>
    </tr>
 
            <tr>
            <td width="180">Jenis Kelamin</td><td>
                <div class="col-sm-3">
                        <?php echo form_dropdown('gender',$gender,$r['gender'],$class)?>
                 </div>
            </td>
            </tr>
            
        <tr>
    <td width="150">Agama ,Status Kawin</td><td>
        <?php echo editcombo('agama','app_agama','col-sm-2','keterangan','agama_id','','',$r['agama_id']); ?>
       
    </td>
    </tr>
 
            <tr>
    <td width="150">Alamat</td><td>
        <?php echo textarea('alamat', '', 'col-sm-5', 2, $r['alamat']);?>
    </td>
    </tr>
                  
         <td></td><td colspan="2"> 
            <input type="submit" name="submit" value="simpan" class="btn btn-danger  btn-sm">
            <?php echo anchor($this->uri->segment(1),'kembali',array('class'=>'btn btn-danger btn-sm'));?>
        </td></tr>
    
</table>
  </div>
</form>