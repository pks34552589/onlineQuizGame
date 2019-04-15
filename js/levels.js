var elem = document.documentElement;
var mins = 0;
var secs = 0;

function openFullscreen() {
    if (elem.requestFullscreen) {
        elem.requestFullscreen();
    } else if (elem.mozRequestFullScreen) { /* Firefox */
        elem.mozRequestFullScreen();
    } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
        elem.webkitRequestFullscreen();
    } else if (elem.msRequestFullscreen) { /* IE/Edge */
        elem.msRequestFullscreen();
    }

    var wrapper = document.querySelector('#wrapper');
    var test = document.querySelector('#test');
    wrapper.style.display = "none";
    test.style.display = "block";
    level1Timer(301);
}
function closeFullscreen() {
    if (document.exitFullscreen) {
        document.exitFullscreen();
    } else if (document.mozCancelFullScreen) {
        document.mozCancelFullScreen();
    } else if (document.webkitExitFullscreen) {
        document.webkitExitFullscreen();
    } else if (document.msExitFullscreen) {
        document.msExitFullscreen();
    }
    var testform = document.querySelector('#testform');
    testform.submit();
}
document.addEventListener('fullscreenchange', exitHandler);
document.addEventListener('webkitfullscreenchange', exitHandler);
document.addEventListener('mozfullscreenchange', exitHandler);
document.addEventListener('MSFullscreenChange', exitHandler);

function exitHandler() {
    if (!document.fullscreenElement && !document.webkitIsFullScreen && !document.mozFullScreen && !document.msFullscreenElement) {
        wrapper.style.display = "";
        test.style.display = "none";
        var testform = document.querySelector('#testform');
        testform.submit();
    }
}

function showTime(sec) {
    mins = Math.floor(sec/60);
    secs = sec%60;
    var showtime = document.querySelector('#showtime');
    var testform = document.querySelector('#testform');
    showtime.innerHTML = mins + " mins " + secs + " secs ";
    if(sec <= 300) {
        showtime.style.color = "red";
    }
    if(sec==0) {
        testform.submit();
    }
}
function level1Timer(sec) {
    setInterval(function() {
        showTime(sec);
        sec--;
    },1000);
}
