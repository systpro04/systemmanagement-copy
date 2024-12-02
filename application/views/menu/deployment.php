<div class="modal fade" id="upload_remaining_files" tabindex="-1" aria-labelledby="upload_remaining_files"
    aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" style="width: 655px">
        <div class="modal-content">
            <div class="modal-header bg-info-subtle">
                <h5 class="modal-title">LIST OF REMAINING DIRECTORIES NOT YET UPLOADED</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table id="remaining_files_table" class="table table-striped table-bordered">
                    <thead class="table-primary text-center">
                        <tr>
                            <th>Directory Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="upload_to_directory" tabindex="-1" aria-labelledby="upload_to_directory" aria-hidden="true"
    data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-info-subtle">
                <h5 class="modal-title" id="upload_to"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="uploadForm" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="title" class="col-form-label">Business Unit <span class="text-danger"><small>( Optional for no business_unit file directory )*</small></span></label>
                            <select id="business_unitFilter" class="form-select" aria-label="Team">
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="col-lg-12">
                            <label for="title" class="col-form-label">Deaprtment <span class="text-danger"><small>( Optional for no department file directory )*</small></span></label>
                            <select id="departmentFilter" class="form-select" aria-label="Team">
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="col-lg-12">
                            <label for="fileUpload">Upload a File</label>
                            <input type="file" id="fileUpload" class="filepond filepond-input-multiple" name="file[]" multiple data-allow-reorder="true" data-max-file-size="500MB" data-max-files="50" />
                            <input type="hidden" hidden id="team_id" class="hidden">
                            <input type="hidden" hidden id="mod_id" class="hidden">
                            <input type="hidden" hidden id="sub_mod_id" class="hidden">
                            <input type="hidden" hidden id="typeofsystem" class="hidden">
                            <input type="hidden" hidden id="directory" class="hidden">
                            <input type="hidden" hidden id="file_mod_name" class="hidden">
                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-lg btn-primary" id="uploadBtn">Upload</button>
                        <button type="button" class="btn btn-lg btn-dark" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">DEPLOYMENT | SYSTEM</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Deoloyment </a></li>
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
                        <h5 class="card-title mb-0 flex-grow-1 fw-bold">List of System | For Implementation</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover no-wrap" id="for_implementation">
                            <thead class="table-primary text-center">
                                <tr>
                                    <th>Tean Name</th>
                                    <th>Module</th>
                                    <th>Date Requested</th>
                                    <th>Business Unit</th>
                                    <th>Status</th>
                                    <th>Type</th>
                                    <th>Already Uploaded</th>
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
    var table = $('#for_implementation').DataTable({
        "processing": true,
        "serverSide": true,
        "destroy": true,
        "stateSave": true,
        "lengthMenu": [[10, 25, 50, 100, 10000], [10, 25, 50, 100, "Max"]],
        "pageLength": 10,
        "ajax": {
            "url": "<?php echo base_url('for_implementation_list'); ?>",
            "type": "POST",
        },
        "columns": [
            { "data": "team_name" },
            { "data": "module" },
            { "data": "date_request" },
            { "data": "bu_name" },
            { "data": "implem_type" },
            { "data": "typeofsystem" },
            { "data": "uploaded_to" },
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
                "title": 'FOR IMPLEMENTATION - Excel Export', 
                "exportOptions": {
                    "columns": ':visible:not(:last-child)'
                }
            },
            {
                "extend": 'pdfHtml5',
                "title": 'FOR IMPLEMENTATION - PDF Export',
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
    function upload_remaining_files(mod_id, mod_name) {
        $('#remaining_files_table').DataTable({
            "processing": true,
            "serverSide": true,
            "destroy": true,
            "stateSave": true,
            "ajax": {
                "url": "<?php echo base_url('remaining_files_list'); ?>",
                "type": "POST",
                "data": {
                    mod_id: mod_id,
                    mod_name: mod_name
                }
            },
            "columns": [
                { "data": "directory" },
                { "data": "action" }
            ],
            "columnDefs": [
                { "className": "text-center", "targets": ['_all'] }
            ],
        });
    }
</script>

<script src="<?php echo base_url(); ?>assets/js/filepond.js"></script>
<script src="<?php echo base_url(); ?>assets/js/filepond-plugin-image-preview.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/filepond-plugin-file-validate-size.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/filepond-plugin-image-exif-orientation.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/filepond-plugin-file-encode.min.js"></script>

<script>
    $(document).ready(function () {
        $('#business_unitFilter, #buFilter').select2({ placeholder: 'Select Business Unit', allowClear: true, minimumResultsForSearch: Infinity });
        $('#departmentFilter, #deptFilter').select2({ placeholder: 'Select Department', allowClear: true, minimumResultsForSearch: Infinity });
    });

    $.ajax({
        url: '<?php echo base_url('business_unit_current') ?>',
        type: 'POST',
        success: function (response) {
            buData = JSON.parse(response);
            $('#business_unitFilter, #buFilter').empty().append('<option value="">Select Business Unit</option>');
            buData.forEach(function (bu) {
                $('#business_unitFilter, #buFilter').append('<option value="' + bu.bcode + '">' + bu.business_unit + '</option>');
            });
            $('#deptFilter').prop('disabled', true);
        }
    });

    $('#business_unitFilter, #buFilter').change(function () {
        $('#deptFilter, #departmentFilter').empty().append('<option value="">Select Department</option>');
        $('#deptFilter, #departmentFilter').prop('disabled', true);
        var selectedBusinessUnit = $(this).val();
        if (selectedBusinessUnit) {
            $.ajax({
                url: '<?php echo base_url('department_current') ?>',
                type: 'POST',
                data: {
                    business_unit: selectedBusinessUnit
                },
                success: function (response) {
                    deptData = JSON.parse(response);
                    $('#deptFilter, #departmentFilter').empty().append('<option value="">Select Department</option>');
                    deptData.forEach(function (dept) {
                        $('#deptFilter, #departmentFilter').append('<option value="' + dept.dcode + '">' + dept.dept_name + '</option>');
                    });
                    $('#deptFilter, #departmentFilter').prop('disabled', false);
                }
            });
        }
    });
    function upload_to_directory(mod_id, directory, sub_mod_id, team_id, typeofsystem, mod_name) {
        $('#upload_to_directory').modal('show');
        $('#upload_remaining_files').modal('hide');

        $('#mod_id').val(mod_id);
        $('#directory').val(directory);
        $('#sub_mod_id').val(sub_mod_id);
        $('#team_id').val(team_id);
        $('#typeofsystem').val(typeofsystem);
        $('#file_mod_name').val(mod_name);

        $('#upload_to').text('' + directory + ' | ' + mod_name +'');
    }
    $('#upload_to_directory').on('hidden.bs.modal', function () {
        const pond = FilePond.find(document.querySelector(".filepond-input-multiple"));
        if (pond) {
            pond.removeFiles();
        }
        document.getElementById('uploadForm').reset(); 
        $('#business_unitFilter').val('').trigger('change');
        $('#departmentFilter').val('').trigger('change');
    });

    document.addEventListener('DOMContentLoaded', function () {
        FilePond.registerPlugin(
            FilePondPluginFileEncode,
            FilePondPluginFileValidateSize,
            FilePondPluginImageExifOrientation,
            FilePondPluginImagePreview
        );

        document.querySelectorAll("input.filepond-input-multiple").forEach(function (inputElement) {
            FilePond.create(inputElement);
        });

        document.querySelector('#uploadForm').addEventListener('submit', function (e) {
            e.preventDefault();

            const directory         = document.querySelector('#directory').value;
            const team              = document.querySelector('#team_id').value;
            const module            = document.querySelector('#mod_id').value;
            const sub_module        = document.querySelector('#sub_mod_id').value;
            const typeofsystem      = document.querySelector('#typeofsystem').value;
            const moduleName        = document.querySelector('#file_mod_name').value;
            const business_unit     = document.querySelector('#business_unitFilter').value;
            const department        = document.querySelector('#departmentFilter').value;

            Swal.fire({
                title: 'Are you sure?',
                text: `You are about to upload this file to the "${directory}" directory.`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, upload it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    const formData = new FormData();
                    formData.append('directory', directory);
                    formData.append('team_id', team);
                    formData.append('mod_id', module);
                    formData.append('sub_mod_id', sub_module);
                    formData.append('typeofsystem', typeofsystem);
                    formData.append('file_mod_name', moduleName);
                    formData.append('business_unit', business_unit);
                    formData.append('department', department);

                    const pond = FilePond.find(document.querySelector(".filepond-input-multiple"));
                    const files = pond.getFiles();

                    if (files.length === 0) {
                        Toastify({
                            text: `No files selected.`,
                            duration: 5000,
                            gravity: "top",
                            position: "left",
                            stopOnFocus: true,
                            close: true,
                            style: {
                                background: "linear-gradient(to right, #ff5f6d, #ffc371)",
                            },
                        }).showToast();
                        return;
                    }

                    files.forEach(fileItem => {
                        formData.append('file[]', fileItem.file);
                    });

                    const uploadButton = document.querySelector('#uploadBtn');
                    uploadButton.innerHTML = `
                    <span class="d-flex align-items-center">
                        <span class="spinner-border" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </span>
                        <span class="flex-grow-1 ms-2">Loading...</span>
                    </span>
                `;
                    uploadButton.disabled = true;

                    $.ajax({
                        url: '<?php echo base_url('submit_to_directory'); ?>',
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            response = JSON.parse(response);

                            if (response.success) {
                                Toastify({
                                    text: response.message,
                                    duration: 5000,
                                    gravity: "top",
                                    position: "left",
                                    stopOnFocus: true,
                                    close: true,
                                    style: {
                                        background: "linear-gradient(to right, #ff5f6d, #ffc371)",
                                    },
                                }).showToast();
                                $('#upload_to_directory').modal('hide');
                                $('#remaining_files_table').DataTable().ajax.reload();
                                $('#for_implementation').DataTable().ajax.reload();
                                const pond = FilePond.find(document.querySelector(".filepond-input-multiple"));
                                if (pond) {
                                    pond.removeFiles();
                                }
                                document.getElementById('uploadForm').reset(); 
                                $('#business_unitFilter').val('').trigger('change');
                                $('#departmentFilter').val('').trigger('change');
                            } else {
                                Swal.fire({
                                    title: 'Notice!',
                                    text: response.message,
                                    icon: 'info',
                                    confirmButtonText: 'Proceed with Manager\'s Key',
                                    cancelButtonText: 'Cancel',
                                    showCancelButton: true,
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        $('#upload_to_directory').modal('hide');
                                        Swal.fire({
                                            title: 'Enter Manager\'s Key',
                                            input: 'password',
                                            icon: 'info',
                                            inputAttributes: {
                                                autocapitalize: 'off',
                                                autocomplete: 'off',
                                                placeholder: 'Enter manager\'s key'
                                            },
                                            showCancelButton: true,
                                            confirmButtonText: 'Submit',
                                            cancelButtonText: 'Cancel',
                                            allowOutsideClick: false,
                                            allowEscapeKey: false,
                                            preConfirm: (key) => {
                                                if (!key) {
                                                    Swal.showValidationMessage('Manager\'s key is required');
                                                } else {
                                                    return key;
                                                }
                                            }
                                        }).then((keyResult) => {
                                            if (keyResult.isConfirmed && keyResult.value) {
                                                formData.append('manager_key', keyResult.value);
                                                $.ajax({
                                                    url: '<?php echo base_url('submit_to_directory'); ?>',
                                                    type: 'POST',
                                                    data: formData,
                                                    contentType: false,
                                                    processData: false,
                                                    success: function (overrideResponse) {
                                                        overrideResponse = JSON.parse(overrideResponse);
                                                        if (overrideResponse.success) {
                                                            Toastify({
                                                                text: overrideResponse.message,
                                                                duration: 5000,
                                                                gravity: "top",
                                                                position: "left",
                                                                stopOnFocus: true,
                                                                close: true,
                                                                style: {
                                                                    background: "linear-gradient(to right, #ff5f6d, #ffc371)",
                                                                },
                                                            }).showToast();
                                                            $('#upload_to_directory').modal('hide');
                                                            $('#remaining_files_table').DataTable().ajax.reload();
                                                            $('#for_implementation').DataTable().ajax.reload();
                                                            const pond = FilePond.find(document.querySelector(".filepond-input-multiple"));
                                                            if (pond) {
                                                                pond.removeFiles();
                                                            }
                                                            document.getElementById('uploadForm').reset(); 
                                                            $('#business_unitFilter').val('').trigger('change');
                                                            $('#departmentFilter').val('').trigger('change');
                                                        } else {
                                                            Toastify({
                                                                text: overrideResponse.message,
                                                                duration: 5000,
                                                                gravity: "top",
                                                                position: "left",
                                                                stopOnFocus: true,
                                                                close: true,
                                                                style: {
                                                                    background: "linear-gradient(to right, #ff5f6d, #ffc371)",
                                                                },
                                                            }).showToast();
                                                        }
                                                    }
                                                });
                                            }
                                        });
                                    }
                                });
                            }

                            uploadButton.innerHTML = 'Upload Files';
                            uploadButton.disabled = false;
                        },
                    });
                } else {
                    return;
                }
            });
        });
    });
</script>


