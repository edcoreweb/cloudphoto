import $ from 'jquery';
import Dropzone from 'dropzone';
import swal from 'sweetalert';

// Set CSRF header.
$.ajaxSetup({headers: {'X-CSRF-TOKEN': Config.csrfToken}});

window.openModal = function () {
    swal({
        title: "Create gallery",
        type: "input",
        showCancelButton: true,
        closeOnConfirm: false,
        animation: "slide-from-top",
        inputPlaceholder: "Gallery name"
    }, function (name) {
        if (name === false) return false;

        $.post('/galleries', {name: name})
            .fail(xhr => swal.showInputError(xhr.responseJSON))
            .done((gallery) => {
                window.location.href = '/galleries/' + gallery.id;
            });
    });
};


