<div class="cover">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h1>Ecrivez la suite de l'histoire...</h1>
        <p>Suite de : <?php echo $this->Html->link($parentContribution['Contribution']['title'], array('controller' => 'contributions', 'action' => 'view', 'title' => $parentContribution['Tree']['slug'], 'slug' => $parentContribution['Contribution']['slug'])) ?> écrite par : <?php echo $this->Html->link($parentContribution['User']['name'].' '.$parentContribution['User']['last_name'], array('controller' => 'users', 'action' => 'profile', 'slug' => $parentContribution['User']['slug'])) ?></p>
      </div>
    </div>
  </div>
</div>
