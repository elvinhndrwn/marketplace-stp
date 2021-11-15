var base_url = 'http://localhost/freelance/asep/app/admin/pages/';

function delete_data(id, table) {
	Swal.fire({
		title: 'Are you sure?',
		text: "You won't be able to revert this!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, delete it!'
	}).then((result) => {
		if (result.isConfirmed) {
			$.ajax({
				url : base_url + "delete",
				method : "POST",
				data : {id : id, table : table},
				success: function(err){
					console.log(err)
					
					if (err > 0) {
						console.log("FAILED")
						Swal.fire({
							icon: 'error',
							title: 'Data already in used',
							showConfirmButton: false,
							timer: 4000
						})
					}else{
						console.log("SUCCESS")
						Swal.fire({
							icon: 'success',
							title: 'Deleted successfully',
							showConfirmButton: false,
							timer: 4000
						})
					}

					location.reload();

				}
			});
		}
	})
}

