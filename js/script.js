
function addComment(id){

    // GETTING DATA FROM FORM
    let data = $("#commentForm").serialize();
    console.log(data);

    // SENDING DATA WITH AJAX TO OTHER PHP
    $.ajax({
        method: "POST",
        url: "addcomment.php",
        data: data,
        success: function(data){

            // RELOADING COMMENTS SECTION
            console.log('added');
            showComments(id);
        },
        error: function(response){
            console.log(response);
        },
    });
}

function showComments(id){

    let data = 'id='+id;
    let allComments;

    // SENDING DATA WITH AJAX TO OTHER PHP
    $.ajax({
        method: "GET",
        url: "getcomments.php",
        data: data,
        success: function(allComments){
            displayComments(allComments);
            console.log(allComments);
        },
        error: function(response){
            console.log(response);
        },
        dataType: "json",
        contentType: "application/json"
    });
}

function displayComments(movieComments){

    $("#commentsContainer").empty();
    $('#commentAuthor').val("");
    $('#commentContent').val("");

    for(let i = 0; i < movieComments.length; i++){
        let commentContainer = $("<div></div>");
        $(commentContainer).addClass("comment");

        let newSpan = $("<h4></h4>")
        $(newSpan).text(movieComments[i].comment_author);
        $(commentContainer).append(newSpan);

        newSpan = $("<p></p>")
        $(newSpan).text(movieComments[i].comment_content);
        $(commentContainer).append(newSpan);

        $("#commentsContainer").append(commentContainer)
    }
}

$(document).ready(function(){
    $('#searchBar').keyup(function(){
        if($('#searchBar').val() == ''){
            let demoDiv = $('#searchDemo');
            demoDiv.empty();
        }else{
            let data = 'search=' + $('#searchBar').val();
            $.ajax({
                method: "GET",
                url: "search.php",
                data: data,
                success: function(data){
                    displaySearch(data);
                },
                error: function(response){
                    console.log(response);
                },
                dataType: "json",
                contentType: "application/json"
            });
        }
    });
});

function displaySearch(searchResults){

    let demoDiv = $('#searchDemo');
    demoDiv.empty();

    for(let i = 0; i < searchResults.length; i++){
        let newResult = $('<div style="padding:10px"></div>');
        let newLink = $('<a href="movie.php?id='+searchResults[i].id+'"></a>')
        $(newLink).text(searchResults[i].title);
        $(newResult).append(newLink);
        $(demoDiv).append(newResult);
    }
}
