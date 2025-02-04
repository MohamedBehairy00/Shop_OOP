<?php

require_once '../app.php';
require_once '../inc/connection.php';

if ($request->check($request->post('submit')) && $request->check($request->get('id'))) {

    // Get ID
    $id = $request->get('id');

    // 1- Name
    $name = $request->filtr($request->post('name'));
    $validation->endValidate($name, "Name", ["Required", "Str"]);
    $errors = $validation->getError();

    // 2- Price
    $price = $request->filtr($request->post('price'));
    $validation->endValidate($price, "Price", ["Required", "numric"]);
    $errors = array_merge($errors, $validation->getError());

    // 3- Description
    $desc = $request->filtr($request->post('desc'));
    $validation->endValidate($desc, "Description", ["Required", "Str"]);
    $errors = array_merge($errors, $validation->getError());

    // 4 - Image Validation
    $imageValidator->validateImage();
    $errors = array_merge($errors, $imageValidator->getErrors());

    // Check Errors
    if (empty($errors)) {
              // Get the validated image name and temp name
              $newName = $imageValidator->getNewName();
              $tmp_name = $imageValidator->getTempName();

              $query="select * from products where id=$id" ;
              $runQuery = mysqli_query($connection,$query) ;
              if (mysqli_num_rows($runQuery) > 0) {
                $Products = mysqli_fetch_assoc($runQuery);
                $oldImage = $Products['image'] ;
              }
      
        // Update the product in the database
        $query = "UPDATE products SET `name` = '$name', `price` = '$price', `desc` = '$desc'";
        if ($newName) {
            $query .= ", `image` = '$newName'";
        }
        $query .= " WHERE id = $id";

        $runQuery = mysqli_query($connection, $query);

        if ($runQuery) {
            // If a new image is uploaded, delete the old image and move the new one
            if (!empty($newName)) { // Ensure old image is not empty
                unlink("../images/".$oldImage);
                move_uploaded_file($tmp_name, "../images/$newName");
            }
            $session->set("success", "Product updated successfully");
            $request->redirect("../home.php");
        } else {
            $session->set("errors", ["Error while updating data"]);
            $request->redirect("../edit.php?id=$id");
        }

    } else {
        $session->set("errors", $errors);
        $request->redirect("../edit.php?id=$id");
    }
} else {
    $session->set("errors", ["Invalid request"]);
    $request->redirect("../edit.php");
}
