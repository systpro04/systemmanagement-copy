<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Profile </h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Profile </a></li>
                        <li class="breadcrumb-item active">Index<i class="mdi mdi-alpha-x-circle:"></i></li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-xxl-3">
            <div class="card mt-n5">
                <div class="card-body p-4">
                    <div class="text-center">
                        <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                            <img src="http://172.16.161.34:8080/hrms/<?php echo $this->session->userdata('photo') ?>" class="rounded-circle avatar-xl img-thumbnail user-profile-image  shadow" alt="user-profile-image" style="border-color: orange"/>
                        </div>
                        <h5 class="fs-16 mb-1 fw-bold"> <?php echo $this->session->userdata('name') ?> </h5>
                        <p class="text-muted mb-0"><?php echo $this->session->userdata('hrms_position')?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-9">
            <div class="card mt-xxl-n5">
                <div class="card-header">
                    <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab">
                                <i class="fas fa-home"></i> Personal Details
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#changePassword" role="tab">
                                <i class="far fa-user"></i> Change Password
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body p-4">
                    <div class="tab-content">
                        <div class="tab-pane active" id="personalDetails" role="tabpanel">
                            <form action="javascript:void(0);">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="firstnameInput" class="form-label">First Name </label>
                                            <input type="text" class="form-control" id="firstnameInput" value="<?php echo $this->session->userdata('firstname')?>" disabled />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="lastnameInput" class="form-label">Last Name </label>
                                            <input type="text" class="form-control" id="lastnameInput"  value="<?php echo $this->session->userdata('lastname')?>" disabled />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="emailInput" class="form-label">Business Unit</label>
                                            <input type="text" class="form-control" id="emailInput" value="<?php echo $this->session->userdata('company')?>" disabled />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="emailInput" class="form-label">Business Unit</label>
                                            <input type="text" class="form-control" id="emailInput" value="<?php echo $this->session->userdata('business')?>" disabled />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="phonenumberInput" class="form-label">Department </label>
                                            <input type="text" class="form-control" id="phonenumberInput" value="<?php echo $this->session->userdata('dept_name')?>" disabled />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="phonenumberInput" class="form-label">Employee Type </label>
                                            <input type="text" class="form-control" id="phonenumberInput" value="<?php echo $this->session->userdata('emp_type')?>" disabled />
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="changePassword" role="tabpanel">
                            <form action="javascript:void(0);">
                                <div class="row g-2">
                                    <div class="col-lg-6">
                                        <div>
                                            <label for="username" class="form-label">Username* </label>
                                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" value="<?php echo $this->session->userdata('username')?>" />
                                            <input type="hidden" class="form-control" id="id" name="id" placeholder="Enter id" value="<?php echo $this->session->userdata('id')?>" />
                                        </div>
                                    </div>
                            
                                    <div class="col-lg-6">
                                        <label class="form-label" for="password-input">New Password </label>
                                             <div class="position-relative auth-pass-inputgroup mb-3">
                                                 <input type="password" class="form-control pe-5 password-input" placeholder="Enter password" id="password" name="password" />
                                                 <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted shadow-none password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                             </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-success" onclick="update_password()">Update Username | Password </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
function update_password() {
    Swal.fire({
        title: 'Are you sure you want to update your username and password?',
        text: 'This action cannot be undone.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, update it!',
        cancelButtonText: 'No, cancel!',
    }).then((result) => {
        if (result.isConfirmed) {
            var id = $('#id').val();
            var username = $('#username').val();
            var password = $('#password').val();

            if (!username || !password) {
                Toastify({
                    text: `Please fill in the required field.`,
                    duration: 5000,
                    gravity: "top",
                    position: "left",
                    className: "birthday-toast primary",
                    stopOnFocus: true,
                    close: true,
                    style: {
                        background: "linear-gradient(to right, #ff5f6d, #ffc371)",
                    },
                }).showToast();
                return;
            }

            $.ajax({
                url: '<?php echo base_url(); ?>update_password',
                type: 'POST',
                data: {
                    id: id,
                    username: username,
                    password: password
                },
                success: function(response) {
                    Toastify({
                        text: `Password updated successfully.`,
                        duration: 5000,
                        gravity: "top",
                        position: "left",
                        className: "birthday-toast primary",
                        stopOnFocus: true,
                        close: true,
                        style: {
                            background: "linear-gradient(to right, #ff5f6d, #ffc371)",
                        },
                    }).showToast();

                    setTimeout(() => {
                        window.location.href = '<?php echo base_url(); ?>profile';
                    }, 1500);
                },
            });
        }
    });
}
</script>
