</div>
             <footer class="footer">
                 <div class="container-fluid">
                     <div class="row">
                         <div class="col-sm-6">
                             <script>document.write(new Date().getFullYear())</script> © System Management.
                         </div>
                         <div class="col-sm-6">
                             <div class="text-sm-end d-none d-sm-block">
                                Design by IT - Sysdev't
                             </div>
                         </div>
                     </div>
                 </div>
             </footer>
         </div>
         <!-- end main content-->

     </div>
     <!-- END layout-wrapper -->





     <!--preloader-->
     <div id="preloader">
        <div id="status">
            <img src="<?php echo base_url(); ?>assets/images/cube.gif" alt="Loading..." class="avatar-sm" lazy="loading" style="height: 150px; width: 150px">
        </div>
    </div>

     <!--start back-to-top-->
     <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
         <i class="ri-arrow-up-line"></i>
     </button>
     <!--end back-to-top-->
     <!-- JAVASCRIPT -->
     <script src="<?php echo base_url(); ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
     <script src="<?php echo base_url(); ?>assets/libs/simplebar/simplebar.min.js"></script>
     <script src="<?php echo base_url(); ?>assets/libs/node-waves/waves.min.js"></script>
     <script src="<?php echo base_url(); ?>assets/libs/feather-icons/feather.min.js"></script>
     <script src="<?php echo base_url(); ?>assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
     <!-- apexcharts -->
     <!-- <script src="<?php echo base_url(); ?>assets/libs/apexcharts/apexcharts.min.js"></script> -->
     <!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/libs/flatpickr/flatpickr.min.js"></script> -->

     <!-- App js -->
     <script src="<?php echo base_url(); ?>assets/js/app.js"></script>
     <script src="<?php echo base_url(); ?>assets/js/select2.js"></script>
    <script src="<?php echo base_url(); ?>assets/libs/sweetalert2/sweetalert2.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/pages/sweetalerts.init.js"></script>

         <!-- dropzone min -->
    <script src="<?php echo base_url(); ?>assets/js/dropzone.js"></script>
     <!-- filepond js -->
    <script src="<?php echo base_url(); ?>assets/js/filepond.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/filepond-plugin-image-preview.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/filepond-plugin-file-validate-size.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/filepond-plugin-image-exif-orientation.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/filepond-plugin-file-encode.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/pages/password-addon.init.js"></script>

    <script>
        var previewTemplate,
            dropzone,
            dropzonePreviewNode = document.querySelector("#dropzone-preview-list");

        if (dropzonePreviewNode) {
            previewTemplate = dropzonePreviewNode.parentNode.innerHTML;
            dropzonePreviewNode.parentNode.removeChild(dropzonePreviewNode);
            dropzone = new Dropzone(".dropzone", {
                url: "https://httpbin.org/post",
                method: "post",
                previewTemplate: previewTemplate,
                previewsContainer: "#dropzone-preview",
            });
        }


            // FilePond initialization
        FilePond.registerPlugin(
            FilePondPluginFileEncode,
            FilePondPluginFileValidateSize,
            FilePondPluginImageExifOrientation,
            FilePondPluginImagePreview
        );

        // Initialize FilePond on file input elements
        document.querySelectorAll("input.filepond-input-multiple").forEach(function (inputElement) {
            FilePond.create(inputElement);
        });
        document.addEventListener('DOMContentLoaded', function() {
        // Initialize FilePond with custom options for a specific input
        FilePond.create(document.querySelector(".filepond-input-circle"), {
            labelIdle: 'Drag & Drop your picture or <span class="filepond--label-action">Browse</span>',
            imagePreviewHeight: 50,
            imageCropAspectRatio: "1:1",
            imageResizeTargetWidth: 100,
            imageResizeTargetHeight: 100,
            stylePanelLayout: "compact circle",
            styleLoadIndicatorPosition: "center bottom",
            styleProgressIndicatorPosition: "right bottom",
            styleButtonRemoveItemPosition: "left bottom",
            styleButtonProcessItemPosition: "right bottom",
        });
    });
        
    </script>

<script type="text/javascript">
    function swal_message1(msg_type, msg) {
        Toastify({
            text: msg,
            duration: 5000,
            gravity: "top",
            position: "center",
            className: "birthday-toast primary",
            stopOnFocus: true,
            close: true,
            style: {
                background: "linear-gradient(to right, #ff5f6d, #ffc371)",
            },
        }).showToast();
    }

    <?php
    if ($this->session->flashdata('SUCCESSMSG')) {
        date_default_timezone_set('Asia/Manila');
        $hour = date("H");
        $name = $this->session->userdata('name');

        if ($hour >= 5 && $hour < 12) {
            $greeting = 'GOOD MORNING, ';
        } elseif ($hour >= 12 && $hour < 17) {
            $greeting = 'GOOD AFTERNOON, ';
        } else {
            $greeting = 'GOOD EVENING, ';
        }

        $greeting = addslashes($greeting);
        $name = addslashes($name);

        echo "swal_message1('success', '{$greeting} {$name}');";
    }
    ?>
</script>

<script>
    $(document).ready(function () {
        $('#page-header-notifications-dropdown').on('click', function () {
            $.ajax({
                url: '<?php echo base_url('fetch_notifications'); ?>',
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    let notificationsHtml = '';

                    if (data.length > 0) {
                        data.forEach(notification => {
                            // Format the date_uploaded into a human-readable format
                            const dateUploaded = new Date(notification.date_uploaded);
                            const formattedDate = dateUploaded.toLocaleString('en-US', {
                                year: 'numeric',
                                month: 'long',
                                day: 'numeric',
                                hour: 'numeric',
                                minute: '2-digit',
                                hour12: true
                            });

                            notificationsHtml += 
                                `
                                <div class="text-reset notification-item d-block dropdown-item position-relative">
                                    <div class="d-flex">
                                        <div class="avatar-xs me-3 flex-shrink-0">
                                            <span class="avatar-title bg-info-subtle text-info rounded-circle fs-16">
                                                <i class="bx bx-badge-check"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1">
                                            <a href="#!" class="stretched-link">
                                                <h6 class="mt-0 mb-2 lh-base">Team <b>${notification.team_name} </b> added a new request  
                                                    <span class="text-secondary">for </span> Approval! 
                                                    <span><b>( ${notification.uploaded_to} | ${notification.mod_name} | ${notification.typeofsystem} )</b></span>
                                                </h6>
                                            </a>
                                            <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                <span><i class="mdi mdi-clock-outline"></i> ${formattedDate} </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>`;
                        });
                    } else {
                        notificationsHtml = '<p class="text-center text-muted py-2">No new notifications</p>';
                    }
                    $('#all-noti-tab .pe-2').html(notificationsHtml);
                },
            });
        });
    });


    function updateNotificationCount() {
        $.ajax({
            url: '<?php echo base_url('get_notification_count') ?>',
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                if (response.count > 0) {
                    $('.topbar-badge, .count').text(response.count).show();
                } else {
                    $('.topbar-badge, .count').text('').show();
                }
            },
        });
    }

    $(document).ready(function () {
        updateNotificationCount();
        setInterval(updateNotificationCount, 10000);
    });
</script>
 </body>

 </html>