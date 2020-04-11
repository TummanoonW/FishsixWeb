$('#note-label').toggle(false);

function updateNote(id){
    const note = document.querySelector('#note').value;

    $.post("../../api/order.php?m=updateNote", { note: note, id: id })
    .done( function( data ) {
        $('#note-label').toggle(true);
    });
}