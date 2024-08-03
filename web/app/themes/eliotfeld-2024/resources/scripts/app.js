import domReady from '@roots/sage/client/dom-ready';
import 'bootstrap';

/**
 * Application entrypoint
 */
domReady(async () => {
  //Open links in new tabs
  $('a').each(function () {
    var a = new RegExp('/' + window.location.host + '/');
    if (!a.test(this.href)) {
      $(this).click(function (event) {
        event.preventDefault();
        event.stopPropagation();
        window.open(this.href, '_blank');
      });
    }
  });

  //Load tablesorter
  let table = document.getElementById('balletsTable');
  if (table) import('./components/table');

  //Single Ballet
  let singleBallet = document.getElementsByClassName('single-ballet');
  if (singleBallet) import('./components/singleBallet');
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
