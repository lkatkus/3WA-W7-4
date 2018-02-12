
// COMMENT FUNCTION
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
};

// GETTING ALL COMMENTS
function showComments(id){

    let data = 'id='+id;
    let allComments;

    // GETTING CURRENT COMMETS DATA WITH AJAX
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
};

// SHOWING ALL COMMENTS
function displayComments(movieComments){

    // CLEANING COMMENT INPUT FORM
    $("#commentsContainer").empty();
    $('#commentAuthor').val("");
    $('#commentContent').val("");

    // LOOPING THROUGH COMMENT OBJECT AND DISPLAYING ALL COMMENTS
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
    };
};

// LIVE SEARCH
// ADD EVENT LISTENER TO SEARCH BAR
$(document).ready(function(){
    $('#searchBar').keyup(function(){
        let liveSearch = $('#liveSearch');
        if($('#searchBar').val() == ''){
            liveSearch.addClass('d-none');
        }else{
            liveSearch.removeClass('d-none');
            let data = 'search=' + $('#searchBar').val();

            // GET AJAX DATA BASED ON INPUT AFTER EACH KEY ENTERED
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

// LIVE SEARCH FUNCTION
function displaySearch(searchResults){
    let liveSearch = $('#liveSearch');
    liveSearch.empty();

    // LOOPING THROUGH FOUND DATA AND DISPLAYING BELOW SEARCH BAR
    for(let i = 0; i < searchResults.length; i++){
        let newResult = $('<div style="padding:10px"></div>');
        let newLink = $('<a href="movie.php?id='+searchResults[i].id+'"></a>')
        $(newLink).text(searchResults[i].title);
        $(newResult).append(newLink);
        $(liveSearch).append(newResult);
    }
};
