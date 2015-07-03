$( document ).ready(function() {
    $('#add_new').click(function() {
        var film_name = $('.film_name').val();
        $.post("http://testjs.dev/films.php?mode=add",
            {
                film: film_name
            }, function(data,status){
            alert(data + "\n  please press refresh");
        });
    });

    $(document.body).on('click', '.remove' ,function(){
        var id = $(this).attr("id");
        $.post("http://testjs.dev/films.php?mode=remove",
            {
                film_id: id
            }, function(data,status){
                alert(data + "\n  please press refresh");
            });
    });

    $('#modify').click(function() {
        $.get("http://testjs.dev/films.php?mode=list", function(data, status){
            $(".films tr:last").after(data);
        });
    });

    $('#refresh').click(function() {
        $.get("http://testjs.dev/films.php?mode=list", function(data, status){
            $(".dynamic").remove();
            $(".films tr:last").after(data);
        });
    });
});