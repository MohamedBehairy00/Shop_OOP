<?php include 'inc/header.php'; ?>
<?php require_once 'inc/connection.php'; ?>
<?php require_once 'app.php'?>
<?php require_once 'inc/errors.php' ?>
<?php require_once 'inc/success.php' ?>
<?php 

$Products = $products->SelectAll('*','products');


?>


<div class="container my-5">

    <div class="row">
        




    <?php 
    
    if (!empty($Products)) {

        foreach($Products as $product){ 

        
        ?>

<div class="col-lg-4 mb-3">

    <div class="card">
        <img src="images/<?php echo  $product['image'] ?>" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title"><?php echo  $product['name'] ?></h5>
            <p class="text-muted"><?php echo  $product['price'] ?></p>
            <p class="card-text"><?php echo  $product['desc']  ?></p>
            <a href="show.php?id=<?php echo  $product['id']  ?>" class="btn btn-primary">Show</a>

            <a href="edit.php?id=<?php echo $product['id'] ?>" class="btn btn-info">Edit</a>
            <a href="handle/delete.php?id=<?php echo $product['id'] ?>" class="btn btn-danger" >Delete</a>

        </div>
    </div>
    
</div>

<?php } 

}else{
  ?>  <div class="alert alert-danger"> No Data </div> <?php
} ?>


   
    
        
    </div>

</div>



<?php include 'inc/footer.php'; ?>


