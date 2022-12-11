<?php
include'./inc/header.php';
include'../Database/env.php';

$query = "SELECT * FROM banners";
$data = mysqli_query($conn,$query);

$banners = mysqli_fetch_all($data,1);
// print_r($banners);


?>

<h3>All Banners</h3>



<table class="table w-100">
    <tr>
        <th> # </th>
        <th> Banner Title</th>
        <th> Banner Detail</th>
        <th> Banner Image</th>
        <th> Status</th>
        <th> Actoin </th>
    </tr>
    <?php
    foreach($banners as $key=>$banner){
        ?>
        <tr>
        <td><?= ++$key ?></td>
        <td><?= $banner['title']?></td>
        <td><?= $banner['detail']?></td>
        <td><img src="<?= "../uploads_img/banner/".$banner['banner_img']?>" alt="" style="height: 100px; Width: 100px;border-radius:100% ;"></td>
        <td><span class="badge <?= $banner['status'] == 0 ? 'bg-danger':'bg-success'?> text-light"><?= $banner['status'] == 0 ? 'De-active':'Active'?></span></td>
    <td>
    <a href="../controller/banner_status_up.php?id=<?=$banner['id']?>" 
    class="btn btn-warning">
    <?= $banner['status'] != 0 ? 'De-active':'Active'?>
    </a>
        <a href="./edit_banner.php?id=<?=$banner['id']?>" class="btn btn-primary">Edit</a>
        <a href="../controller/banner_deleted.php?id=<?=$banner['id']?>"class="btn btn-danger bannerDelete">Delete</a>
    </td>
    </tr> 
<?php    
}
?>
</table>


<?php
include'./inc/footer.php';
?>


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"> </script>
<script>
  let deleteBtn = document.querySelectorAll(".bannerDelete")

  for(i = 0; i< deleteBtn; i++){
   
  deleteBtn[i].addEventListener('click',function(event){
event.preventDefault();
let link = event.target.href
Swal.fire({
title: 'Are you sure?',
text: "You won't be able to revert this!",
icon: 'warning',
showCancelButton: true,
confirmButtonColor: '#3085d6',
cancelButtonColor: '#d33',
confirmButtonText: 'Yes, delete it!'
}).then((result) => {
if (result.isConfirmed) {
window.location = link
// Swal.fire(
//   'Deleted!',
//   'Your file has been deleted.',
//   'success'
// )
}
})
})    
  }

</script>