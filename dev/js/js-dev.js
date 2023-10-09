function initParticles(type, count) {
    motes(".df_moteContainer", type, count, 8);
    motes(".df_moteContainer", type, count, 4);
    motes(".df_moteContainer", type, count, 12);
}

function motes(el, particle, moteCount, sizeDiv) {
    var elem = document.querySelectorAll(el);

    elem.forEach(function(element) {
        for(var i = 0; i <= moteCount; i++) {
            var size = (rnd(40,80)/sizeDiv);
            var the_mote = document.createElement('div');
            the_mote.classList.add('mote', 'mote--' + particle);
            the_mote.style.bottom = rnd(5,20) + 'px';
            the_mote.style.left = rnd(0,99) + '%';
            the_mote.style.width = size + 'px';
            the_mote.style.height = size + 'px';
            the_mote.style.animationDelay = (rnd(0,70)/10) + 's';
            the_mote.setAttribute('aria-hidden', 'true');
            element.append(the_mote.cloneNode(true));
        }
    });
}

var rnd = function(m,n) {
    m = parseInt(m);
    n = parseInt(n);
    return Math.floor( Math.random() * (n - m + 1) ) + m;
}

document.addEventListener("DOMContentLoaded", function(e) {
    const moteContainer = document.getElementById("df_moteContainer");

    let moteQuality = moteContainer.getAttribute("data-quality");

    let moteCount = Math.floor(moteContainer.getAttribute("data-stat") / 3);

    if (moteCount > 33) {
        moteCount = 33;
    }

    document.getElementById("df_artWrapper").classList.add("df_artWrapper--show");

    initParticles(moteQuality, moteCount);
});