(function ($, Drupal, drupalSettings) {
  const select = $('[data-js="select-secretaria"]')
  select.change(handleChangeSelect)
  function handleChangeSelect(event){
    window.open($(this).val(), '_blank');
  }
})(jQuery, Drupal, drupalSettings);
