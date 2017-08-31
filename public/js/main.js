$(function(){

	$('.invite').click(function(){
		$.ajax({
			url: '/jobs/invite',
			type: 'GET',
			data: {
				job_id: $(this).attr('job-id'),
				jobseeker_id: $(this).attr('jobseeker-id'),
				application_id: $(this).attr('application-id')
			}
		}).done(function(response){
			if(response.status == 1){
				// change the button text to 'Invited'
				$('.btn-'+response.id).text('Invited');
				$('.btn-'+response.id).removeClass('btn-info');
				$('.btn-'+response.id).removeClass('btn-danger');
				$('.btn-'+response.id).addClass('btn-success');

				$('#btn-'+response.id).removeClass('btn-info');
				$('#btn-'+response.id).removeClass('btn-danger');
				$('#btn-'+response.id).addClass('btn-success');
			}
		});

	});


	$('.reject').click(function(){
		$.ajax({
			url: '/jobs/reject',
			type: 'GET',
			data: {
				job_id: $(this).attr('job-id'),
				jobseeker_id: $(this).attr('jobseeker-id'),
				application_id: $(this).attr('application-id')
			}
		}).done(function(response){
			console.log(response);
			if(response.status == 1){
				// change the button text to 'Invited'
				$('.btn-'+response.id).text('Rejected');
				$('.btn-'+response.id).removeClass('btn-info');
				$('.btn-'+response.id).removeClass('btn-success');
				$('.btn-'+response.id).addClass('btn-danger');

				$('#btn-'+response.id).removeClass('btn-info');
				$('#btn-'+response.id).removeClass('btn-success');
				$('#btn-'+response.id).addClass('btn-danger');
			}
		});

	});

});
