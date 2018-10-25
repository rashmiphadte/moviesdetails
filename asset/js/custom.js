$(document).ready(function () {
    $('#selSort').on('change', (function () {
        $.ajax({
            url: "sort.php",
            type: "POST",
            data: {
                sort: $(this).val()
            },
            success: function (response) {
                $("#table").empty();
                $("#table").append(response);
            }
        });
    })
            );

    $('#selLanguage').on('change', (function () {
        $.ajax({
            url: "filter.php",
            type: "POST",
            data: {
                id: $(this).val()
            },
            success: function (response) {
//                alert(response);
                $("#table").empty();
                $("#table").append(response);
            }
        });
    })
            );
      $('#selGenre').on('change', (function () {
          
        $.ajax({
            url: "filter.php",
            type: "POST",
            data: {
                genre_id: $(this).val()
            },
            success: function (response) {
//                alert(response);
                $("#table").empty();
                $("#table").append(response);
            }
        });
    })
            );

});