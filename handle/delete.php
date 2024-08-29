<?php

require_once '../app.php';
 require_once '../inc/connection.php'; 



if ($request->check($request->get('id')) ) {

    // Catch ID

    $id = $request->get('id');
    $query = "select id from products where id =$id";
    $runQuery = mysqli_query($connection, $query);
    if (mysqli_num_rows($runQuery) == 1) {

        // Catch image , Check and unlinked

        $post = mysqli_fetch_assoc($runQuery);
        if (!empty($post)) {
            unlink("../images/" . $post['image']);
        }

        // Query Delete

        $query = "delete from products where id=$id";
        $runQuery = mysqli_query($connection, $query);
        if ($runQuery) {
            $session->set("success", "Deleted Successfully");
            $request->redirect('../home.php');
        } else {
            $session->set("errors", ["Error while Delete"]);
            $request->redirect('../home.php');
        }
    } else {
        $session->set("errors", ["Not Correct"]);
        $request->redirect('../home.php');
    }
} else {
    $session->set("errors", ["Not Correct"]);
    $request->redirect('../home.php');
}
