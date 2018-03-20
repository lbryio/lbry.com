
function playVideo1(){
    var myVideo = document.getElementById("video1");

    myVideo.play();
    $('#video1').prop("controls", true);
    $('#play-video1').hide();
}

function playVideo2(){
    var myVideo = document.getElementById("video2");

    myVideo.play();
    $('#video2').prop("controls", true);
    $('#play-video2').hide();
}

function playVideo3() {
    var myVideo = document.getElementById("video3");

    myVideo.play();
    $('#video3').prop("controls", true);
    $('#play-video3').hide();

}
