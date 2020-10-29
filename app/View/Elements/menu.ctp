<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <?php echo $this->Js->link('Home',array('controller' => 'pessoas','action' => 'index'),array('class' => 'navbar-brand','update' => '#content'));?>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <?php echo $this->Js->link('Cadastrar funcionário',
        ['controller' => 'pessoas','action' => 'cadastrar'],
        ['class' => 'nav-link','update' => '#content']);?>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
    </ul>
    <span class="navbar-text">
      Navbar text with an inline element
    </span>
  </div>
</nav>

<?php echo $this->Js->writeBuffer();?>