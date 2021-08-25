(function($) {
  var selectValues = [];

  /**
   * @param {dom element} el the select wrapper
   */
  var updateValue = function(el) {
    if (!el) return;

    var value = $('#' + el + '-options li[aria-selected="true"]').map(function(i, o) {
      return $(o).attr('value');
    });
    selectValues = value.toArray();
    $('#' + el).val(selectValues);
  }

  /**
   * @param {dom element} el the select wrapper
   */
  var selectAll = function(el) {
    if (!el) return;
    $('#' + el + '-options li').attr('aria-selected', 'true');
    updateValue(el);
  }

  /**
   * @param {dom element} el the select wrapper
   */
  var removeAll = function(el) {
    if (!el) return;
    $('#' + el + '-options li').attr('aria-selected', 'false');
    updateValue(el);
  }

  $(document).ready(function() {
    // 1. Get all multiselect elements

    // 2. Hide all select elements

    // 3. Render each multiselect element

    // EVEN HANDLERS
    // Toggle selected options
    $('.m-multiselect-options li[role="option"]').on('click', function() {
      this.ariaSelected = this.ariaSelected === "true" ? "false" : "true";
      updateValue($(this).parents('.m-multiselect-wrapper').data('el-id'));
    });

    // Select all listener
    $('.m-multiselect-wrapper .card-footer.action button.select-all').on('click', function() {
      selectAll();
      updateValue($(this).parents('.m-multiselect-wrapper').data('el-id'));
    });

    // Remove all listener
    $('.m-multiselect-wrapper .card-footer.action button.remove-all').on('click', function() {
      removeAll();
      updateValue($(this).parents('.m-multiselect-wrapper').data('el-id'));
    });

  });
}) (jQuery);