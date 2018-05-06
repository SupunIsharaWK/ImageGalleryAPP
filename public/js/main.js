$(function () {
    var $tumbnails = $('#tumbnails');
    $.ajax({
        type: 'GET',
        url: 'http://127.0.0.1:8000/api/images/saveImages',
        success: function (tumbnails) {
            $.each(tumbnails, function (i, tumbnail) {
                $tumbnails.append(
                    '<div class="col-sm-6 col-md-4">' +
                    '<div class="thumbnail" align="justify">' +
                    '<a class="lightbox" href="' + tumbnail.regularImageURL + '"><img src="' + tumbnail.regularImageURL + '" alt="Park"></a>' +
                    '<div class="caption"><h4>Description</h4><p> ' + tumbnail.description + '</p>' +
                    '</div>' +
                    '<div id = "favButton">' +
                    '   <button type="button" class="btn btn-primary" style="margin: 10px">Edit Description</button>' +
                    '   <button type="button" class="btn btn-primary fa fa-thumbs-up" style="margin: 1px" onclick="likeToggle(this)" ></button>' +
                    '</div>' +
                    '</div>' +
                    '</div>');
            })
        }
    });
});

function likeToggle(x) {
    x.classList.toggle("fa-thumbs-down");
}

//var $tumbnails = $('#tumbnails');

// $.each(tumbnails, function (i, tumbnail) {
//     $tumbnails.append(
// '<div class="col-sm-6 col-md-4"><div class="thumbnail"><a class="lightbox" href="'+ tumbnail.regularImageURL +'"><img src="'+ tumbnail.regularImageURL +'" alt="Park"></a><div class="caption"><h3>Thumbnail label</h3><p> '+ tumbnail.description +'</p></div><div id = "favButton"><button type="button" class="btn btn-primary" style="margin: 10px">Add Favourite</button><button type="button" class="btn btn-primary" style="margin: 10px">Edit Description</button></div></div></div>');
// })