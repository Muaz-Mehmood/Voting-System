<?php
    include("connect.php");
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $address = $_POST['address'];
    $photo = $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['tmp_name'];
    $role = $_POST['role'];
    
    if($password==$cpassword){
        move_uploaded_file($tmp_name,"../uploads/$photo");
        $insert = mysqli_query($connect, "INSERT INTO `user`(`name`, `phone`, `password`, `address`,
         `photo`, `role`, `status`, `votes`) VALUES ('$name','$phone','$password','$address','$photo','$role', '0', '0')");

        if($insert){
            echo '
            <script>
                alert("Registeration Successful!");
                window.location = "../login.html";
            </script>
            ';
        }
        else{
            echo '
            <script>
                alert("Error occured..!");
                window.location = "../register.html";
            </script>
            ';
        }
    }
    else{
        echo '
        <script>
            alert("password and confirm password does not match!");
            window.location = "../register.html";
        </script>
        ';
    }
?>
