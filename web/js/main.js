/**
 * Created by juliengrima on 13/08/2017.
 */
// ********************************************************************
// *                       Appel Fonction
// ********************************************************************
jQuery(document).ready(function($) {

    console.log('jQuery de app.js a démarré julien test');

    carousel();
    text();
    selecteur();
    modal();
    navbar();
    zoom1()



});

// ********************************************************************
// *
// *
// *                       JS General
// *
// *
// ********************************************************************

// ********************************************************************
// *                       FORMS
// ********************************************************************

function text() {
    $('#textarea1').val('New Text', 'autoresize');
}

function selecteur() {

        $('select').material_select();
}

// ********************************************************************
// *                       Sliders
// ********************************************************************

function carousel() {
    $('.slider').slider({fullWidth: true});
}

// ********************************************************************
// *                     MODALS
// ********************************************************************

function modal() {
    $('.modal').modal();
}


function navbar() {
    // $('.dropdown-button').dropdown({
    //         inDuration: 300,
    //         outDuration: 225,
    //         hover: true, // Activate on hover
    //         belowOrigin: true, // Displays dropdown below the button
    //         alignment: 'right' // Displays dropdown with edge aligned to the left of button
    //     }
    // );
}



