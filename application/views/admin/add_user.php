
<div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="create_kpiLabel" aria-hidden="true"
    data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-info-subtle">
                <h5 class="modal-title" id="varyingcontentModalLabel">SETUP USER</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="title" class="col-form-label">Team:</label>
                    <input type="hidden" class="hidden" id="emp_id">
                    <select class="form-select mb-3" id="team_id" style="width: 100%; height: 508px">
                        <option value=""></option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="type" class="col-form-label">Position:</label>
                    <select class="form-select mb-3" id="type">
                        <option></option>
                        <option value="System Analyst">SYSTEM ANALYST</option>
                        <option value="Programmer">PROGRAMMER</option>
                        <option value="RMS">RMS</option>
                    </select>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="parttimeCheckbox" value="Parttime">
                    <label class="form-check-label fw-6" for="parttimeCheckbox">Check if part time in this team</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="insertUser()">Submit</button>
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="updateUser" tabindex="-1" aria-labelledby="create_kpiLabel" aria-hidden="true"
    data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-info-subtle">
                <h5 class="modal-title" id="varyingcontentModalLabel">SETUP USER</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="title" class="col-form-label">Team:</label>
                    <input type="hidden" class="hidden" id="edit_id">
                    <select class="form-select mb-3" id="edit_team_id" style="width: 100%; height: 508px">
                        <option value=""></option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="type" class="col-form-label">Position:</label>
                    <select class="form-select mb-3" id="edit_type">
                        <option></option>
                        <option value="System Analyst">SYSTEM ANALYST</option>
                        <option value="Programmer">PROGRAMMER</option>
                        <option value="RMS">RMS</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="type" class="col-form-label">Position:</label>
                    <select class="form-select mb-3" id="edit_parttime">
                        <option></option>
                        <option value="Parttime">Part Time</option>
                        <option value="Fulltime">Full Time</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="updateUser()">Submit</button>
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Admin Setup </h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">User </a></li>
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
                        <h5 class="card-title mb-0 flex-grow-1">Module Setup</h5>
                        <div class="flex-shrink-0">
                            <div class="d-flex gap-3 align-items-start flex-grow-1">
                                <select class="form-select" id="filter_team" style="width: auto; height: auto;">
                                    <option value=""></option>
                                </select>
                                <input type="search" class="form-control" id="search" name="search"
                                    style="width: 500px;" placeholder="Search Employee to add...">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped dt-responsive nowrap table-hover" id="user_list">
                            <thead class="table-primary text-center">
                                <tr>
                                    <th>Team Name</th>
                                    <th>Emp ID</th>
                                    <th>Employee Name</th>
                                    <th>Position</th>
                                    <th>Type</th>
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


<script>
    $(document).ready(function () {
        $('#team_id, #filter_team, #edit_team_id').select2({
            placeholder: 'Select Team',
            allowClear: true,
            minimumResultsForSearch: Infinity
        });
        $('#type, #edit_type').select2({
            placeholder: 'Position',
            allowClear: true,
            minimumResultsForSearch: Infinity
        });
        $('#edit_parttime').select2({
            placeholder: 'Type',
            allowClear: true,
            minimumResultsForSearch: Infinity
        });
    });

    $.ajax({
        url: '<?php echo base_url('get_team') ?>',
        type: 'POST',
        success: function (response) {
            teamData = JSON.parse(response);
            $('#filter_team, #team_id, #edit_team_id').empty().append('<option value="">Select Team Name</option>');
            teamData.forEach(function (team) {
                $('#filter_team, #team_id, #edit_team_id').append('<option value="' + team.team_id + '">' + team.team_name + '</option>');
            });
        }
    });

    $(document).ready(function () {
        let table = $('#user_list').DataTable({
            "processing": true,
            "serverSide": true,
            "stateSave": true,
            "destroy": true,
            "scrollCollapse": true,
            "lengthmenu": [[10, 25, 50, 100, 10000], [10, 25, 50, 100, "Max"]],
            "pageLength": 10,
            "stateSave": true,
            "ajax": {
                "url": '<?php echo base_url('user_list'); ?>',
                "type": 'POST',
                data: function (d) {
                    d.filter_team = $('#filter_team').val();
                }
            },
            "columns": [
                { "data": 'team_name' },
                { "data": 'emp_id' },
                { "data": 'name' },
                { "data": 'position' },
                { "data": 'type' },
                { "data": 'action' }
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
                    "title": 'PROGRAMMER | ANALYSTS | RMS - Excel Export', 
                    "exportOptions": {
                        "columns": ':visible:not(:last-child)'
                    }
                },
                {
                    "extend": 'pdfHtml5',
                    "title": 'PROGRAMMER | ANALYSTS | RMS - PDF Export',
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
    });


    $("input[name='search']").autocomplete({
        source: function (request, response) {
            $.get("<?php echo base_url('search'); ?>", {
                query: request.term
            }, function (data) {
                data = JSON.parse(data);
                response(data);
            });
        },
    }).data("ui-autocomplete")._renderItem = function (ul, item) {
        var listItem = $("<li>").append(
            $("<div>").css({
                "font-family": "Inter-Regular, sans-serif",
            }).html(`${item.emp_id} - ${item.name}`)
        );

        listItem.click(function () {
            var emp_id = item.emp_id;
            add_employee_access(emp_id);
        });

        return listItem.appendTo(ul);
    }.bind($("input[name='search']"));
    $("div.ui-helper-hidden-accessible[role='status']").hide();
    $("div.ui-menu ui-widget ui-widget-content ui-autocomplete ui-front").hide();

    function add_employee_access(emp_id) {
        $.ajax({
            url: '<?php echo base_url('emp_data') ?>',
            type: 'POST',
            data: { emp_id: emp_id },
            success: function (data) {
                var empData = JSON.parse(data);
                $('#emp_name').text(empData.name);
                $('#emp_id').val(empData.emp_id);
                $('#addUser').modal('show');
            },
        });
    }

    function insertUser() {
        var emp_id = $('#emp_id').val();
        var team_id = $('#team_id').val();
        var position = $('#type').val();
        var isParttimeChecked = $('#parttimeCheckbox').is(':checked') ? $('#parttimeCheckbox').val() : null;
        Swal.fire({
            title: 'Add User',
            text: 'Are you sure you want to add this user?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, add it!',
            cancelButtonText: 'No, cancel!',
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: '<?php echo base_url('add_user') ?>',
                    type: 'POST',
                    data: {
                        emp_id: emp_id,
                        team_id: team_id,
                        position: position,
                        is_parttime: isParttimeChecked
                    },
                    success: function (data) {
                        Toastify({
                            text: `User added successfully.`,
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
                        $('#addUser').modal('hide');
                        $('#user_list').DataTable().ajax.reload();
                    }
                });
            }
        });
    }
    function update_user_content(id) {
        $.ajax({
            url: '<?php echo base_url('update_user_content') ?>',
            type: 'POST',
            data: { id: id },
            success: function (response) {
                let data = JSON.parse(response);
                $('#edit_team_id').val(data.team_id).trigger('change');
                $('#edit_id').val(data.id);
                $('#edit_type').val(data.position).trigger('change');
                $('#edit_parttime').val(data.type).trigger('change');
            }
        });
    }
    function updateUser() {
        var id          = $('#edit_id').val();
        var team_id     = $('#edit_team_id').val();
        var position    = $('#edit_type').val();
        var type        = $('#edit_parttime').val();
        Swal.fire({
            title: 'Are you sure?',
            text: 'You want to update this user data?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, update it!',
            cancelButtonText: 'No, cancel!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?php echo base_url('update_user') ?>',
                    type: 'POST',
                    data: {
                        id: id,
                        team_id: team_id,
                        position: position,
                        type: type
                    },
                    success: function (data) {
                        Toastify({
                            text: `User updated successfully.`,
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
                        $('#user_list').DataTable().ajax.reload();
                        $('#updateUser').modal('hide');
                    }
                });
            }
        });
    }
    function reset_password(id) {
        Swal.fire({
            title: 'Are you sure ',
            text: 'You want to reset this user password?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, reset it!',
            cancelButtonText: 'No, cancel!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?php echo base_url('reset_password') ?>',
                    type: 'POST',
                    data: { id: id },
                    success: function (data) {
                        Toastify({
                            text: `Password reset successfully.`,
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
                        $('#user_list').DataTable().ajax.reload();
                    }
                });
            }
        });
    }
</script>