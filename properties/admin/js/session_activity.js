var url_auth = 'http://localhost/freelance/asep/app/admin/login/';
var timeout = 50000;

var timer = 0;
function set_interval() {
	console.log("set interval")
	timer = setInterval("auto_logout()", timeout);
}

function reset_interval() {
	console.log("reset_interval")

	if (timer != 0) {
		clearInterval(timer);
		timer = 0;
		timer = setInterval("auto_logout()", timeout);
	}
}

function auto_logout() {
	$.ajax({
		url : url_auth + "logout",
		method : "POST",
		success: function(data){
			console.log(data);
			Swal.fire({
				icon: 'warning',
				title: 'Oops...',
				text: 'session has ended, please log in again!',
				showConfirmButton: false,
				footer: '<a class="btn btn-primary btn-sm" href="'+url_auth+'">Go to login</a>'
			}).then(function(){
				window.location = url_auth;
			});
		}
	});
}