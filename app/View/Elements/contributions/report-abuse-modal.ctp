<!-- BEGIN ADD TREE MODAL -->
<div id="report-contribution" class="modal fade" tabindex="-1" data-width="760">
  <?php echo $this->Form->create(null, array('url' => array('controller' => 'contributions', 'action' => 'reportAbuse'), 'inputDefaults' => array('div' => false, 'class' => 'form-control', 'label' => false) ));?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
          <h4 class="modal-title">Reporter un abus</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <?php echo $this->Form->input('message', array('type' => 'textarea', 'label' => 'Votre message'));?>
              <?php echo $this->Form->hidden('contribution_id', array('type' => 'hidden', 'value' => $contribution['Contribution']['id']));?>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-default">Fermer</button>
        <button type="submit" class="btn blue-hoki">Valider</button>
      </div>
  <?php echo $this->Form->end();?>
</div>
<!-- END ADD TREE MODAL -->
