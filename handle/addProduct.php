            <?php
            require_once '../app.php';
            require_once '../inc/connection.php';

       // Check Submit
if ($request->check($request->post('submit'))) {

    // Catch Data + Validation

    // 1- Name 
    $name = $request->filtr($request->post('name'));
    $validation->endValidate($name, "Name", ["Required", "Str"]);
    $errors = $validation->getError();

    // 2- Price
    $price = $request->filtr($request->post('price'));
    $validation->endValidate($price, "Price", ["Required", "numric"]);
    $errors = array_merge($errors, $validation->getError());

    // 3- Desc
    $desc = $request->filtr($request->post('desc'));
    $validation->endValidate($desc, "Description", ["Required", "Str"]);
    $errors = array_merge($errors, $validation->getError());

    // 4 - Image Validation
    $imageValidator->validateImage();
    $imageErrors = $imageValidator->getErrors();

    // Merge image validation errors with other errors
    $errors = array_merge($errors, $imageErrors);

    // Check Errors
    if (empty($errors)) {
        // Get the validated image name and temp name
        $newName = $imageValidator->getNewName();
        $tmp_name = $imageValidator->getTempName();

        // INSERT Query
        $query = "INSERT INTO products (`name`,`price`,`desc`,`image`) VALUES ('$name','$price' , '$desc' , '$newName')";
        $runQuery = mysqli_query($connection, $query);
        if ($runQuery) {
            move_uploaded_file($tmp_name, "../images/$newName");
            $session->set("success", "Post added successfully");
            $request->redirect("../home.php");
        } else {
            $session->set("errors", ["Error while inserting data"]);
            $request->redirect("../add.php");
        }
    } else {
        $session->set("errors", $errors);
        $request->redirect("../add.php");
    }

} else {
    $session->set("errors", ["Please click Add"]);
    $request->redirect("../add.php");
}
