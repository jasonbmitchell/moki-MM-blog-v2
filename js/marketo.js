$.ajax({
  url: document.location.protocol + '//munchkin.marketo.net/munchkin.js',
  dataType: 'script',
  cache: true,
  success: function() {
    Munchkin.init('921-OYU-441');
  }
});

