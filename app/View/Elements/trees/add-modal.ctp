<!-- BEGIN ADD TREE MODAL -->
<div id="addTree" class="modal fade" tabindex="-1" data-width="760">
    <?php echo $this->Form->create('Tree', array('type'=>'file', 'url' => array('controller' => 'trees', 'action' => 'add', 'admin' => false), 'inputDefaults' => array('div' => false, 'class' => 'form-control', 'label' => false) )); ?>
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Ajouter un arbre</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <?php echo $this->Form->input('title', array('label' => 'Titre') );?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <?php echo $this->Form->input('content', array('class' => 'wysiwyg-input'));?>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
            <button type="submit" class="btn blue-hoki">Save changes</button>
        </div>
    <?php echo $this->Form->end();?>
</div>
<!-- END ADD TREE MODAL -->
