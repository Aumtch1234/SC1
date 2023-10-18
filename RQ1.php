<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
  // CHECK FRIENDS
$is_already_friends = ($_SESSION['unique_id']);
//  IF I AM THE REQUEST SENDER
$check_req_sender = ($_SESSION['unique_id']);
// IF I AM THE REQUEST RECEIVER
$check_req_receiver = ($_SESSION['unique_id']);
// TOTAL REQUESTS
$get_req_num = ($_SESSION['unique_id']);
// TOTAL FRIENDS
$get_frnd_num = ($_SESSION['unique_id']);
?>
<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="chat-area">
      <header>
        <?php 
          $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
          $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }else{
            header("location: users.php");
          }
        ?>
        <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        
        <div class="details">
          
        </div>
      </header>
        <div class="profile">
        <img src="php/images/<?php echo $row['img']; ?>" alt="">
        <div class="details">
          <span><?php echo $row['fname']. " " . $row['lname'] ?></span>
          <p><?php echo $row['status']; ?></p>
          <div class="actions">
                <?php
                if($is_already_friends){
                    echo '<a href="functions.php?action=unfriend_req&id='.$row['unique_id'].'" class="req_actionBtn unfriend">Unfriend</a>';
                }
                elseif($check_req_sender){
                    echo '<a href="functions.php?action=cancel_req&id='.$row['unique_id'].'" class="req_actionBtn cancleRequest">Cancel Request</a>';
                }
                elseif($check_req_receiver){
                    echo '<a href="functions.php?action=ignore_req&id='.$row['unique_id'].'" class="req_actionBtn ignoreRequest">Ignore</a>&nbsp;
                    <a href="functions.php?action=accept_req&id='.$row['unique_id'].'" class="req_actionBtn acceptRequest">Accept</a>';
                }
                else{
                    echo '<a href="functions.php?action=send_req&id='.$row['unique_id'].'" class="req_actionBtn sendRequest">Send Request</a>';
                }
                ?>
        
            </div>
        </div>

      


</body>
</html>
