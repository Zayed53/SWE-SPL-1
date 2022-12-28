
$(document).ready(function() {
    // add
    $(document).on("click", "#submit-review-btn", function() {
        var comment = $('#reviewComments').val();
        var star = $('#rate').val();
        $.ajax({
            url: "add_review.php",
            type: "POST",
            catch: false,
            data: {
                added: 1,
                comment: comment,
                star: star
            },
            success: function(dataResult) {
                var dataResult = JSON.parse(dataResult);
                if (dataResult.status == 1) {
                    //$('#staticBackdrop').modal().hide();
                    swal("Setting Updated!", {
                        icon: "success",
                    }).then((result) => {
                        location.reload();
                    });
                }
            }
        });
    });
    // $(document).on('click', '.view_data', function() {
    //     //$('#dataModal').modal();
    //     var employee_id = $(this).attr("id");
    //     $.ajax({
    //         url: "insert.php",
    //         method: "POST",
    //         data: {
    //             employee_id: employee_id
    //         },
    //         success: function(data) {
    //             $('#employee_detail').html(data);
    //             $('#dataModal').modal('show');
    //         }
    //     });
    // });

});