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
    // EVEN HANDLERS
    // Toggle selected options
    $('.m-multiselect-options li[role="option"]').on('click', function() {
      this.ariaSelected = this.ariaSelected === "true" ? "false" : "true";
      $(this).focus();
      updateValue($(this).parents('.m-multiselect-wrapper').data('el-id'));
    });

    // Select all listener
    $('.m-multiselect-wrapper .card-footer.action button.select-all').on('click', function() {
      selectAll($(this).parents('.m-multiselect-wrapper').data('el-id'));
    });

    // Remove all listener
    $('.m-multiselect-wrapper .card-footer.action button.remove-all').on('click', function() {
      removeAll($(this).parents('.m-multiselect-wrapper').data('el-id'));
    });

    // Set focus to button
    $('.m-multiselect-wrapper .collapse').on('shown.bs.collapse', function() {
      $(this).find('li[role="option"]:first-child').focus();
    });
    
    // Set focus to first option
    $('.m-multiselect-wrapper .collapse').on('hidden.bs.collapse', function() {
      $(this).parents('.m-multiselect-wrapper').find('p.m-multiselect-button button:first-child').focus();
    });

    $('.m-multiselect-wrapper').on('keydown', function(e) {
      e = e || window.event;

      if (e.keyCode == '13') {
        // Enter
        document.activeElement.click();
      }
    });

    $('.m-multiselect-options li[role="option"]').on('keydown', function(e) {
      e = e || window.event;
      if (e.keyCode == '37') {
        // right arrow
        document.activeElement.previousSibling.focus();
      }
      else if (e.keyCode == '39') {
        // left arrow
        document.activeElement.nextSibling.focus();
      }
    });
  });
}) (jQuery);