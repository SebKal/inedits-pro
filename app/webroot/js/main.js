jQuery(document).ready(function($){

  Metronic.init();          // init metronic core components
  Layout.init();            // init current layout
  ComponentsEditors.init(); //init WYSIWYG editor

  // LazyLoad
  (function(window){

    // get vars
    $(".lazy").lazyload({
      effect: "fadeIn"
    });


  }(window));

  // Cover Input thumbnail
  (function(window){

    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
          $('.cover-preview').attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
      }
    }

    $(".cover-preview-input").change(function(){
      readURL(this);
    });

    function readURLL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
          $('.avatar-preview').attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
      }
    }

    $(".avatar-preview-input").change(function(){
      readURLL(this);
    });

  }(window));

  // Charte Conditions
  (function(window){

    var checkbox  = $('#check-charte');
    var btn       = $('.register-btn');

    if (checkbox[0]){
      btn.attr("disabled", !checkbox[0].checked);
    }

    checkbox.click(function() {
      btn.attr("disabled", !this.checked);
    });

  }(window));

  // Custom file loader for addContrib view
  (function(window){

    //On Change Loader
    var input               = $('#ContributionPathFile');
    var fileNameDiv         = $('#fakeFileName');
    var fileContent         = $('#fakeFileName span');
    var resetAddContribForm = $('#resetAddContribForm');
    var filename            = "";

    input.change(function(){
      var fullPath = document.getElementById('ContributionPathFile').value;
          if (fullPath) {
            var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
            filename = fullPath.substring(startIndex);
            if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
              filename = filename.substring(1);
            }
            fileContent.html(filename);
            fileNameDiv.toggleClass('opaq');
          }
    });

    resetAddContribForm.click(function(){
      fileNameDiv.toggleClass('opaq');
      input[0].value = "";
    });

  }(window));


  // Sneak That Scroll !
  (function(window){

    var sneaky = new ScrollSneak(location.hostname);

    $('.btn[type="submit"]').live("click", function(){
      sneaky.sneak();
    });

  }(window));

  // Dismiss bootstrap alerts (?)
  // (function(window){

  //  var alert = $('.alert');

  //  setTimeout(function() {alert.addClass('cshide');}, 3000);

  // }(window));

  // Add Contrib Wysiwig
  (function(window){

    var form    = $('.custom-wyz');
    var btn     = $('.custom-textarea-action');
    var actions = $('.text-actions');
    var dismiss = $(".dismiss-textarea");
    var letters = $('.letters-count');

    btn.click(function(){
      form.toggleClass('custom-visible');
      letters.toggleClass('hide');
    });

  }(window));

  // Count Caracters
  (function(window){

    var form          = $('.note-editable');
    var letters       = $('.letters-count-number');
    var text          = $('.note-editable p');
    var lettersCount  = text.text().length;
    var alert         = $('#alert-container');
    var alertContent  = $('#alert-container .alert-content');

    letters.text(lettersCount);


    form.bind("DOMSubtreeModified", function(){
      text    = $('.note-editable p');
      lettersCount = text.text().length;
      letters.text(lettersCount);
    });

    $('#ContributionAddForm').submit(function(e){
      text    = $('.note-editable p');
      lettersCount = text.text().length;
    });

  }(window));

  // Search User AJAX

  (function(window){

    var form      = $('#UserIndexForm');
    var input     = $('#searchUsers');
    var resultDiv = $('#resultDiv');
    var btn       = $('.reset-form-btn');

    btn.click(function(e){
      e.preventDefault();

      input.val("");
      resultDiv.addClass('hide');
      input.focus();

    });

    input.keyup(function(e){
      e.preventDefault();

      var data = $('#searchUsers').val();

      if (data.length > 2) {
        resultDiv.removeClass('hide');
        $.ajax({
          url : form.attr('action'),
          type : 'GET',
          data: {search: data},
          dataType : 'html',
          success : function(result, statut){
            resultDiv.html(result);
          }
        });
      }
      else {
        resultDiv.addClass('hide');
      }

    });

  }(window));

});
