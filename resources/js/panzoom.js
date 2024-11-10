import Panzoom from '@panzoom/panzoom'

const elem = document.getElementById('panzoom');
const panzoom = Panzoom(elem, {
    maxScale: 5,
    transformOrigin: {x: 0.5, y: 0.5}
});

elem.parentElement.addEventListener('wheel', panzoom.zoomWithWheel)
panzoom.zoom(0.5);
setTimeout(() => panzoom.pan(-2500, -500))

const button = document.getElementById('reset');
button.onclick = function() {
    panzoom.zoom(0.5);
    setTimeout(() => panzoom.pan(-2500, -500))
}
