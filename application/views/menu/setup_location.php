<div class="modal fade" id="create_location" tabindex="-1" aria-labelledby="create_location" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info-subtle">
                <h5 class="modal-title">SETUP LOCATION IMPLEMENTED</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <label for="company" class="col-sm-3 col-form-label">Company:</label>
                    <div class="col-sm-9">
                        <select class="form-select mb-3" id="company" style="width: 100%; height: 508px">
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="Business Unit" class="col-sm-3 col-form-label">Business Unit:</label>
                    <div class="col-sm-9">
                        <select class="form-select mb-3" id="business_unit" style="width: 100%; height: 508px">
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="department" class="col-sm-3 col-form-label">Department:</label>
                    <div class="col-sm-9">
                        <select class="form-select mb-3" id="department" style="width: 100%; height: 508px">
                            <option value=""></option>
                        </select>
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
                    <label class="col-sm-3 col-form-label">Date Parallel: </label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <input type="date" id="date_parallel" class="form-control" readonly="" placeholder="Select date" data-provider="flatpickr" />
                            <span class="input-group-text"><i class="ri-calendar-event-line"></i></span>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Date online: </label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <input type="date" id="date_online" class="form-control" readonly="" placeholder="Select date" data-provider="flatpickr" />
                            <span class="input-group-text"><i class="ri-calendar-event-line"></i></span>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="remarks" class="col-sm-3 col-form-label">Remarks:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="remarks" placeholder="Remarks">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="submit_location()">Submit</button>
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit_location" tabindex="-1" aria-labelledby="edit_location" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" style="width: 765px">
        <div class="modal-content">
            <div class="modal-header bg-info-subtle">
                <h5 class="modal-title">EDIT SETUP LOCATION IMPLEMENTED</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <label for="company" class="col-sm-3 col-form-label">Company:</label>
                    <div class="col-sm-9">
                        <select class="form-select mb-3" id="edit_company" style="width: 100%; height: 508px">
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="Business Unit" class="col-sm-3 col-form-label">Business Unit:</label>
                    <div class="col-sm-9">
                        <select class="form-select mb-3" id="edit_business_unit" style="width: 100%; height: 508px">
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="department" class="col-sm-3 col-form-label">Department:</label>
                    <div class="col-sm-9">
                        <select class="form-select select2 mb-3" id="edit_department" style="width: 100%; height: 508px">
                            <option value=""></option>
                        </select>
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
                    <label class="col-sm-3 col-form-label">Date Parallel: </label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <input type="date" id="edit_date_parallel" class="form-control" readonly="" placeholder="Select date" data-provider="flatpickr" />
                            <span class="input-group-text"><i class="ri-calendar-event-line"></i></span>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Date online: </label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <input type="date" id="edit_date_online" class="form-control" readonly="" placeholder="Select date" data-provider="flatpickr" />
                            <span class="input-group-text"><i class="ri-calendar-event-line"></i></span>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="remarks" class="col-sm-3 col-form-label">Remarks:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="edit_remarks" placeholder="Remarks">
                        <input type="hidden" class="hidden" id="edit_id">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="update_location()">Submit</button>
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="module_list_implemented_modal" tabindex="-1" aria-labelledby="module_list_implemented" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content"> 
            <div class="modal-header bg-info-subtle">
                <h5 class="modal-title">SETUP LOCATION IMPLEMENTED OF THIS MODULE</h5>
                <div class="d-flex align-items-center flex-shrink-0 ms-2 gap-2">
                    <button class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#create_location"><i class="ri-add-fill align-bottom me-1"></i> Setup Implemented Location </button>
                    <!-- <button class="btn btn-danger waves-effect waves-light"><i class="ri-printer-fill align-bottom me-1"></i> Generate Report </button> -->
                </div>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover no-wrap" id="location_setup">
                        <thead class="table-primary text-center">
                            <tr>
                                <th>Company</th>
                                <th>Business Unit</th>
                                <th>Department</th>
                                <th>Module</th>
                                <th>Sub Module</th>
                                <th>Date Parallel</th>
                                <th>Date Online</th>
                                <th>Remarks</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">LOCATION SETUP </h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Location </a></li>
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
                        <h5 class="card-title mb-0 flex-grow-1 fw-bold">List of Modules | Business Unit | Department Implemented</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover no-wrap table-bordered" id="module_list_implemented">
                            <thead class="table-primary text-center">
                                <tr>
                                    <th>Module List</th>
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
        var table = $('#module_list_implemented').DataTable({
            "processing": true,
            "serverSide": true,
            "lengthMenu": [[10, 25, 50, 100, 10000], [10, 25, 50, 100, "Max"]],
            "pageLength": 10,
            "ajax": {
                "url": "<?php echo base_url('module_list_implemented') ?>",
                "type": "POST"
            },
            "columns": [
                {
                    "data": "module"
                },
                {
                    "data": "action"
                }
            ],
            "columnDefs": [
                { "className": "text-center", "targets": ['_all'] }
            ],
        });
    });
</script>


<script>
    $(document).ready(function () {
        $('#company, #edit_company').select2({ placeholder: 'Select Company', allowClear: true, minimumResultsForSearch: Infinity});
        $('#business_unit, #edit_business_unit').select2({ placeholder: 'Select Business Unit', allowClear: true, minimumResultsForSearch: Infinity});
        $('#department, #edit_department').select2({ placeholder: 'Select Department', allowClear: true, minimumResultsForSearch: Infinity});

        $('#module, #edit_module').select2({ placeholder: 'Select Module Name', allowClear: true, minimumResultsForSearch: Infinity});
        $('#sub_module, #edit_sub_module').select2({ placeholder: 'Select Sub Module Name', allowClear: true, minimumResultsForSearch: Infinity});
    });

    function module_list_implemented_modal(mod_id) {
        var table = $('#location_setup').DataTable();
        table.destroy();

        $('#location_setup').DataTable({
            "processing": true,
            "serverSide": true,
            "lengthMenu": [[10, 25, 50, 100, 10000], [10, 25, 50, 100, "Max"]],
            "pageLength": 10,
            "ajax": {
                "url": "<?php echo base_url('setup_location_list'); ?>",
                "type": "POST",
                "data": {
                    "mod_id": mod_id
                }
            },
            "columns": [
                { "data": "company" },
                { "data": "business_unit" },
                { "data": "department" },
                { "data": "module" },
                { "data": "sub_module" },
                { "data": "date_parallel",
                    "render": function(data, type, row) {
                        return data ? new Date(data).toLocaleDateString('en-US', {
                            year: 'numeric', month: 'long', day: 'numeric'
                        }) : '';
                    }
                },
                { "data": "date_online",
                    "render": function(data, type, row) {
                        return data ? new Date(data).toLocaleDateString('en-US', {
                            year: 'numeric', month: 'long', day: 'numeric'
                        }) : '';
                    }
                },
                { "data": "remarks" },
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
                    "title": 'LOCATION SETUP IMPLEMENTED - Excel Export', 
                    "exportOptions": {
                        "columns": ':visible:not(:last-child)'
                    }
                },
                {
                    "extend": 'pdfHtml5',
                    "title": 'LOCATION SETUP IMPLEMENTED - PDF Export',
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

        // Open the modal
        $('#module_list_implemented_modal').modal('show');
    }

    $.ajax({
        url: '<?php echo base_url('setup_location') ?>',
        type: 'POST',
        success: function (response) {
            companyData = JSON.parse(response);
            $('#company, #edit_company').empty().append('<option value="">Select Company</option>');
            $('#business_unit, #edit_business_unit').empty().append('<option value="">Select Business Unit</option>');
            $('#department, #edit_department').empty().append('<option value="">Select Department</option>');
            $('#business_unit, #edit_business_unit, #department, #edit_department').prop('disabled', true);

            companyData.forEach(function (company) {
                $('#company, #edit_company').append('<option value="' + company.company_code + '">' + company.company + '</option>');
            });
        }
    });

    $('#company, #edit_company').change(function () {
        var companyCode = $(this).val();
        $('#business_unit, #edit_business_unit').empty().append('<option value="">Select Business Unit</option>');
        $('#department, #edit_department').empty().append('<option value="">Select Department</option>');
        $('#business_unit, #edit_business_unit').prop('disabled', true);
        $('#department, #edit_department').prop('disabled', true);


        var selectedCompany = companyData.find(company => company.company_code == companyCode);

        if (selectedCompany) {
            selectedCompany.business_unit.forEach(function (bu) {
                $('#business_unit, #edit_business_unit').append('<option value="' + bu.bunit_code + '">' + bu.business_unit + '</option>');
            });
            $('#business_unit, #edit_business_unit').prop('disabled', false);
        }
    });

    $('#business_unit, #edit_business_unit').change(function () {
        var companyCode = $('#company').val() || $('#edit_company').val(); 
        var businessUnitCode = $(this).val();
        $('#department, #edit_department').empty().append('<option value="">Select Department</option>');
        $('#department, #edit_department').prop('disabled', true);

        var selectedCompany = companyData.find(company => company.company_code == companyCode);
        if (selectedCompany) {
            selectedCompany.department.forEach(function (dept) {
                if (dept.bunit_code == businessUnitCode) {
                    $('#department, #edit_department').append('<option value="' + dept.dcode + '">' + dept.dept_name + '</option>');
                }
            });
            $('#department, #edit_department').prop('disabled', false);
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

    function submit_location() {
        
        var company         = $('#company').val();
        var company_name    = $('#company option:selected').text();
        var business_unit   = $('#business_unit').val();
        var business_unit_name = $('#business_unit option:selected').text();
        var department      = $('#department').val();
        var module          = $('#module').val();
        var sub_module      = $('#sub_module').val();
        var date_parallel   = $('#date_parallel').val();
        var date_online     = $('#date_online').val();
        var remarks         = $('#remarks').val();

        if (company === "" || business_unit === "" || department === "" || module === "" || date_parallel === "" || date_online === "" || remarks === "") {
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
                $('#company, #business_unit, #department, #module, #sub_module, #date_parallel, #date_online, #remarks').addClass('is-invalid');
            }
            return;
        }

        Swal.fire({
            title: 'Are you sure?',
            text: 'You want to setup this location?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, add it!',
            cancelButtonText: 'No, cancel!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?php echo base_url('submit_location') ?>',
                    type: 'POST',
                    data: {
                        company: company,
                        company_name: company_name,
                        business_unit_name: business_unit_name,
                        business_unit: business_unit,
                        department: department,
                        module: module,
                        sub_module: sub_module,
                        date_parallel: date_parallel,
                        date_online: date_online,
                        remarks: remarks
                    },
                    success: function (response) {
                        Toastify({
                            text: `Location setup added successfully.`,
                            duration: 5000,
                            gravity: "top",
                            position: "left",
                            
                            stopOnFocus: true,
                            close: true,
                            style: {
                                background: "linear-gradient(to right, #ff5f6d, #ffc371)",
                            },
                        }).showToast();
                        $('#create_location').modal('hide');
                        module_list_implemented_modal(module)
                        table.ajax.reload();
                    }
                });
            }
        });
    }
    function edit_location_content(id) {
        $.ajax({
            url: '<?php echo base_url('edit_setup_location_content') ?>',
            type: 'POST',
            data: { id: id },
            success: function (response) {
                let data = JSON.parse(response);
                $('#edit_id').val(data.id);
                $('#module_list_implemented_modal').modal('hide');
                setTimeout(function () {
                    $('#edit_company').val(data.company).trigger('change').promise().done(function () {
                        $('#edit_business_unit').val(data.business_unit).trigger('change').promise().done(function () {
                            $('#edit_department').val(data.department).trigger('change');
                        });
                    });
                    $('#edit_module').val(data.mod_id).trigger('change');
                    $('#edit_sub_module').val(data.sub_mod_id).trigger('change');
                    $('#edit_date_parallel').val(data.date_parallel);
                    $('#edit_date_online').val(data.date_online);
                    $('#edit_remarks').val(data.remarks);
                }, 800);
            }
        });
    }
    function update_location() {
        var id              = $('#edit_id').val();
        var company         = $('#edit_company').val();
        var company_name         = $('#edit_company option:selected').text();
        var business_unit   = $('#edit_business_unit').val();
        var business_unit_name = $('#edit_business_unit option:selected').text();
        var department      = $('#edit_department').val();
        var module          = $('#edit_module').val();
        var sub_module      = $('#edit_sub_module').val();
        var date_parallel   = $('#edit_date_parallel').val();
        var date_online     = $('#edit_date_online').val();
        var remarks         = $('#edit_remarks').val();

        Swal.fire({
            title: 'Are you sure?',
            text: 'You want to update this location?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, update it!',
            cancelButtonText: 'No, cancel!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?php echo base_url('update_location') ?>',
                    type: 'POST',
                    data: {
                        id: id,
                        company: company,
                        company_name: company_name,
                        business_unit: business_unit,
                        business_unit_name: business_unit_name,
                        department: department,
                        module: module,
                        sub_module: sub_module,
                        date_parallel: date_parallel,
                        date_online: date_online,
                        remarks: remarks
                    },
                    success: function (response) {
                        Toastify({
                            text: `Location setup updated successfully.`,
                            duration: 5000,
                            gravity: "top",
                            position: "left",
                            
                            stopOnFocus: true,
                            close: true,
                            style: {
                                background: "linear-gradient(to right, #ff5f6d, #ffc371)",
                            },
                        }).showToast();
                        $('#edit_location').modal('hide');
                        module_list_implemented_modal(module)
                        table.ajax.reload();
                    }
                });
            }
        })
    }
    function delete_setup_location(id){
        Swal.fire({
            title: 'Are you sure?',
            text: 'You want to delete this setup?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?php echo base_url('delete_setup_location') ?>',
                    type: 'POST',
                    data: { id: id },
                    success: function (response) {
                        Toastify({
                            text: `Location setup deleted successfully.`,
                            duration: 5000,
                            gravity: "top",
                            position: "left",
                            
                            stopOnFocus: true,
                            close: true,
                            style: {
                                background: "linear-gradient(to right, #ff5f6d, #ffc371)",
                            },
                        }).showToast();
                        $('#location_setup').DataTable().ajax.reload();
                    }
                });
            }
        })
    }
</script>