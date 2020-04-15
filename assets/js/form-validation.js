(function() {
    'use strict';

    $(document).ready(function() {
        // registration form validation
        $('#register-form').validate({
            rules: {
                full_name: 'required',
                date_of_birth: 'required',
                email: {
                    required: true,
                    email: true
                },
                mobile_number: 'required',
                address: 'required',
                username: 'required',
                password: 'required',
                re_password: {
                    required: true,
                    equalTo: '#password'
                }
            },
            messages: {
                full_name: 'Please enter your full name',
                date_of_birth: 'Please enter your date of birth',
                email: {
                    required: 'Please enter your email address',
                    email: 'Please enter a valid email address'
                },
                mobile_number: 'Please enter your mobile number',
                address: 'Please enter your address',
                username: 'Please enter a username',
                password: 'Please enter a password',
                re_password: {
                    required: 'Please confirm your password',
                    equalTo: 'Confirmation password did not match'
                }
            }
        });

        // participant login form validation
        $('#login-form').validate({
            rules: {
                username: 'required',
                password: 'required'
            },
            messages: {
                username: 'Please enter username',
                password: 'Please enter password'
            }
        });

        // participant login form validation
        $('#retrieve-password-form').validate({
            rules: {
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                email: {
                    required: 'Please enter your email address',
                    email: 'Please enter a valid email address'
                }
            }
        });
    });
})();