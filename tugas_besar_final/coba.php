<div class="row">
  <ul class='thumbnails'>
       <?php
       //bata paging 
  include('koneksi.php');    
$query="SELECT * from tabel_barang order by ID_BARANG desc";
$result=mysqli_query($koneksi,$query) ;
$no=1;
//proses menampilkan data
while($rows=mysqli_fetch_array($result,MYSQL_ASSOC)){
?>
  <li class="span3">
  <div class="thumbnail pagination-centered">
  <h4><a href="#"><?php echo $rows['NAMA_BARANG'];?>&nbsp;<?php echo $rows ['KATEGORI'];?></a></h4>
  <hr class="lessspace" />
         <img src="" alt=""/>
<p><a class="btn btn-large btn-block btn-primary"
href="index.php?mod=chart&pg=chart&action=add&id=<?=$rows->ID_BARANG?>">
<i class="icon-shopping-cart icon-white"></i> Harga Rp.<?php echo $rows ['HARGA_BARANG'];?>,00 </a>
        </p>
      </div>
    </li>
    <?php
$no++;
}?>
</ul>
</div>