
<?php 

include "layout/header.php";

if( isset($_POST['register'])){
    if( registrasi($_POST) > 0){
        echo "
            <script>
                alert('user baru berhasil ditambahkan');
            </script>
        ";
    }else{
        echo "
            <script>
                alert('User gagal ditambahkan');
            </script>
        ";
    }
}

?>
    <div class="d-flex align-items-center justify-content-center" style="height: 500px">
        <form action="" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Username : </label>
            <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
            
            <label for="password" class="form-label">Password : </label>
            <input type="password" class="form-control" name="password" aria-describedby="emailHelp">
            
            <label for="username" class="form-label">Konfirmasi Password : </label>
            <input type="password" class="form-control" name="password2" aria-describedby="emailHelp">
            <br>
            <button type="submit" class="btn btn-primary" name="register" style="float: right;">Create</button>
        </div>
        </form>
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>