
  <?php foreach ($results as $result) : ?>
    <div class="container-fluid">
      <div class="col-sm-1 user-search-avatar">
        <?php
          echo $this->Image->resize($result['User']['avatar'], 84, 84);
        ?>
      </div>
      <div class="col-sm-11">
        <?php
          echo $this->Html->link(
            $result['User']['name'].' '.$result['User']['last_name'],
            array(
              'controller'  => 'users',
              'action'      => 'profile',
              'slug'        => $result['User']['slug'],
            )
          );
        ?>
      </div>
    </div>
  <?php endforeach; ?>
