<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login</title>
  <link rel="stylesheet" type="text/css" href="style2.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a81368914c.js"></script>
  <style>
    .img {
      position: absolute;
      top: 10%;
      left: 0;
      width: 50%;
    }


    .login-content {
      width: 400px;
      position: absolute;
      top: 50%;
      right: 15%;
      transform: translate(0, -50%);
      text-align: center;
    }

   
    .btns {
    display: block;
    width: 100%;
    height: 50px;
    border-radius: 25px;
    outline: none;
    border: none;
    background-color: #ffA500; /* Replace with your desired shade of orange */
    font-size: 1.2rem;
    color: #fff;
    font-family: 'Poppins', sans-serif;
    text-transform: uppercase;
    margin: 1rem 0;
    cursor: pointer;
    transition: .5s;
}

.btns:hover {
    background-color: #ff7f00; /* Replace with your desired shade of orange for hover effect */
}



    .error-message {
      color: red;
      margin-bottom: 10px;
    }
  </style>
</head>

<body>
  <img class="wave" src="WhatsApp Image 2024-02-21 at 20.36.05_74e8c4ef.jpg">
  <div class="container">
    <div class="img">
      <img src="east_west__1_-removebg-preview.png"> <!-- Use an appropriate admin logo -->
    </div>

    <div class="login-content">
      <form method="post" action="">
        <?php include('admin_server.php'); ?>

        <img src="User_Executive_1.webp"> <!-- Use an appropriate admin avatar -->
        <h2 class="title">Admin Login</h2>

        <!-- Display errors above the form -->
        <?php if (count($errors) > 0) : ?>
          <div class="error-message">
            <?php foreach ($errors as $error) : ?>
              <p><?php echo $error; ?></p>
            <?php endforeach ?>
          </div>
        <?php endif ?>

        <div class="input-div one">
          <div class="i">
            <i class="fas fa-user"></i>
          </div>
          <div class="div">
            <h5>Username</h5>
            <input type="text" class="input" name="admin_username">
          </div>
        </div>
        <div class="input-div pass">
          <div class="i">
            <i class="fas fa-lock"></i>
          </div>
          <div class="div">
            <h5>Password</h5>
            <input type="password" class="input" name="admin_password">
          </div>
        </div>
        <button type="submit" class="btns" name="admin_login_user">Login</button>
      </form>
    </div>

    <script type="text/javascript" src="js/main.js"></script>
  </body>

</html>

