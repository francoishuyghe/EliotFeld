export default {
  init() {
    // JavaScript to be fired on all pages

    //Open links in new tabs
    $('a').each(function() {
      var a = new RegExp('/' + window.location.host + '/');
      if(!a.test(this.href)) {
        $(this).click(function(event) {
          event.preventDefault();
          event.stopPropagation();
          window.open(this.href, '_blank');
        });
      }
    });
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
