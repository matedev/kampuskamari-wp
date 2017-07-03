(function($){

	$(document).foundation();

	var selectedCounter = 0;
	var selectedCourses;

	$(".register-switch").click(function(){
		var stillSelected = false;
		var parent = $(this).closest('.accordion-item.is-active');
		
		if($(this).is(':checked') && (!parent.hasClass('selected'))) {
			parent.addClass('selected');
			selectedCounter++;
		}

		parent.find('.register-switch').each(function(){
			if($(this).is(':checked')) {
				stillSelected = true;
			}
		});

		if (!stillSelected){
			parent.removeClass('selected');
			selectedCounter--;
		}
	});

	$("#registerSendButton").click(function(e){
		e.preventDefault();
		if (validateForm()){
			$(this).closest('form').submit();
		}
	});

    $("#registerButton").bind( "click", function(event) {
        event.preventDefault();
		if (selectedCounter > 5){
			event.preventDefault();
			showRegAlert('Please select 5 courses maximum!');
		}else if(selectedCounter == 0){
			event.preventDefault();
			showRegAlert('Please select 1 course minimum!');
		}else{
			selectedCourses = [];
			$('.accordion-item.selected').each(function(){
				var colls = [];
				var courseName = $(this).data("course-name");
				$(this).find('.register-switch').each(function(){
					if($(this).is(':checked')) {
						selectedCourses.push(new Course(courseName, $(this).data("form")))
					}
				});
			});
			console.log(selectedCourses);
			showOnForm(selectedCourses);
		}
    });  

	function validateForm(){
	  var isValid = true;
	  $('.reveal form input').each(function() {
	    if ( $(this).val() === '' ){
	    	$(this).addClass('empty');
	        isValid = false;
	    }else{
	    	$(this).removeClass('empty');
	    }
	  });
	  return isValid;
	}

	function showOnForm(courses){
		var container = $('#regModal #selectedCourseList');
		container.empty();
		$.each(courses, function(index, course){
			//container.append("<p>" + course.courseName + course.collaboration + "</p>");
			var icon = $("#icon-" + course.collaboration).eq(0);
			icon.height(25);
			container.append("<p style='float:left; margin-right:30px;'>" + course.courseName + "</p>");
			container.append(icon.clone());
			container.append("<hr>");
		});
		$('#regModal').foundation('open');
	
	}

	function SelectedCourses(courses){
		this.selectedCourses = courses;
	}

	function Course(name, collaboration){
		this.courseName = name;
		this.collaboration = collaboration;
	}

    $("#registrationForm").submit(function(event) {
    	console.log("asdfasdfsafdsafd");

        var $form = $(this);
        //event.preventDefault();
        if ($form.data('submitted') === true) {
          // Previously submitted - don't submit again
          event.preventDefault();
        } else {
          // Mark it so that the next submit can be ignored
          $form.data('submitted', true);
          var courses = new SelectedCourses(selectedCourses);
          registerSubmit($(this).serializeArray().concat(courses));
          event.preventDefault();
        }
    });

    function registerSubmit(formdata){
        jQuery.post(kampuskamari_ajax.ajaxurl, {
            'action': 'kampuskamari_register',
            'register_data': formdata
        }, function (response) {
            if (response == 'error'){
                $('#error-reg-modal').foundation('open');
            }else{  
                $("#registrationForm").trigger('reset');
                $("#registrationForm").data('submitted', false);
                $("#registrationForm")[0].reset();
                $('#thanks-modal').foundation('open');
            }
        });
    }

    function showRegAlert(msg){
		$("#register-warning div").empty();
		$("#register-warning div").append(msg);
		$("#register-warning").removeClass('hidden');
		setTimeout(function(){
		    $("#register-warning").addClass('hidden');
		}, 2000);
    }


})(jQuery);