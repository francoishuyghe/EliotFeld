import domReady from '@roots/sage/client/dom-ready';
import 'jquery';
import 'bootstrap';

import 'tablesorter'
import 'tablesorter/dist/js/jquery.tablesorter.widgets'
import 'tablesorter/dist/js/widgets/widget-reflow.min'


/**
 * Application entrypoint
 */
domReady(async () => {

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
  
  $('#balletsTable').tablesorter({
      sortLocaleCompare: true,
      sortStable: true,
    });

});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
