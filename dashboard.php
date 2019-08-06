<?php   
	require_once ('config.php');
	require ('session.php');
  // require ('css/header.php');
	$dates = date("d-m-Y");
  
	if(isset( $_SESSION['login_user'])){
		$id = $_SESSION['login_user'];
		
?>
<!DOCTYPE html>
<html>



<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

<<<<<<< HEAD
    <title>GBESE | Dashboard</title>
 <link rel="icon" type="image/png" href="table/images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="table/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="table/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="table/vendor/animate/animate.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="table/vendor/select2/select2.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="table/vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="table/css/util.css">
  <link rel="stylesheet" type="text/css" href="table/css/main.css">
=======
    <title>Gbese | Dashboard</title>
  <link rel="stylesheet" type="text/css" href="lend.css">
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">
>>>>>>> 9930f2d469b307841ee01f10601be7fd53f55f39
</head>
<style type="text/css">
  body{
    color: darkblue;
  }
</style>
<body>

  <!-- <div>
  	<h3><img src="./assets//debt.png" alt="" srcset="" class="logo"><span class="brand-name">Gbese</span> </h3>
  	<p>Do you want to lend someone money? <a href="lend.php">Click here!</a></p>
  </div>
  <div> -->
    <center>
    <div style="float:center;">
      <h3>Hello <?php echo $id; ?></h3>
    </div>
  </center>
    <div style="float: right;">
      <h3><a href="logout.php"><i class="fa fa-sign-out"></i>Log out</a></h3>
    </div>
    <center>
    <div>
      <br><br>
      <h4>Do you want to lend someone money? <a href="lend.php">CLICK HERE</a></h4>
    </div>
  </center> 
    <div class="limiter">
    <div class="container-table100">
      <div class="wrap-table100">
          <div class="table">

            <div class="row header">
              <div class="cell">
                ID
              </div>
              
              <div class="cell">
                Borrower's Name
              </div>
              <div class="cell">
                Borrower's Email
              </div>
              <div class="cell">
                Borrower's Number
              </div>
              <div class="cell">
                Amount
              </div>
              <div class="cell">
                Date Lent
              </div>
              <div class="cell">
                Return Date
              </div>
              <div class="cell">
                Address
              </div>
              
              <div class="cell">
                Delete
              </div>
              <div class="cell">
                Reminder
              </div>
            </div>                    
  	
      	<?php
              $getList = "SELECT * FROM gbesetable where lender = '$id'";
              $result = mysqli_query($conn,$getList);
              $counts = mysqli_num_rows($result);
              if($counts > 0){
                  while($row = $result->fetch_assoc()) {

                  
          ?>              
              <div class="row">
              <div class="cell" data-title="Id">
                <?php echo $row['id']?>
              </div>
              
              <div class="cell" data-title="Name">
                <?php echo $row['g_name']?>
              </div>
              <div class="cell" data-title="Email">
                <?php echo $row['g_email']?>
              </div>
              <div class="cell" data-title="Phone">
                <?php echo $row['g_phone']?>
              </div>
              <div class="cell" data-title="Amount">
                <?php echo $row['g_amount']?>
              </div>
              <div class="cell" data-title="Date Lent">
                <?php echo $row['g_date']?>
              </div>
              <div class="cell" data-title="Return Date">
                <?php echo $row['g_returnDate']?>
              </div>
              <div class="cell" data-title="Address">
                <?php echo $row['address']?>
              </div>
              
              <div class="cell" data-title="Delete">
                <center><button onclick="deleteME(<?php echo $row['id']; ?>)"><i class="fa fa-trash"></i></button></center>
              </div>
              <div class="cell" data-title="Reminder">
                <?php

                  $returnDate = strtotime($row['g_returnDate']);
                  $today = strtotime(date("Y-m-d"));
                  // echo "$today";
                  if ($returnDate > $today) {
                    $remainder = $returnDate - $today;
                    $rem = date('j',$remainder);
                    $years = floor($rem/ (365*60*60*24));
                    $months = floor(($rem - $years * 365*60*60*24) / (30*60*60*24));
                    printf("%d years, %d months, %d days\n", $years, $months, $rem);
                    // echo "$rem";
                  } else {
                    echo "Due";
                  }
                  

                  //  $retDate = strtotime($row['g_returnDate']);
                  //  $dd = strtotime(Date("dmY"));
                  //  $today = strtotime($dates);

                  //  if ($retDate > $today) { 
                  //    $rem = $retDate - $dd;
                  //    $zz = date("j", $rem);
                  //    echo  $zz . "day(s) remaining" ;
                    // } else {
                  //    echo "Due";
                  //  }
                    
                  ?>
              </div>
            </div>
                 
       	
              <script type="text/javascript">
                  function deleteME(delId) {
                      if (confirm("Do you want to delete??")) {
                          window.location.href='delete.php?del_id=' +delId+ '';
                          return true;
                      }
                  }
              </script>
              <?php
              	// function reminder(){
              	//   	if ($dates == $row['g_returnDate']) {
              	// 		$message = "It's time for the borrower to pay up";
              	// 		echo "<script type='text/javascript'> alert('$message'); </script>";
           		  //  	} else {
              	// 		echo "dkjdsdj";
              	// 	}
              	// }  
              	
              	
              ?>

               <script type="text/javascript">
              	var date = new Date().getDay() +'-'+ new Date().getMonth()+'-'+ new Date().getFullYear()
              	var dates = new Date().getDay() +'-'+ new Date().getMonth()+'-'+ new Date().getFullYear();

              	function reminder() {
              		if (date == dates) {
              			alert("It's time, pay up");
              		} else {
              			alert('sdkasjd');
              		}
              	}
              </script>
             
          <?php 
          }
          }else{
              echo "No data";
          } 

          ?>

              </tbody>
      </table>
      <p><b> 
      	<!-- <script type="text/javascript">
  			document.write(new Date().getDay() +'-'+ new Date().getMonth()+'-'+ new Date().getFullYear());
  		</script> -->
  		</b>
  	</p>
  </div>
  
</body>
</html>
<?php 
	
} 
<<<<<<< HEAD
?>
=======
 //session_destroy();
?>
>>>>>>> 9930f2d469b307841ee01f10601be7fd53f55f39
