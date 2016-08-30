
<div id="dashboard" class="container">
  <div class="row">
    <div class="col-lg-3">
      <div class="nav-tabs-container">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li class="active"><?php echo $this->Html->link('Utilisateurs', array('controller' => 'users', 'action' => 'dashboard')); ?></li>
          <li><?php echo $this->Html->link('Branches', array('controller' => 'contributions', 'action' => 'dashboard')); ?></li>
        </ul>

      </div>
    </div>
    <div class="col-lg-9">
      <div class="row"></div>
        <div class="col-lg-12">

          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="home">
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Prénom</th>
                      <th>Nom</th>
                      <th>Mail</th>
                      <th>Rôle</th>
                      <th>Status</th>
                      <th>Tools</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($users as $user){ ?>
                        <tr>
                        <td><?php echo $user['User']['name']; ?></td>
                        <td><?php echo $user['User']['last_name']; ?></td>
                        <td><?php echo $user['User']['mail']; ?></td> 
                        <td><?php echo $user['Role']['title']; ?></td>                   
                        <td><?php echo $user['User']['status']; ?></td>
                        <td>
                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>', array('controller' => 'profile', 'action' => 'modifier/'.$user['User']['name'], $user['User']['id']), array('escape' => FALSE)); ?>
                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>', array('action' => 'suspend', $user['User']['id']), array('escape' => FALSE)); ?>
                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-user" aria-hidden="true"></span>', array( 'controller' => 'profile', 'action' => $user['User']['name'].'/', $user['User']['id']), array('escape' => FALSE)); ?>
                        </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="profile">
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Titre</th>
                      <th>Arbre</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($trees as $tree){ ?>
                        <tr>
                        <td><?php echo $tree['Contribution']['title']; ?></td>
                        <td><?php echo $tree['Tree']['title']; ?></td>
                        <td><?php echo $tree['Contribution']['status']; ?></td>
                        <td>
                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>', array('controller' => 'profile', 'action' => 'modifier/'.$user['User']['name'], $user['User']['id']), array('escape' => FALSE)); ?>
                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>', array('action' => 'suspend', $user['User']['id']), array('escape' => FALSE)); ?>
                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-user" aria-hidden="true"></span>', array( 'controller' => 'profile', 'action' => $user['User']['name'].'/', $user['User']['id']), array('escape' => FALSE)); ?>
                        </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="messages">Pane Three</div>
          </div>

        </div>
        <div class="col-lg-12">

        </div>
      </div>
    </div>
  </div>
</div>