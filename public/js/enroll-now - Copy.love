jQuery(document).ready(function($) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $(".btn-submit").click(function (e) {
        e.preventDefault();
        var user_name = $("input[name=user_name]").val();
        var email = $("input[name=email]").val();
        var address = $("input[name=address]").val();
        var phone_no = $("input[name=phone_no]").val();
        var course_id = $("input[name=course_id]").val();

        $.ajax({
            type: 'POST',
            url: '/addCustomer',
            data: {user_name: user_name, email: email, address: address, phone_no: phone_no, course_id: course_id},
            success: function (data) {
                alert("Enrolled Successfully.");
                console.log(data);
            }
        });
    });
});