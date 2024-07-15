<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Acceuil</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo e(route('homePage.index')); ?>">Home</a>
        </li>
     
          <?php if(auth()->guard()->guest()): ?>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php echo e(route('login.showLogin')); ?>">Se connecter</a>
          </li>  
          <?php endif; ?>
      
      
        
        <li class="nav-item">
          <a class="nav-link" href="<?php echo e(route('profiles.index')); ?>">Tous Profiles</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo e(route('publications.index')); ?>">Tous Publications</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo e(route('profiles.create')); ?>">Ajouter Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo e(route('settings.index')); ?>">Informations</a>
        </li>
        <?php if(auth()->guard()->check()): ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo e(route('publications.create')); ?>">Ajouter Publications</a>
        </li>
      </ul>
     
      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
          <?php echo e(auth()->user()->name); ?>

        </button>
        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
          <li><a class="dropdown-item active" href="<?php echo e(route('login.logout')); ?>">Deconnexion</a></li>
          <li><a class="dropdown-item" href="#">Another action</a></li>
      
        </ul>
      </div>
      <?php endif; ?>
     
     
    </div>
  </div>
</nav><?php /**PATH C:\Users\LENOVO\profiles\profiles\resources\views/partials/nav.blade.php ENDPATH**/ ?>