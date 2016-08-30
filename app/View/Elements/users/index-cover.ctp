<div class="search-cover">

  <h1>Chercher un auteur</h1>

    <?php
      echo $this->Form->create(
        'User',
        array(
          'class' =>'search-form',
          'url'           => array(
            'controller'      => 'users',
            'action'          => 'index'
          ),
          'inputDefaults' => array(
            'div'             => false,
            'class'           => 'form-control',
            'label'           => false
          )
        )
      );
    ?>

    <div class="searchBar clearfix">
      <div class="container searchBar-container">
        <?php
          echo $this->Form->input(
            'search',
            array(
              'type'          => 'text',
              'placeholder'   => 'Chercher un auteur',
              'class'         => array('form-control, blue'),
              'id'            => 'searchUsers',
              'autocomplete'  => 'off',
            )
          );
        ?>
        <button class="reset-form-btn"><i class="glyphicon glyphicon-remove"></i></button>
        <button class="btn btn-shadow-yellow" type="submit"><i class="glyphicon glyphicon-search"></i></button>
        <div id="resultDiv">

        </div>
      </div>
    </div>

    <?php echo $this->Form->end(); ?>

</div>
