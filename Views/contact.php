<?php
$errors = $errors ?? [];
$data = $data ?? [];
?>
<div class="container">
    <h1>Contact</h1>
</div>
<form method="post" action="/contact" class="container" class="needs-validation" novalidate>
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="validationCustom02" name="email" required>
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>