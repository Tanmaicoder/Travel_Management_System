
<?php
$errors = isset($errors) ? $errors : array();
if (count($errors) > 0) :
    foreach ($errors as $error) :
        echo "<p class='error'>$error</p>";
    endforeach;
endif;
?>
