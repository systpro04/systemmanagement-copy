<!-- Create Workload -->
<div class="modal fade" id="create_workload" tabindex="-1" aria-labelledby="create_workload" aria-hidden="true"
    data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" style="width: 765px">
        <div class="modal-content">
            <div class="modal-header bg-info-subtle">
                <h5 class="modal-title">SETUP WORKLOAD</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <label for="team_name" class="col-sm-3 col-form-label">Team Name:</label>
                    <div class="col-sm-9">
                        <select class="form-select mb-3" id="team_id" style="width: 100%; height: 508px">
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="name" class="col-sm-3 col-form-label">Name:</label>
                    <input type="hidden" id="emp_id" name="emp_id">
                    <div class="col-sm-9">
                        <select class="form-select select2 mb-3" id="name"></select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="name" class="col-sm-3 col-form-label">Position:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="position" placeholder="Position">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="module" class="col-sm-3 col-form-label">Module:</label>
                    <div class="col-sm-9">
                        <select class="form-select select2 mb-3" id="module_id"></select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="sub_module" class="col-sm-3 col-form-label">System Sub Module:</label>
                    <div class="col-sm-9">
                        <select class="form-select select2 mb-3" id="sub_module"></select>

                    </div>
                </div>
                <div class="row mb-3">
                    <label for="sub_module_menu" class="col-sm-3 col-form-label">System Sub Module Menu:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="sub_module_menu">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="description" class="col-sm-3 col-form-label">Description:</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="description" style="height: 90px"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="remarks" class="col-sm-3 col-form-label">Remarks:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="remarks">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="status" class="col-sm-3 col-form-label">Status: <span style="color: red">*</span></label>
                    <div class="col-sm-9">
                        <select class="form-select mb-3" id="workload_status">
                            <option></option>
                            <option value="Pending">PENDING</option>
                            <option value="Ongoing">ONGOING</option>
                            <option value="Done">DONE</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="submit_workload()">Submit</button>
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Workload -->
<div class="modal fade" id="edit_workload" tabindex="-1" aria-labelledby="edit_workload" aria-hidden="true"
    data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" style="width: 765px">
        <div class="modal-content">
            <div class="modal-header bg-info-subtle">
                <h5 class="modal-title">SETUP WORKLOAD</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <label for="team_name" class="col-sm-3 col-form-label">Team Name:</label>
                    <div class="col-sm-9">
                        <select class="form-select mb-3" id="edit_team_id" style="width: 100%; height: 508px">
                            <option value=""></option>
                            <option value="1">LOGIC LEGENDS</option>
                            <option value="2">CODE CONQUERORS</option>
                            <option value="3">QUANTUM QUANTS</option>
                            <option value="4">SERVER SAMURAI</option>
                            <option value="5">CTRL+ ALT ELITE</option>
                            <option value="6">CYBER CENTINELS</option>
                            <option value="7">TECH TACTICIANS</option>
                            <option value="8">ALGORITHM ASSASSIN</option>
                            <option value="9">SYNTAX SOLDIERS</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="name" class="col-sm-3 col-form-label">Name:</label>
                    <input type="hidden" id="edit_emp_id" name="emp_id">
                    <input type="hidden" id="edit_id" name="id">
                    <div class="col-sm-9">
                        <select class="form-select select2 mb-3" id="edit_name"></select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="name" class="col-sm-3 col-form-label">Position:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="edit_position" placeholder="Position" value="">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="module" class="col-sm-3 col-form-label">Module:</label>
                    <div class="col-sm-9">
                        <select class="form-select select2 mb-3" id="edit_module_id"></select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="sub_module" class="col-sm-3 col-form-label">System Sub Module:</label>
                    <div class="col-sm-9">
                        <select class="form-select select2 mb-3" id="edit_sub_module"></select>

                    </div>
                </div>
                <div class="row mb-3">
                    <label for="sub_module_menu" class="col-sm-3 col-form-label">System Sub Module Menu:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="edit_sub_module_menu">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="description" class="col-sm-3 col-form-label">Description:</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="edit_description" style="height: 90px"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="remarks" class="col-sm-3 col-form-label">Remarks:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="edit_remarks">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="status" class="col-sm-3 col-form-label">Status: <span style="color: red">*</span></label>
                    <div class="col-sm-9">
                        <select class="form-select mb-3" id="edit_workload_status">
                            <option></option>
                            <option value="Pending">PENDING</option>
                            <option value="Ongoing">ONGOING</option>
                            <option value="Done">DONE</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="submit_updated_workload()">Submit</button>
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">IT WORKLOAD | RESPONSIBILITIES </h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Workload </a></li>
                        <li class="breadcrumb-item active">Index<i class="mdi mdi-alpha-x-circle:"></i></li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header border-1">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title mb-0 flex-grow-1">List of Workload</h5>
                        <div class="flex-shrink-0">
                            <div class="d-flex flex-wrap gap-2">
                                <button class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal"
                                    data-bs-target="#create_workload"><i class="ri-add-fill align-bottom me-1"></i> Add
                                    Workload </button>
                                <!-- <button class="btn btn-danger waves-effect waves-light"><i class="ri-printer-fill align-bottom me-1"></i> Generate Report </button> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="nav nav-pills arrow-navtabs nav-primary bg-light " role="tablist">
                        <li class="nav-item">
                            <a id="Pending" aria-expanded="false" class="nav-link active status" data-bs-toggle="tab" >
                                <span class="d-block d-sm-none"><iconify-icon icon="solar:danger-square-bold-duotone" class="fs-25"></iconify-icon></span>
                                <span class="d-none d-sm-block">Pending</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a id="Ongoing" aria-expanded="true" class="nav-link status" data-bs-toggle="tab" >
                                <span class="d-block d-sm-none"><iconify-icon icon="solar:hourglass-line-bold-duotone" class="fs-25"></iconify-icon></span>
                                <span class="d-none d-sm-block">Ongoing</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a id="Done" aria-expanded="true" class="nav-link status" data-bs-toggle="tab" >
                                <span class="d-block d-sm-none"><iconify-icon icon="solar:folder-check-bold-duotone" class="fs-25"></iconify-icon></span>
                                <span class="d-none d-sm-block">Done</span>
                            </a>
                        </li>
                    </ul>
                    <hr>
                    <div class="tab-content">
                        <div class="mt-2 tab-pane active" id="System Analyst" role="tabpanel">
                            <div class="table-responsive">
                            <table class="table table-striped table-hover" id="workload">
                                <thead class="table-primary text-center">
                                    <tr>
                                        <th>Team</th>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Module</th>
                                        <th>Sub Module</th>
                                        <th>Sub Menu</th>
                                        <th>Description</th>
                                        <th>Remarks</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    $(document).ready(function () {
        $('#team_id, #edit_team_id').select2({
            placeholder: 'Select Team',
            allowClear: true,
            minimumResultsForSearch: Infinity
        });
        $('#name, #edit_name').select2({
            placeholder: 'Select Name',
            allowClear: true,
            minimumResultsForSearch: Infinity
        });
        $('#module_id, #edit_module_id').select2({
            placeholder: 'Select Module Name',
            allowClear: true,
            minimumResultsForSearch: Infinity
        });
        $('#sub_module, #edit_sub_module').select2({
            placeholder: 'Select Sub Module Name',
            allowClear: true,
            minimumResultsForSearch: Infinity
        });
        $('#workload_status, #edit_workload_status').select2({
            placeholder: 'Select Status',
            allowClear: true,
            minimumResultsForSearch: Infinity
        });
    });

    var status = "Pending";
    load_workload(status);

    $("a.status").click(function () {
        $("a.btn-primary").removeClass('btn-primary').addClass('btn-secondary');
        $(this).addClass('btn-primary');
        var status = this.id;
        load_workload(status);
    });

    function load_workload(status){
        $('#workload').DataTable({
            "processing": true,
            "serverSide": true,
            "destroy": true,
            "stateSave": true,
            "lengthMenu": [[10, 25, 50, 100, 10000], [10, 25, 50, 100, "Max"]],
            "pageLength": 10,
            "ajax": {
                "url": "<?php echo base_url('workload_list'); ?>",
                "type": "POST",
                "data": {
                    "status": status
                }
            },
            "columns": [
                { "data": "team_name" },
                { "data": "emp_id" },
                { "data": "user_type" },
                { "data": "module" },
                { "data": "sub_mod_name" },
                { "data": "sub_mod_menu" },
                { "data": "description" },
                { "data": "remarks" },
                { "data": "status" },
                { "data": "action" }
            ],
            "paging": true,
            "searching": true,
            "ordering": true,
            "columnDefs": [
                { "className": "text-center", "targets": ['_all'] }
            ],
            "dom": 
                "<'row mb-1'<'col-md-12 text-start'B>>" +
                "<'row mb-1'<'col-md-6'l><'col-md-6 text-end'f>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row mt-1'<'col-md-6'i><'col-md-6 text-end'p>>",
            "buttons": [
                {
                    "extend": 'excelHtml5',
                    "title": 'IT RESPONSIBILITIES | WORKLOAD - Excel Export', 
                    "exportOptions": {
                        "columns": ':visible:not(:last-child)'
                    }
                },
                {
                    "extend": 'pdfHtml5',
                    "title": 'IT RESPONSIBILITIES | WORKLOAD - PDF Export',
                    "text": 'Generate Report',
                    "exportOptions": {
                        "columns": ':visible:not(:last-child)'
                    },
                    "customize": function (doc) {
                        doc.defaultStyle.fontSize = 8;
                        doc.styles.title.fontSize = 12;
                        doc.styles.tableHeader.fontSize = 10;
                        if (!doc.styles.tableBodyOdd) {
                            doc.styles.tableBodyOdd = {};
                        }
                        if (!doc.styles.tableBodyEven) {
                            doc.styles.tableBodyEven = {};
                        }
                        doc.styles.tableBodyOdd.alignment = 'center';
                        doc.styles.tableBodyEven.alignment = 'center';
                    }
                },
                'colvis'
            ],
        });
    }

    $.ajax({
        url: '<?php echo base_url('get_team') ?>',
        type: 'POST',
        success: function (response) {
            teamData = JSON.parse(response);
            $('#team_id').empty().append('<option value="">Select Team Name</option>');
            teamData.forEach(function (team) {
                $('#team_id').append('<option value="' + team.team_id + '">' + team.team_name + '</option>');
            });
        }
    });

    let membersData = [];
    $('#name, #edit_name').prop('disabled', true);
    $('#position, #edit_position').prop('disabled', true);

    $('#team_id, #edit_team_id').change(function () {
        var team_id = $(this).val();
        $.ajax({
            url: '<?php echo base_url('setup_workload') ?>',
            type: 'POST',
            data: { team_id: team_id },
            success: function (response) {
                membersData = JSON.parse(response);
                $('#name, #edit_name').empty().append('<option value="">Select Name</option>');
                $('#position, #edit_position').val('');
                $('#name, #edit_name').prop('disabled', true);

                if (membersData.length > 0) {
                    membersData.forEach(function (member) {
                        $('#name, #edit_name').append('<option value="' + member.emp_id + '">' + member.emp_name + '</option>');
                    });

                    $('#name, #edit_name').prop('disabled', false);
                }
            }
        });
    });

    $('#name, #edit_name').change(function () {
        var selectedEmpId = $(this).val();
        var selectedMember = membersData.find(member => member.emp_id == selectedEmpId);

        if (selectedMember) {
            $('#position, #edit_position').val(selectedMember.position);
            $('#position, #edit_position').prop('disabled', true);
            $('#emp_id, #edit_emp_id').val(selectedEmpId);
        } else {
            $('#position, #edit_position').val('');
            $('#position, #edit_position').prop('disabled', false);
            $('#emp_id, #edit_emp_id').val(''); 
        }
    });

    $(document).ready(function () {
        $.ajax({
            url: '<?php echo base_url('setup_module') ?>',
            type: 'POST',
            success: function (response) {
                moduleData = JSON.parse(response);
                $('#module_id, #edit_module_id').empty().append('<option value="">Select Module Name</option>');
                $('#sub_module, #edit_sub_module').empty().append('<option value="">Select Sub Module</option>');
                $('#sub_module, #edit_sub_module').prop('disabled', true);

                moduleData.forEach(function (module) {
                    $('#module_id, #edit_module_id').append('<option value="' + module.mod_id + '">' + module.mod_name + '</option>');
                });
            }
        });
    });

    $('#module_id, #edit_module_id').change(function () {
        var selectedModuleId = $(this).val();
        $('#sub_module, #edit_sub_module').empty().append('<option value="">Select Sub Module</option>');
        $('#sub_module, #edit_sub_module').prop('disabled', true);

        var selectedModule = moduleData.find(module => module.mod_id == selectedModuleId);

        if (selectedModule && selectedModule.submodules.length > 0) {
            selectedModule.submodules.forEach(function (subModule) {
                $('#sub_module, #edit_sub_module').append('<option value="' + subModule.sub_mod_id + '">' + subModule.sub_mod_name + '</option>');
            });
            $('#sub_module, #edit_sub_module').prop('disabled', false);
        }
    });

    $('#edit_workload').on('hidden.bs.modal', function () {
        $('#edit_id').val('');
        $('#edit_team_id').val('').trigger('change');
        $('#edit_name').val('').trigger('change');
        $('#edit_position').val('');
        $('#edit_module_id').val('').trigger('change');
        $('#edit_sub_module').val('').trigger('change');
        $('#edit_sub_module_menu').val('');
        $('#edit_description').val('');
        $('#edit_remarks').val('');
        $('#edit_workload_status').val('').trigger('change');
    });

    function submit_workload() {

        var team_id         = $('#team_id').val();
        var emp_id          = $('#emp_id').val();
        var emp_name        = $('#name option:selected').text();
        var position        = $('#position').val();
        var module_id       = $('#module_id').val();
        var sub_module      = $('#sub_module').val();
        var sub_module_menu = $('#sub_module_menu').val();
        var description     = $('#description').val();
        var remarks         = $('#remarks').val();
        var status          = $('#workload_status').val();

        if (team_id === "" || emp_id === "" || module_id === "") {
            Toastify({
                text: `Please fill up the required fields`,
                duration: 5000,
                gravity: "top",
                position: "left",
                stopOnFocus: true,
                close: true,
                style: {
                    background: "linear-gradient(to right, #ff5f6d, #ffc371)",
                },
            }).showToast();
            if (status === "") {
                $('#workload_status').addClass('is-invalid');
            }
            return;
        }

        Swal.fire({
            title: 'Are you sure?',
            text: 'You want to add this workload?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, add it!',
            cancelButtonText: 'No, cancel!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?php echo base_url('submit_workload') ?>',
                    type: 'POST',
                    data: {
                        team_id: team_id,
                        emp_id: emp_id,
                        emp_name: emp_name,
                        position: position,
                        module_id: module_id,
                        sub_module: sub_module,
                        sub_module_menu: sub_module_menu,
                        description: description,
                        remarks: remarks,
                        status: status
                    },
                    success: function (response) {
                        Toastify({
                            text: `Workload added successfully.`,
                            duration: 5000,
                            gravity: "top",
                            position: "left",
                            stopOnFocus: true,
                            close: true,
                            style: {
                                background: "linear-gradient(to right, #ff5f6d, #ffc371)",
                            },
                        }).showToast();
                        $('#create_workload').modal('hide');
                        $('#workload').DataTable().ajax.reload();
                    }
                });
            }
        });
    }


    function loadModules(callback) {
        $.ajax({
            url: '<?php echo base_url('setup_module') ?>',
            type: 'POST',
            success: function (response) {
                moduleData = JSON.parse(response);
                $('#module_id, #edit_module_id').empty().append('<option value="">Select Module Name</option>');
                $('#sub_module, #edit_sub_module').empty().append('<option value="">Select Sub Module</option>');
                $('#sub_module, #edit_sub_module').prop('disabled', true);

                moduleData.forEach(function (module) {
                    $('#module_id, #edit_module_id').append('<option value="' + module.mod_id + '">' + module.mod_name + '</option>');
                });

                if (typeof callback === "function") callback();
            }
        });
    }



    function edit_workload_content(id) {
        $.ajax({
            url: '<?php echo base_url("edit_workload_content"); ?>',
            type: 'POST',
            data: { id: id },
            success: function(response) {
                let data = JSON.parse(response);
                
                $('#edit_team_id').val(data.team_id).trigger('change');
                $('#edit_id').val(data.id);

                setTimeout(function() {
                    $('#edit_name').val(data.emp_id).trigger('change');
                    $('#edit_position').val(data.user_type);
                    $('#edit_module_id').val(data.mod_id || '').trigger('change');
                    $('#edit_sub_module').val(data.sub_mod || '').trigger('change');
                    $('#edit_sub_module_menu').val(data.sub_mod_menu);
                    $('#edit_description').val(data.desc);
                    $('#edit_remarks').val(data.remarks);
                    $('#edit_workload_status').val(data.status).trigger('change');
                    $('#edit_workload').modal('show');
                },300);
            }
        });
    }

    function submit_updated_workload() {

        var id              = $('#edit_id').val();
        var team_id         = $('#edit_team_id').val();
        var emp_id          = $('#edit_emp_id').val();
        var emp_name        = $('#edit_name option:selected').text();
        var position        = $('#edit_position').val();
        var module_id       = $('#edit_module_id').val();
        var sub_module      = $('#edit_sub_module').val();
        var sub_module_menu = $('#edit_sub_module_menu').val();
        var description     = $('#edit_description').val();
        var remarks         = $('#edit_remarks').val();
        var status          = $('#edit_workload_status').val();

        Swal.fire({
            title: 'Are you sure?',
            text: 'You want to update this module?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, update it!',
            cancelButtonText: 'No, cancel!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?php echo base_url('submit_updated_workload') ?>',
                    type: 'POST',
                    data: {
                        id: id, 
                        team_id: team_id,
                        emp_id: emp_id,
                        emp_name: emp_name,
                        position: position,
                        module_id: module_id,
                        sub_module: sub_module,
                        sub_module_menu: sub_module_menu,
                        description: description,
                        remarks: remarks,
                        status: status
                    },
                    success: function (response) {
                        Toastify({
                            text: `Workload updated successfully.`,
                            duration: 5000,
                            gravity: "top",
                            position: "left",
                            stopOnFocus: true,
                            close: true,
                            style: {
                                background: "linear-gradient(to right, #ff5f6d, #ffc371)",
                            },
                        }).showToast();
                        $('#edit_workload').modal('hide');
                        $('#workload').DataTable().ajax.reload();
                    }
                });
            }
        });
    }

    function delete_workload(id){
        Swal.fire({
            title: 'Are you sure?',
            text: 'You want to delete this workload?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url('delete_workload') ?>',
                    type: 'POST',
                    data: {
                        id: id
                    },
                    success: function() {
                        $('#workload').DataTable().ajax.reload();
                        Toastify({
                            text: `Workload deleted successfully.`,
                            duration: 5000,
                            gravity: "top",
                            position: "left",
                            stopOnFocus: true,
                            close: true,
                            style: {
                                background: "linear-gradient(to right, #ff5f6d, #ffc371)",
                            },
                        }).showToast();
                    },
                });
            }
        });
    }


</script>