<?php if($this->session->userdata('position') != 'Programmer') : ?>
<div class="modal fade" id="meeting_modal" tabindex="-1" aria-labelledby="meeting_modal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content border-0">
            <div class="modal-header p-3 bg-info-subtle">
                <h5 class="modal-title" id="modal-title">Add Meeting</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body p-4">
                <form id="meeting-form">
                    <div class="row event-form">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Team Name</label>
                                <select class="form-select mb-3" id="team">
                                    <option></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="module">Module</label>
                                <select class="form-select mb-3" id="module">
                                    <option></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label>Meeting Date </label>
                                <div class="input-group">
                                    <input type="date" id="meeting_date" class="form-control" readonly="" placeholder="Select date"
                                    data-provider="flatpickr" />
                                    <span class="input-group-text"><i class="ri-calendar-event-line"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label>Start Time</label>
                                <div class="input-group">
                                    <input type="time" id="time" class="form-control" readonly="" placeholder="Select Time" value=" "/>
                                    <span class="input-group-text"><i class="ri-time-line"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Location</label>
                                <input id="location" type="text" class="form-control" placeholder="Location"/>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Reason</label>
                                <textarea class="form-control" id="reasons" placeholder="Reason" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="hstack gap-2 justify-content-end">
                        <button type="submit" class="btn btn-success">Add Meeting</button>
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal"> Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<div class="modal fade" id="edit_meeting_modal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="modal-header p-3 bg-info-subtle">
                <h5 class="modal-title" id="modal-title">Scheduled Meeting | Edit Meeting</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body p-4">
                <?php if($this->session->userdata('position') != 'Programmer') : ?>
                <div class="text-end">
                    <a href="#" class="btn btn-sm btn-soft-primary" id="edit-event-btn" data-id="edit-event" onclick="editEvent(this)" role="button">Edit </a>
                </div>
                <?php endif; ?>
                <div class="event-details" id="event-details">
                    <div class="d-flex mb-2">
                        <div class="flex-grow-1 d-flex align-items-center">
                            <div class="flex-shrink-0 me-3">
                                <i class="ri-calendar-event-line text-muted fs-16"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="d-block fw-semibold mb-0" id="edit_team_preview"></h6>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <div class="flex-shrink-0 me-3">
                            <i class="ri-time-line text-muted fs-16"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="d-block fw-semibold mb-0"><span id="edit_time_preview"></span></h6>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <div class="flex-shrink-0 me-3">
                            <i class="ri-map-pin-line text-muted fs-16"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="d-block fw-semibold mb-0"> <span id="edit_location_preview"></span></h6>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <div class="flex-shrink-0 me-3">
                            <i class="ri-discuss-line text-muted fs-16"></i>
                        </div>
                        <div class="flex-grow-1">
                            <p class="d-block text-muted mb-0" id="edit_reason_preview" />
                        </div>
                    </div>
                </div>
                <form id="edit_meeting-form">
                    <div class="row event-form" id="event-form" style="display: none;">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Team Name</label>
                                <select class="form-select mb-3" id="edit_team">
                                    <option></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="module">Module</label>
                                <select class="form-select mb-3" id="edit_module">
                                    <option></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label>Meeting Date </label>
                                <div class="input-group">
                                    <input type="date" id="edit_meeting_date" class="form-control" data-provider="flatpickr"  placeholder="Select date" readonly="" />
                                    <span class="input-group-text"><i class="ri-calendar-event-line"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label>Start Time</label>
                                <div class="input-group">
                                    <input type="time" id="edit_time" class="form-control" data-provider="flatpickr"
                                        placeholder="Select Time" readonly="" />
                                    <span class="input-group-text"><i class="ri-time-line"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Location</label>
                                <input id="edit_location" type="text" class="form-control" placeholder="Location"/>
                                <input id="edit_id" type="hidden" class="hidden form-control" placeholder="Id"/>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Reason</label>
                                <textarea class="form-control" id="edit_reasons" placeholder="Reason" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <?php if($this->session->userdata('position') != 'Programmer') : ?>
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-soft-danger" id="delete-event-btn"><i class="ri-close-line align-bottom"></i> Delete</button>
                        <button type="button" class="btn btn-soft-info" id="update-meeting-btn"> Update</button>
                    </div>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Meeting Setup </h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Meetimg </a></li>
                        <li class="breadcrumb-item active">Index<i class="mdi mdi-alpha-x-circle:"></i></li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-xl-3">
                    <?php if($this->session->userdata('position') != 'Programmer') : ?>
                    <div class="card card-h-100">
                        <div class="card-body">
                            <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#meeting_modal"><i class="mdi mdi-plus"></i>  New Schedule | Meeting</button>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="card shadow-none">
                        <div class="card-body bg-info-subtle rounded">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <i data-feather="calendar" class="text-info icon-dual-info"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="fs-15 fw-bold">Upcoming Meetings | Schedules </h6>
                                    <p class="text-muted mb-0">Please be notified for any scheduled events.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="pe-2 me-n1 mb-3" data-simplebar="" style="height: 430px">
                            <div id="upcoming-event-list"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9">
                    <div class="card card-h-100">
                        <div class="card-body">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div style='clear:both'></div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#team, #edit_team').select2({ placeholder: 'Select Team', allowClear: true, minimumResultsForSearch: Infinity });
        $('#module, #edit_module').select2({ placeholder: 'Module Name | System', allowClear: true, minimumResultsForSearch: Infinity });
    });
    $(document).ready(function () {
        $.ajax({
            url: '<?php echo base_url('get_team') ?>',
            type: 'POST',
            success: function (response) {
                teamData = JSON.parse(response);
                $('#team, #edit_team').empty().append('<option value="">Select Team Name</option>');
                teamData.forEach(function (team) {
                    $('#team, #edit_team').append('<option value="' + team.team_id + '">' + team.team_name + '</option>');
                });
            }
        });

        $.ajax({
            url: '<?php echo base_url('setup_module') ?>',
            type: 'POST',
            success: function (response) {
                moduleData = JSON.parse(response);
                $('#module, #edit_module').empty().append('<option value="">Select Module Name</option>');
                moduleData.forEach(function (module) {
                    $('#module, #edit_module').append('<option value="' + module.mod_id + '">' + module.mod_name + '</option>');
                });
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
        flatpickr("#time, #edit_time", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "h:i K",
            time_24hr: false,
        });
        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        var calendar = new FullCalendar.Calendar(document.getElementById('calendar'), {
            initialView: 'multiMonthYear',
            selectable: true,
            editable: false,
            timeZone: "local",
            droppable: false,
            navLinks: true,
            themeSystem: "bootstrap5",
            headerToolbar: {
                left: "prev,next today",
                center: "title",
                right: "multiMonthYear,dayGridMonth,listMonth",
            },
            events: function (fetchInfo, successCallback, failureCallback) {
                $.ajax({
                    url: '<?= base_url('get_meeting') ?>',
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        if (data && Array.isArray(data)) {
                            data.forEach(function(event) {
                                event.backgroundColor = getRandomColor();
                                event.borderColor = event.backgroundColor;
                            });
                            successCallback(data);
                        } else {
                            console.error("Unexpected data format:", data);
                            failureCallback();
                        }
                    },
                });
            },
            eventClick: function (info) {

                $('#edit_meeting_modal').modal('show');
                $('#edit_team_preview').text(info.event.extendedProps.team_name);
                $('#edit_time_preview').text(info.event.extendedProps.time);
                $('#edit_location_preview').text(info.event.extendedProps.location);
                $('#edit_reason_preview').text(info.event.extendedProps.reasons);
                $('#event-details').show();
                $('.fc-popover').remove();


                $('#event-form').hide();
                $('#edit_team').val(info.event.extendedProps.team_id).trigger('change');
                $('#edit_module').val(info.event.extendedProps.mod_id).trigger('change');
                var localDate = new Date(info.event.start);
                localDate.setMinutes(localDate.getMinutes() - localDate.getTimezoneOffset());
                $('#edit_meeting_date').val(localDate.toISOString().slice(0, 10));
                $('#edit_time').val(info.event.extendedProps.time);
                $('#edit_location').val(info.event.extendedProps.location);
                $('#edit_reasons').val(info.event.extendedProps.reasons);
                $('#edit_id').val(info.event.extendedProps.id);


                $('#edit-event-btn').text("Edit").show();
                $('#update-meeting-btn').hide();
                $('#delete-event-btn').show();
                $('#edit-event-btn').data('event', info.event);


            },
            eventDidMount: function (info) {
                var color = info.event.backgroundColor;
                info.el.style.backgroundColor = color;
                info.el.style.borderColor = color;
                info.el.style.color = 'white';
                var time = info.event.extendedProps.time;
                var timeElement = info.el.querySelector('.fc-list-event-time');
                if (timeElement) {
                    timeElement.textContent = time;
                }

            },
            dateClick: function (info) {
                var dayOfWeek = info.date.getDay();
                if (dayOfWeek === 6 || dayOfWeek === 0) {
                    return;
                }
                $('#meeting_date').val(info.dateStr);
                $('#meeting_modal').modal('show');
            },
        });
        calendar.render();
        $('#edit-event-btn').click(function () {
            var event = $(this).data('event');

            if ($(this).text() === "Cancel") {
                $('#event-details').show();
                $('#event-form').hide();
                $('#update-meeting-btn').hide();
                $('#delete-event-btn').show();
                $(this).text("Edit");
            } else {
                $('#event-details').hide();
                $('#event-form').show();
                $('#update-meeting-btn').show();
                $('#delete-event-btn').show();
                $(this).text("Cancel");
            }
        });

        $('#meeting_modal').on('submit', 'form', function (e) {
            e.preventDefault();
            var team_id     = $(this).find('#team').val();
            var team_name   = $(this).find('#team option:selected').text();
            var mod_id      = $(this).find('#module').val();
            var date        = $(this).find('#meeting_date').val();
            var time        = $(this).find('#time').val();
            var location    = $(this).find('#location').val();
            var reasons     = $(this).find('#reasons').val();
            
            var eventData = {
                team_id:        team_id,
                team_name:      team_name,
                mod_id:         mod_id,
                date_meeting:   date,
                time:           time,
                location:       location,
                reasons:        reasons,
            };
            if(team_id == "" || mod_id == "" || date == "" || time == "" || location == "" || reasons == "") {
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
                return ;
            }
            calendar.addEvent(eventData);
            Swal.fire({
                title: 'Are you sure?',
                text: 'You want to add this data?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, add it!',
                cancelButtonText: 'No, cancel!',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '<?= base_url('add_meeting') ?>',
                        type: 'POST',
                        data: eventData,
                        success: function (response) {
                            Toastify({
                                text: `Meeting schedule added successfully.`,
                                duration: 5000,
                                gravity: "top",
                                position: "left",
                                stopOnFocus: true,
                                close: true,
                                style: {
                                    background: "linear-gradient(to right, #ff5f6d, #ffc371)",
                                },
                            }).showToast();
                            calendar.addEvent(eventData);
                            calendar.refetchEvents();
                            $('#meeting_modal').modal('hide');
                            loadUpcomingEvents();
                        },
                    });
                }
            });
        });

        $('#delete-event-btn').click(function () {
            var id          = $('#edit_id').val();
            var deleteData = {
                id:             id,
            };
            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you really want to delete this event?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, keep it',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '<?= base_url('delete_meeting') ?>',
                        type: 'POST',
                        data: deleteData,
                        success: function (response) {
                            Toastify({
                                text: `Meeting schedule deleted successfully.`,
                                duration: 5000,
                                gravity: "top",
                                position: "left",
                                stopOnFocus: true,
                                close: true,
                                style: {
                                    background: "linear-gradient(to right, #ff5f6d, #ffc371)",
                                },
                            }).showToast();
                            calendar.addEvent(deleteData);
                            calendar.refetchEvents();
                            $('#edit_meeting_modal').modal('hide');
                        }
                    });
                }
            });
        });

        $('#update-meeting-btn').click(function () {
            var id          = $('#edit_id').val();
            var team_id     = $('#edit_team').val();
            var team_name   = $('#edit_team option:selected').text();
            var mod_id      = $('#edit_module').val();
            var date        = $('#edit_meeting_date').val();
            var time        = $('#edit_time').val();
            var location    = $('#edit_location').val();
            var reasons     = $('#edit_reasons').val();
            
            var updateData = {
                id:             id,
                team_id:        team_id,
                team_name:      team_name,
                mod_id:         mod_id,
                date_meeting:   date,
                time:           time,
                location:       location,
                reasons:        reasons,
            };
            calendar.addEvent(updateData);
            Swal.fire({
                title: 'Are you sure?',
                text: 'You want to update this schedule?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, update it!',
                cancelButtonText: 'No, cancel!',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '<?= base_url('update_meeting') ?>',
                        type: 'POST',
                        data: updateData,
                        success: function (response) {
                            Toastify({
                                text: `Meeting schedule updated successfully.`,
                                duration: 5000,
                                gravity: "top",
                                position: "left",
                                stopOnFocus: true,
                                close: true,
                                style: {
                                    background: "linear-gradient(to right, #ff5f6d, #ffc371)",
                                },
                            }).showToast();
                            calendar.addEvent(updateData);
                            calendar.refetchEvents();
                            $('#edit_meeting_modal').modal('hide');
                        },
                    });
                }
            });
        });
    });

    function editEvent(button) {
        $('.event-details').hide();
        $('.event-form').show();
    }

    function loadUpcomingEvents() {
        $.ajax({
            url: '<?= base_url("get_upcoming_meetings") ?>',
            type: 'GET',
            dataType: 'json',
            success: function (events) {
                var eventList = $('#upcoming-event-list');
                eventList.empty();
                if (events.length === 0) {
                    eventList.append(`
                        <li class="list-group-item ps-0 text-center text-muted">
                            No Upcoming Meetings Available
                        </li>
                    `);
                } else {
                    events.forEach(function (event) {
                        var eventHTML = `
                            <div class='card mb-3'>
                                <div class='card-body'>
                                    <div class='d-flex mb-3'>
                                        <div class='flex-grow-1'><i class='mdi mdi-checkbox-blank-circle me-2 text-warning'></i>
                                            <span class='fw-bold fs-11'>${new Date(event.date_meeting).toLocaleDateString('en-GB', { day: 'numeric', month: 'long', year: 'numeric' })}</span>
                                        </div>
                                        <div class='flex-shrink-0'>
                                            <small class='badge bg-primary-subtle text-primary ms-auto'>${event.time}</small>                         
                                        </div> 
                                    </div>                                
                                        <h6 class='card-title fs-16'></h6>
                                        <p class='text-muted text-truncate-two-lines mb-0'>${event.team_name}</p>
                                </div>             
                            </div>
                        `;
                        eventList.append(eventHTML);
                    });
                }
            },
        });
    }
    loadUpcomingEvents();
</script>
