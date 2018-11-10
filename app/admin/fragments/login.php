<?php
prevent_d_access();

$page_title = "Login Page";

if ($_SERVER['REQUEST_METHOD'] === "POST" && $_POST['submit'] === 'admin-login') {
//    var_dump($_POST);
    $username = $_POST['username'];
    $pwd = $_POST['pwd'];

    $data = $db->dlookup('id, password_hash, blocked, admin', 'users', 'username = ? OR email = ?', array($username, $username));

//    var_dump($data);
    $error = '';
    if(is_array($data)) {
        if ($data['blocked']) {
            $error = "You account has been blocked";
        } else if ($data['admin']) {
            if (password_verify($pwd, $data['password_hash'])) {
                log_user($data['id']);
                redirect('admin');
            } else {
                $error = "Invalid credentials. Please try again.";
            }
        }  else {
            $error = "You are not allowed beyond this point";
        }
    } else {
        $error = "Your account is not active";
    }
}

?>




<div class="row">
    <div class="col-sm-4 col-sm-offset-4">
        <form action="" class="form my-sm-5 py-sm-5" style="margin-top: 15rem;" method="post">
            <?php if(isset($error) && !empty($error)) { ?>
                <div class="alert alert-danger">
                    <?= $error ?>
                </div>
            <?php } ?>
            <div class="form-group">
                <label for="exampleInputEmail1">Email/Username</label>
                <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="pwd" id="exampleInputPassword1" placeholder="Password">
            </div>
            <button type="submit" name="submit" value="admin-login" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
