jQuery(document).ready(function() {
  jQuery('[data-bs-toggle="collapse"]').on('click', function() {
      const btn = jQuery(this)
      const icons = btn.find('svg');
      icons.toggleClass('open closed');
  });
});
