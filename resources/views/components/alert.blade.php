<script>
    
    @if(count($errors)>0)
        Swal.fire({
            text: $('#errors').html(),
            icon: "warning",
            timer:3000,
            cancelButtonText: "Close",
            showCancelButton: true,
            showConfirmButton: false,
            customClass: {
                cancelButton: "btn btn-primary"
            }
        });
    @endif
    @if(Session::get('error'))
        Swal.fire({
            title: "Warning",
            text: `{{Session::get('error')}}`,
            icon: "warning",
            buttonsStyling: false,
            timer:3000,
            cancelButtonText: "Close",
            showCancelButton: true,
            showConfirmButton: false,
            customClass: {
                cancelButton: "btn btn-primary"
            }
        });
    @endif
    @if(Session::get('success'))
        Swal.fire({
            text: $('#successmsg').html(),
            icon: "success",
            buttonsStyling: false,
            timer:1500,
            cancelButtonText: "Close",
            showCancelButton: true,
            showConfirmButton: false,
            customClass: {
                cancelButton: "btn btn-primary"
            }
        });
    @endif
    function delete_confirm() {
    var x = confirm("Are you sure you want to delete?");
    if (x) {
        return true;
    }
    else {
        event.preventDefault();
        return false;
    }
}
</script>