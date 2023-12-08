function openEditModal(classroomId) {
    var modalId = 'editModal-' + classroomId;
    document.getElementById(modalId).style.display = 'flex';
}

function closeModal(classroomId) {
    var modalId = 'editModal-' + classroomId;
    document.getElementById(modalId).style.display = 'none';
    document.getElementById('IdClassName').value = "";
    document.getElementById('IdClassSubject').value = "";
}

document.addEventListener("DOMContentLoaded", function() {
    var elements = document.querySelectorAll('.classroom-note-description');

    elements.forEach(function(element) {
        if (element.scrollHeight > element.clientHeight) {
            element.classList.add('with-ellipsis');
        }
    });
});


function openNoteEditModal(noteId) {
    var modalId = 'editModal-' + noteId;
    document.getElementById(modalId).style.display = 'flex';
}

function closeModal(noteId) {
    var modalId = 'editModal-' + noteId;
    document.getElementById(modalId).style.display = 'none';
}