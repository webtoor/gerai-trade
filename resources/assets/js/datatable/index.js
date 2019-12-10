import * as $ from 'jquery';
import 'datatables.net-bs4';
import 'datatables.net-responsive-bs4';

export default (function () {
  $('#dataTable').DataTable({
		aaSorting: [],
		responsive:true,
		"oSearch": {"bSmart": false},
	});

	$('#dataTable2').DataTable({
		aaSorting: [],
		responsive:true,
		"oSearch": {"bSmart": false},
	});

	$('#kelolaKategori').DataTable({
		aaSorting: [],
		responsive:true,
		"searching": false
		
	});

	$('#kelolaSubKategori').DataTable({
		aaSorting: [],
		responsive:true,
		"searching": false
		
	});
}());
