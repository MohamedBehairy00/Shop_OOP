<?php include 'inc/header.php';?>
<?php require_once 'inc/connection.php'; ?>
<?php require_once 'app.php'?>


<div class="container my-5">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
        <?php require_once 'inc/errors.php' ?>
        <?php require_once 'inc/success.php' ?>

            <form action="handle/addProduct.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name = "name"   value=" <?php if($session->get('name')); $session->remove('name') ; ?>">
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price:</label>
                    <input type="number" class="form-control" id="price" name="price" value=" <?php if($session->get('price')); $session->remove('price') ; ?>" >
                </div>

                <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description:</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name = "desc"> <?php if($session->get('desc')); $session->remove('desc') ?></textarea>
                </div>

                <div class="mb-3">
                <label for="formFile" class="form-label">Image:</label>
                <input class="form-control" type="file" id="formFile" name="image">
                </div>

                <center><button on type="submit" class="btn btn-primary" name="submit">Add</button></center>
            </form>
        </div>
    </div>
</div>


<?php include 'inc/footer.php'; ?>