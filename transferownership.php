<?php 
session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="SHORTCUT ICON" href="images/Checkweck.png" type="image/x-icon" />
    <link rel="ICON" href="images/Checkweck.png" type="image/ico" />

    <title>Checkweck - Transfer Ownership</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/mdb.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>

  <?php
  $errormsg="Please check Product Code and Owner Username and try again.";
  $submission=0;

  if( isset($_POST['transferown']) ){
    if( isset($_POST['proco']) && isset($_POST['ownusr']) ){
        include 'connectdb.php';
        $conn=openConnection();
        $proco=$_POST['proco'];
        $ownusr=$_POST['ownusr'];
        console.log("1");
        // $proco=mysqli_real_escape_string($conn,trim($_POST['proco']));
        // console.log(productcode);
        // console.log(ownrusnm);
        // echo $ownusr;
        // echo $proco;
        // $proco=mysqli_real_escape_string($conn,trim($_POST['proco']));
        // $ownusr=md5(trim($_POST['ownusr']));
        // $submission=1;

        // $insertQ="SELECT * FROM users WHERE proco='$proco' AND password='$ownusr' ";
        // $qry_result=mysqli_query($conn, $insertQ) or die(mysqli_error($conn));
        // if( mysqli_num_rows($qry_result)>0 ){
        //     $row = mysqli_fetch_array($qry_result);
        //     $_SESSION['role']=$row['role'];
        //     $_SESSION['username']=$row['username'];
        //     include 'redirection.php';
            redirect('checkproduct.php');
        // }else{
        //     $submission=10;
        // }

        if( $submission==0 ){}}}
  ?>

  <body class="violetgradient">
  <center>
      <div class="customalert">
          <div class="alertcontent">
              <div id="alertText"> &nbsp </div>
              <img id="qrious">
              <div id="bottomText" style="margin-top: 10px; margin-bottom: 15px;"> &nbsp </div>
              <button id="closebutton" class="formbtn"> OK </button>
          </div>
      </div>
  </center>
    <div style="width: 100%">
      <center>

      <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
    function showAlert(message){
      $("#alertText").html(message);
      $("#qrious").hide();
      $("#bottomText").hide();
      $(".customalert").show("fast","linear");
    }
    </script>
    <?php echo "<script> showAlert('$errormsg') </script>";
     ?>

      <div class="loginformcard" id="card1">
      <h4> Transfer Ownership</h4>
            <form style="margin-top: 30px; margin-bottom: 30px;" action="tranformownership.php" method="POST" >
<!-- onsubmit="return checkFirstForm(this);" -->
            <label type="text" class="formlabel"> Product Code </label>
            <input type="text" class="forminput" value="1" name="proco" id="proco" onkeypress="isNotChar(event)" required>
            <!--<?php echo $proco; ?>  -->

            <label type="text" class="formlabel" style="margin-top: 10px;"> Owner Username </label>
            <input type="text" class="forminput" value="2" name="ownusr" id="ownusr" onkeypress="isNotChar(event)" required>
            <!-- <?php echo $_POST['ownusr']; ?>  -->

            <button class="formbtn" name="transferown" type="submit">Transfer Ownership</button>

            <br>
            </form>
                
      </div>
      </center>
    </div>
    <?php
    //     }
    //  }
    // else{
    // include 'redirection.php';
    // redirect('tranformownership.php');
    // }

    // }
    // else{
    // include 'redirection.php';
    // redirect('tranformownership.php');
    // }
    ?>

    <!-- Material Design Bootstrap-->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <script>
  
    function isInputNumber(evt){
      var ch = String.fromCharCode(evt.which);
      if(!(/[0-9]/.test(ch))){
          evt.preventDefault();
      }
    }
    function isNotChar(evt){
      var ch = String.fromCharCode(evt.which);
      if(ch=="'"){
        evt.preventDefault();
      }
    }

    function blockSpecialChar(e){
      var k;
      document.all ? k = e.keyCode : k = e.which;
      return ((k >= 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k == 46|| k == 42|| k == 33 || k == 32 || (k >= 48 && k <= 57));
    }

    $("#login").on("click", function(){
      $("#card1").hide("fast","linear");
      $("#maincard3").hide("fast","linear");
      $("#maincard2").show("fast","linear");
    });

    $("#gotologin").on("click", function(){
      $("#card1").hide("fast","linear");
      $("#maincard3").hide("fast","linear");
      $("#maincard2").show("fast","linear");
    });

    $("#openlogin").on("click", function(){
      $("#card1").hide("fast","linear");
      $("#maincard3").hide("fast","linear");
      $("#maincard2").show("fast","linear");
    });

    $("#signup").on("click", function(){
      $("#card1").hide("fast","linear");
      $("#maincard2").hide("fast","linear");
      $("#maincard3").show("fast","linear");
    });

    $("#gotosignup").on("click", function(){
      $("#card1").hide("fast","linear");
      $("#maincard2").hide("fast","linear");
      $("#maincard3").show("fast","linear");
    });

    $("#opensignup").on("click", function(){
      $("#card1").hide("fast","linear");
      $("#maincard2").hide("fast","linear");
      $("#maincard3").show("fast","linear");
    });

    $("#closebutton").on("click", function(){
        $(".customalert").hide("fast","linear");
    });

    function checkFirstForm(theform){
      var proco = theform.email.value;

      if (!validateEmail(email)) {
        showAlert("Invalid Email address");
        return false;
      }
      return true;
    }

    function validateEmail(email) {
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }
    
    </script>
  </body>
</html>