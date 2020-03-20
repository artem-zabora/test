<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    // $('#visitors').on('submit', function (e) {
    //     e.preventDefault();
    //     $.ajax({
    //         url: $(this).attr('action'),
    //         type: "POST",
    //         data: {
    //             date: $('#date').val(),
    //             type: $('#type').val(),
    //             count: $('#count').val()
    //         },
    //         // success: function (response) {
    //         //     alertMessage('success', response.message)
    //         //
    //         // }, error: function () {
    //         //     alertMessage('error', 'SERVER ERROR');
    //         // }
    //     });
    //
    // });


    $('#binEdit').on('submit', function (e) {
        e.preventDefault();


        $.ajax({
            url: $(this).attr('action'),
            type: "PUT",
            data: {
                'bank':$('#bank').val(),
                'card':$('#card').val(),
                'type':$('#type').val(),
                'level':$('#level').val(),
                'country':$('#country').val(),
                'countrycode':$('#countrycode').val(),
                'website':$('#website').val(),
                'phone':$('#phone').val(),

            },
            success: function (response) {
                alertMessage('success', response.message)

            }, error: function () {
                alertMessage('error', 'SERVER ERROR');
            }
        });

    });

</script>