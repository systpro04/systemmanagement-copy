<!-- Create task -->
<div class="modal fade" id="create_task" tabindex="-1" aria-labelledby="create_task" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" style="width: 765px">
        <div class="modal-content">
            <div class="modal-header bg-info-subtle">
                <h5 class="modal-title">SETUP TASK</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <label for="team_name" class="col-sm-3 col-form-label">Team Name:</label>
                    <div class="col-sm-9">
                        <select class="form-select mb-3" id="team" style="width: 100%; height: 508px">
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
                    <label for="module" class="col-sm-3 col-form-label">Module:</label>
                    <div class="col-sm-9">
                        <select class="form-select select2 mb-3" id="module"></select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="sub_module" class="col-sm-3 col-form-label">System Sub Module:</label>
                    <div class="col-sm-9">
                        <select class="form-select select2 mb-3" id="sub_module"></select>

                    </div>
                </div>
                <div class="row mb-3">
                    <label for="description" class="col-sm-3 col-form-label">Description:</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="desc" style="height: 90px"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="concern" class="col-sm-3 col-form-label">Concern:</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="concern" style="height: 90px"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="remarks" class="col-sm-3 col-form-label">Remarks:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="remarks">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="status" class="col-sm-3 col-form-label">Status:</label>
                    <div class="col-sm-9">
                        <select class="form-select mb-3" id="task_status">
                            <option></option>
                            <option value="Pending">PENDING</option>
                            <option value="Ongoing">ONGOING</option>
                            <option value="Done">DONE</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="submit_task()">Submit</button>
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit_task" tabindex="-1" aria-labelledby="edit_task" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" style="width: 765px">
        <div class="modal-content">
            <div class="modal-header bg-info-subtle">
                <h5 class="modal-title">EDIT TASK</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <label for="team_name" class="col-sm-3 col-form-label">Team Name:</label>
                    <div class="col-sm-9">
                        <select class="form-select mb-3" id="edit_team" style="width: 100%; height: 508px">
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="name" class="col-sm-3 col-form-label">Name:</label>
                    <input type="hidden" id="edit_emp_id" name="emp_id">
                    <input type="hidden" id="edit_id" name="task_id">
                    <div class="col-sm-9">
                        <select class="form-select select2 mb-3" id="edit_name"></select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="module" class="col-sm-3 col-form-label">Module:</label>
                    <div class="col-sm-9">
                        <select class="form-select select2 mb-3" id="edit_module"></select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="sub_module" class="col-sm-3 col-form-label">System Sub Module:</label>
                    <div class="col-sm-9">
                        <select class="form-select select2 mb-3" id="edit_sub_module"></select>

                    </div>
                </div>
                <div class="row mb-3">
                    <label for="description" class="col-sm-3 col-form-label">Description:</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="edit_desc" style="height: 90px"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="concern" class="col-sm-3 col-form-label">Concern:</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="edit_concern" style="height: 90px"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="remarks" class="col-sm-3 col-form-label">Remarks:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="edit_remarks">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="status" class="col-sm-3 col-form-label">Status:</label>
                    <div class="col-sm-9">
                        <select class="form-select mb-3" id="edit_task_status">
                            <option></option>
                            <option value="Pending">PENDING</option>
                            <option value="Ongoing">ONGOING</option>
                            <option value="Done">DONE</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="update_task_content()">Submit</button>
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">IT TASK | DAILY </h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Task </a></li>
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
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="card-title mb-0 flex-grow-1 fw-bold">List of Task | Position</h5>
                        <div class="col-md-3">
                            <div class="d-flex align-items-center flex-shrink-0">
                                <select class="form-select" id="filter_team" style="width: 150px; height: auto;">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <div class="d-flex align-items-center flex-shrink-0 ms-2 gap-2">
                            <button class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#create_task"><i class="ri-add-fill align-bottom me-1"></i> Add Daily Task </button>
                            <!-- <button class="btn btn-danger waves-effect waves-light"><i class="ri-printer-fill align-bottom me-1"></i> Generate Report </button> -->
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover no-wrap" id="it_task_list">
                            <thead class="table-primary text-center">
                                <tr>
                                    <th>Employee Name</th>
                                    <th>Module</th>
                                    <th>Sub Module</th>
                                    <th>Description</th>
                                    <th>Concern</th>
                                    <th>Remarks</th>
                                    <th>Status</th>
                                    <?php if ($this->session->userdata('position') != 'Programmer'){ ?>
                                        <th>Action</th>
                                    <?php } ?>
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
<script>
    $(document).ready(function () {
        $('#team, #edit_team, #filter_team').select2({ placeholder: 'Select Team', allowClear: true, minimumResultsForSearch: Infinity});
        $('#name, #edit_name').select2({ placeholder: 'Select Name', allowClear: true, minimumResultsForSearch: Infinity});
        $('#module, #edit_module').select2({ placeholder: 'Select Module Name', allowClear: true, minimumResultsForSearch: Infinity});
        $('#sub_module, #sub_module').select2({ placeholder: 'Select Sub Module Name', allowClear: true, minimumResultsForSearch: Infinity});
        $('#task_status').select2({ placeholder: 'Select Status', allowClear: true, minimumResultsForSearch: Infinity});
    });

    var table = $('#it_task_list').DataTable({
        "processing": true,
        "serverSide": true,
        "destroy": true,
        "stateSave": true,
        "lengthMenu": [[10, 25, 50, 100, 10000], [10, 25, 50, 100, "Max"]],
        "pageLength": 10,
        "ajax": {
            "url": "<?php echo base_url('it_task_list'); ?>",
            "type": "POST",
            "data": function (d) {
                d.team = $('#filter_team').val();
            }
        },
        "columns": [
            { "data": "emp_name" },
            { "data": "module" },
            { "data": "sub_mod_name" },
            { "data": "desc" },
            { "data": "concerns" },
            { "data": "remarks" },
            { "data": "task_status" },
            { "data": "action" }
        ],
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
                "title": 'IT DAILY TASK - Excel Export', 
                "exportOptions": {
                    "columns": ':visible:not(:last-child)'
                }
            },
            {
                "extend": 'pdfHtml5',
                "title": 'IT DAILY TASK - PDF Export',
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

    $('#filter_team').change(function () {
        table.ajax.reload();
    });
    

    $.ajax({
        url: '<?php echo base_url('get_team') ?>',
        type: 'POST',
        success: function (response) {
            teamData = JSON.parse(response);
            $('#team, #filter_team, #edit_team').empty().append('<option value="">Select Team Name</option>');
            teamData.forEach(function (team) {
                $('#team, #filter_team, #edit_team').append('<option value="' + team.team_id + '">' + team.team_name + '</option>');
            });
        }
    });

    let membersData = [];
    $('#name, #edit_name').prop('disabled', true);

    $('#team, #edit_team').change(function () {
        var team_id = $(this).val();
        $.ajax({
            url: '<?php echo base_url('setup_workload') ?>',
            type: 'POST',
            data: { team_id: team_id },
            success: function (response) {
                membersData = JSON.parse(response);
                $('#name, #edit_name').empty().append('<option value="">Select Name</option>');
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
            $('#emp_id, #edit_emp_id').val(selectedEmpId);
        } else {
            $('#emp_id, #edit_emp_id').val(''); 
        }
    });

    $.ajax({
        url: '<?php echo base_url('setup_module') ?>',
        type: 'POST',
        success: function (response) {
            moduleData = JSON.parse(response);
            $('#module, #edit_module').empty().append('<option value="">Select Module Name</option>');
            $('#sub_module, #edit_sub_module').empty().append('<option value="">Select Sub Module</option>');
            $('#sub_module, #edit_sub_module').prop('disabled', true);

            moduleData.forEach(function (module) {
                $('#module, #edit_module').append('<option value="' + module.mod_id + '">' + module.mod_name + '</option>');
            });
        }
    });
    

    $('#module, #edit_module').change(function () {
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

    $('#create_task').on('hidden.bs.modal', function () {
        $('#team').val('').trigger('change');
        $('#module').val('').trigger('change');
        $('#sub_module').val('').trigger('change');
        $('#emp_id').val('');
        $('#desc').val('');
        $('#concern').val('');
        $('#remarks').val('');
        $('#task_status').val('').trigger('change');
    });

    function submit_task() {

        var emp_name       = $('#name option:selected').text();
        var team            = $('#team').val();
        var emp_id          = $('#emp_id').val();
        var module          = $('#module').val();
        var sub_module      = $('#sub_module').val();
        var desc            = $('#desc').val();
        var concern         = $('#concern').val();
        var remarks         = $('#remarks').val();
        var status          = $('#task_status').val();

        if (team === "" || module === "" || desc === "" || concern === "" || remarks === "" || status === "") {
            Toastify({
                text: `Please fill up the required fields.`,
                duration: 5000,
                gravity: "top",
                position: "left",
                stopOnFocus: true,
                close: true,
                style: {
                    background: "linear-gradient(to right, #ff5f6d, #ffc371)",
                },
            }).showToast();
            if (desc === "" || concern === "" || remarks === "" || status === "") {
                $('#desc, #concern, #remarks, #task_status').addClass('is-invalid');
            }
            return;
        }

        Swal.fire({
            title: 'Are you sure?',
            text: 'You want to add this task?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, add it!',
            cancelButtonText: 'No, cancel!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?php echo base_url('submit_task') ?>',
                    type: 'POST',
                    data: {
                        team: team,
                        emp_name: emp_name,
                        emp_id: emp_id,
                        module: module,
                        sub_module: sub_module,
                        desc: desc,
                        concern: concern,
                        remarks: remarks,
                        task_status: status
                    },
                    success: function (response) {
                        Toastify({
                            text: `Task added successfully.`,
                            duration: 5000,
                            gravity: "top",
                            position: "left",
                            stopOnFocus: true,
                            close: true,
                            style: {
                                background: "linear-gradient(to right, #ff5f6d, #ffc371)",
                            },
                        }).showToast();
                        $('#create_task').modal('hide');
                        $('#it_task_list').DataTable().ajax.reload();
                    }
                });
            }
        });
    }

    function edit_task_content(task_id) {
        $.ajax({
            url: '<?php echo base_url('edit_task_content') ?>',
            type: 'POST',
            data: { task_id: task_id },
            success: function (response) {
                let data = JSON.parse(response);

                $('#edit_team').val(data.team_id).trigger('change');
                $('#edit_id').val(data.task_id);
                $('#edit_task').modal('show');
                setTimeout(function () {
                    $('#edit_emp_id').val(data.emp_id);
                    $('#edit_name').val(data.emp_id).trigger('change');
                    $('#edit_module').val(data.mod_id).trigger('change');
                    $('#edit_sub_module').val(data.sub_mod_id).trigger('change');
                    $('#edit_desc').val(data.desc);
                    $('#edit_concern').val(data.concerns);
                    $('#edit_remarks').val(data.remarks);
                    $('#edit_task_status').val(data.task_status).trigger('change');
                }, 500);
            }
        });
    }

    function update_task_content(){
        var team            = $('#edit_team').val();
        var task_id         = $('#edit_id').val();
        var emp_name        = $('#edit_name option:selected').text();
        var emp_id          = $('#edit_emp_id').val();
        var module          = $('#edit_module').val();
        var sub_module      = $('#edit_sub_module').val();
        var desc            = $('#edit_desc').val();
        var concern         = $('#edit_concern').val();
        var remarks         = $('#edit_remarks').val();
        var task_status     = $('#edit_task_status').val();
        Swal.fire({
            title: 'Are you sure?',
            text: 'You want to update this task?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, update it!',
            cancelButtonText: 'No, cancel!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?php echo base_url('update_task_content') ?>',
                    type: 'POST',
                    data: {
                        team: team,
                        task_id: task_id,
                        emp_name: emp_name,
                        emp_id: emp_id,
                        module: module,
                        sub_module: sub_module,
                        desc: desc,
                        concern: concern,
                        remarks: remarks,
                        task_status: task_status
                    },
                    success: function (response) {
                        Toastify({
                            text: `Task updated successfully.`,
                            duration: 5000,
                            gravity: "top",
                            position: "left",
                            stopOnFocus: true,
                            close: true,
                            style: {
                                background: "linear-gradient(to right, #ff5f6d, #ffc371)",
                            },
                        }).showToast();
                        $('#edit_task').modal('hide');
                        table.ajax.reload();
                    }
                });
            }
        });
    }
    function delete_task(task_id){
        Swal.fire({
            title: 'Are you sure?',
            text: 'You want to delete this task?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?php echo base_url('delete_task') ?>',
                    type: 'POST',
                    data: { task_id: task_id },
                    success: function (response) {
                        Toastify({
                            text: `Task deleted successfully.`,
                            duration: 5000,
                            gravity: "top",
                            position: "left",
                            stopOnFocus: true,
                            close: true,
                            style: {
                                background: "linear-gradient(to right, #ff5f6d, #ffc371)",
                            },
                        }).showToast();
                        table.ajax.reload();
                    }
                });
            }
        })
    }
</script>