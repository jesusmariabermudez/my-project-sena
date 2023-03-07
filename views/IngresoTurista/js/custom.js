(function() {

    'use strict';

    var elToggle = document.querySelector('.js-password-show-toggle'),elToggle2 = document.querySelector('.js-password-show-toggle2')
        passwordInput = document.getElementById('password'),passwordConInput = document.getElementById('passwordCon');


        elToggle.addEventListener('click', (e) => {
            e.preventDefault();

            if ( elToggle.classList.contains('active') ) {
                passwordInput.setAttribute('type', 'password');
                elToggle.classList.remove('active');
                
            } else {
                passwordInput.setAttribute('type', 'text');
                elToggle.classList.add('active');
                
            }

        })

        elToggle2.addEventListener('click', (e) => {
            e.preventDefault();

            if ( elToggle2.classList.contains('active') ) {

                passwordConInput.setAttribute('type', 'password');
                elToggle2.classList.remove('active');
                
            } else {
                passwordConInput.setAttribute('type', 'text');
                elToggle2.classList.add('active');


        })

})()
