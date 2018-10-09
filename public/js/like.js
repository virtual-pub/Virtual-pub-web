var postId = 0;
$('.like').on('click', function(event) {
    event.preventDefault();
    postId = event.target.parentNode.parentNode.dataset['postid'];
    var isLike = event.target.previousElementSibling == null;
    $.ajax({
        method: 'POST',
        url: urlLike,
        data: {isLike: isLike, postId: postId, _token: token}
    })
        .done(function() {
            event.target.innerText = isLike ? event.target.innerText == 'curtir' ? 'curtiu' : 'curtir' : event.target.innerText == 'não curtir' ? 'não curtiu' : 'não curtir';
            if (isLike) {
                event.target.nextElementSibling.innerText = 'não curtir';
            } else {
                event.target.previousElementSibling.innerText = 'curtir';
            }
        });
});