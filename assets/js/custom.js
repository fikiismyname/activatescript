$(document).ready(function() {

	$(document).on('click', '#getjavascript', function(e){
		var javascript = $(this).data('javascript');
		$('#getjavascriptinput[name="javascript"]').val(javascript);
		e.preventDefault();
	});

	$(document).on('click', '#hapus', function(e){

		var identity = $(this).data('url');
		$('#hapusurl').attr('href',identity);
		e.preventDefault();
	});

	// $(document).on('click', '#updateuser', function(e){
	// 	var username = $(this).data('username');
	// 	var password = $(this).data('password');
	// 	var akses = $(this).data('akses');
	// 	if (akses.indexOf(',') !== -1) {
	// 		var akses = akses.split(',');
	// 	}
	// 	var id = $(this).data('id');
	// 	$('#formupdate [name="id"]').val(id);
	// 	$('#formupdate [name="username"]').val(username);
	// 	$('#formupdate [name="password"]').val(password);
	// 	$('#selectaksesupdate').val(akses).change();		
	// 	e.preventDefault();
	// });

	$(document).on('click', '#updateuser', function(e){
		var username = $(this).data('username');
		var password = $(this).data('password');
		var id = $(this).data('id');
		$('#formupdate [name="id"]').val(id);
		$('#formupdate [name="username"]').val(username);
		$('#formupdate [name="password"]').val(password);	
		e.preventDefault();
	});

	$(document).on('click', '#updatelicense', function(e){
		var domain = $(this).data('domain');
		var template = $(this).data('template');
		var id = $(this).data('id');
		$('#formupdate [name="id"]').val(id);
		$('#formupdate [name="domain"]').val(domain);
		$('#formupdate [name="template"]').val(template).change();
		e.preventDefault();
	});

	$(document).on('click', '#updatetemplate', function(e){
		var protected = $(this).data('protected');
		var template = $(this).data('template');
		var url = $(this).data('url');		
		var id = $(this).data('id');
		$('#formupdate [name="id"]').val(id);
		$('#formupdate [name="protected"]').val(protected);
		$('#formupdate [name="template"]').val(template);		
		$('#formupdate [name="template_old"]').val(template);				
		$('#formupdate [name="url"]').val(url);
		e.preventDefault();
	});

	$("#selecttemplate").select2({
		placeholder: "- Pilih - ",
		allowClear: true,
		width: '100%',
		minimumResultsForSearch: -1
	});


	// DATATABLE 
	var datatable = $('.datatable').DataTable({
		'dom' : 'lrftip',
		'language': {
			'searchPlaceholder': "Ketik..."
		},
		'aLengthMenu': [[5,10,50,100,1000], [5,10,50,100,1000]],
		'searching':!0,
		'lengthChange':!0,
		'order':[],
		'ordering':!0,
		'columnDefs': [
		{'orderable':!1,'targets':"no-sort"}
		]
	});

	function updateDataTableSelectAllCtrl(table){
		var $table             = table.table().node();
		var $chkbox_all        = $('tbody input[type="checkbox"]', $table);
		var $chkbox_checked    = $('tbody input[type="checkbox"]:checked', $table);
		var chkbox_select_all  = $('thead input[name="select_all"]', $table).get(0);

   // If none of the checkboxes are checked
   if($chkbox_checked.length === 0){
   	chkbox_select_all.checked = false;
   	if('indeterminate' in chkbox_select_all){
   		chkbox_select_all.indeterminate = false;
   	}

   // If all of the checkboxes are checked
} else if ($chkbox_checked.length === $chkbox_all.length){
	chkbox_select_all.checked = true;
	if('indeterminate' in chkbox_select_all){
		chkbox_select_all.indeterminate = false;
	}

   // If some of the checkboxes are checked
} else {
	chkbox_select_all.checked = true;
	if('indeterminate' in chkbox_select_all){
		chkbox_select_all.indeterminate = true;
	}
}
}	

	// DATATABLE CHEKCK BOX
	var datatablecheckbox = $('.datatablecheckbox').DataTable({
		'dom' : 'lrftip',
		'language': {
			'searchPlaceholder': "Ketik..."
		},
		'aLengthMenu': [[5,10,50,100,1000], [5,10,50,100,1000]],
		'searching':!0,
		'lengthChange':!0,
		'order':[],
		'ordering':!0,
		'columnDefs': [
		{'orderable':!1,'targets':"no-sort"},
		{'targets': 0,'checkboxes': {'selectRow': true}}
		],
		'select': {
			'style': 'multi'
		},
	});

	// CLASS ACTIVE
	var current = location.search.substr(1) ? location.search.substr(1) : './';
	var status = "ok";
	$('.c-sidebar__list .c-sidebar__item .c-sidebar__link').each(function(){
		var $this = $(this);
		if($this.attr('href').indexOf(current) !== -1){
			$this.addClass('is-active');
			status = "add";
		}
	});
	if(status == "ok"){
		$('.dashboard').addClass('is-active');
	}  

	// DATATABLE SEARCH MOVE
	$('div.dataTables_filter').appendTo($('.c-table__title'));
	$('div.dataTables_length').css({'width':'50%','float':'left'});
	$('div.dataTables_length').appendTo($('.c-table__title'));
	$('div.dataTables_filter').css({'width':'50%','float':'right','text-align':'right'});

	// Create Value Checked From datatables
	$('.formtablecheckbox').on('submit', function(e){
		var form=this,rows_selected=datatablecheckbox.column(0).checkboxes.selected();$.each(rows_selected,function(e,t){
			$(form).append($("<input>").attr("type","hidden").attr("name","target[]").val(t))
		});
	})

});