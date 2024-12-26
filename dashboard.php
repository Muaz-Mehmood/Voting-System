<?php
    session_start();
    if(!isset($_SESSION ['userdata'])){
       header("location: login.html");
    }

    $userdata = $_SESSION ['userdata'];
    $candidatedata = $_SESSION ['candidatedata'];

    if($_SESSION['userdata']['status']==0){
        $status = '<b style="color:red">Not Voted</b>';   
    }
    else{
        $status = '<b style="color:green">Voted</b>';
    }

?>

<html>
<head>
    <title>Voting-System</title>
    <link rel="stylesheet" href="css/dash.css">
</head>
<body>
    <div class="head">
        <p>Online Voting System <a href="logout.php"><button id="logout">Logout</button></a></p>
    </div>
    <div class="profile">
     <img src="uploads/<?php echo $userdata['photo'] ?>"><br><br>
     <p><b>Name: </b><?php echo $userdata['name'] ?></p>
     <p><b>Phone no: </b><?php echo $userdata['phone'] ?></p>
     <p><b>Address: </b><?php echo $userdata['address'] ?></p>
     <p><b>Status: </b><?php echo $status ?></p>
    </div>

    <div class="candidate">
        <?php
            if($_SESSION ['candidatedata']){
                for($i=0; $i<count($candidatedata); $i++){ ?>
                <div class="cand">
                    <img src="uploads/<?php echo $candidatedata[$i]['photo'] ?> "><br>
                    <p><b>Candidate Name: </b><?php echo $candidatedata[$i]['name'] ?></p>
                    <p><b>Votes: </b><?php echo $candidatedata[$i]['votes'] ?></p>
                    <form action="api/vote.php" method="POST">
                        <input type="hidden" name="cvotes" value="<?php echo $candidatedata[$i]['votes'] ?>">
                        <input type="hidden" name="cid" value="<?php echo $candidatedata[$i]['id'] ?>">
                        <?php
                        if($_SESSION['userdata']['status']==0){
                        ?>
                            <input type="submit" name="votebtn" value="Vote" id="votebtn">
                            <?php
                        }
                        else{
                            ?>
                            <button disabled type="button" name="votebtn" value="Vote" id="voted">Voted</button>
                            <?php
                        }
                        ?>
                    </form>
                </div>
                <?php }
            }
        ?>
    </div>

</body>
</html>