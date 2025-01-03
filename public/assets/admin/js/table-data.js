$(function(e) {
	//file export datatable
	var table = $('#example').DataTable({
		lengthChange: false,
        buttons: [
            {
                extend: 'copy',
                text: 'نسخ',
                exportOptions: {
                    columns: ':visible' // لتصدير الأعمدة المرئية فقط
                },
            },
            {
                extend: 'excel',
                text: 'استخراج ملف Excel',
                exportOptions: {
                    columns: ':visible' // لتصدير الأعمدة المرئية فقط
                },
            },
            {
                extend: 'pdfHtml5',
                text: 'استخراج ملف PDF',
                exportOptions: {
                    orthogonal: "PDF",

                    columns: ':visible' // لتصدير الأعمدة المرئية فقط
                },
                customize: function (doc) {
                    // إعداد النصوص لمحاذاة صحيحة ودعم اللغة العربية
                    doc.defaultStyle.alignment = 'right';
                    doc.defaultStyle.direction = 'rtl';

                    // تخصيص محتوى الجدول
                    doc.content[1].table.body.forEach(function (row, index) {
                        row.forEach(function (cell) {
                            cell.alignment = 'right'; // محاذاة النصوص داخل الخلايا
                            cell.direction = 'rtl';
                        });
                    });
                }
            },
            {
                extend: 'colvis',

                text: 'إظهار/إخفاء الأعمدة'
            },

        ],
        columnDefs: [
            {
                targets: '_all',
                render: function (data, type, row) {
                    if (type === 'myExport') {
                        // معالجة النصوص أثناء التصدير (عكس الكلمات هنا كمثال)
                        return data.split(' ').reverse().join(' ');
                    }
                    return data; // النصوص الافتراضية للعرض
                }
            }
        ],

		responsive: false,
		language: {},
        order: [[0, 'desc']],
	});
	table.buttons().container()
	.appendTo( '#example_wrapper .col-md-6:eq(0)' );

	$('#example1').DataTable({
		language: {
			searchPlaceholder: 'Search...',
			sSearch: '',
			lengthMenu: '_MENU_',
		}
	});
	$('#example2').DataTable({
		//responsive: true,
        pageLength: 100,
		language: {
			searchPlaceholder: 'Search...',
			sSearch: '',
			lengthMenu: '_MENU_',
		}
	});
	var table = $('#example-delete').DataTable({
		responsive: true,
		language: {
			searchPlaceholder: 'Search...',
			sSearch: '',
			lengthMenu: '_MENU_',
		}
	});
    $('#example-delete tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );

    $('#button').click( function () {
        table.row('.selected').remove().draw( false );
    } );

	//Details display datatable
	$('#example-1').DataTable( {
		responsive: true,
		language: {
			searchPlaceholder: 'Search...',
			sSearch: '',
			lengthMenu: '_MENU_',
		},
		responsive: {
			details: {
				display: $.fn.dataTable.Responsive.display.modal( {
					header: function ( row ) {
						var data = row.data();
						return 'Details for '+data[0]+' '+data[1];
					}
				} ),
				renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
					tableClass: 'table border mb-0'
				} )
			}
		}
	} );
});
