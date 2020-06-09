$(function() {
    $('#save').on('click',function(){
        let form = $('.main-form');
        let url = form.attr('action');
        let data = form.serialize();
        $.ajax({
            url: url,
            type: "POST",
            data: data,
            headers: {
                'X-CSRF-Token': $('input[name="_token"]').val()
            },
            success: function (response) {
                let alert = $('.alert');
                let tableBody = $('.table tbody');
                let tr = "<tr>\n" +
                    "<td>"+ response.data.name +"</td>\n" +
                    "<td>"+ response.data.latitude +"</td>\n" +
                    "<td>"+ response.data.longitude +"</td>\n" +
                    "<td>"+ response.data.population +"</td>\n" +
                "</tr>"
                tableBody.append(tr);
                $('.form-control').removeClass('is-invalid');
                $('.invalid-feedback strong').html('');
                $('.invalid-feedback').hide();
                form[0].reset();
                $('.alert .message').html(response.success);
                alert.show();
            },
            error: function (response) {
                let errors = JSON.parse(response.responseText).errors;
                $('.form-control').removeClass('is-invalid');
                $('.invalid-feedback strong').html('');
                $('.invalid-feedback').hide();
                for (let key in errors) {
                    let input = $('#' + key);
                    let flash = $('.invalid-feedback.' + key);
                    input.addClass('is-invalid');
                    $('.invalid-feedback.' + key + ' strong').html(errors[key]);
                    flash.show();
                }
            }
        });
    });
});
