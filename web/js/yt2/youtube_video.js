
function playVideo(id){
    var myVideo = document.getElementById(id);

    myVideo.play();
    $('#' + id).prop("controls", true);
    $('#play-' + id).hide();
}