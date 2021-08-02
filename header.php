   <nav class="navbar navbar-expand-lg navbar-light bg-light navbar navbar-dark bg-dar">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
        <a class="nav-item nav-link active" href="index.php">Accueil</a>
        
          <?php
          if($_SESSION){?><a class="nav-item nav-link" href="#">Connecté</a><a class="nav-item nav-link" href="deconnexion.php">Déconnexion</a><?php }

          else {?><a class="nav-item nav-link" href="connexion.php?id=<?php if($_GET){echo $_GET['id'];}?>&warning=0">Connexion</a><?php }
          ?>
       
        
        </div>
      </div>
    </nav>

   

      