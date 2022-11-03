export default {
  init() {
    // JavaScript to be fired on the about us page
    $('#contact').on('click', function (event) { 
      if (event.currentTarget !== event.target) {
        return;
      }

      $(this).hide();
    })

    $('.mediaSection img').on('click', function () {
      $('#contact').show();
    });

  },
};
