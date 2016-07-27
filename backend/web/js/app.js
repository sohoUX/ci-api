$(document).ready(function(){
	$('[data-filter]').each(function(e){
		$filter = $(this);
		$($(this).attr('data-filter')).change(function(e){
			$sel = $(this).find('option:selected');
			$selectedValue = $sel.text();
		});
	});

	changeDateCallback = function(e){
		dt = e.format('yyyy-mm-dd');
		$(this).siblings('.field-value').text(dt);
	};
	$roundList = $('#round-list');
	$('#add-round').click(function(e){
		e.preventDefault();
		d = new Date();
		num = d.getTime();
		pos = $roundList.find('tbody tr').length+1;
		action = '<a href="javascript:void(0);" title="Eliminar" aria-label="Eliminar" class="delete-round">'
			+'<span class="glyphicon glyphicon-trash"></span></a>';

		d = new Date();
		month = d.getMonth()>9?d.getMonth():("0"+d.getMonth());
		day = d.getDate()>9?d.getDate():("0"+d.getDate());
		date = d.getFullYear()+"-"+month+"-"+day;
		nm = 'Project[rounds]['+pos+']';
		$startDate = $("<input name='"+nm+"[start_date]' type='text' value='"+date+"' data-date/>");
		$startDate.datepicker({ format: "yyyy-mm-dd", language: "es" });
		$startDate.on('changeDate', changeDateCallback);
		$endDate = $("<input name='"+nm+"[end_date]' type='text' value='"+date+"' data-date/>");
		$endDate.datepicker({ format: "yyyy-mm-dd", language: "es" });
		$endDate.on('changeDate', changeDateCallback);
		$tr = $('<tr />');
		$('<td/>').html( "" ).appendTo($tr);
		$('<td/>').html( "<input name='"+nm+"[name]' type='text' value='Ronda'/>" ).appendTo($tr);
		$('<td/>').append($startDate).appendTo($tr);
		$('<td/>').append($endDate).appendTo($tr);
		$('<td/>').append("<input name='"+nm+"[status]' type='radio' value='1' data-radiogroup />").appendTo($tr);
		$('<td/>').html( action ).appendTo($tr);
		$roundList.find('tbody').append( $tr );
	});
	$roundList.on('click', '.delete-round', function(e){
		e.preventDefault();
		$(this).parents('tr').remove();
	});

	$('input[data-date]').datepicker({ format: "yyyy-mm-dd", language: "es" }).on('changeDate', changeDateCallback);

	$('[data-radiogroup]').click(function(e){
		$self = $(this);
		$('[data-radiogroup]').each(function(){
			if( $self.attr('name') != $(this).attr('name') ){
				$(this).prop('checked', false);
			}
		});
	});
	$roundList.on('click', '[data-delete="round"]', function(e){
		e.preventDefault();
		$(this).parents('tr').remove();
	});

	$("[data-select]").select2({placeholder: 'Seleccione'});

	$('#project-forms').on('change', function(e){
		options = $('#project-forms').select2('val');
		$.each(options, function(i, option){
			$opt = $('#project-forms option[value="'+option+'"]');
			$clone = $('#template-form-percentage .form-group').clone();
			$clone = renderFormPercentage( option, $opt.text() );
			hasInput = $('#form-percentages [data-form-id="'+option+'"]');
			if( hasInput.length == 0 ){
				$("#form-percentages ul").append($clone);
			}
		});
	});

	var renderFormPercentage = function(id, name){
		position = $("#form-percentages ul li").length;
		$tmp = $('#template-form-percentage li').clone();
		$tmp.attr('data-form-id', id);
		$tmp.find('[data-sortable-handler]').text(name);
		$tmp.find('[data-input-percentage]').attr("name", "Project[form_percentages]["+id+"]");
		$tmp.find('[data-input-percentage]').val(position+1);
		
		return $tmp;
	};

	$('#project-forms').on('select2:unselect', function(e){
		_id = e.params.data.id;
		_name = 'Project[form_percentages]['+_id+']';
		$('#form-percentages input[name="'+_name+'"]').parents('.form-group').remove();
	});

	$("[data-add-alternative]").click(function(e){
		e.preventDefault();
		$self = $(this);
		$parent = $self.parent();
		index = $parent.index();
		type = $self.data('addAlternative');
		$clone = $("#"+type+"-template li").clone();
		name = $clone.find('input').attr('data-name');
		name = name.replace('{key}', index);
		$clone.find('input').attr('name', name);
		$parent.before($clone);
		$clone.find('input').focus();
	});

	$('body').on('click', '[data-delete="alternative"]', function(e){
		e.preventDefault();
		$self = $(this);
		$parent = $self.parents('.list-group-item');
		$parent.remove();
	});

	$('#fileupload').fileupload({
        url: $('#fileupload').data('uploadpath'),
        dataType: 'json',
        type: 'POST',
        done: function (e, data) {
            //console.log(data);
            $('#fileupload-progress').addClass('hidden');
            $('#fileupload-progress .progress').removeClass('progress-striped active');
        },
        start: function(){
        	$('#fileupload-progress .progress-bar').css('width', '0%').text('0%');
        	$('#fileupload-progress .progress').removeClass('progress-striped active');
        },        
        stop: function(){
        	$('#fileupload-progress .progress').addClass('progress-striped active');
        },
        send: function (e, data) {
            $.each(data.files, function (index, file) {
                $('#fileupload-name').text(file.name);
            });
			$('#fileupload-progress').removeClass('hidden');
			return true;
        },
        processdone: function(e, data) {
        	$('#fileupload-progress .progress').addClass('progress-striped active');
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            dt = new Date();
        	$('#fileupload-progress .progress-bar').css('width', progress + '%').text(progress+'%');
        	if( progress >= 100 ){
				$('#fileupload-progress .progress').addClass('progress-striped active');
        	}
        }
    });
	$('[data-tooltip]').tooltip({
		html: true,
		placement: 'bottom',
		container:'body',
		title: function(){
			content = $(this).data('tooltip');

			return content;
		}
	});
	$('[data-popover]').popover({
		html: true,
		placement: 'bottom',
		container: 'body',
		content: function(){
			content = $(this).data('popover');

			return content;
		}
	});
	$('body').on('click', '[data-edit-round]', function(e){
		$self = $(this);
		round_id = $self.data('edit-round');
		modalPath = $self.data('modal');
		$('#modal-round .modal-body').load(modalPath, function(e){
			$("[data-select]").select2({placeholder: 'Seleccione'});
			$('#modal-round').modal('show');
		});
	});
	
	$('body').on('click', '[data-view-round]', function(e){
		$self = $(this);
		round_id = $self.data('view-round');
		modalPath = $self.data('modal');
		$('#modal-round .modal-body').load(modalPath, function(e){
			$('#modal-round .modal-footer').addClass('hidden');
			$('#modal-round').modal('show');
		});
	});

	$("body").on('change', '#modal-round .modal-body [data-select]', function(e){
		$self = $(this);
		$panel = $self.parents('.panel');
		selectedOpts = $self.find('option:selected').length;
		$panel.find('.panel-heading span.badge').text(selectedOpts);
	});

	$('body').on('click', '#round-consultant-form input:checkbox', function(e){
		$self = $(this);
		if( $self.prop('checked') ){
			opts = [];
			$panel = $self.parents('.panel');
			$select = $panel.find('select');
			$select.find('option').prop('selected', true);
			$select.select2().trigger('change');
		}
	});
	$('body').on('click', '#save-round-consultant', function(e){
		$self = $(this);
		params = {};
		if( !$self.hasClass('disabled') ){
			$form = $('#round-consultant-form');
			$form.find('.panel').each(function(){
				$panel = $(this);
				$checkbox = $panel.find('input:checkbox');
				_name = $checkbox.attr('name');
				_checked = $checkbox.prop('checked');
				_subs = $panel.find('select').val();
				_subname = $panel.find('select').attr('name');
				_subname = _subname.replace("[]", "");
				_subs = (_subs != null)?_subs.join():"";
				params[_name] = _checked;
				params[_subname] = _subs;
			});
			//values = $('#round-consultant-form').serialize();
			path = $('#round-consultant-form').attr('action');
			$self.addClass('disabled');
			$.ajax({ url: path, type: 'POST', data: params})
			.done(function(data){
				$self.removeClass('disabled');
				$('#modal-round .modal-body').html(data);
			});
		}
	});

	setPositionValues = function(){
		$("[data-sortable] li").each(function(i, n){
			$self = $(this);
			pos = $self.index()+1;
			$self.find('input[data-position]').val(pos);
		});
	};

	$("[data-sortable]").sortable({
		handle: "[data-sortable-handler]",
		placeholder: "list-group-item list-group-item-warning",
		stop: setPositionValues,
		axis: "y"
	});
	$("[data-sortable]").disableSelection();

	if( $('#form-fieldsets').length > 0 ){
		$('#form-fieldsets').on('select2:select', function(e){
			$opt = $(e.params.data.element);
			$fieldset = $(
	            "<li class='list-group-item' data-id='"+$opt.val()+"'>"+
	                "<label>"+$opt.text()+"</label>"+
	                "<input type='hidden' "+
	                "name='Form[fieldsets_positions]["+$opt.val()+"]' "+
	                    "data-position value='' />"+
	                "<span data-sortable-handler class='glyphicon glyphicon-sort pull-right'></span>"+
	            "</li>"
            );
            $("[data-sortable]").append($fieldset);
            setPositionValues();
		});
		$('#form-fieldsets').on('select2:unselect', function(e){
			$opt = $(e.params.data.element);
			$fieldset = $("[data-sortable] .list-group-item[data-id='"+$opt.val()+"']");
            if( $fieldset.length > 0 ){
				$fieldset.remove();
				setPositionValues();
            }
		});
	}

	$('#evaluations').on('show.bs.modal', function(e){
        action = $(e.relatedTarget).data('action');
        $loader = $('#evaluations [data-loading]');
        $result = $('#evaluations [data-result]');
        $result.addClass('hidden');
        $loader.removeClass('hidden');
        projectTable = $('#project-evaluations tbody');
		projectTable.empty();
        jQuery.ajax({ url: action, dataType: 'json', type: 'GET'})
        .then(function(evaluations){
            if( typeof(evaluations) != 'undefined' ){                
                $.each(evaluations, function(i, evaluation){
                    _consultant = evaluation.consultant.name+' '+evaluation.consultant.last_name;
                    result = evaluation.result;
                    result = parseFloat(result).toFixed(2);
                    dt = new Date(evaluation.updated_at);
                    _date = (dt.getDate() < 10)?"0"+dt.getDate():dt.getDate();
                    _month = (dt.getMonth() < 10)?"0"+dt.getMonth():dt.getMonth();
                    updated_at = _date+"/"+_month+"/"+dt.getFullYear();
                    tr = $('<tr/>');
                    tr.append('<td>'+evaluation.id+'</td>');
                    tr.append('<td>'+_consultant+'</td>');
                    tr.append('<td>'+evaluation.round.position+'</td>');
                    tr.append('<td>'+updated_at+'</td>');
                    if( typeof(evaluation.report) != 'undefined' ){
                        actionButton = $('<a href=\"'+evaluation.report.path+'\" '+
                        'data-toggle=\"tooltip\" data-placement=\"top\" title=\"Reporte\">'+
                            '<span class=\"glyphicon glyphicon-cloud-download\"></span></a>');
                    }
                    else{
                        actionButton = $('<a href=\"javascript:void(0);\" data-toggle=\"tooltip\" '+
                                'data-placement=\"top\" title=\"Aun no se ha generado ningún reporte\" '+
                                'class=\"btn btn-link disabled\">'+
                            '<span class=\"glyphicon glyphicon-cloud-download\"></span></a>');
                    }
                    actionButton.tooltip();
                    tr.append( $('<td class=\"text-center\"/>').append(actionButton) );
                    projectTable.append(tr);
                });
                $loader.addClass('hidden');
                $result.removeClass('hidden');
            }
        });
    })
});