/*
Author       : Dreamguys
Template Name: Doccure - Bootstrap Admin Template
Version      : 1.3
*/

(function($) {
    "use strict";

	// Variables declarations

	var $wrapper = $('.main-wrapper');
	var $pageWrapper = $('.page-wrapper');
	var $slimScrolls = $('.slimscroll');

	// Sidebar

	var Sidemenu = function() {
		this.$menuItem = $('#sidebar-menu a');
	};

	function init() {
		var $this = Sidemenu;
		$('#sidebar-menu a').on('click', function(e) {
			if($(this).parent().hasClass('submenu')) {
				e.preventDefault();
			}
			if(!$(this).hasClass('subdrop')) {
				$('ul', $(this).parents('ul:first')).slideUp(350);
				$('a', $(this).parents('ul:first')).removeClass('subdrop');
				$(this).next('ul').slideDown(350);
				$(this).addClass('subdrop');
			} else if($(this).hasClass('subdrop')) {
				$(this).removeClass('subdrop');
				$(this).next('ul').slideUp(350);
			}
		});
		$('#sidebar-menu ul li.submenu a.active').parents('li:last').children('a:first').addClass('active').trigger('click');
	}

	// Sidebar Initiate
	init();

	// Mobile menu sidebar overlay

	$('body').append('<div class="sidebar-overlay"></div>');
	$(document).on('click', '#mobile_btn', function() {
		$wrapper.toggleClass('slide-nav');
		$('.sidebar-overlay').toggleClass('opened');
		$('html').addClass('menu-opened');
		return false;
	});

	// Sidebar overlay

	$(".sidebar-overlay").on("click", function () {
		$wrapper.removeClass('slide-nav');
		$(".sidebar-overlay").removeClass("opened");
		$('html').removeClass('menu-opened');
	});

	// Page Content Height

	if($('.page-wrapper').length > 0 ){
		var height = $(window).height();
		$(".page-wrapper").css("min-height", height);
	}

	// Page Content Height Resize

	$(window).resize(function(){
		if($('.page-wrapper').length > 0 ){
			var height = $(window).height();
			$(".page-wrapper").css("min-height", height);
		}
	});

	// Select 2

    if ($('.select').length > 0) {
        $('.select').select2({
            minimumResultsForSearch: -1,
            width: '100%'
        });
    }

	// Datetimepicker

	if($('.datetimepicker').length > 0 ){
		$('.datetimepicker').datetimepicker({
			format: 'DD/MM/YYYY',
			icons: {
				up: "fa fa-angle-up",
				down: "fa fa-angle-down",
				next: 'fa fa-angle-right',
				previous: 'fa fa-angle-left'
			}
		});
		$('.datetimepicker').on('dp.show',function() {
			$(this).closest('.table-responsive').removeClass('table-responsive').addClass('temp');
		}).on('dp.hide',function() {
			$(this).closest('.temp').addClass('table-responsive').removeClass('temp')
		});
	}

	// Tooltip

	if($('[data-toggle="tooltip"]').length > 0 ){
		$('[data-toggle="tooltip"]').tooltip();
	}

    // Datatable

   /* if ($('.datatable').length > 0) {
        $('.datatable').DataTable({
            "bFilter": false,
        });
    }*/
     if ($('#doctorList').length > 0) {
        $('#doctorList').DataTable();
    }
    if ($('#productList').length > 0) {
        // $('#productList').DataTable();
        $('#productList tfoot th').each(function() {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Search ' + title + '" />');
          });
        $('#productList').DataTable({
            initComplete: function () {
                this.api().columns().every( function () {
                    var column = this;
                    var select = $('<select ><option value=""></option></select>')
                        .appendTo( $(column.footer()).empty() )
                        .on( 'change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()

                            );

                            column
                                .search( val ? '^'+val+'$' : '', true, false )
                                .draw();
                        } );

                    column.data().unique().sort().each( function ( d, j ) {
                    //    $("#doctorsWise").append( '<option value="'+d+'">'+d+'</option>' )
                        select.append( '<option value="'+d+'">'+d+'</option>' )
                    } );
                } );
            }
        } );

    }
    if ($('#assignProduct').length > 0) {
        $('#assignProduct tfoot th').each(function() {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Search ' + title + '" />');
          });
        $('#assignProduct').DataTable({
            initComplete: function () {
                this.api().columns().every( function () {
                    var column = this;
                    var select = $('<select ><option value=""></option></select>')
                        .appendTo( $(column.footer()).empty() )
                        .on( 'change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()

                            );

                            column
                                .search( val ? '^'+val+'$' : '', true, false )
                                .draw();
                        } );

                    column.data().unique().sort().each( function ( d, j ) {
                    //    $("#doctorsWise").append( '<option value="'+d+'">'+d+'</option>' )
                        select.append( '<option value="'+d+'">'+d+'</option>' )
                    } );
                } );
            },
            "columnDefs": [
                {
                    "targets": [6], //first column / numbering column
                    "orderable": false, //set not orderable
                },
            ],
        } );

    }




	// Email Inbox

	if($('.clickable-row').length > 0 ){
		$(document).on('click', '.clickable-row', function() {
			window.location = $(this).data("href");
		});
	}

	// Check all email

	$(document).on('click', '#check_all', function() {
		$('.checkmail').click();
		return false;
	});
	if($('.checkmail').length > 0) {
		$('.checkmail').each(function() {
			$(this).on('click', function() {
				if($(this).closest('tr').hasClass('checked')) {
					$(this).closest('tr').removeClass('checked');
				} else {
					$(this).closest('tr').addClass('checked');
				}
			});
		});
	}

	// Mail important

	$(document).on('click', '.mail-important', function() {
		$(this).find('i.fa').toggleClass('fa-star').toggleClass('fa-star-o');
	});







	// Summernote

	if($('.summernote').length > 0) {
		$('.summernote').summernote({
			height: 200,                 // set editor height
			minHeight: null,             // set minimum height of editor
			maxHeight: null,             // set maximum height of editor
			focus: false                 // set focus to editable area after initializing summernote
		});
	}

    // Product thumb images

    if ($('.proimage-thumb li a').length > 0) {
        var full_image = $(this).attr("href");
        $(".proimage-thumb li a").click(function() {
            full_image = $(this).attr("href");
            $(".pro-image img").attr("src", full_image);
            $(".pro-image img").parent().attr("href", full_image);
            return false;
        });
    }

    // Lightgallery

    if ($('#pro_popup').length > 0) {
        $('#pro_popup').lightGallery({
            thumbnail: true,
            selector: 'a'
        });
    }

	// Sidebar Slimscroll

	if($slimScrolls.length > 0) {
		$slimScrolls.slimScroll({
			height: 'auto',
			width: '100%',
			position: 'right',
			size: '7px',
			color: '#ccc',
			allowPageScroll: false,
			wheelStep: 10,
			touchScrollStep: 100
		});
		var wHeight = $(window).height() - 60;
		$slimScrolls.height(wHeight);
		$('.sidebar .slimScrollDiv').height(wHeight);
		$(window).resize(function() {
			var rHeight = $(window).height() - 60;
			$slimScrolls.height(rHeight);
			$('.sidebar .slimScrollDiv').height(rHeight);
		});
	}

	// Small Sidebar

	$(document).on('click', '#toggle_btn', function() {
        if($('body').hasClass('mini-sidebar')) {
			$('body').removeClass('mini-sidebar');
			$('.subdrop + ul').slideDown();
		} else {
			$('body').addClass('mini-sidebar');
			$('.subdrop + ul').slideUp();
		}
		setTimeout(function(){
			mA.redraw();
			mL.redraw();
		}, 300);
		return false;
	});
	$(document).on('mouseover', function(e) {
		e.stopPropagation();
		if($('body').hasClass('mini-sidebar') && $('#toggle_btn').is(':visible')) {
			var targ = $(e.target).closest('.sidebar').length;
			if(targ) {
				$('body').addClass('expand-menu');
				$('.subdrop + ul').slideDown();
			} else {
				$('body').removeClass('expand-menu');
				$('.subdrop + ul').slideUp();
			}
			return false;
		}
	});

    var dynm_id = 0;

    $("#logo").change(function (event) {


        var input_file = document.getElementById('logo');

        var len = input_file.files.length;

        $(".dyanamic_div").remove();
        $("#text_image").val("");

        let content="";

        for (var j = 0; j < len; j++) {
            var src = "";

            // add_file_ids.push(event.target.files[j]);
            var name = event.target.files[j].name;
            var mime_type = event.target.files[j].type.split("/");
            if (mime_type[0] == "image") {
                src = URL.createObjectURL(event.target.files[j]);

            } else if (mime_type[0] == "video") {
                src = 'icons/video.png';
            } else {
                src = 'icons/file.png';
            }

            content+='<div class="upload-images dyanamic_div" id="dyanamic_div'+dynm_id+'">  <img src="'+src+'" alt="Upload Image" style="height: 30px"> <a href="javascript:void(0);" data_image="'+event.target.files[j]['name']+'" id="'+dynm_id+'" class="btn btn-icon btn-danger btn-sm " onclick="rem_image(this)"><i class="far fa-trash-alt"></i></a></div>';
            dynm_id++;

        }
        // $("#upload-wrap").html("");
        $("#upload-wrap").append(content);

    });

    $("#small_logo").change(function (event) {


        var input_file = document.getElementById('small_logo');

        var len = input_file.files.length;

        // $(".small_dyanamic_div").remove();
        $("#text_image").val("");

        let content="";

        for (var j = 0; j < len; j++) {
            var src = "";

            // add_file_ids.push(event.target.files[j]);
            var name = event.target.files[j].name;
            var mime_type = event.target.files[j].type.split("/");
            if (mime_type[0] == "image") {
                src = URL.createObjectURL(event.target.files[j]);
                console.log(event.target.files[j]['name']);
            } else if (mime_type[0] == "video") {
                src = 'icons/video.png';
            } else {
                src = 'icons/file.png';
            }

            content+='<div class="upload-images small_dyanamic_div" id="dyanamic_div'+dynm_id+'">  <img src="'+src+'" alt="Upload Image" style="height: 30px"> <a href="javascript:void(0);" data_image="'+event.target.files[j]['name']+'" id="'+dynm_id+'" class="btn btn-icon btn-danger btn-sm " onclick="rem_image(this)"><i class="far fa-trash-alt"></i></a></div>';
            dynm_id++;

        }
        $("#small_upload-wrap").html("");
        $("#small_upload-wrap").append(content);

    });

    $("#favicon").change(function (event) {


        var input_file = document.getElementById('favicon');

        var len = input_file.files.length;

        $(".dyanamic_div1").remove();
        $("#text_image").val("");

        let content="";

        for (var j = 0; j < len; j++) {
            var src = "";

            // add_file_ids.push(event.target.files[j]);
            var name = event.target.files[j].name;
            var mime_type = event.target.files[j].type.split("/");
            if (mime_type[0] == "image") {
                src = URL.createObjectURL(event.target.files[j]);
                console.log(event.target.files[j]['name']);
            } else if (mime_type[0] == "video") {
                src = 'icons/video.png';
            } else {
                src = 'icons/file.png';
            }

            content+='<div class="upload-images dyanamic_div1" id="dyanamic_div1'+dynm_id+'">  <img src="'+src+'" alt="Upload Image" style="height: 30px"> <a href="javascript:void(0);" data_image="'+event.target.files[j]['name']+'" id="'+dynm_id+'" class="btn btn-icon btn-danger btn-sm " onclick="rem_image(this)"><i class="far fa-trash-alt"></i></a></div>';
            dynm_id++;

        }
        $("#upload-wrap1").html("");
        $("#upload-wrap1").append(content);

    });





})(jQuery);

function rem_image(content){


    let image_name=content.getAttribute('data_image');

    let img=$("#text_image").val();
    if(img==""){
        img=image_name;
    }else{
        img+=","+image_name;
    }

    $("#text_image").val(img);

    $("#dyanamic_div"+content.id).remove();
}

function add_menu(url){

    let item=$("#menu").val();

    $.ajax({
        type: "Post",
        url: url,
        data: {item: item, _token: $('meta[name="csrf-token"]').attr('content')},
        success: function (data) {
            let res=JSON.parse(data);
            $("#tbody").html("");
            $("#menu_id").html("");

            let tab="";
            let tab_menu_item="";
            let cnt=0;


            let url="'{{url('menu_change')}}'";
            let model_class="'Patients_menu'";

            tab_menu_item+="<option data-select2-id='3'>Select Menu</option>";
            res.map(item=>{
                cnt=cnt+1;

                if(item['is_active']==0) {
                    tab += '<tr><td>' + cnt + '</td><td>' + item['menu'] + '</td><td>  <label class="switch"><input type="checkbox" onclick="change_active_inactive(' + url + ',' + model_class + ',' + item['id'] + ')"  checked > <span class="slider round"></span></label></td></tr>';
                }else{
                    tab += '<tr><td>' + cnt + '</td><td>' + item['menu'] + '</td><td>  <label class="switch"><input type="checkbox" onclick="change_active_inactive(' + url + ',' + model_class + ',' + item['id'] + ')"  > <span class="slider round"></span></label></td></tr>';
                }
                tab_menu_item+="<option value='"+item['id']+"'>"+item['menu']+"</option>";
            });
            $("#tbody").html(tab);
            $("#menu_id").html(tab_menu_item);
            $("#menu").val("");
        }
    });

}
function add_sub_menu(url){

    let item=$("#menu_id").val();
    let sub_menu=$("#sub_menu").val();

    $.ajax({
        type: "Post",
        url: url,
        data: {item: item,sub_menu:sub_menu,  _token: $('meta[name="csrf-token"]').attr('content')},
        success: function (data) {



            let res=JSON.parse(data);
            $("#tbody1").html("");

            let tab="";
            let cnt=0;

            let url="'{{url('menu_change')}}'";
            let model_class="'Patients_sub_menu'";
            res.map(item=>{
                cnt=cnt+1;
                if(item['is_active']==0) {
                    tab += '<tr><td>' + cnt + '</td><td>' + item['menu'] + '</td> <td>' + item['sub_menu'] + '</td> <td> <label class="switch"><input type="checkbox" onclick="change_active_inactive(' + url + ',' + model_class + ',' + item['id'] + ')" checked > <span class="slider round"></span></label></td></tr>';

                }else{
                    tab += '<tr><td>' + cnt + '</td><td>' + item['menu'] + '</td> <td>' + item['sub_menu'] + '</td> <td> <label class="switch"><input type="checkbox" onclick="change_active_inactive(' + url + ',' + model_class + ',' + item['id'] + ')"  > <span class="slider round"></span></label></td></tr>';

                }
            });
            $("#tbody1").html(tab);

            $("#sub_menu").val("");

        }
    });

}

function change_active_inactive(url,model_class,id,thi_val) {


    $.ajax({
        type: "Post",
        url: url,
        data: {id: id, model_class:model_class, _token: $('meta[name="csrf-token"]').attr('content')},
        success: function (data) {

            console.log(data);

        }

    });
}

function doc_add_menu(url){

    let item=$("#menu").val();

    $.ajax({
        type: "Post",
        url: url,
        data: {item: item,  _token: $('meta[name="csrf-token"]').attr('content')},
        success: function (data) {

            let res=JSON.parse(data);
            $("#tbody").html("");
            $("#menu_id").html("");

            let tab="";
            let tab_menu_item="";
            let cnt=0;

            let url="'{{url('menu_change')}}'";
            let model_class="'Doctors_menu'";

            tab_menu_item+="<option data-select2-id='3'>Select Menu</option>";
            res.map(item=>{

                cnt=cnt+1;

                if(item['is_active']==0) {
                    tab += '<tr><td>' + cnt + '</td><td><span id="menu_item">' + item['menu'] + '</span></td><td>  <label class="switch"><input type="checkbox" onclick="change_active_inactive(' + url + ',' + model_class + ',' + item['id'] + ')"  checked > <span class="slider round"></span></label></td><td><span> <i class="fas fa-edit"></i> </span></td></tr>';
                }else{
                    tab += '<tr><td>' + cnt + '</td><td>' + item['menu'] + '</td><td>  <label class="switch"><input type="checkbox" onclick="change_active_inactive(' + url + ',' + model_class + ',' + item['id'] + ')"   > <span class="slider round"></span></label></td><td><span> <i class="fas fa-edit"></i> </span></td></tr>';
                }
                tab_menu_item+="<option value='"+item['id']+"'>"+item['menu']+"</option>";
            });
            $("#tbody").html(tab);
            $("#menu_id").html(tab_menu_item);
            $("#menu").val("");
        }
    });

}
function doc_add_sub_menu(url){

    let item=$("#menu_id").val();
    let sub_menu=$("#sub_menu").val();

    $.ajax({
        type: "Post",
        url: url,
        data: {item: item,sub_menu:sub_menu,  _token: $('meta[name="csrf-token"]').attr('content')},
        success: function (data) {



            let res=JSON.parse(data);
            $("#tbody1").html("");

            let tab="";
            let cnt=0;
            let url="'{{url('menu_change')}}'";
            let model_class="'Doctors_sub_menu'";

            res.map(item=>{
                cnt=cnt+1;

                let item_val=item['id'];



                if(item['is_active']==0) {
                    tab += '<tr><td>' + cnt + '</td><td>' + item['menu'] + '</td> <td>' + item['sub_menu'] + '</td> <td> <label class="switch"><input type="checkbox" onclick="change_active_inactive(' + url + ',' + model_class + ','+ item_val+')" checked > <span class="slider round"></span></label></td></tr>';

                }else{
                    // tab += "<tr><td>" + cnt + "</td><td>" + item['menu'] + "</td> <td>" + item['sub_menu'] + "</td> <td> <label class='switch'><input type='checkbox' onclick='change_active_inactive(" + url + "," + model_class + "," + item_val + ")' > <span class='slider round'></span></label></td></tr>";

                    tab += '<tr><td>' + cnt + '</td><td>' + item['menu'] + '</td> <td>' + item['sub_menu'] + '</td> <td> <label class="switch"><input type="checkbox" onclick="change_active_inactive(' + url + ',' + model_class + ',' + item_val + ')" > <span class="slider round"></span></label></td></tr>';
                }

            });
            $("#tbody1").html(tab);

            $("#sub_menu").val("");

        }
    });

}

function change_status(url,type,id){
    $.ajax({
        type: "Post",
        url: url,
        data: {id:id,type:type,_token: $('meta[name="csrf-token"]').attr('content')},
        success: function (data) {

        }
    });
 }

/*$(document).ready(function() {
    // Setup - add a text input to each HEADER cell
    // $('#example_table thead th').each( function () {
    //     var title = $(this).text();
    //     $(this).html( title+'<br/><input type="text" placeholder="Search '+title+'" />' );
    // } );

    // DataTable
    var table = $('#example_table').DataTable();

    // Apply the search
    table.columns().every( function () {
        var that = this;

        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {

                that.search( this.value )                    .draw();
            }
        } );
    } );
} );*/

function doctorsAssign(element,pid,url){
   let action_data='';
    if(!element.checked){
        action_data=0;

    }else{
        action_data=1;
    }

    $.ajax({
        type: "post",
        url:url,
        data: {pid:pid,action_data:action_data ,_token: $('meta[name="csrf-token"]').attr('content')},
        success: function (data) {
            console.log(data);
        }
    });

}


function addtoData(element,did,id,url) {

    if(!element.checked){
        action_data=1;
    }else{
        action_data=0;
    }
    $.ajax({
        type: "post",
        url:url,
        data: {did:did,uid:id,action_data:action_data ,_token: $('meta[name="csrf-token"]').attr('content')},
        success: function (data) {
            console.log(data);
        }
    });

}


function updatetoData(element,id,url) {

        action_data=0;


    $.ajax({
        type: "POST",
        url:url,
        data: {id:id,action_data:action_data ,_token: $('meta[name="csrf-token"]').attr('content')},
        success: function (data) {
            console.log(data);
        }
    });

}
