<!-- Modal for viewing folder files -->
<div class="modal fade" id="folderModal" tabindex="-1" aria-labelledby="folderModalLabel" aria-hidden="true"
    data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-info-subtle">
                <h5 class="modal-title" id="folder_name"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 mb-3">
                    <div class="d-flex gap-2">
                        <select id="teamFilter" class="form-select" aria-label="Team">
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
                        <select id="moduleFilter" class="form-select" aria-label="Module">
                            <option value="">Select Module</option>
                        </select>
                        <select id="subModuleFilter" class="form-select" aria-label="Submodule">
                            <option value="">Select Submodule</option>
                        </select>
                        <select id="buFilter" class="form-select" aria-label="Submodule">
                            <option value="">Select Business Unit</option>
                        </select>
                        <select id="deptFilter" class="form-select" aria-label="Submodule">
                            <option value="">Select Department</option>
                        </select>
                    </div>
                </div>
                <div class="row" id="folderModalBody"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- File Upload Modal -->
<div class="modal fade" id="file_upload" tabindex="-1" aria-labelledby="file_upload"
    data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-info-subtle">
                <h5 class="modal-title" id="uploaded_to"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="uploadForm" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="directory">Select Directory</label>
                            <select class="form-select" id="directory" name="directory">
                                <option value=""></option>
                                <option value="ISR">ISR</option>
                                <option value="ATTENDANCE">ATTENDANCE</option>
                                <option value="MINUTES">MINUTES</option>
                                <option value="WALKTHROUGH">WALKTHROUGH</option>
                                <option value="FLOWCHART">FLOWCHART</option>
                                <option value="DFD">DFD</option>
                                <option value="SYSTEM_PROPOSED">SYSTEM_PROPOSED</option>
                                <option value="LOCAL_TESTING">LOCAL TESTING</option>
                                <option value="UAT">UAT</option>
                                <option value="LIVE_TESTING">LIVE TESTING</option>
                            </select>
                        </div>
                        <div class="col-lg-12" id="isrSearchDiv" style="display: none;">
                            <label for="isrSearch" class="col-form-label">Enter ISR Request Number</label>
                            <div class="input-group">
                                <input type="search" id="isrSearch" class="form-control" placeholder="Enter ISR Request Number">
                                <button type="button" id="searchISR" class="btn btn-secondary">Search</button>
                            </div>
                        </div>
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
                        <div class="col-lg-12 mt-3">
                            <label for="fileUpload">Upload a File</label>
                            <input type="file" id="fileUpload" class="filepond filepond-input-multiple" name="file[]"
                                multiple data-allow-reorder="true" data-max-file-size="500MB" data-max-files="5" />
                            <input type="hidden" hidden id="file_team" name="file_team" class="hidden">
                            <input type="hidden" hidden id="file_module" name="file_module" class="hidden">
                            <input type="hidden" hidden id="file_module_name" name="file_module_name" class="hidden">
                            <input type="hidden" hidden id="file_sub_module" name="file_sub_module" class="hidden">
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

<!-- Create Module -->
<div class="modal fade" id="add_new_system" tabindex="-1" aria-labelledby="create_module" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-info-subtle">
                <h5 class="modal-title" id="varyingcontentModalLabel">ADD NEW MDOULE | SYSTEM</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-2">
                    <label for="title" class="col-form-label">Module | System Name:</label>
                    <input type="text" class="form-control" id="mod_name" placeholder="Module Name">
                </div>

                <div class="mb-2">
                    <label for="title" class="col-form-label">Module Abbreviation:</label>
                    <input type="text" class="form-control" id="mod_abbr" placeholder="Abbreviation">
                </div>

                <div class="mb-2">
                    <label class="col-form-label">Date Request:</label>
                        <div class="input-group">
                            <input type="date" id="date_request" class="form-control" readonly="" placeholder="Select Date Request" data-provider="flatpickr" />
                            <span class="input-group-text"><i class="ri-calendar-event-line"></i></span>
                        </div>
                </div>

                <div class="mb-2">
                    <label for="title" class="col-form-label">Requested To</label>
                    <select id="business_unit" class="form-select" aria-label="Team">
                        <option value=""></option>
                </select>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="add_new_module()">Submit</button>
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="chat-wrapper d-lg-flex gap-1 mx-n4 mt-n4 p-1">
        <div class="file-manager-content w-100 p-3 py-0">
            <div class="mx-n3 pt-4 px-4 file-manager-content-scroll" data-simplebar="">
                <div>
                    <div class="row justify-content-between">
                        <div class="col">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <h5 class="fs-16 fw-bold">NEW SYSTEM | MODULE </h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-1">
                            <div class="d-flex gap-2 mb-2">
                                <select class="form-select" id="team" name="team">
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
                                <select class="form-select" id="module" name="module">
                                    <option value="">Module</option>
                                </select>
                                <select class="form-select" id="sub_module" name="sub_module">
                                    <option value="">Sub Module</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-auto mt-1">
                            <div class="d-flex gap-2">
                                <button class="btn btn-primary w-sm create-folder-modal flex-shrink-0" data-bs-toggle="modal" data-bs-target="#file_upload">
                                    <i class="ri-add-line align-bottom me-1"></i> Upload Document
                                </button>
                                <button class="btn btn-primary w-sm flex-shrink-0" data-bs-toggle="modal" data-bs-target="#add_new_system">
                                    <i class="ri-add-line align-bottom me-1"></i> New System
                                </button>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row" id="folderlist-data">
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>




<script>


    $(document).ready(function () {
        $('#team').select2({ placeholder: 'Select Team', allowClear: true });
        $('#module').select2({ placeholder: 'Module Name | System', allowClear: true });
        $('#sub_module').select2({ placeholder: 'Sub Module Name', allowClear: true });
        $('#directory').select2({ placeholder: 'Select Directory', allowClear: true, minimumResultsForSearch: Infinity });

        $('#teamFilter').select2({ placeholder: 'Team Name', allowClear: true, minimumResultsForSearch: Infinity });
        $('#moduleFilter').select2({ placeholder: 'Module Name', allowClear: true, minimumResultsForSearch: Infinity });
        $('#subModuleFilter').select2({ placeholder: 'Sub Module Name', allowClear: true, minimumResultsForSearch: Infinity });

        $('#business_unitFilter, #buFilter').select2({ placeholder: 'Select Business Unit', allowClear: true, minimumResultsForSearch: Infinity });
        $('#departmentFilter, #deptFilter').select2({ placeholder: 'Select Department', allowClear: true, minimumResultsForSearch: Infinity });
        
        $('#isr_files').select2({ placeholder: 'Select File', allowClear: true, minimumResultsForSearch: Infinity });
    });

    $(document).ready(function () {
        $.ajax({
            url: '<?php echo base_url('get_team') ?>',
            type: 'POST',
            success: function (response) {
                teamData = JSON.parse(response);
                $('#team').empty().append('<option value="">Select Team Name</option>');
                teamData.forEach(function (team) {
                    $('#team').append('<option value="' + team.team_id + '">' + team.team_name + '</option>');
                });
            }
        });
    });
    loadModule();
    function loadModule(){
        $.ajax({
                url: '<?php echo base_url('setup_module_new') ?>',
                type: 'POST',
                success: function (response) {
                    moduleData = JSON.parse(response);
                    $('#module').empty().append('<option value="">Select Module Name</option>');
                    $('#sub_module').empty().append('<option value="">Select Sub Module</option>');
                    $('#sub_module').prop('disabled', true);

                    moduleData.forEach(function (module) {
                        $('#module').append('<option value="' + module.mod_id + '">' + module.mod_name + '</option>');
                    });
                }
            });
        }
        

    $('#module').change(function () {
        var selectedModuleId = $(this).val();
        $('#sub_module').empty().append('<option value="">Select Sub Module</option>');
        $('#sub_module').prop('disabled', true);

        var selectedModule = moduleData.find(module => module.mod_id == selectedModuleId);

        if (selectedModule && selectedModule.submodules.length > 0) {
            selectedModule.submodules.forEach(function (subModule) {
                $('#sub_module').append('<option value="' + subModule.sub_mod_id + '">' + subModule.sub_mod_name + '</option>');
            });
            $('#sub_module').prop('disabled', false);
        }
    });

    $.ajax({
        url: '<?php echo base_url('business_unit') ?>',
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
                url: '<?php echo base_url('department') ?>',
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

    let teamValue = '', moduleValue = '', subModuleValue = '', moduleName = '', subModuleName = '';

    $('#team').change(function () {
        teamValue = $(this).val();
        teamName = $('#team option:selected').text();
    });

    $('#module').change(function () {
        moduleValue = $(this).val();
        moduleName = $('#module option:selected').text();
    });

    // Store sub-module and sub-module name
    $('#sub_module').change(function () {
        teamValue = $(this).val(); 
        subModuleName = $('#sub_module option:selected').text();
    });

    $('#file_upload').on('show.bs.modal', function () {
        $('#file_team').val(teamValue);
        $('#file_module').val(moduleValue);
        $('#file_sub_module').val(subModuleValue);
        $('#file_module_name').val(moduleName);
        let displaySubModuleName = subModuleName || "";


        $('#uploaded_to').text(`${teamName} | ${moduleName} | ${displaySubModuleName}`);
    });

    function toggleUploadButton() {
        const isDisabled = !teamValue || !moduleValue
        $('.create-folder-modal').prop('disabled', isDisabled);
    }

    toggleUploadButton();

    $('#team, #module, #sub_module').change(function () {
        teamValue = $('#team').val();
        teamName = $('#team option:selected').text();
        moduleName = $('#module option:selected').text();
        submoduleName = $('#sub_module option:selected').text();
        moduleValue = $('#module').val();
        subModuleValue = $('#sub_module').val();

        toggleUploadButton();

        Toastify({
            text: `Successfully selected : ${teamName || ''} | ${moduleName || ''} | ${submoduleName || ''}`,
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
    });

</script>

<script>

    filter();

    $('#team, #module, #sub_module').on('change', function () {
        filter();
    });

    function filter() {
        var team = $('#team').val();
        var module = $('#module').val();
        var sub_module = $('#sub_module').val();

        $.ajax({
            url: '<?php echo base_url('get_new_folders'); ?>',
            type: 'POST',
            data: {
                team: team,
                module: module,
                sub_module: sub_module
            },
            dataType: 'json',
            success: function (response) {
                var folderListHTML = '';
                $.each(response, function (index, folder) {
                    folderListHTML += `
                    <div class="col-xxl-2 col-6 folder-card">
                        <div class="card bg-light ribbon-box border" id="folder-` + index + `" onclick="openFolderModal('` + folder.name + `')" style="cursor: pointer">
                            <div class="card-body">
                                <div class="d-flex mb-1">
                                    <div class="form-check form-check-danger mb-3 fs-15 flex-grow-1">
                                        <input type="hidden" id="foldername" value="` + folder.name + `">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <div class="mb-2">
                                        <iconify-icon icon="material-symbols:folder-open"
                                            class="align-bottom text-warning fs-60"></iconify-icon>
                                    </div>
                                    <h6 class="fs-12 folder-name fw-bold">` + folder.name + `</h6>
                                </div>
                                <div class="hstack mt-3 text-muted">
                                    <span class="me-auto fs-6 ribbon-three ribbon-three-primary">
                                        <span><b>` + (folder.matched_files ? folder.matched_files.length : 0) + ` Files</b></span>
                                    </span>
                                    <span style="font-size: 11px">
                                        <b>` + (folder.size < 1024 * 1024 * 1024 ?
                                                (folder.size / (1024 * 1024)).toFixed(2) + ' MB' :
                                                (folder.size / (1024 * 1024 * 1024)).toFixed(2) + ' GB') + `</b>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>`;
                });
                $('#folderlist-data').html(folderListHTML);

                // Remove the click handler for the dropdown button
                // The entire card is now clickable, so no need for this handler anymore
                // $('.open-folder-btn').on('click', function () {
                //     var folderName = $(this).data('folder');
                //     openFolderModal(folderName);
                // });
            },
        });
    }

    function openFolderModal(folderName) {
        var team = $('#team').val();
        var module = $('#module').val();
        var sub_module = $('#sub_module').val();
        var business_unit = $('#buFilter').val();
        var department = $('#deptFilter').val();


        $.ajax({
            url: '<?php echo base_url('get_filter_options'); ?>',
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                var teamOptions = '<option value="">Select Team</option>';
                var moduleOptions = '<option value="">Select Module</option>';
                var buOptions = '<option value="">Select Business Unit</option>';

                response.teams.forEach(function (teamItem) {
                    teamOptions += `<option value="${teamItem.team_id}">${teamItem.team_name}</option>`;
                });
                response.modules.forEach(function (moduleItem) {
                    moduleOptions += `<option value="${moduleItem.mod_id}">${moduleItem.mod_name}</option>`;
                });
                response.bu.forEach(function (bunit) {
                    buOptions += `<option value="${bunit.bcode}">${bunit.business_unit}</option>`;
                });

                $('#teamFilter').html(teamOptions).val(team);
                $('#moduleFilter').html(moduleOptions).val(module);
                $('#buFilter').html(buOptions).val(business_unit);
                $('#departmentFilter').html(buOptions).val(department);
                $('#subModuleFilter').prop('disabled', true).html('<option value="">Select Submodule</option>');

                var subModules = response.sub_modules;
                if (module) {
                    var subModuleOptions = '<option value="">Select Submodule</option>';
                    subModules.forEach(function (subModuleItem) {
                        if (subModuleItem.mod_id === module) {
                            subModuleOptions += `<option value="${subModuleItem.sub_mod_id}">${subModuleItem.sub_mod_name}</option>`;
                        }
                    });
                    $('#subModuleFilter').html(subModuleOptions).prop('disabled', false).val(sub_module);
                }

                $('#moduleFilter').on('change', function () {
                    var selectedModuleId = $(this).val();
                    var subModuleOptions = '<option value="">Select Submodule</option>';

                    if (selectedModuleId) {
                        $('#subModuleFilter').prop('disabled', false);
                        subModules.forEach(function (subModuleItem) {
                            if (subModuleItem.mod_id === selectedModuleId) {
                                subModuleOptions += `<option value="${subModuleItem.sub_mod_id}">${subModuleItem.sub_mod_name}</option>`;
                            }
                        });
                    } else {
                        $('#subModuleFilter').prop('disabled', true);
                    }
                    $('#subModuleFilter').html(subModuleOptions).val('');
                });

                updateFolderModalContent(folderName, team, module, sub_module, business_unit, department);
                filter();
            }
        });
    }

    function updateFolderModalContent(folderName, team, module, sub_module, business_unit, department) {
        $.ajax({
            url: '<?php echo base_url('view_new_folder_modal'); ?>',
            type: 'GET',
            data: {
                folder_name: folderName,
                team: team,
                module: module,
                sub_module: sub_module,
                business_unit: business_unit,
                department: department
            },
            dataType: 'json',
            success: function (response) {
                var modalContent = '';
                if (response.matched_files && response.matched_files.length > 0) {
                    response.matched_files.forEach(function (file) {
                        var fileExtension = file.name.split('.').pop().toLowerCase();
                        var fileSize = formatFileSize(file.size);
                        var base_url = "<?= base_url() ?>";
                        modalContent += `
                    <div class="element-item col-xxl-2 col-xl-2 col-sm-6">
                        <div class="gallery-box card">
                            <div class="form-check form-check-danger flex-grow-1 mb-1">
                                <a class="form-check-input fs-15 text-danger" value=""><iconify-icon icon="tabler:xbox-x-filled" onclick="deleteFileNew('${folderName}', '${file.name}')"></iconify-icon></a>
                            </div>
                            <div class="gallery-container">
                                ${['jpg', 'jpeg', 'png', 'gif', 'jfif'].includes(fileExtension) ? `
                                    <a class="image-popup" href="${base_url}open_new_image/${folderName}/${file.name}" target="_blank" title="${file.name}">
                                        <img src="${base_url}open_new_image/${folderName}/${file.name}" style="width: 100%; height: 150px; background-size: cover; background-repeat: no-repeat !important;" alt="${file.name}" />
                                        <div class="gallery-overlay">
                                            <h5 class="overlay-caption fs-12">${file.name}</h5>
                                        </div>
                                        <span class=" text-muted" style="font-size: 10px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">${file.name}</span>
                                    </a>
                                ` : ''}

                                ${fileExtension === 'pdf' ? `
                                    <a class="image-popup" href="${base_url}open_new_pdf/${folderName}/${file.name}" target="_blank" title="${file.name}">
                                        <embed src="${base_url}open_new_pdf/${folderName}/${file.name}" type="application/pdf" style="width: 100%; height: 145px;" />
                                        <div class="gallery-overlay">
                                            <h5 class="overlay-caption fs-12">${file.name}</h5>
                                        </div>
                                <span class=" text-muted" style="font-size: 10px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">${file.name}</span>
                                    </a>
                                ` : ''}

                                ${fileExtension === 'txt' ? `
                                    <a href="${base_url}open_new_txt/${folderName}/${file.name}" target="_blank" title="${file.name}">
                                        <iframe src="${base_url}open_new_txt/${folderName}/${file.name}" style="width: 100%; height: 145px;"></iframe>
                                        <div class="gallery-overlay">
                                            <h5 class="overlay-caption fs-12">${file.name}</h5>
                                        </div>
                                        <span class=" text-muted" style="font-size: 10px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">${file.name}</span>
                                    </a>
                                ` : ''}

                                ${fileExtension === 'docx' ? `
                                    <a href="${base_url}open_new_docx/${folderName}/${file.name}" target="_blank" title="${file.name}">
                                        <iconify-icon icon="tabler:file-type-docx" class="align-bottom text-info" style="font-size: 150px;"></iconify-icon>
                                        <div class="gallery-overlay">
                                            <h5 class="overlay-caption fs-12">${file.name}</h5>
                                        </div>
                                        <span class="text-muted" style="font-size: 10px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                            ${file.name}
                                        </span>
                                    </a>
                                ` : ''}

                                ${fileExtension === 'xlsx' ? `
                                    <a href="${base_url}open_xlsx/${folderName}/${file.name}" title="${file.name}">
                                        <iconify-icon icon="ri:file-excel-2-line" class="align-bottom text-success" style="font-size: 150px;"></iconify-icon>
                                        <div class="gallery-overlay">
                                            <h5 class="overlay-caption fs-12">${file.name}</h5>
                                        </div>
                                        <span class="text-muted" style="font-size: 10px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                            ${file.name}
                                        </span>
                                    </a>
                                ` : ''}


                                ${fileExtension === 'csv' ? `
                                    <a href="${base_url}open_new_csv/${folderName}/${file.name}" target="_blank" title="${file.name}">
                                        <iconify-icon icon="ri:file-excel-2-line" class="align-bottom text-success" style="font-size: 150px;"></iconify-icon>
                                        <div class="gallery-overlay">
                                            <h5 class="overlay-caption fs-12">${file.name}</h5>
                                        </div>
                                    <span class=" text-muted" style="font-size: 10px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">${file.name}</span>
                                    </a>
                                ` : ''}

                                ${['mp3', 'wav', 'ogg'].includes(fileExtension) ? `
                                    <a href="${base_url}open_new_audio/${folderName}/${file.name}" target="_blank" title="${file.name}">
                                    <iconify-icon icon="ri:folder-music-fill" class="align-bottom text-center text-success" style="font-size: 130px;"></iconify-icon>
                                    <audio controls style="width: 100%; height: 10px;">
                                        <source src="${base_url}open_new_audio/${folderName}/${file.name}" type="audio/${fileExtension}">
                                        Your browser does not support the audio element.
                                    </audio>
                                        <span class=" text-muted" style="font-size: 10px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">${file.name}</span>
                                    </a>
                                ` : ''}
                            </div>
                                <div class="box-content">
                                    <div class="d-flex align-items-center mt-1 justify-content-center">
                                        <div class="flex-shrink-0">
                                            <div class="d-flex gap-3">
                                                <button type="button" class="btn btn-sm fs-10 btn-link text-body text-decoration-none px-0 shadow-none">
                                                    <iconify-icon icon="ri:numbers-fill"
                                                        class="text-muted align-bottom me-1 fs-12"></iconify-icon>
                                                    ${formatFileSize(file.size)}
                                                </button>
                                                <button type="button" class="btn btn-sm fs-10 btn-link text-body text-decoration-none px-0 shadow-none">
                                                    <iconify-icon icon="ri:time-fill"
                                                        class="text-muted align-bottom me-1 fs-12"></iconify-icon>
                                                    ${file.modified}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>`;
                    });
                } else {
                    modalContent = '<li class="list-group-item text-muted text-center">No files found in this directory.</li>';
                }
                $('#folderModalBody').html(modalContent);
                $('#folder_name').text(folderName + ' ' + 'FOLDER FILES');
                $('#folderModal').modal('show');
            },
        });
    }

    $('#teamFilter, #moduleFilter, #subModuleFilter, #buFilter, #deptFilter').on('change', function () {
        var folderName = $('#folder_name').text().split(' ')[0];
        var team = $('#teamFilter').val();
        var module = $('#moduleFilter').val();
        var sub_module = $('#subModuleFilter').val();
        var business_unit = $('#buFilter').val();
        var department = $('#deptFilter').val();
        updateFolderModalContent(folderName, team, module, sub_module, business_unit, department);
        filter();
    });



    function formatFileSize(bytes) {
        if (bytes < 1024) return bytes + ' B';
        else if (bytes < 1024 * 1024) return (bytes / 1024).toFixed(2) + ' KB';
        else if (bytes < 1024 * 1024 * 1024) return (bytes / (1024 * 1024)).toFixed(2) + ' MB';
        else return (bytes / (1024 * 1024 * 1024)).toFixed(2) + ' GB';
    }
</script>

<script src="<?php echo base_url(); ?>assets/js/filepond.js"></script>
<script src="<?php echo base_url(); ?>assets/js/filepond-plugin-image-preview.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/filepond-plugin-file-validate-size.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/filepond-plugin-image-exif-orientation.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/filepond-plugin-file-encode.min.js"></script>

<script>
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
            const team              = document.querySelector('#file_team').value;
            const module            = document.querySelector('#file_module').value;
            const moduleName        = document.querySelector('#file_module_name').value;
            const sub_module        = document.querySelector('#file_sub_module').value;
            const business_unit     = document.querySelector('#business_unitFilter').value;
            const department        = document.querySelector('#departmentFilter').value;
            const isr               = document.querySelector('#isrSearch').value;

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
                    formData.append('file_team', team);
                    formData.append('file_module', module);
                    formData.append('file_module_name', moduleName);
                    formData.append('file_sub_module', sub_module);
                    formData.append('business_unit', business_unit);
                    formData.append('department', department);
                    formData.append('isr', isr);

                    const pond = FilePond.find(document.querySelector(".filepond-input-multiple"));
                    const files = pond.getFiles();

                    if (files.length === 0) {
                        Toastify({
                            text: `No files were selected`,
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
                        url: '<?php echo base_url('upload_new_files'); ?>',
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
                                $('#file_upload').modal('hide');
                                const pond = FilePond.find(document.querySelector(".filepond-input-multiple"));
                                if (pond) {
                                    pond.removeFiles();
                                }
                                document.getElementById('uploadForm').reset(); 
                                $('#directory').val('').trigger('change');
                                $('#business_unitFilter').val('').trigger('change');
                                $('#departmentFilter').val('').trigger('change');
                                filter();
                                updateNotificationCount();
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
                                        $('#file_upload').modal('hide');
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
                                                    url: '<?php echo base_url('upload_new_files'); ?>',
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
                                                            $('#file_upload').modal('hide');
                                                            const pond = FilePond.find(document.querySelector(".filepond-input-multiple"));
                                                            if (pond) {
                                                                pond.removeFiles();
                                                            }
                                                            document.getElementById('uploadForm').reset(); 
                                                            $('#directory').val('').trigger('change');
                                                            $('#business_unitFilter').val('').trigger('change');
                                                            $('#departmentFilter').val('').trigger('change');
                                                            filter();
                                                            updateNotificationCount();
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
                                                    },
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

    function deleteFileNew(folderName, fileName) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You want to delete this file?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?php echo base_url('delete_file_new'); ?>',
                    type: 'POST',
                    data: {
                        folder_name: folderName,
                        file_name: fileName
                    },
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
                            Toastify({
                                text: `Successfully deleted`,
                                duration: 5000,
                                gravity: "top",
                                position: "left",
                                stopOnFocus: true,
                                close: true,
                                style: {
                                    background: "linear-gradient(to right, #ff5f6d, #ffc371)",
                                },
                            }).showToast();
                            openFolderModal(folderName);
                            filter();
                            updateNotificationCount();
                        } else {
                            Toastify({
                                text: response.error,
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


    $(document).ready(function () {
        flatpickr("#date_request", {
            dateFormat: "F j, Y"
        });
        $('#business_unit').select2({
            placeholder: "Select Business Unit",
            allowClear: true,
            minimumResultsForSearch: Infinity
        });

        $.ajax({
            url: '<?php echo base_url('business_unit') ?>',
            type: 'POST',
            success: function (response) {
                buData = JSON.parse(response);
                $('#business_unit').empty().append('<option value="">Select Business Unit</option>');
                buData.forEach(function (bu) {
                    $('#business_unit').append('<option value="' + bu.bcode + '">' + bu.business_unit + '</option>');
                });
            }
        });
    });


    function add_new_module() {
        var mod_name        = $('#mod_name').val();
        var mod_abbr        = $('#mod_abbr').val();
        var typeofsystem    = "new";
        var date_request    = $('#date_request').val();
        var bcode           = $('#business_unit').val();
        var business_unit   = $('#business_unit option:selected').text();
        if (mod_name === "" || mod_abbr === "" || date_request === "" || business_unit === "") {
            Toastify({
                text: `Please fill up all the required fields`,
                duration: 5000,
                gravity: "top",
                position: "left",
                stopOnFocus: true,
                close: true,
                style: {
                    background: "linear-gradient(to right, #ff5f6d, #ffc371)",
                },
            }).showToast();

            if (mod_name === "") {
                $('#mod_name').addClass('is-invalid');
            }
            if (mod_abbr === "") {
                $('#mod_abbr').addClass('is-invalid');
            }
            if (date_request === "") {
                $('#date_request').addClass('is-invalid');
            }

            return;
        }

        var data = {
            mod_name: mod_name,
            mod_abbr: mod_abbr,
            typeofsystem: typeofsystem,
            date_request: date_request,
            bcode: bcode,
            business_unit: business_unit 
        };

        Swal.fire({
            title: 'Are you sure?',
            text: 'You want to add new module?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, add it!',
            cancelButtonText: 'No, cancel!',
        }).then(function (result) {
            if (result.isConfirmed) {
                $('#add_new_system').modal('hide');
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
                        data.manager_key = keyResult.value;

                        $.ajax({
                            url: '<?php echo base_url('add_new_module'); ?>',
                            type: 'POST',
                            data: data,
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
                                    $('#add_new_system').modal('hide');
                                    filter();
                                    loadModule();
                                } else {
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
                                }
                            },
                        });
                    }
                });
            }
        });
    }

</script>

<script>
    $(document).ready(function () {
        $('#directory').change(function () {
            if ($(this).val() === 'ISR') {
                $('#isrSearchDiv').show();
                $('#business_unitFilter, #departmentFilter, #fileUpload, #uploadBtn').prop('disabled', true);
            } else {
                $('#isrSearchDiv').hide();
                $('#business_unitFilter, #departmentFilter, #fileUpload, #uploadBtn').prop('disabled', false);
            }
        });

        $('#searchISR').click(function () {
            let requestNumber = $('#isrSearch').val();
            if (!requestNumber) {
                Toastify({
                    text:'Please enter ISR Request Number.',
                    duration: 5000,
                    gravity: "top",
                    position: "left",
                    stopOnFocus: true,
                    close: true,
                    style: {
                        background: "linear-gradient(to right, #ff5f6d, #ffc371)",
                    },
                }).showToast();
                $('#isrSearch').addClass('is-invalid');
                return;
            }
            $.ajax({
                url: '<?php echo base_url('get_isr_request'); ?>',
                type: 'POST',
                data: { requestnumber: requestNumber },
                dataType: 'json',
                success: function (response) {
                    if (response.length > 0) {
                        Toastify({
                            text:'ISR Request Number found.',
                            duration: 5000,
                            gravity: "top",
                            position: "left",
                            stopOnFocus: true,
                            close: true,
                            style: {
                                background: "linear-gradient(to right, #ff5f6d, #ffc371)",
                            },
                        }).showToast();
                        $('#business_unitFilter, #departmentFilter, #fileUpload, #uploadBtn').prop('disabled', false);
                    } else {
                        Toastify({
                            text:'ISR Request Number not found | Not yet approved.',
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
                },
            });
        });
        $('#isrSearch').on('input', function () {
            if ($(this).val() === '') {
                $('#business_unitFilter, #departmentFilter, #fileUpload, #uploadBtn').prop('disabled', true);
            }
        });
    });

</script>