import 'tablesorter';
import 'tablesorter/dist/js/jquery.tablesorter.widgets';
import 'tablesorter/dist/js/widgets/widget-reflow.min';

$('#balletsTable').tablesorter({
  sortLocaleCompare: true,
  sortStable: true,
});
