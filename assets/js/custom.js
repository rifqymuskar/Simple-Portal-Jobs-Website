$(document).ready(function(){
	$('.modal').modal();
	$('.datepicker').datepicker();
	$('.tooltipped').tooltip();
	$('.dropdown-trigger').dropdown();

	// ajax posh
	var url = $("body").data('url');


	$(".submit_form").on('submit', function(e){
		e.preventDefault();
		const table = $(this).data('table');

		$.ajax({
			url : url + "ajax/post/" + table,
			method : "POST",
			data : new FormData(this),
			processData:false,
            contentType:false,
            cache:false,
            async:false,
			complete:function(data){
				if(data.responseText == "sukses"){
					$("body").load(window.location.href)
					alert('success post')
				}else{
					alert(data.responseText);
				}
			}
		});	

	})

	$(".modal-table").on('click', function(){
		const id = $(this).data('id')
		var field = "";
		var data = "";

		$.ajax({
			url : url + "ajax/get/proposal",
			method : "GET",
			data : {id : id},
			complete:function(data){
				const json = JSON.parse(data.responseText)

				if(json.data.length > 0){

					json.table.forEach(function(entry){
						field += '<td>'+entry+'</td>'
					});

					Object.keys(json.data).forEach(function(key) {
						//console.log(json.data[key])

						for(var x in json.data[key]){
							if(x == 'file'){
								data += '<td><a class="btn" target="_blank" href="'+url+"assets/proposal/"+json.data[key][x]+'">Open Proposal</a></td>'
							}else if(x == 'completion_day'){
								data += '<td>'+json.data[key][x]+' Days</td>'
							}else{
								data += '<td>'+json.data[key][x]+'</td>'
							}
						}
					})
						
					data = '<tr>'+data+'</tr>'
					$("#kosong_jobs").text("");
					$("#table_proposal thead tr").html(field)
					$("#table_proposal tbody").html(data)

				}else{
					$("#kosong_jobs").text("currently there are no proposals submitted");
					$("#table_proposal thead tr").empty()
					$("#table_proposal tbody").empty()
				}
				
				$("#proposal").modal("open");
			}	
			
		})
	});

	$(".modal-form").on("click", function(){

		var jobs_id = $(this).data('id')
		var judul = $(this).data('judul')

		$("#judul-proposal").empty().text(judul)
		$("#upload-proposal").modal("open")

		$(".submit_proposal").on('submit', function(e){
			e.preventDefault();
			const table = $(this).data('table');

			$.ajax({
				url : url + "ajax/post/" + table + "/" + jobs_id,
				method : "POST",
				data : new FormData(this),
				contentType: false,
				cache : false,
				processData: false,
				complete:function(data){
					if(data.responseText == "sukses"){
						$("body").load(window.location.href)
						alert('success post')
					}else{
						alert(data.responseText);
					}
				}
			});	

		})

	})

})