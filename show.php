<?php include 'inc/header.php'; ?>
<?php require_once 'inc/connection.php'; ?>
<?php require_once 'app.php'?>
<?php 


if ($request->get('id')) {
    $id = $request->get('id') ;
}else{
    $request->redirect("home.php");
}

$Products = $products->SelectOne("*" , "products" , "$id");

?>



<div class="container my-5">

    <div class="row">


    <div class="col-lg-6">
            <img src="images/<?php echo $Products['image'] ?>" class="card-img-top">
            </div>
            <div class="col-lg-6">
            <h5 ><?php echo $Products['name'] ?></h5>
            <p class="text-muted">Price:<?php echo $Products['price'] ?>EGP</p>
            <p><?php echo $Products['desc'] ?></p>
            <a href="home.php" class="btn btn-primary">Back</a>
            <a href="edit.php?id=<?php echo $Products['id'] ?>" class="btn btn-info">Edit</a>
            <a href="handle/delete.php?id=<?php echo $Products['id'] ?>" class="btn btn-danger" >Delete</a>
        </div>
        
    </div>
</div>



<?php include 'inc/footer.php'; ?>