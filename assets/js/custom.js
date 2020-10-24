$(document).ready(function() {
    $(".alert").show().delay(3000).fadeOut();
    $('#pay').submit(function(e) {
        e.preventDefault(); // don't submit multiple times
        this.submit(); // use the native submit method of the form element
        window.open('../receipt', 'result', 'width=400,height=600');
    });
    $('#pay2').submit(function(e) {
        e.preventDefault(); // don't submit multiple times
        this.submit(); // use the native submit method of the form element
        window.open('../receipt2', 'result', 'width=400,height=600');
    });
});

function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}

function doconfirm() {
    yes = confirm("Are you sure ?");
    if (yes != true) {
        return false;
    }
}


$('.btn-openEnrollment').click(function() {
    var baseUrl = $('body').attr('id');
    if ($('input[id="sy-input"]').val() != '') {
        $('#customModal').modal('show');
        $('.btn-save-sy').click(function() {
            var sem = $('#customModal form').find('input[name="semester"]').val();
            if (Number(sem) >= 1 && Number(sem) <= 2) {
                var url = baseUrl + '/DashBoard/openEnrollment';
                $.ajax({
                    url : url,
                    type : 'POST',
                    dataType: 'json',
                    data: {
                         sy : $('input[id="sy-input"]').val(),
                         semesters : sem,
                    },
                }).done(function(){
                    window.location.reload();
                });
            } else {
                alert('To Many Semesters');
            }
        });
    }
});
