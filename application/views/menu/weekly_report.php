<!-- Create weekly report -->
<div class="modal fade" id="create_weekly_report" tabindex="-1" aria-labelledby="create_weekly_report" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" style="width: 765px">
        <div class="modal-content">
            <div class="modal-header bg-info-subtle">
                <h5 class="modal-title">SETUP WEEKLY REPORT</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <label for="team_name" class="col-sm-3 col-form-label">Date Range:</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <input type="date" id="date_range_report" class="form-control" readonly=""  placeholder="Date Range" data-provider="flatpickr" data-date-format="F d, Y" data-range-date="true" />
                            <span class="input-group-text"><i class="ri-calendar-event-line"></i></span>
                        </div>
                    </div>
                </div>
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
                    <label for="task" class="col-sm-3 col-form-label">Task | Workload:</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="task_workload" style="height: 90px"></textarea>
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
                        <select class="form-select mb-3" id="weekly_status">
                            <option></option>
                            <option value="Pending">PENDING</option>
                            <option value="Ongoing">ONGOING</option>
                            <option value="Done">DONE</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="submit_weeklyreport()">Submit</button>
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- edit weekly report -->
<div class="modal fade" id="edit_weekly_report" tabindex="-1" aria-labelledby="edit_weekly_report" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" style="width: 765px">
        <div class="modal-content">
            <div class="modal-header bg-info-subtle">
                <h5 class="modal-title">UPDATE WEEKLY REPORT</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <label for="team_name" class="col-sm-3 col-form-label">Date Range:</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <input type="date" id="edit_date_range_report" class="form-control" readonly=""  placeholder="Date Range" data-provider="flatpickr" data-date-format="F d, Y" data-range-date="true" />
                            <span class="input-group-text"><i class="ri-calendar-event-line"></i></span>
                        </div>
                    </div>
                </div>
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
                    <input type="hidden" id="edit_emp_id">
                    <input type="hidden" id="edit_id">
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
                    <label for="task" class="col-sm-3 col-form-label">Task | Workload:</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="edit_task_workload" style="height: 90px"></textarea>
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
                        <select class="form-select mb-3" id="edit_weekly_status">
                            <option></option>
                            <option value="Pending">PENDING</option>
                            <option value="Ongoing">ONGOING</option>
                            <option value="Done">DONE</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="update_weeklyreport()">Submit</button>
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Weekly Report </h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Weekly </a></li>
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
                    <div class="d-flex align-items-center justify-content-between flex-wrap">
                        <div class="d-flex align-items-center flex-grow-1 gap-2">
                            <div class="input-group">
                                <input type="date" id="date_range" class="form-control" readonly=""  placeholder="Date Range" data-provider="flatpickr" data-date-format="M d, Y" data-range-date="true" />
                                <span class="input-group-text"><i class="ri-calendar-event-line"></i></span>
                            </div>
                            <select class="form-select" id="team_filter" style="width: 150px;">
                                <option value="">Select Team</option>
                            </select>
                            <select class="form-select" id="module_filter" style="width: 150px;">
                                <option value="">Module</option>
                            </select>
                            <select class="form-select" id="sub_module_filter" style="width: 150px;">
                                <option value="">Sub Module</option>
                            </select>
                        </div>
                        <div class="ms-3">
                            <button class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#create_weekly_report"><i class="ri-add-fill align-bottom me-1"></i> Add Weekly Report</button>
                            <!-- <button class="btn btn-danger waves-effect waves-light">
                                <i class="ri-printer-fill align-bottom me-1"></i> 
                            </button> -->
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover no-wrap" id="weekly_report">
                            <thead class="table-primary text-center">
                                <tr>
                                    <th>Date Range</th>
                                    <th>Name | Incharge</th>
                                    <th>Module</th>
                                    <th>Sub Module</th>
                                    <th>Task</th>
                                    <th>Remarks</th>
                                    <th>Status</th>

                                    <?php if ($this->session->userdata('position') != 'Programmer'){ ?>
                                        <th>Action</th>
                                    <?php } ?>
                                    <!-- <th>Action</th> -->
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
        $('#team, #edit_team, #team_filter').select2({ placeholder: 'Select Team', allowClear: true});
        $('#name, #edit_name').select2({ placeholder: 'Select Name | Incharge', allowClear: true });
        $('#module, #edit_module, #module_filter').select2({ placeholder: 'Module Name | System', allowClear: true });
        $('#sub_module, #edit_sub_module, #sub_module_filter').select2({ placeholder: 'Sub Module Name | System', allowClear: true });
        $('#weekly_status, #edit_weekly_status').select2({ placeholder: 'Weekly Status', allowClear: true });
    });
    var table = $('#weekly_report').DataTable({
        "processing": true,
        "serverSide": true,
        "destroy": true,
        "stateSave": true,
        "lengthMenu": [[10, 25, 50, 100, 10000], [10, 25, 50, 100, "Max"]],
        "pageLength": 10,
        "ajax": {
            "url": "<?php echo base_url('weekly_list'); ?>",
            "type": "POST",
            "data": function (d) {
                d.team          = $('#team_filter').val();
                d.module        = $('#module_filter').val();
                d.sub_module    = $('#sub_module_filter').val();
                d.date_range    = $('#date_range').val();
            },
        },
        "columns": [
            { "data": "date_range" },
            { "data": "emp_name" },
            { "data": "module" },
            { "data": "sub_mod_name" },
            { "data": "task_workload" },
            { "data": "remarks" },
            { "data": "weekly_status" },
            { "data": "action" }
        ],
        "columnDefs": [
            { "className": "text-center", "targets": ['_all'] },
        ],
        "dom": 
            "<'row mb-1'<'col-md-12 text-start'B>>" +
            "<'row mb-1'<'col-md-6'l><'col-md-6 text-end'f>>" +
            "<'row'<'col-md-12'tr>>" +
            "<'row mt-1'<'col-md-6'i><'col-md-6 text-end'p>>",
        "buttons": [
            {
                "extend": 'excelHtml5',
                "title": 'Weekly Report - Excel Export', 
                "exportOptions": {
                    "columns": ':visible:not(:last-child)'
                }
            },
            {
                "extend": 'pdfHtml5',
                "title": 'Weekly Report - PDF Export',
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

    $('#team_filter, #module_filter, #sub_module_filter, #date_range').change(function () {
        table.ajax.reload();
    });
    

    $.ajax({
        url: '<?php echo base_url('get_team') ?>',
        type: 'POST',
        success: function (response) {
            teamData = JSON.parse(response);
            $('#team, #edit_team, #team_filter').empty().append('<option value="">Select Team Name</option>');
            teamData.forEach(function (team) {
                $('#team, #edit_team, #team_filter').append('<option value="' + team.team_id + '">' + team.team_name + '</option>');
            });
        }
    });

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

    $.ajax({
        url: '<?php echo base_url('setup_module') ?>',
        type: 'POST',
        success: function (response) {
            moduleData = JSON.parse(response);
            $('#module, #edit_module, #module_filter').empty().append('<option value="">Select Module Name</option>');
            $('#sub_module, #edit_sub_module, #sub_module_filter').empty().append('<option value="">Select Sub Module</option>');
            $('#sub_module, #edit_sub_module, #sub_module_filter').prop('disabled', true);

            moduleData.forEach(function (module) {
                $('#module, #edit_module, #module_filter').append('<option value="' + module.mod_id + '">' + module.mod_name + '</option>');
            });
        }
    });
    

    $('#module, #edit_module, #module_filter').change(function () {
        var selectedModuleId = $(this).val();
        $('#sub_module, #edit_sub_module, #sub_module_filter').empty().append('<option value="">Select Sub Module</option>');
        $('#sub_module, #edit_sub_module, #sub_module_filter').prop('disabled', true);

        var selectedModule = moduleData.find(module => module.mod_id == selectedModuleId);

        if (selectedModule && selectedModule.submodules.length > 0) {
            selectedModule.submodules.forEach(function (subModule) {
                $('#sub_module, #edit_sub_module, #sub_module_filter').append('<option value="' + subModule.sub_mod_id + '">' + subModule.sub_mod_name + '</option>');
            });
            $('#sub_module, #edit_sub_module, #sub_module_filter').prop('disabled', false);
        }
    });
    $('#create_weekly_report').on('hidden.bs.modal', function () {
        $('#team').val('').trigger('change');
        $('#module').val('').trigger('change');
        $('#sub_module').val('').trigger('change');
        $('#date_range_report').val('');
        $('#emp_id').val('');
        $('#name').val('').trigger('change');
        $('#task_workload').val('');
        $('#weekly_status').val('');
        $('#remarks').val('');
    });

    function submit_weeklyreport() {
        var team            = $('#team').val();
        var module          = $('#module').val();
        var sub_module      = $('#sub_module').val();
        var date_range      = $('#date_range_report').val();
        var emp_id          = $('#name').val();
        var emp_name        = $('#name option:selected').text();
        var task_workload   = $('#task_workload').val();
        var weekly_status   = $('#weekly_status').val();
        var remarks         = $('#remarks').val();

        if (team === "" || module === "" || date_range === "" || weekly_status === "" || remarks === "") {
            Toastify({
                text: `Please fill up the required fields.`,
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
            if (team === "" || module === "" || date_range === "" || weekly_status === "" || remarks === "") {
                $('#team, #module, #sub_module, #date_range, #name, #weekly_status, #remarks').addClass('is-invalid');
            }
            return;
        }

        Swal.fire({
            title: 'Are you sure?',
            text: 'You want to add this report?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, add it!',
            cancelButtonText: 'No, cancel!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?php echo base_url('submit_weeklyreport') ?>',
                    type: 'POST',
                    data: {
                        team: team,
                        module: module,
                        sub_module: sub_module,
                        date_range: date_range,
                        emp_id: emp_id,
                        emp_name: emp_name,
                        task_workload: task_workload,
                        weekly_status: weekly_status,
                        remarks: remarks
                    },
                    success: function (response) {
                        Toastify({
                            text: `Weekly Report added successfully.`,
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
                        $('#create_weekly_report').modal('hide');
                        table.ajax.reload();
                    }
                });
            }
        });
    }
    function edit_weekly_report_content(id) {
        $.ajax({
            url: '<?php echo base_url('edit_weekly_report_content') ?>',
            type: 'POST',
            data: { id: id },
            success: function (response) {
                let data = JSON.parse(response);

                $('#edit_team').val(data.team_id).trigger('change');
                $('#edit_id').val(data.id);
                let flatpickrInstance = $('#edit_date_range_report')[0]._flatpickr;
                if (flatpickrInstance) {
                    flatpickrInstance.setDate(data.date_range.split(' to '));
                } else {
                    $('#edit_date_range_report').val(data.date_range);
                }
                $('#edit_weekly_report').modal('show');
                setTimeout(function () {
                    $('#edit_emp_id').val(data.emp_id);
                    $('#edit_name').val(data.emp_id).trigger('change');
                    $('#edit_module').val(data.mod_id).trigger('change');
                    $('#edit_sub_module').val(data.sub_mod_id).trigger('change');
                    $('#edit_task_workload').val(data.task_workload);
                    $('#edit_remarks').val(data.remarks);
                    $('#edit_weekly_status').val(data.weekly_status).trigger('change');
                }, 500);
            }
        });
    }
    function update_weeklyreport(){
        var date_range      = $('#edit_date_range_report').val();
        var team            = $('#edit_team').val();
        var id              = $('#edit_id').val();
        var emp_id          = $('#edit_name').val();
        var emp_name        = $('#edit_name option:selected').text();
        var module          = $('#edit_module').val();
        var sub_module      = $('#edit_sub_module').val();
        var task_workload   = $('#edit_task_workload').val();
        var weekly_status   = $('#edit_weekly_status').val();
        var remarks         = $('#edit_remarks').val();

        Swal.fire({
            title: 'Are you sure?',
            text: 'You want to update this weekly report?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, update it!',
            cancelButtonText: 'No, cancel!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?php echo base_url('update_weeklyreport') ?>',
                    type: 'POST',
                    data: {
                        date_range: date_range,
                        team: team,
                        id: id,
                        emp_id: emp_id,
                        emp_name: emp_name,
                        module: module,
                        sub_module: sub_module,
                        task_workload: task_workload,
                        weekly_status: weekly_status,
                        remarks: remarks
                    },
                    success: function (response) {
                        Toastify({
                            text: `Weekly Report updated successfully.`,
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
                        $('#edit_weekly_report').modal('hide');
                        table.ajax.reload();
                    }
                });
            }
        });
    }
    function delete_weekly(id){
        Swal.fire({
            title: 'Are you sure?',
            text: 'You want to delete this report?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?php echo base_url('delete_weekly') ?>',
                    type: 'POST',
                    data: { id: id },
                    success: function (response) {
                        Toastify({
                            text: `Weekly Report deleted successfully.`,
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
                        table.ajax.reload();
                    }
                });
            }
        })
    }
</script>