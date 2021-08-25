(function($) {
  var selectElements = [];

  /**
   * @param {dom element} el the select wrapper
   */
  var updateValue = function(el) {
    var value = $('#' + el + '-options li[aria-selected="true"]').map(function(option) {
      return option.attr('value');
    });

    $('#' + el).val(value);
  }

  $(document).ready(function() {
    // 1. Get all multiselect elements

    // 2. Hide all select elements

    // 3. Render each multiselect element

    // EVEN HANDLERS
    // Toggle selected options
    $('.m-multiselect-options li[role="option"]').on('click', function() {
      this.ariaSelected = this.ariaSelected === "true" ? "false" : "true";
      updateValue($(this).data('el-id'));
    });
  });
}) (jQuery);