<!doctype html>
<html lang="en" data-preloader="enable">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <meta charset="utf-8" />
        <title>Authentication</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.ico" />
        <script src="<?php echo base_url(); ?>assets/js/layout.js"></script>
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/app.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/custom.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet"
            type="text/css" />

    </head>

    <body>
        <div class="auth-page-wrapper pt-5">
            <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
                <div class="bg-overlay"></div>
                <div class="shape">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewbox="0 0 1440 120">
                        <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z">
                        </path>
                    </svg>
                </div>
            </div>
            <div class="auth-page-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-center mt-5">
                                <div>
                                    <a href="#" class="d-inline-block auth-logo">
                                        <img src="<?php echo base_url(); ?>assets/images/logo-light.png" alt="" height="90" width="300" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-6 col-lg-4 col-xl-4">
                            <div class="card mt-4" style="border-radius: 20px">
                                <div class="card-body p-4">
                                    <div class="text-center mt-2">
                                        <h5 class="text-primary">Welcome Back ! </h5>
                                        <p class="text-muted">Sign in to continue. </p>
                                    </div>
                                    <div class="p-2 mt-4">
                                        <form action="<?php echo base_url('login_data') ?>" method="post">
                                            <div class="mb-3">
                                                <label for="username" class="form-label">Username </label>
                                                <input type="text" class="form-control rounded-pill" id="username" name="username" placeholder="Enter username" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="password-input">Password </label>
                                                <div class="position-relative auth-pass-inputgroup mb-3">
                                                    <input type="password" class="form-control pe-5 password-input rounded-pill" placeholder="Enter password" id="password" name="password" />
                                                    <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted shadow-none password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                                </div>
                                            </div>
                                            <!-- <div class="form-check">
                                             <input class="form-check-input" type="checkbox" value="" id="auth-remember-check" />
                                             <label class="form-check-label" for="auth-remember-check">Remember me </label>
                                         </div> -->
                                            <button class="button ">
                                                <span class="button_lg rounded-pill">
                                                    <span class="button_sl"></span>
                                                    <span class="button_text">login</span>
                                                </span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
            .button {
                -moz-appearance: none;
                -webkit-appearance: none;
                appearance: none;
                border: none;
                background: none;
                color: #0f1923;
                cursor: pointer;
                position: relative;
                padding: 6px;
                margin-bottom: 20px;
                text-transform: uppercase;
                font-weight: bold;
                font-size: 14px;
                transition: all .15s ease;
            }


            .button_lg {
                position: relative;
                display: block;
                padding: 10px 118px;
                color: #fff;
                background-color: #0f1923;
                overflow: hidden;
                box-shadow: inset 0px 0px 0px 1px transparent;
            }

            .button_lg::before {
                content: '';
                display: block;
                position: absolute;
                top: 0;
                left: 0;
                width: 2px;
                height: 2px;
                background-color: #0f1923;
            }

            .button_lg::after {
                content: '';
                display: block;
                position: absolute;
                right: 0;
                bottom: 0;
                width: 4px;
                height: 4px;
                background-color: #0f1923;
                transition: all .2s ease;
            }

            .button_sl {
                display: block;
                position: absolute;
                top: 0;
                bottom: -1px;
                left: -8px;
                width: 0;
                background-color: rgb(0, 81, 255);
                transform: skew(-15deg);
                transition: all .2s ease;
            }

            .button_text {
                position: relative;
            }

            .button:hover {
                color: #0f1923;
            }

            .button:hover .button_sl {
                width: calc(100% + 15px);
            }

            .button:hover .button_lg::after {
                background-color: #fff;
            }
        </style>
        <!-- JAVASCRIPT -->
        <script src="<?php echo base_url(); ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/node-waves/waves.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/feather-icons/feather.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/particles.js/particles.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/pages/particles.app.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/pages/password-addon.init.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/sweetalert2/sweetalert2.min.js"></script>

        <script>
            // SweetAlert for flash message
            <?php if ($this->session->flashdata('message')): ?>
                var message = "<?php echo $this->session->flashdata('message'); ?>";
                var messageType = "<?php echo $this->session->flashdata('message_type'); ?>";
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    icon: messageType,
                    title: message,
                });
            <?php endif; ?>

            document.addEventListener('DOMContentLoaded', function () {
                const form = document.querySelector('form');
                const username = document.getElementById('username');
                const password = document.getElementById('password');

                form.addEventListener('submit', function (e) {
                    let isValid = true;
                    username.classList.remove('is-invalid');
                    password.classList.remove('is-invalid');
                    if (username.value.trim() === '') {
                        username.classList.add('is-invalid');
                        isValid = false;
                    }

                    if (password.value.trim() === '') {
                        password.classList.add('is-invalid');
                        isValid = false;
                    }
                    if (!isValid) {
                        e.preventDefault();
                    }
                });
            });
        </script>

    </body>

</html>