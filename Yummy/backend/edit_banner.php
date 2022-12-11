<?php
include'./inc/header.php';
?>
<h3>Edit Banner</h3>

<div class="card">
    <div class="card-header bg-primary text-light">
    Edit Banner
    </div>
        <div class="card-body">
            <form action="../controller/banner_store.php" method="POST" enctype="multipart/form-data">
                <div class="row aling-items-center">
                        <div class="col-lg-3">
                           <label for="bannerimg"><img class="ImageplaceHolder" src="https://i1.wp.com/www.slntechnologies.com/wp-content/uploads/2017/08/ef3-placeholder-image.jpg?ssl=1" alt="" style=" width:100%;display:block "></label> 
                                             <?php
                                                if(isset($_SESSION['errors']['banner_image'])){
                                                    ?>
                                                <span class="text-danger">
                                                <?= $_SESSION['errors']['banner_image']?>
                                                    </span>
                                                    <?php 
                                                }
                                            ?>  
                           <input type="file" class=" d-none bannerInputImage" id="bannerimg" name="banner_image">
                        </div>
                        <div class="col-lg-9">
                            <label class="w-100">
                                Insert a Banner Title <span class="text-danger">*</span>
                                <input type="text" name="title" class="form-control">

                                            <?php
                                                if(isset($_SESSION['errors']['title'])){
                                                    ?>
                                                <span class="text-danger">
                                                <?= $_SESSION['errors']['title']?>
                                                    </span>
                                                    <?php 
                                                }
                                            ?>
                            </label>
                            <label class="w-100">
                                Insert a Banner Video Link <span class="text-danger">*</span>
                                <input type="text" name="video" class="form-control">
                                         <?php
                                                if(isset($_SESSION['errors']['video'])){
                                                    ?>
                                                <span class="text-danger">
                                                <?= $_SESSION['errors']['video']?>
                                                    </span>
                                                    <?php 
                                                }
                                         ?>
                            </label>
                            <label class="w-100">
                                Insert a Banner Description <span class="text-danger">*</span>
                               <textarea name="detsil" class="form-control" ></textarea>
                               <?php
                                                if(isset($_SESSION['errors']['detsil'])){
                                                    ?>
                                                <span class="text-danger">
                                                <?= $_SESSION['errors']['detsil']?>
                                                    </span>
                                                    <?php 
                                                }
                                                ?>
                            </label>
                        </div>
                </div>
                <button name="submit" class="btn btn-primary float-right">Edit Banner</button>
             </form>
    </div>
</div>

<?php
include'./inc/footer.php';
unset($_SESSION['errors']);
?>

<script>
    let inputImages = document.querySelector('.bannerInputImage')
    let Imageplaceholder =  document.querySelector('.ImageplaceHolder')
    inputImages = addEventListener('change',function (event){
        let ObjectUrl = window.URL.createObjectURL(event.target.files[0])
        Imageplaceholder.src = ObjectUrl
    })
</script>