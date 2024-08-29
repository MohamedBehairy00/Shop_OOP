<?php 

require_once '../app.php';
require_once '../inc/connection.php';

// Check if form is submitted
if ($request->check($request->post('submit'))) {

    // Catch Data + Validation

    // 1- Email
    $email = $request->filtr($request->post('email'));
    $validation->endValidate($email, "Email", ["Required", "filterVar"]);
    $errors = $validation->getError();

    // 2- Password
    $password = $request->filtr($request->post('password'));
    $validation->endValidate($password, "Password", ["Required", "legnth", "numric"]);
    $errors = array_merge($errors, $validation->getError());

    // Check Errors
    if (empty($errors)) {

        // Query to check if the user exists
        $query = "SELECT * FROM users WHERE email = '$email'";
        $runQuery = mysqli_query($connection, $query);

        if (mysqli_num_rows($runQuery) == 1) {
            $user = mysqli_fetch_assoc($runQuery);
            $oldPassword = $user['password'];
            $name = $user['name'];

            // Verify the passwordy
            if (password_verify($password, $oldPassword)) {
                $session->set("success", "Welcome $name");
                $request->redirect("../home.php");
            } else {
                $session->set("errors", ["Incorrect credentials"]);
                $request->redirect("../Login.php");
            }

        } else {
            $session->set("errors", ["Email not found"]);
            $request->redirect("../Login.php");
        }

    } else {
        $session->set("errors", $errors);
        $request->redirect("../Login.php");
    }

} else {
    $session->set("errors", ["Invalid request"]);
    $request->redirect("../Login.php");
}

?>