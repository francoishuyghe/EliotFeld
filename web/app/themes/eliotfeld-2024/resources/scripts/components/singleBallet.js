$('#contact').on('click', function (event) {
  if (event.currentTarget !== event.target) {
    return;
  }

  document.getElementById('contact').style.display = 'none';
});

$('.mediaSection img').on('click', function () {
  document.getElementById('contact').style.display = 'flex';
});
