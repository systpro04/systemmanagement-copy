<!-- Varying modal content -->
<div class="modal fade" id="create_kpi" tabindex="-1" aria-labelledby="create_kpiLabel" aria-hidden="true"
    data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info-subtle">
                <h5 class="modal-title" id="varyingcontentModalLabel">CREATE KPI</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="title" class="col-form-label">Title:</label>
                    <input type="text" class="form-control" id="title">
                </div>
                <div class="mb-3">
                    <label for="type" class="col-form-label">Type:</label>
                    <select class="form-select mb-3" id="type">
                        <option></option>
                        <option value="System Analyst">SYSTEM ANALYST</option>
                        <option value="Programmer">PROGRAMMER</option>
                        <option value="RMS">RMS</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="desc" class="col-form-label">Description:</label>
                    <textarea class="form-control" id="desc" style="height: 210px"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="submitKPI()">Submit</button>
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Varying modal content -->
<div class="modal fade" id="edit_kpi" tabindex="-1" aria-labelledby="create_kpiLabel" aria-hidden="true"
    data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info-subtle">
                <h5 class="modal-title" id="varyingcontentModalLabel">UPDATE KPI</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="" id="edit_kpi_content"></div>
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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin </a></li>
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
                        <h5 class="card-title mb-0 flex-grow-1">Key Performance Indicator</h5>
                        <div class="flex-shrink-0">
                            <div class="d-flex flex-wrap gap-2">
                                <button class="btn btn-primary waves-effect waves-light add-btn" data-bs-toggle="modal"
                                    data-bs-target="#create_kpi"><i class="ri-add-line align-bottom me-1"></i> Create
                                    KPI </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="nav nav-pills arrow-navtabs nav-primary bg-light mb-4" role="tablist">
                        <li class="nav-item">
                            <a id="System Analyst" aria-expanded="false" class="nav-link active type" data-bs-toggle="tab" >
                                <span class="d-block d-sm-none"><iconify-icon icon="solar:lightbulb-bolt-bold-duotone" class="fs-25"></iconify-icon></span>
                                <span class="d-none d-sm-block">System Analyst's KPI</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a id="Programmer" aria-expanded="true" class="nav-link type" data-bs-toggle="tab" >
                                <span class="d-block d-sm-none"><iconify-icon icon="solar:code-file-bold-duotone" class="fs-25"></iconify-icon></span>
                                <span class="d-none d-sm-block">Programmer's KPI </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a id="RMS" aria-expanded="true" class="nav-link type" data-bs-toggle="tab" >
                                <span class="d-block d-sm-none"><iconify-icon icon="solar:siderbar-bold-duotone" class="fs-25"></iconify-icon></span>
                                <span class="d-none d-sm-block">Record Management System KPI </span>
                            </a>
                        </li>
                    </ul>
                    <hr>
                    <div class="tab-content">
                        <div class="mt-2 tab-pane active" id="System Analyst" role="tabpanel">
                            <div class="table-responsive">
                            <table class="table table-striped table-hover" id="kpi">
                                <thead class="table-primary text-center">
                                    <tr>
                                        <th>Title</th>
                                        <th>Description</th>
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
    </div>
</div>

<script>
    var type = "System Analyst";
    loadkpi(type);

    $("a.type").click(function () {
        $("a.btn-primary").removeClass('btn-primary').addClass('btn-secondary');
        $(this).addClass('btn-primary');
        let type = this.id;
        loadkpi(type);
    });

    function loadkpi(type){

        $('#kpi').DataTable({
            processing: true,
            serverSide: true,
            stateSave: true,
            destroy: true,
            lengthMenu: [[10, 25, 50, 100, 10000], [10, 25, 50, 100, "Max"]],
            pageLength: 10,
            ajax: {
                url: '<?php echo base_url('kpi_list'); ?>',
                type: 'POST',
                data: {
                    type: type
                }
            },
            columns: [
                { data: 'title' },
                { data: 'description' },
                { data: 'type' },
                { data: 'action' }
            ],
            paging: true,
            searching: true,
            ordering: true,
            columnDefs: [
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
                    "title": 'KPI LIST - Excel Export', 
                    "exportOptions": {
                        "columns": ':visible:not(:last-child)'
                    }
                },
                {
                    "extend": 'pdfHtml5',
                    "title": 'KPI LIST - PDF Export',
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

    function submitKPI() {

        let title           = $('#title').val();
        let type            = $('#type').val();
        let description     = $('#desc').val();

        if (title === "" || type === "" || description === "") {
            Toastify({
                text: `Please fill up required fields.`,
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
            if (title === "") {
                $('#title').addClass('is-invalid');
            }
            if (type === "") {
                $('#type').addClass('is-invalid');
            }
            if (description === "") {
                $('#desc').addClass('is-invalid');
            }

            return;
        }

        let data = {
            title: title,
            type: type,
            description: description
        };

        $.ajax({
            url: '<?php echo base_url("create_kpi"); ?>',
            type: 'POST',
            data: data,
            success: function() {
                $('#create_kpi').modal('hide');
                $('#kpi').DataTable().ajax.reload();
                Toastify({
                    text: `Kpi added successfully.`,
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
                
            },
        });
    }

    function edit_kpi(id) {
        $.ajax({
            url: '<?= base_url('edit_kpi') ?>',
            type: 'POST',
            data: {id: id},
            error: function () {
                Toastify({
                    text: `Opps!!! Something went wrong.`,
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
            },
            success: function (data) {
                $("#edit_kpi_content").html(data);
            }
        });
    }
    function submiteditedKPI(id){
        let title = $('#ktitle').val().trim();
        let type = $('#type_edit').val();
        let description = $('#description').val().trim(); 

        Swal.fire({
            title: 'Are you sure?',
            text: 'You want to update this KPI!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, update it!',
            cancelButtonText: 'No, cancel!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url('update_kpi') ?>',
                    type: 'POST',
                    data: {
                        id: id, 
                        title: title,
                        type: type,
                        description: description
                    },
                    success: function() {
                        $('#edit_kpi').modal('hide');
                        $('#kpi').DataTable().ajax.reload();
                        Toastify({
                            text: `Kpi updated successfully.`,
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
                        
                    },
                });
            }
        });
    }
    function delete_kpi(id){
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this KPI.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url('delete_kpi') ?>',
                    type: 'POST',
                    data: {
                        id: id
                    },
                    success: function() {
                        $('#kpi').DataTable().ajax.reload();
                        Toastify({
                            text: `Kpi deleted successfully.`,
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
                    },
                });
            }
        });
    }

</script>
