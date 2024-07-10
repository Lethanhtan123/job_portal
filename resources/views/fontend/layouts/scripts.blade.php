<script>
    /**
     * -----------------------------------
     * Thard party plugin initialization
     * -----------------------------------
     * **/

    // Create an instance of Notyf
    var notyf = new Notyf({
        duration: 5000
    });

    // date picker
    $('.datepicker').datepicker({
        format: 'yyyy-m-d',
    });

    $('.yearpicker').datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years"
    });


    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });


    function showLoader() {
        $('.preloader_demo').removeClass('d-none');
    }

    function hideLoader() {
        $('.preloader_demo').addClass('d-none');
    }

    // show sweet alert on delete

    $("body").on('click', '.delete-item', function(e) {
        e.preventDefault();

        let url = $(this).attr('href');

        Swal.fire({
            title: "Bạn có chắc chắn muốn xóa?",
            text: "Bạn sẽ không thể khôi phục lại thao tác!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Đồng ý",
            cancelButtonText: "Đóng",
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    method: 'DELETE',
                    url: url,
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    beforeSend: function() {
                        showLoader();
                    },
                    success: function(response) {
                        window.location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr);
                        swal(xhr.responseJSON.message, {
                            icon: 'error',
                        });
                        hideLoader();

                    }
                })
            }
        });
    });

    $('.job-bookmark').on('click', function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        $.ajax({
            method: 'GET',
            url: '{{ route("job.bookmark", ":id") }}'.replace(":id", id),
            data: {},
            success: function(response) {
                $('.job-bookmark').each(function() {
                    let elementId = $(this).data('id');
                    if (elementId == response.id) {
                        $(this).find('i').addClass('fas fa-bookmark active-bookmark');
                    }
                    window.location.reload();
                })
                notyf.success(response.message);
            },
            error: function(xhr, status, error) {
                let errors = xhr.responseJSON.errors;
                $.each(errors, function(index, value) {
                    notyf.error(value[index]);
                });
            }
        })
    });
</script>



