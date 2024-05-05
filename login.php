<?php 
session_start();

include "layout/header.php";

if(isset($_COOKIE['id']) && $_COOKIE['key']){
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    $result = mysqli_query($conn,"SELECT username FROM user WHERE id = '$id'");

    $row= mysqli_fetch_assoc($result);

    if($key === hash('sha256', $row['username'])){
        $_SESSION['login'] = true;
    }

}



if(isset($_SESSION["login"])){
    header("location: index.php");
    exit;
}


if( isset($_POST['login'])){
    global $conn;

    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    if( mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_assoc( $result );
        if (password_verify($password, $row["password"])){
            $_SESSION['login'] = true;

            if(isset($_POST['remember'])){

                setcookie('id', $row['id'], time()+60);
                setcookie('key', hash('sha256', $row['username']), time()+60);
            }

            header("Location: index.php");
            exit;
        }

    }

    $error = true;

}

?>

    <div class="d-flex align-items-center justify-content-center" style="height: 500px">
        <form action="" method="post">
        <div class="mb-3">
            <?php if(isset($error)) :  ?>
                <p style="color: red;">Username/ password salah</p>
            <?php endif; ?>

            <label for="username" class="form-label">Username : </label>
            <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
            
            <label for="password" class="form-label">Password : </label>
            <input type="password" class="form-control" name="password" aria-describedby="emailHelp">

            <label for="remember" class="form-label">Remember me : </label>
            <input type="checkbox" class="form-checkbox" name="remember" >

            <br>
            <button type="submit" class="btn btn-primary" name="login" style="float: right;">Login</button>
        </div>
        </form>
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>