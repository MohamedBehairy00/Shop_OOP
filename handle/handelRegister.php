<?php 

require_once '../app.php';
require_once '../inc/connection.php';

// Check if form is submitted
if ($request->check($request->post('submit'))) {

    // Catch Data + Validation

    // 1- Name 
    $name = $request->filtr($request->post('name'));
    $validation->endValidate($name, "Name", ["Required", "Str"]);
    $errors = $validation->getError();

    // 2- Email
    $email = $request->filtr($request->post('email'));
    $validation->endValidate($email, "Email", ["Required", "filterVar"]);
    $errors = array_merge($errors, $validation->getError());

    // 3- Password
    $password = $request->filtr($request->post('password'));
    $validation->endValidate($password, "Password", ["Required", "legnth", "numric"]);
    $errors = array_merge($errors, $validation->getError());
    
    // Hash the password
    $passwordHashed = password_hash($password, PASSWORD_DEFAULT);

    // 4 - Phone
    $phone = $request->filtr($request->post('phone'));
    $validation->endValidate($phone, "Phone", ["Required", "numric", "legnth"]);
    $errors = array_merge($errors, $validation->getError());

    // Check Errors
    if (empty($errors)) {

        // INSERT Query
        $query = "INSERT INTO users (name, email, password, phone) VALUES ('$name', '$email', '$passwordHashed', '$phone')";
        $runQuery = mysqli_query($connection, $query);

        if ($runQuery) {
            $session->set("success", "Registration successful");
            $request->redirect("../Login.php");
        } else {
            $session->set("errors", ["Error while inserting"]);
            $request->redirect("../register.php");
        }

    } else {
        $session->set("errors", $errors);
        $request->redirect("../register.php");
    }

} else {
    $session->set("errors", ["Invalid request"]);
    $request->redirect("../add.php");
}

?>