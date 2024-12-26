<?php
    session_start();
    include("connect.php");

    $votes = $_POST['cvotes'];
    $total_votes= $votes+1;
    $cid = $_POST['cid'];
    $uid = $_SESSION['userdata']['id'];

    $update_votes = mysqli_query($connect, "UPDATE user SET votes='$total_votes' WHERE id='$cid'");
    $update_status = mysqli_query($connect, "UPDATE user SET status=1 WHERE id='$uid'");

    if($update_status and $update_votes){
        $candidate = mysqli_query($connect, "SELECT * from user WHERE role=2 ");
        $candidatedata = mysqli_fetch_all($candidate, MYSQLI_ASSOC);
        $_SESSION['userdata']['status'] = 1;
        $_SESSION['candidatedata'] = $candidatedata;
        echo '<script>
                    alert("Voting successfull!");
                    window.location = "../dashboard.php";
                </script>';
    }
    else{
        echo '<script>
                    alert("Voting failed!.. Try again.");
                    window.location = "../dashboard.php";
                </script>';
    }
    
?>