(function(){function r(e,n,t){function o(i,f){if(!n[i]){if(!e[i]){var c="function"==typeof require&&require;if(!f&&c)return c(i,!0);if(u)return u(i,!0);var a=new Error("Cannot find module '"+i+"'");throw a.code="MODULE_NOT_FOUND",a}var p=n[i]={exports:{}};e[i][0].call(p.exports,function(r){var n=e[i][1][r];return o(n||r)},p,p.exports,r,e,n,t)}return n[i].exports}for(var u="function"==typeof require&&require,i=0;i<t.length;i++)o(t[i]);return o}return r})()({1:[function(require,module,exports){
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

    let moteCount = Math.floor(moteContainer.getAttribute("data-stat") / 10);

    if (moteCount > 15) {
        moteCount = 15;
    }

    document.getElementById("df_artWrapper").classList.add("df_artWrapper--show");

    initParticles(moteQuality, moteCount);
});
},{}]},{},[1])
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIm5vZGVfbW9kdWxlcy9icm93c2VyLXBhY2svX3ByZWx1ZGUuanMiLCJkZXYvanMvanMtZGV2LmpzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiJBQUFBO0FDQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EiLCJmaWxlIjoiZ2VuZXJhdGVkLmpzIiwic291cmNlUm9vdCI6IiIsInNvdXJjZXNDb250ZW50IjpbIihmdW5jdGlvbigpe2Z1bmN0aW9uIHIoZSxuLHQpe2Z1bmN0aW9uIG8oaSxmKXtpZighbltpXSl7aWYoIWVbaV0pe3ZhciBjPVwiZnVuY3Rpb25cIj09dHlwZW9mIHJlcXVpcmUmJnJlcXVpcmU7aWYoIWYmJmMpcmV0dXJuIGMoaSwhMCk7aWYodSlyZXR1cm4gdShpLCEwKTt2YXIgYT1uZXcgRXJyb3IoXCJDYW5ub3QgZmluZCBtb2R1bGUgJ1wiK2krXCInXCIpO3Rocm93IGEuY29kZT1cIk1PRFVMRV9OT1RfRk9VTkRcIixhfXZhciBwPW5baV09e2V4cG9ydHM6e319O2VbaV1bMF0uY2FsbChwLmV4cG9ydHMsZnVuY3Rpb24ocil7dmFyIG49ZVtpXVsxXVtyXTtyZXR1cm4gbyhufHxyKX0scCxwLmV4cG9ydHMscixlLG4sdCl9cmV0dXJuIG5baV0uZXhwb3J0c31mb3IodmFyIHU9XCJmdW5jdGlvblwiPT10eXBlb2YgcmVxdWlyZSYmcmVxdWlyZSxpPTA7aTx0Lmxlbmd0aDtpKyspbyh0W2ldKTtyZXR1cm4gb31yZXR1cm4gcn0pKCkiLCJmdW5jdGlvbiBpbml0UGFydGljbGVzKHR5cGUsIGNvdW50KSB7XG4gICAgbW90ZXMoXCIuZGZfbW90ZUNvbnRhaW5lclwiLCB0eXBlLCBjb3VudCwgOCk7XG4gICAgbW90ZXMoXCIuZGZfbW90ZUNvbnRhaW5lclwiLCB0eXBlLCBjb3VudCwgNCk7XG4gICAgbW90ZXMoXCIuZGZfbW90ZUNvbnRhaW5lclwiLCB0eXBlLCBjb3VudCwgMTIpO1xufVxuXG5mdW5jdGlvbiBtb3RlcyhlbCwgcGFydGljbGUsIG1vdGVDb3VudCwgc2l6ZURpdikge1xuICAgIHZhciBlbGVtID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbChlbCk7XG5cbiAgICBlbGVtLmZvckVhY2goZnVuY3Rpb24oZWxlbWVudCkge1xuICAgICAgICBmb3IodmFyIGkgPSAwOyBpIDw9IG1vdGVDb3VudDsgaSsrKSB7XG4gICAgICAgICAgICB2YXIgc2l6ZSA9IChybmQoNDAsODApL3NpemVEaXYpO1xuICAgICAgICAgICAgdmFyIHRoZV9tb3RlID0gZG9jdW1lbnQuY3JlYXRlRWxlbWVudCgnZGl2Jyk7XG4gICAgICAgICAgICB0aGVfbW90ZS5jbGFzc0xpc3QuYWRkKCdtb3RlJywgJ21vdGUtLScgKyBwYXJ0aWNsZSk7XG4gICAgICAgICAgICB0aGVfbW90ZS5zdHlsZS5ib3R0b20gPSBybmQoNSwyMCkgKyAncHgnO1xuICAgICAgICAgICAgdGhlX21vdGUuc3R5bGUubGVmdCA9IHJuZCgwLDk5KSArICclJztcbiAgICAgICAgICAgIHRoZV9tb3RlLnN0eWxlLndpZHRoID0gc2l6ZSArICdweCc7XG4gICAgICAgICAgICB0aGVfbW90ZS5zdHlsZS5oZWlnaHQgPSBzaXplICsgJ3B4JztcbiAgICAgICAgICAgIHRoZV9tb3RlLnN0eWxlLmFuaW1hdGlvbkRlbGF5ID0gKHJuZCgwLDcwKS8xMCkgKyAncyc7XG4gICAgICAgICAgICB0aGVfbW90ZS5zZXRBdHRyaWJ1dGUoJ2FyaWEtaGlkZGVuJywgJ3RydWUnKTtcbiAgICAgICAgICAgIGVsZW1lbnQuYXBwZW5kKHRoZV9tb3RlLmNsb25lTm9kZSh0cnVlKSk7XG4gICAgICAgIH1cbiAgICB9KTtcbn1cblxudmFyIHJuZCA9IGZ1bmN0aW9uKG0sbikge1xuICAgIG0gPSBwYXJzZUludChtKTtcbiAgICBuID0gcGFyc2VJbnQobik7XG4gICAgcmV0dXJuIE1hdGguZmxvb3IoIE1hdGgucmFuZG9tKCkgKiAobiAtIG0gKyAxKSApICsgbTtcbn1cblxuZG9jdW1lbnQuYWRkRXZlbnRMaXN0ZW5lcihcIkRPTUNvbnRlbnRMb2FkZWRcIiwgZnVuY3Rpb24oZSkge1xuICAgIGNvbnN0IG1vdGVDb250YWluZXIgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZChcImRmX21vdGVDb250YWluZXJcIik7XG5cbiAgICBsZXQgbW90ZVF1YWxpdHkgPSBtb3RlQ29udGFpbmVyLmdldEF0dHJpYnV0ZShcImRhdGEtcXVhbGl0eVwiKTtcblxuICAgIGxldCBtb3RlQ291bnQgPSBNYXRoLmZsb29yKG1vdGVDb250YWluZXIuZ2V0QXR0cmlidXRlKFwiZGF0YS1zdGF0XCIpIC8gMTApO1xuXG4gICAgaWYgKG1vdGVDb3VudCA+IDE1KSB7XG4gICAgICAgIG1vdGVDb3VudCA9IDE1O1xuICAgIH1cblxuICAgIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKFwiZGZfYXJ0V3JhcHBlclwiKS5jbGFzc0xpc3QuYWRkKFwiZGZfYXJ0V3JhcHBlci0tc2hvd1wiKTtcblxuICAgIGluaXRQYXJ0aWNsZXMobW90ZVF1YWxpdHksIG1vdGVDb3VudCk7XG59KTsiXX0=
