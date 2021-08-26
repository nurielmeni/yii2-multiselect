var MMultiSelect = typeof MMultiSelect === 'object' || (function ($) {
  var data = {};
  var maxOptionsShow = 2;
  var showSelected = true;
  var text_selected = 'נבחרו';
  var text_all_selected = 'כולם נבחרו';
  var ready = false;

  /**
   * 
   * @param {Object} configuration object 
   * @returns null
   */
  var init = function(config) {
    maxOptionsShow = config.maxOptionsShow || 2;
    showSelected = !!config.showSelected;

    initData();
    if (!ready) return;
    setEventListeners();
    console.log('MMultiselect Initialized');
  }

  var initData = function() {
    if ($('.m-multiselect-wrapper').length === 0) return;

    $('.m-multiselect-wrapper').each(function(){
      var msId = $(this).data('el-id');
      data[msId] = {};
      Object.assign(data[msId], { selectValues:[], selectedText: []});
    });

    ready = true;
  }

  /**
   * 
   * @param {string} el The MS name (Element id)
   * @returns the MS values array 
   */
  var optionsValue = function(el) {
    return data[el].selectValues;
  }

  /**
   * 
   * @param {string} el The MS name (Element id)
   * @returns the MS values array 
   */
  var optionsText = function(el) {
    return data[el].selectText;
  }

  /**
   * @param {dom element id} msId the select wrapper
   * @param {dom element} the selected option the select wrapper
   */
  var updateValue = function (msId, el) {
    if (!msId || !el) return;

    if (el.ariaSelected === "true") {
      selectedValuesAdd(msId, el);
    } else {
      selectedValuesRemove(msId, el);
    }

    $('#' + msId).val(data[msId].selectValues);
    showSelectedOptions(msId);
  }

  var selectedValuesAdd = function(msId, el) {
    var value = $(el).attr('value');
    var text = $(el).text();

    if (Array.isArray(data[msId].selectValues)) {
      data[msId].selectValues.push(value);
      data[msId].selectText.push(text);
    } else {
      data[msId].selectValues = [value];
      data[msId].selectText = [text];
    }
  }

  var selectedValuesRemove = function(msId, el) {
    var value = $(el).attr('value');
    var text = $(el).text();

    if (Array.isArray(data[msId].selectValues)) {
      var index = data[msId].selectValues.indexOf(value);
      if(index < 0) return;
      data[msId].selectValues.splice(index, 1);
      data[msId].selectText.splice(index, 1);
    }
  }

  var showSelectedOptions = function(msId) {
    if (!showSelected) return;
    var totalOptions = $('#' + msId + '-options li[role="option"]').length;
    var selectedOptions = data[msId].selectValues.length;
    var textValue = '';

    if (totalOptions === selectedOptions) {
      textValue = text_all_selected;
    } else if (selectedOptions > maxOptionsShow) {
      textValue = selectedOptions + ' ' + text_selected;
    } else {
      textValue = data[msId].selectText.join(',');
    }

    $('#' + msId + '-hint').text(textValue);
  }

  /**
   * @param {dom element} msId the select wrapper
   */
  var selectAll = function (msId) {
    if (!msId) return;
    $('#' + msId + '-options li').attr('aria-selected', 'true');
    updateValue(msId);
  }

  /**
   * @param {dom element} el the select wrapper
   */
  var removeAll = function (msId) {
    if (!msId) return;
    $('#' + msId + '-options li').attr('aria-selected', 'false');
    updateValue(msId);
  }

  var setEventListeners = function () {
    // EVEN HANDLERS
    // Toggle selected options
    $('.m-multiselect-options li[role="option"]').on('click', function () {
      this.ariaSelected = this.ariaSelected === "true" ? "false" : "true";
      $(this).focus();
      updateValue($(this).parents('.m-multiselect-wrapper').data('el-id'), this);
    });

    // Select all listener
    $('.m-multiselect-wrapper .card-footer.action button.select-all').on('click', function () {
      selectAll($(this).parents('.m-multiselect-wrapper').data('el-id'));
    });

    // Remove all listener
    $('.m-multiselect-wrapper .card-footer.action button.remove-all').on('click', function () {
      removeAll($(this).parents('.m-multiselect-wrapper').data('el-id'));
    });

    // Set focus to button
    $('.m-multiselect-wrapper .collapse').on('shown.bs.collapse', function () {
      $(this).find('li[role="option"]:first-child').focus();
    });

    // Set focus to first option
    $('.m-multiselect-wrapper .collapse').on('hidden.bs.collapse', function () {
      $(this).parents('.m-multiselect-wrapper').find('p.m-multiselect-button button:first-child').focus();
    });

    // Set the enter key action
    $('.m-multiselect-wrapper').on('keydown', function (e) {
      e = e || window.event;

      if (e.keyCode == '13') {
        // Enter
        document.activeElement.click();
      }
    });

    // Set the arrows key action
    $('.m-multiselect-options li[role="option"]').on('keydown', function (e) {
      e = e || window.event;
      if (e.keyCode == '37') {
        // right arrow
        document.activeElement.nextElementSibling && document.activeElement.nextElementSibling.focus();
      }
      else if (e.keyCode == '39') {
        // left arrow
        document.activeElement.previousElementSibling && document.activeElement.previousElementSibling.focus();
      }
    });

  };

  return {
    init: init,
    optionsValue: optionsValue,
    optionsText: optionsText
  }
})(jQuery);