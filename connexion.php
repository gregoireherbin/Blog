
<link href="bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="styles.css">

<script src="bootstrap.min.js"></script>
<!--<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
<link rel="stylesheet" type="text/css" href="styles_connexion.css">
<!------ Include the above in your HEAD tag ---------->

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
   <!-- <div class="fadeIn first">
      <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" />
    </div>-->

    <!-- Login Form -->
    <form method="POST" action="connexion_post.php?id=<?php if($_GET['id']){echo $_GET['id'];}?>&warning=1">
      <input type="text" id="login" class="fadeIn second" name="pseudo" placeholder="pseudo">
      <input type="text" id="password" class="fadeIn third" name="mdp" placeholder="mot de passe">
      <input type="submit" class="fadeIn fourth" value="Connexion">
      <?php
      if($_GET['warning']==1){
        echo '<div class="alert alert-warning" role="alert">
              Le mot de passe ou le pseudo est incorrect
              </div>';
      }
    
        ?>
      
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Mot de passe oublié ?</a>
    </div>

  </div>
</div>