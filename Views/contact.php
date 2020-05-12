<?php
$errors = $errors ?? [];
$data = $data ?? [];

echo '<pre>';
var_dump($errors, $data);
echo '</pre>';
?>
<div class="container">
    <h1>Contact</h1>
</div>
<form method="post" action="/contact" class="container" class="needs-validation" novalidate>
    <div class="form-group">
        <label for="validationCustom01">Email address</label>
        <input type="email" class="form-control" id="validationCustom01" name="email" required <?php echo isset($errors['email']) ? 'is-invalid' : '' ?>>
        <div class="invalid-feedback">
            <?php echo $errors['email'] ?? '' ?>
        </div>
        <div class="valid-feedback">
            Looks good!
        </div>
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>