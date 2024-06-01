<script>
    var notyf = new Notyf();

    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
    });

    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });

        function showLoader(){
            $('preloader_demo').removeClass('d-none');
        }
         function hideLoader(){
            $('preloader_demo').addClass('d-none');
        }
</script>
