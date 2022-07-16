/*
Author       : Dreamguys
Template Name: Doccure - Bootstrap Template
Version      : 1.3
*/





(function($) {
    "use strict";

	// Stick Sidebar

	if ($(window).width() > 767) {
		if($('.theiaStickySidebar').length > 0) {
			$('.theiaStickySidebar').theiaStickySidebar({
			  // Settings
			  additionalMarginTop: 30
			});
		}
	}

	// Sidebar

	if($(window).width() <= 991){
	var Sidemenu = function() {
		this.$menuItem = $('.main-nav a');
	};

	function init() {
		var $this = Sidemenu;
		$('.main-nav a').on('click', function(e) {
			if($(this).parent().hasClass('has-submenu')) {
				e.preventDefault();
			}
			if(!$(this).hasClass('submenu')) {
				$('ul', $(this).parents('ul:first')).slideUp(350);
				$('a', $(this).parents('ul:first')).removeClass('submenu');
				$(this).next('ul').slideDown(350);
				$(this).addClass('submenu');
			} else if($(this).hasClass('submenu')) {
				$(this).removeClass('submenu');
				$(this).next('ul').slideUp(350);
			}
		});
	}

	// Sidebar Initiate
	init();
	}

	// Textarea Text Count

	var maxLength = 100;
	$('#review_desc').on('keyup change', function () {
		var length = $(this).val().length;
		 length = maxLength-length;
		$('#chars').text(length);
	});

	// Select 2

	if($('.select').length > 0) {
		$('.select').select2({
			minimumResultsForSearch: -1,
			width: '100%'
		});
	}

	// Date Time Picker

	if($('.datetimepicker').length > 0) {
		$('.datetimepicker').datetimepicker({
			format: 'DD/MM/YYYY',
			icons: {
				up: "fas fa-chevron-up",
				down: "fas fa-chevron-down",
				next: 'fas fa-chevron-right',
				previous: 'fas fa-chevron-left'
			}
		});
	}

	// Floating Label

	if($('.floating').length > 0 ){
		$('.floating').on('focus blur', function (e) {
		$(this).parents('.form-focus').toggleClass('focused', (e.type === 'focus' || this.value.length > 0));
		}).trigger('blur');
	}

	// Mobile menu sidebar overlay

	$('body').append('<div class="sidebar-overlay"></div>');
	$(document).on('click', '#mobile_btn', function() {
		$('main-wrapper').toggleClass('slide-nav');
		$('.sidebar-overlay').toggleClass('opened');
		$('html').addClass('menu-opened');
		return false;
	});

	$(document).on('click', '.sidebar-overlay', function() {
		$('html').removeClass('menu-opened');
		$(this).removeClass('opened');
		$('main-wrapper').removeClass('slide-nav');
	});

	$(document).on('click', '#menu_close', function() {
		$('html').removeClass('menu-opened');
		$('.sidebar-overlay').removeClass('opened');
		$('main-wrapper').removeClass('slide-nav');
	});

	// Tooltip

	if($('[data-toggle="tooltip"]').length > 0 ){
		$('[data-toggle="tooltip"]').tooltip();
	}

	// Add More Hours

    $(".hours-info").on('click','.trash', function () {
		$(this).closest('.hours-cont').remove();
		return false;
    });
	$(".date-info").on('click','.trash', function () {
		$(this).closest('.hours-cont').remove();
		return false;
    });

    $(".add-hours").on('click', function () {
        $('.start_time option').each(function (){
            // console.log($(this).text());
        });
        var hourscontent="";
		 hourscontent += '<div class="row form-row hours-cont">' +
			'<div class="col-12 col-md-10">' +
				'<div class="row form-row">' +
					'<div class="col-12 col-md-6">' +
						'<div class="form-group">' +
							'<label>Start Time</label>' +
							'<select name="start[]" class="form-control">';

                            $('.start_time option').each(function (){
                                hourscontent +='<option>'+$(this).text()+'</option>';
                            });

        hourscontent +=	'</select>' +
						'</div>' +
					'</div>' +
					'<div class="col-12 col-md-6">' +
						'<div class="form-group">' +
							'<label>End Time</label>' +
                            '<select name="end[]" class="form-control">' ;

                                        $('.start_time option').each(function (){
                                            hourscontent +='<option>'+$(this).text()+'</option>';
                                        });

        hourscontent +=	'</select>' +
						'</div>' +
					'</div>' +
				'</div>' +
			'</div>' +
			'<div class="col-12 col-md-2"><label class="d-md-block d-sm-none d-none">&nbsp;</label><a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a></div>' +
		'</div>';

        $(".hours-info").append(hourscontent);
        return false;
    });


    $(".add-date").on('click', function () {
        $('.start_time option').each(function (){
            // console.log($(this).text());
        });
        var hourscontent="";
		 hourscontent += "    <div class=\"row form-row hours-cont\">\n" +
             "                                <div class=\"col-12 col-md-10\">\n" +
             "                                    <div class=\"row form-row\">\n" +
             "                                        <div class=\"col-12 col-md-6\">\n" +
             "                                            <div class=\"form-group\">\n" +
             "                                                <label>From</label>\n" +
             "                                                <div class=\"filter-widget\">\n" +

             "                                                        <input type=\"date\" name=\"from_date[]\" class=\"form-control datetimepicker\" placeholder=\"Select Date\">\n" +

             "                                                </div>\n" +
             "                                            </div>\n" +
             "                                        </div>\n" +
             "                                        <div class=\"col-12 col-md-6\">\n" +
             "                                            <div class=\"form-group\">\n" +
             "                                                <label>To</label>\n" +
             "                                                <div class=\"filter-widget\">\n" +

             "                                                        <input type=\"date\" name=\"to_date[]\" class=\"form-control datetimepicker\" placeholder=\"Select Date\">\n" +


             "                                                </div>\n" +
             "                                            </div>\n" +
             "                                        </div>\n" +
             "                                    </div>\n" +
             "                                    <div class=\"row form-row\">\n" +
             "                                        <div class=\"col-12 col-md-12\">\n" +
             "                                            <div class=\"form-group\">\n" +
             "                                                <label>Note</label>\n" +
             "                                                <textarea class=\"form-control\" name=\"note[]\"></textarea>\n" +
             "                                            </div>\n" +
             "                                        </div>\n" +
             "\n" +
             "                                    </div>\n" +
             "                                </div>\n" +
             "<div class=\"col-12 col-md-2\"><label class=\"d-md-block d-sm-none d-none\">&nbsp;</label><a href=\"#\" class=\"btn btn-danger trash\"><i class=\"far fa-trash-alt\"></i></a></div>" +

             "                            </div> ";


        $(".date-info").append(hourscontent);
        return false;
    });

	// Content div min height set

	function resizeInnerDiv() {
		var height = $(window).height();
		var header_height = $(".header").height();
		var footer_height = $(".footer").height();
		var setheight = height - header_height;
		var trueheight = setheight - footer_height;
		$(".content").css("min-height", trueheight);
	}

	if($('.content').length > 0 ){
		resizeInnerDiv();
	}

	$(window).resize(function(){
		if($('.content').length > 0 ){
			resizeInnerDiv();
		}
	});

	// Slick Slider

	if($('.specialities-slider').length > 0) {
		$('.specialities-slider').slick({
			dots: true,
			autoplay:false,
			infinite: true,
			variableWidth: true,
			prevArrow: false,
			nextArrow: false
		});
	}

	if($('.doctor-slider').length > 0) {
		$('.doctor-slider').slick({
			dots: false,
			autoplay:false,
			infinite: true,
			variableWidth: true,
		});
	}
	if($('.features-slider').length > 0) {
		$('.features-slider').slick({
			dots: true,
			infinite: true,
			centerMode: true,
			slidesToShow: 3,
			speed: 500,
			variableWidth: true,
			arrows: false,
			autoplay:false,
			responsive: [{
				  breakpoint: 992,
				  settings: {
					slidesToShow: 1
				  }

			}]
		});
	}

	// Date Range Picker
	if($('.bookingrange').length > 0) {
		var start = moment().subtract(6, 'days');
		var end = moment();

		function booking_range(start, end) {
			$('.bookingrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
		}

		$('.bookingrange').daterangepicker({
			startDate: start,
			endDate: end,
			ranges: {
				'Today': [moment(), moment()],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
			}
		}, booking_range);

		booking_range(start, end);
	}
	// Chat

	var chatAppTarget = $('.chat-window');
	(function() {
		if ($(window).width() > 991)
			chatAppTarget.removeClass('chat-slide');

		$(document).on("click",".chat-window .chat-users-list a.media",function () {
			if ($(window).width() <= 991) {
				chatAppTarget.addClass('chat-slide');
			}
			return false;
		});
		$(document).on("click","#back_user_list",function () {
			if ($(window).width() <= 991) {
				chatAppTarget.removeClass('chat-slide');
			}
			return false;
		});
	})();

	// Circle Progress Bar

	function animateElements() {
		$('.circle-bar1').each(function () {
			var elementPos = $(this).offset().top;
			var topOfWindow = $(window).scrollTop();
			var percent = $(this).find('.circle-graph1').attr('data-percent');
			var animate = $(this).data('animate');
			if (elementPos < topOfWindow + $(window).height() - 30 && !animate) {
				$(this).data('animate', true);
				$(this).find('.circle-graph1').circleProgress({
					value: percent / 100,
					size : 400,
					thickness: 30,
					fill: {
						color: '#da3f81'
					}
				});
			}
		});
		$('.circle-bar2').each(function () {
			var elementPos = $(this).offset().top;
			var topOfWindow = $(window).scrollTop();
			var percent = $(this).find('.circle-graph2').attr('data-percent');
			var animate = $(this).data('animate');
			if (elementPos < topOfWindow + $(window).height() - 30 && !animate) {
				$(this).data('animate', true);
				$(this).find('.circle-graph2').circleProgress({
					value: percent / 100,
					size : 400,
					thickness: 30,
					fill: {
						color: '#68dda9'
					}
				});
			}
		});
		$('.circle-bar3').each(function () {
			var elementPos = $(this).offset().top;
			var topOfWindow = $(window).scrollTop();
			var percent = $(this).find('.circle-graph3').attr('data-percent');
			var animate = $(this).data('animate');
			if (elementPos < topOfWindow + $(window).height() - 30 && !animate) {
				$(this).data('animate', true);
				$(this).find('.circle-graph3').circleProgress({
					value: percent / 100,
					size : 400,
					thickness: 30,
					fill: {
						color: '#1b5a90'
					}
				});
			}
		});
	}

	if($('.circle-bar').length > 0) {
		animateElements();
	}
	$(window).scroll(animateElements);

	// Preloader

	$(window).on('load', function () {
		if($('#loader').length > 0) {
			$('#loader').delay(350).fadeOut('slow');
			$('body').delay(350).css({ 'overflow': 'visible' });
		}
	})



    $(".edit-link").click(function (){

        let day_of_wek="";
        $(".day_of_week").each(function (){

            if($(this).hasClass("active")){
                day_of_wek=$(this).text();
            }
        });

        let duration=$("#durations option:selected").text();

        let chk=$(this).attr('data_text');
        if(chk=="add_slot") {
            // $("#add_modal_duration").val(duration);
            $("#add_modal_day").val(day_of_wek);
            $("#day_view").text(day_of_wek);

        }else if(chk=="edit_slot"){
            $("#edit_modal_duration").val(duration);
            $("#edit_modal_day").val(day_of_wek);
        }

    });

    let dynm_id=0;


    // $(".appointment_action").click(function (){

    $(".appointment_action").one("click", function(){

        let url=$(this).attr('data_url');
        let id=$(this).attr('data_id');
        let action=$(this).attr('data_action');

       let btn_id=($(this).attr('id'));

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let content="";
        if(action==1){
            content="Accept the appointment.";
        }else if(action==2){
            content="Denide the appointment.";
        }


        $.confirm({
            title: 'Alert!',
            content: 'Are you sure you want to '+content+'!',
            buttons: {
                confirm: function () {
                      $.ajax({
                        type:"POST",
                        url:url,
                        data:{id:id,action:action},
                        success:function (data){
                        /*    window.location.href=data;*/
                            /*window.location.href='view_appointment';*/
                              if(data==1){
                                  $("#button_"+btn_id).html("");

                                  $("#button_"+btn_id).html('<a href="javascript:void(0);" class="btn btn-sm bg-success-light"><i class="fas fa-check"></i> Accepted</a>')
                              }else if(data==2){
                                  $("#button_"+btn_id).html("");
                                  $("#button_"+btn_id).html('<a href="javascript:void(0);" class="btn btn-sm bg-danger-light"><i class="fas fa-times"></i> Canceled</a>');
                            }
                        }
                    });

                },
                cancel: function () {
                  /*  window.location.href='view_appointment';*/
                }
            }
        });




    });


        $(".delete_schedule").click(function (){
            let url=$(this).attr('data-url');
            let id=$(this).attr('data-id');

            let parent_id= $(this).closest('div').attr('id');
        /*    console.log(url);

            console.log(id);*/

            $.confirm({
                title: 'Alert!',
                content: 'Are you sure you want to delete!',
                buttons: {
                    confirm: function () {

                        $.ajax({
                            type: "POST",
                            url:url,
                            data:{id:id,_token:$('meta[name="csrf-token"]').attr('content')},
                            success:function (data){
                                // window.location="set_schedule";
                                $("#"+parent_id).remove();
                            }
                        });
                    },
                    cancel: function () {

                    }
                }
            });



        });

        $(".trash_button").click(function (){
            let url=$(this).attr('data-url');

            let data_stuff=$(this).attr('data_stuff');

            let res=data_stuff.split(',');

            let arr_of_id=[];

            res.map((items,i)=>{
                arr_of_id[i]={'id':$("#"+items).attr('data_id'),'text':$("#"+items).attr('data_img')}
            });

            $.confirm({
                title: 'Alert!',
                content: 'Are you sure you want to delete!',
                buttons: {
                    confirm: function () {

                        $.ajax({
                            type: "POST",
                            url:url,
                            data:{data:arr_of_id,_token:$('meta[name="csrf-token"]').attr('content')},
                            success:function (data){
                                console.log(data);
                                // window.location="set_schedule";
                            }
                        });
                    },
                    cancel: function () {
                        $.alert('Canceled!');
                    }
                }
            });



        });


    if (window.File && window.FileList && window.FileReader) {

        /*    $("#image").on("change", function(e) {
                var files = e.target.files,

                    filesLength = files.length;


                for (var i = 0; i < filesLength; i++) {
                    var f = files[i]
                    var fileReader = new FileReader();
                    fileReader.onload = (function(e) {
                        var file = e.target;
                        let content="";


                        content="<div class='upload-images'> <span class=\"pip\"><img  class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/><span class=\"remove\">X </span></span></div>";

                        $(content).insertBefore("#image_upload_div");

                        $(".remove").click(function(){
                            $(this).parent(".pip").remove();
                        });



                    });
                    fileReader.readAsDataURL(f);
                }

            });*/




        $("#image").change(function (event) {


            var input_file = document.getElementById('image');

            var len = input_file.files.length;

            $(".dyanamic_div").remove();
            $(".upload-images").remove();
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

                content+='<div class="upload-images dyanamic_div"  id="dyanamic_div'+dynm_id+'">  <img src="'+src+'" alt="Upload Image" style="max-width: 100%"> <a href="javascript:void(0);" data_image="'+event.target.files[j]['name']+'" id="'+dynm_id+'" class="btn btn-icon btn-danger btn-sm " onclick="rem_image(this)"><i class="far fa-trash-alt"></i></a></div>';
                dynm_id++;

            }

            $("#upload-wrap").append(content);

        });


        $("#profile_image").on("change", function(e) {

            var files = e.target.files,

                filesLength = files.length;


            for (var i = 0; i < filesLength; i++) {
                var f = files[i]
                var fileReader = new FileReader();
                fileReader.onload = (function(e) {
                    var file = e.target;
                    let content="";
                    $("#div_image").remove();
                    content="<div id='div_image' class='upload-images'> <span class=\"pip\"><img  class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                        // "<span class=\"remove\">X </span></span></div>" +
                        "";


                    $(content).insertBefore(".add_profile");


                    $(".remove").click(function(){
                        $(this).parent(".pip").remove();
                    });



                });
                fileReader.readAsDataURL(f);
            }

        });

    } else {
        alert("Your browser doesn't support to File API")
    }

let trash_array=[];
    $(".prf_inf").dblclick(function (){
              let row=  $(this).attr('id');
                    if($("#chk" + row).is(":checked") == true) {
                        $("#chk" + row).prop("checked", false);
                        remove_array(trash_array,$("#chk" + row).attr('id'));
                    }else if($("#chk" + row).is(":checked") == false) {
                        $("#chk" + row).prop("checked", true);
                        trash_array.push($("#chk" + row).attr('id'));
                    }

                    if(trash_array.length>0){
                        $('.trash_button').show();

                        $('.trash_button').removeAttr('data_stuff');
                        $('.trash_button').attr('data_stuff',trash_array);
                    }else {
                        $('.trash_button').hide();
                    }

    });

    $(".chk_cls").change(function (){
        if($(this).is(":checked") == true)
        {
            trash_array.push($(this).attr('id'));
        }else{
            remove_array(trash_array,$(this).attr('id'));
        }

        if(trash_array.length>0){
            $('.trash_button').show();
            $('.trash_button').removeAttr('data_stuff');
            $('.trash_button').attr('data_stuff',trash_array);
        }else {
            $('.trash_button').hide();
        }

    })

})(jQuery);


function remove_array(arr,value){

    for(let jk=0;jk<arr.length;jk++){
            if(value==arr[jk]){
                arr.splice(jk, 1);
            }
    }
}


function convertTo24Hour(time) {
    var hours = parseInt(time.substr(0, 2));
    if(time.indexOf('am') != -1 && hours == 12) {
        time = time.replace('12', '0');
    }
    if(time.indexOf('pm')  != -1 && hours < 12) {
        time = time.replace(hours, (hours + 12));
    }
    return time.replace(/(am|pm)/, '');
}

function getTwentyFourHourTime(amPmString) {
    var d = new Date("1/1/2013 " + amPmString);
    return d.getHours() + ':' + d.getMinutes();
}

function tConvert (time) {
    // Check correct time format and split into components
    time = time.toString ().match (/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];

    if (time.length > 1) { // If time format correct
        time = time.slice (1);  // Remove full string match value
        time[5] = +time[0] < 12 ? 'AM' : 'PM'; // Set AM/PM
        time[0] = +time[0] % 12 || 12; // Adjust hours
    }
    return time.join (''); // return adjusted time or original string
}

function get_days(from,to){
    const date1 = new Date(from);
    const date2 = new Date(to);
    const diffTime = Math.abs(date2 - date1);
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
    // console.log(diffTime + " milliseconds");
   /* console.log("From  "+"   "+from +"  To  "+ to+"  "+(diffDays+1) + " days");*/

    return diffDays;

}

function addDays(date, days) {
    var result = new Date(date);
    result.setDate(result.getDate() + days);
    return result;
}


    function edit_modal(did){
    let duration=$("#durations").val();
    let day_of_wek="";
    $(".day_of_week").each(function (){

        if($(this).hasClass("active")){
            day_of_wek=$(this).text();
        }
    });

    $.ajax({
        type:"POST",
        // url:"{{url('edit_modal_get_data')}}",
        url:"edit_modal_get_data",
        // data:{duration:duration,day_of_wek:day_of_wek,did:'{{\Illuminate\Support\Facades\Session::get('id')}}', _token: '{{csrf_token()}}'},
        data:{duration:duration,day_of_wek:day_of_wek,did:did, _token: $('meta[name="csrf-token"]').attr('content')},
        success:function (data){

            let res=JSON.parse(data);

            let time=res['time'];

            res=res['schedule'];


            var valuestart = time['start_time'];
            var valuestop = time['end_time'];

//create date format
            var timeStart = new Date("01/01/2007 " + valuestart).getHours();
            var timeEnd = new Date("01/01/2007 " + valuestop).getHours();

            var hourDiff = (timeEnd - timeStart);

            // console.log(hourDiff)
            hourDiff=((hourDiff*60)/45);
            var dt = new Date("1/1/2013 " + getTwentyFourHourTime(valuestart));


// console.log(time);




            $(".edit_modal_div").html("");

            let content="";
            let k=0;
            for(let i in res){
                let row=res[i];




                if(row['weeks_full_name']==day_of_wek){
                    $(".for_edit_day").val(row['weeks_full_name']);
                    $("#edit_day_lbl").text(row['weeks_full_name']);
                    $(".for_edit_did").val(row['did']);
                    k+=1;
                    let slots=row['slots'];

                    var splitString = slots.split('-');
                    // console.log(splitString[0]);

                    let timestamp  =0;
                    let dt1="";


                    content+=' <div class="row form-row hours-cont"><div class="col-12 col-md-10">' +
                        '<div class="row form-row"><div class="col-12 col-md-6"> <div class="form-group">' +
                        '<label>Start Time</label>';
                   /* console.log(k);*/
                    if(k==1) {
                        content += '<select class="form-control start_time" name="start[]" > <option>-</option>';
                    }else{
                        content += '<select class="form-control" name="start[]" > <option>-</option>';
                    }
                    for(let j=0;j<(hourDiff+1);j++){
                        if(j==0) {
                            dt1 = new Date(dt)
                        }else{
                            dt1=new Date(dt1)
                        }


                        var timeString = dt1.getHours()+":"+( (dt1.getMinutes()<10?'0':'') + dt1.getMinutes() )+":00";
                        var hourEnd = timeString.indexOf(":");
                        var H = +timeString.substr(0, hourEnd);
                        var h = H % 12 || 12;
                        var ampm = H < 12 ? " am" : " pm";
                        timeString = h + timeString.substr(hourEnd, 3) + ampm;


                        if(timeString==splitString[0]) {
                            // console.log(timeString+"=="+splitString[0])
                            content += "<option selected value='" + timeString + "'>" + timeString + "</option>"
                        }else{
                            content += "<option value='" + timeString + "'>" + timeString + "</option>"
                        }
                        dt1.setMinutes( dt1.getMinutes() + 45 );

                    }

                    content+='</select>' +
                        '</div>' +
                        ' </div>' +
                        ' <div class="col-12 col-md-6">' +
                        '            <div class="form-group">' +
                        '            <label>End Time</label>' +
                        '            <select  name="end[]" class="form-control">' +
                        '               <option>-</option>' ;

                    for(let j=0;j<(hourDiff+1);j++){
                        if(j==0) {
                            dt1 = new Date(dt)
                        }else{
                            dt1=new Date(dt1)
                        }
                        // console.log( (dt1.getMinutes()<10?'0':'') + dt1.getMinutes() );

                        var timeString = dt1.getHours()+":"+( (dt1.getMinutes()<10?'0':'') + dt1.getMinutes() )+":00";
                        var hourEnd = timeString.indexOf(":");
                        var H = +timeString.substr(0, hourEnd);
                        var h = H % 12 || 12;
                        var ampm = H < 12 ? " am" : " pm";
                        timeString = h + timeString.substr(hourEnd, 3) + ampm;


                        // console.log(timeString+"=="+splitString[0])
                        if(timeString==splitString[1]) {

                            content += "<option selected value='" + timeString + "'>" + timeString + "</option>"
                        }else{
                            content += "<option value='" + timeString + "'>" + timeString + "</option>"
                        }
                        dt1.setMinutes( dt1.getMinutes() + 45 );

                    }

                    content+=' </select> ' +
                        '           </div>' +
                        '          </div> ' +
                        '         </div>           ' +
                        ' </div>' +
                        // ' <div class="col-12 col-md-2"><label class="d-md-block d-sm-none d-none">&nbsp;</label><a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a></div>' +
                        '</div>';

                }


            }
            $(".edit_modal_div").html(content);


        }
    });
}



    $(document).ready(function() {
    $(document).on('submit', 'form', function() {
        $('button').attr('disabled', 'disabled');
    });
});


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


function change_active_inactive(url,model_class,id) {
    $.ajax({
        type: "Post",
        url: url,
        data: {id: id, model_class:model_class,_token:$('meta[name="csrf-token"]').attr('content')},
        success: function (data) {
        }

    });
}


function get_gallery(url){
    let type=$("#type").val();

    window.location=url+"/"+type;
}

/*

function get_gallery(url){
    let type=$("#type").val();
    $.ajax({
        type: "Post",
        url: url,
        data: {type: type,_token:$('meta[name="csrf-token"]').attr('content')},
        success: function (data) {

            let res =JSON.parse(data);
            let content="";

            res.map((item,i)=>{

                if(item['type']!=2){
                    content+='   <div class="col-md-4 col-lg-3 col-xl-2">\n' +
                        '                          <div class="card widget-profile pat-widget-profile">\n' +
                        '                                            <div class="card-body prf_inf" id="{{$cnt}}">\n' +
                        '                                                <div class="pro-widget-content">\n' +
                        '                                                    <div class="profile-info-widget ">\n' +
                        '                                                        <div class="form-group row float-left">\n' +
                        '\n' +
                        '                                                            <div class="col-md-10">\n' +
                        '                                                                <div class="checkbox">\n' +
                        '                                                                    <label>\n' +
                        '                                                                        <input type="checkbox" data_img="'+item['file_name']+'" class="chk_cls" data_id="'+item['id']+'" id="chk'+i+'" name="checkbox[]">\n' +
                        '                                                                    </label>\n' +
                        '                                                                </div>\n' +
                        '                                                            </div>\n' +
                        '                                                        </div>' ;
                                        if(item['type']==1) {
                                            content += '<a href="{{url(\'public/image/doctors\')}}/{{$af->file_name}}" class="booking-doc-img" data-fancybox="gallery">     <img src="{{url(\'public/image/doctors\')}}/{{$af->file_name}}"  alt="User Image"> </a>';
                                        }else if(item['type']==3){
                                            content += '<a href="{{url('image/patient')}}/{{$af->file_name}}" className="booking-doc-img" data-fancybox="gallery"> <img src="{{url('image/patient')}}/{{$af->file_name}}"                              alt="User Image"> </a>'
                                        }
                        '
                        '
                        '                                                            @elseif($af->type==4)\n' +
                        '                                                                <a href="{{url(\'public/image/Specialities\')}}/{{$af->file_name}}" class="booking-doc-img" data-fancybox="gallery">      <img src="{{url(\'public/image/Specialities\')}}/{{$af->file_name}}"  alt="User Image"> </a>\n' +
                        '                                                            @endif\n' +
                        '\n' +
                        '                                                        <div class="profile-det-info">\n' +
                        '\n' +
                        '                                                            @if($af->type==1)\n' +
                        '                                                                @foreach($doctors as $doc)\n' +
                        '                                                                @if($doc->profile_image==$af->id)\n' +
                        '                                                                    <h3><a href="patient-profile">{{$doc->first_name}}</a></h3>\n' +
                        '                                                                @endif\n' +
                        '\n' +
                        '                                                            @endforeach\n' +
                        '                                                              @elseif($af->type==3)\n' +
                        '                                                                @foreach($patient as $doc)\n' +
                        '                                                                    @if($doc->profile_image==$af->id)\n' +
                        '                                                                        <h3><a href="patient-profile">{{$doc->first_name}}</a></h3>\n' +
                        '                                                                    @endif\n' +
                        '\n' +
                        '                                                                @endforeach\n' +
                        '                                                              @elseif($af->type==4)\n' +
                        '                                                                @foreach($speciality as $doc)\n' +
                        '                                                                    @if($doc->image==$af->id)\n' +
                        '                                                                        <h3><a href="patient-profile">{{$doc->spacialities}}</a></h3>\n' +
                        '                                                                    @endif\n' +
                        '\n' +
                        '                                                                @endforeach\n' +
                        '                                                             @endif\n' +
                        '                                                            <div class="patient-details">\n' +
                        '\n' +
                        '                                                                <?php   $img_file=substr($af->file_name, strpos($af->file_name, "-") + 1)  ?>\n' +
                        '                                                                <h5><b>Image ID :</b>    {{ substr($img_file, 0, strpos($img_file, \'.\'))}}</h5>\n' +
                        '\n' +
                        '                                                            </div>\n' +
                        '                                                        </div>\n' +
                        '\n' +
                        '\n' +
                        '                                                    </div>\n' +
                        '                                                </div>\n' +
                        '\n' +
                        '                                            </div>\n' +
                        '                                        </div>\n' +
                        '                                    </div>';

                }else{


                    content+='<div class="col-md-4 col-lg-3 col-xl-2">\n' +
                        '                                                <div class="card widget-profile pat-widget-profile">\n' +
                        '                                                    <div class="card-body prf_inf" id="'+i+'_{{$chile_cnt}}">\n' +
                        '                                                        <div class="pro-widget-content">\n' +
                        '                                                            <div class="profile-info-widget">\n' +
                        '                                                                <div class="form-group row float-left">\n' +
                        '                                                                    <div class="col-md-10">\n' +
                        '                                                                        <div class="checkbox">\n' +
                        '                                                                            <label>\n' +
                        '                                                                                <input type="checkbox" data_img="{{$img}}" data_id="{{$af->id}}" id="chk{{$cnt}}_{{$chile_cnt}}" name="checkbox[]">\n' +
                        '                                                                            </label>\n' +
                        '                                                                        </div>\n' +
                        '                                                                    </div>\n' +
                        '                                                                </div>\n' +
                        '                                                                <a href="{{url(\'public/image/features\')}}/{{$img}}" class="booking-doc-img" data-fancybox="gallery">\n' +
                        '                                                                            <img src="{{url(\'public/image/features\')}}/{{$img}}" alt="User Image">\n' +
                        '                                                                </a>\n' +
                        '                                                                <div class="profile-det-info">\n' +
                        '                                                                    @foreach($feature as $feat)\n' +
                        '                                                                    {{--{{$feat->clinic_images}}=={{$af->id}}--}}\n' +
                        '                                                                        @if($feat->clinic_images==$af->id)\n' +
                        '                                                                        <h3><a href="patient-profile">{{$feat->clinic_name}}</a></h3>\n' +
                        '                                                                        @endif\n' +
                        '                                                                    @endforeach\n' +
                        '                                                                    <div class="patient-details">\n' +
                        '                                                                        <?php   $img_file=substr($img, strpos($img, "-") + 1)  ?>\n' +
                        '                                                                        <h5><b>Image ID :</b> {{ substr($img_file, 0, strpos($img_file, \'.\'))}}</h5>\n' +
                        '\n' +
                        '                                                                    </div>\n' +
                        '                                                                </div>\n' +
                        '                                                            </div>\n' +
                        '                                                        </div>\n' +
                        '\n' +
                        '                                                    </div>\n' +
                        '                                                </div>\n' +
                        '                                            </div>';


                }

            });
        }

    });

}
*/
