let dragged;
const dropZones = document.getElementsByClassName('dropzone');


const dragStart = (event) => {
    dragged = event.target;
    console.log("élément attrapé");
    console.log(dragged.dataset.id);
    dragged.dataset.originId = dragged.parentNode.dataset.id;
    console.log(dragged.dataset.originId);

}
const dragEnter = (event) => {
    if (event.target.classList.contains("dropzone")){
        event.target.classList.add("selected");
    }
}
const dragLeave = (event) => {
    event.target.classList.remove("selected");
}
const dragOver = (event) => {
    event.preventDefault();
    // Empêche default d'autoriser le drop
}
const dragEnd = (event) => {
    console.log("élément lâché");
}
const drop = (event) => {
    event.preventDefault();
    if (event.target.classList.contains("dropzone")){
        dragged.parentNode.removeChild(dragged);
        event.target.appendChild(dragged);
        event.target.classList.remove('selected');
        dragged.classList.add('trembling');
    }

}
for (const dropZone of dropZones) {
    dropZone.addEventListener('dragenter', dragEnter);
    dropZone.addEventListener('dragleave', dragLeave);
    dropZone.addEventListener('dragover',dragOver);
}

document.addEventListener('dragstart', dragStart);
document.addEventListener('dragend',dragEnd);
document.addEventListener('drop', drop);

