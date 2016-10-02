<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
  <li>
    <?php
      echo $this->Html->link(
        'Profil',
        array(
          'controller'  => 'users',
          'action'      => 'edit',
          'slug'        => $currentUser['slug']
        )
      );
    ?>
  </li>
  <li>
    <?php
      echo $this->Html->link(
        'Déconnexion',
        array(
        'controller'  => 'users',
        'action'      => 'logout'
        )
      );
    ?>
  </li>
</ul>
