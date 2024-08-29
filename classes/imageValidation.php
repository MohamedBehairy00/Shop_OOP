<?php 
namespace Work\Shop_OOP\classes;

class ImageValidation {
    private $newName;
    private $tmp_name;
    private $errors = [];

    public function validateImage() {
        if (isset($_FILES['image']) && $_FILES['image']['name']) {

            $image = $_FILES['image'];
            $name = $image['name'];
            $this->tmp_name = $image['tmp_name'];
            $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
            $size = $image['size'] / (1024 * 1024); // Size in MB
            $error = $image['error'];

            // Generating a new name with a unique ID and extension
            $this->newName = uniqid() . time() . '.' . $ext;

            // Allowed image extensions
            $ext_arr = ['png', 'jpg', 'gif', 'jpeg', 'avif', 'webp'];

            if ($error != 0) {
               $this->errors[] = "Image upload error occurred.";
            } elseif (!in_array($ext, $ext_arr)) {
                $this->errors[] = "Image extension is not correct.";
            } elseif ($size > 20) {
                $this->errors[] = "Image size is too large.";
            }
        } else {
            $this->newName = null;
        }
    }

    public function getNewName() {
        return $this->newName;
    }

    public function getTempName() {
        return $this->tmp_name;
    }

    public function getErrors() {
        return $this->errors;
    }
}
