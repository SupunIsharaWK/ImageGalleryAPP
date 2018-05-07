$(function () {
    var $tumbnails = $('#tumbnails');

    function loadImage(tumbnail) {
        $tumbnails.append(
            '<div class="col-sm-6 col-md-4" id="' + tumbnail.id + '">' +
            '<div class="thumbnail" align="justify">' +
            '<a class="lightbox" href="' + tumbnail.regularImageURL + '"><img src="' + tumbnail.regularImageURL + '" alt="Park"></a>' +
            '<div class="caption"><h4>Description</h4><p id="description' + tumbnail.id + '"> ' + tumbnail.description + '</p>' +
            '</div>' +
            '<div id = "favButton">' +
            '   <button type="button" class="btn btn-primary fa fa-gear"  style="margin: 10px" onclick="updateDescription(' + tumbnail.id + ')"/>' +
            '   <button type="button" class="btn btn-primary fa fa-thumbs-up" style="margin: 1px" onclick="likeToggle(' + tumbnail.id + ')" ></button>' +
            '   <button type="button" class="btn btn-primary fa fa-trash" data-id="' + tumbnail.id + '" onclick="removeImages(' + tumbnail.id + ')"  style="margin: 1px" ></button>' +
            '</div>' +
            '</div>' +
            '</div>');
    }

    $.ajax({
        type: 'GET',
        url: 'http://127.0.0.1:8000/api/images/saveImages',
        success: function (tumbnails) {
            $.each(tumbnails, function (i, tumbnail) {
                loadImage(tumbnail);
            });
        },
        error: function () {
            alert('error loading images')
        }
    });
});

function removeImages(id) {
    var div = document.getElementById(id);
    $.ajax({
        type: 'DELETE',
        url: 'http://127.0.0.1:8000/api/image/' + id,
        dataType: 'json',
        success: function (textStatus, xhr) {
            alert('Image has been deleted');
            console.log(textStatus, xhr);
            div.remove();
        },
        error: function () {
            alert('error deleting images')
        }
    });
}

function likeToggle(id) {
    $.ajax({
        type: 'PUT',
        url: 'http://127.0.0.1:8000/api/image/' + id,
        dataType: 'json',
        data: {"favouriteStatus": "1"},
        headers: {"Content-Type": "application/x-www-form-urlencoded"},
        success: function (textStatus, xhr) {
            alert("Add to favourit");
            console.log(textStatus, xhr);
            id.classList.toggle("fa-thumbs-down");
        }
    })
}

function updateDescription(id) {
    var data = window.prompt("Enter your description here");
    var elementId = "description" + id;
    var descriptionParagraph = document.getElementById(elementId);
    $.ajax({
        type: 'PUT',
        url: 'http://127.0.0.1:8000/api/image/' + id,
        dataType: 'json',
        data: {"description": data},
        headers: {"Content-Type": "application/x-www-form-urlencoded"},
        success: function (textStatus, xhr) {
            descriptionParagraph.innerHTML = data;
            alert("Description added");
            console.log(textStatus, xhr);
        }
    })
}