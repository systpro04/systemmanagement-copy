<div class="row project-wrapper">
    <div class="col-xxl-8">
        <div class="row">
            <div class="col-xl-4">
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-primary rounded-2 fs-2">
                                    <iconify-icon icon="logos:codersrank-icon" class="fs-25"></iconify-icon>
                                </span>
                            </div>
                            <div class="flex-grow-1 overflow-hidden ms-3">
                                <p class="text-uppercase fw-bold text-muted text-truncate mb-3">SYSTEM PROGRAMMERS </p>
                                <div class="d-flex align-items-center mb-3">
                                    <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value" data-target="<?php echo $programmers_count; ?>"></span></h4>
                                </div>
                                <p class="text-muted text-truncate mb-0 fs-6">Active Programmers </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4">
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-warning rounded-2 fs-2">
                                <iconify-icon icon="ix:analyze" class="fs-35"></iconify-icon>
                                </span>
                            </div>
                            <div class="flex-grow-1 overflow-hidden ms-3">
                                <p class="text-uppercase fw-bold text-muted text-truncate mb-3">SYSTEM ANALYSTS </p>
                                <div class="d-flex align-items-center mb-3">
                                    <h4 class="fs-4 flex-grow-1 mb-0 text-end"><span class="counter-value" data-target="<?php echo $analysts_count; ?>"></span></h4>
                                </div>
                                <p class="text-muted text-truncate mb-0 fs-6">Active Analysts </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4">
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-success rounded-2 fs-2">
                                <iconify-icon icon="devicon:xcode" class="fs-35"></iconify-icon>
                                </span>
                            </div>
                            <div class="flex-grow-1 overflow-hidden ms-3">
                                <p class="text-uppercase fw-bold text-muted text-truncate mb-3">
                                    RMS TEAM </p>
                                <div class="d-flex align-items-center mb-3">
                                    <h4 class="fs-4 flex-grow-1 mb-0 text-end"><span class="counter-value" data-target="<?php echo $others_count; ?>"></span> </h4>
                                </div>
                                <p class="text-muted text-truncate mb-0 fs-6">Active Rms </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card card-height-100">
                    <div class="card-header align-items-center d-flex ">
                        <h4 class="card-title mb-0 flex-grow-1 fw-bold">Upcoming Meeting Schedules </h4>
                    </div>
                    <div class="card-body pt-0" data-simplebar style="max-height: 500px;">
                        <ul id="upcoming-event-list" class="list-group list-group-flush border-dashed"></ul>
                    </div>
                </div>
            </div>
            <!-- <div class="col-xl-6">
                <div class="card card-height-100">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Upcoming Meeting Schedules </h4>
                    </div>
                    <div class="card-body pt-0" data-simplebar style="max-height: 500px;">
                        <ul id="upcoming-event-list" class="list-group list-group-flush border-dashed"></ul>
                    </div>
                </div>
            </div> -->
        </div>

    </div>
    <!-- Toast -->

    <div class="col-xxl-4">
        <div class="card" >
            <div class="card-header border-0">
                <h6 class="card-title mb-0 fw-bold">Upcoming Birthdays</h6>
            </div>
            <div class="card-body pt-0">
                <div class="upcoming-scheduled">
                    <input type="text" id="birthday-calendar" class="form-control" data-provider="flatpickr" data-inline-date="true" />
                </div>
                <hr>
                <div class="card mt-3">
                    <div class="card-header">
                        <h6 class="card-title mb-0 text-uppercase text-muted fw-bold"><iconify-icon icon="twemoji:birthday-cake" ></iconify-icon>&nbsp;&nbsp; Birthday List : </h6>
                    </div>
                    <div class="card-body" data-simplebar style="max-height: 350px;">
                        <div id="birthday-list"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<script>
$(document).ready(function () {
    const calendarElement = document.getElementById('birthday-calendar');
    const birthdayList = $('#birthday-list');
    const currentDate = new Date();

    function update_birthdays(month, year) {
        $.ajax({
            url: "<?php echo base_url('get_birthdays'); ?>",
            type: "GET",
            data: { month: month, year: year },
            dataType: "json",
            success: function (response) {
                birthdayList.empty();
                let todayBirthdays = []; // To store birthdays for today

                if (response.status === 'success' && response.data.length > 0) {
                    const birthdayDates = [];

                    response.data.forEach((birthday) => {
                        const birthDate = new Date(birthday.birthdate);
                        birthdayDates.push(birthDate.getDate());

                        const formattedDate = birthDate.toLocaleDateString('en-US', {
                            year: 'numeric',
                            month: 'long',
                            day: 'numeric',
                        });
                        let age = year - birthDate.getFullYear();
                        const isBeforeBirthday =
                            currentDate.getMonth() + 1 < month ||
                            (currentDate.getMonth() + 1 === month &&
                                currentDate.getDate() < birthDate.getDate());
                        if (isBeforeBirthday) {
                            age--;
                        }

                        if (
                            birthDate.getDate() === currentDate.getDate() &&
                            birthDate.getMonth() === currentDate.getMonth()
                        ) {
                            todayBirthdays.push(`${birthday.firstname} ${birthday.lastname}`);
                        }

                        const birthdayHTML = `
                            <div class="mini-stats-wid d-flex align-items-center mt-2">
                                <div class="flex-shrink-0 avatar-sm">
                                    <span class="mini-stat-icon avatar-title rounded-circle text-danger bg-danger-subtle fs-4">
                                        ${birthDate.getDate()}
                                    </span>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1 fw-bold">${birthday.firstname} ${birthday.lastname}</h6>
                                    <p class="text-muted mb-0 fs-11">${formattedDate}</p>
                                </div>
                                <div class="flex-shrink-0">
                                    <p class="text-muted mb-0">Age: <span class="text-uppercase fw-bold">${age}</span></p>
                                </div>
                            </div>`;
                        birthdayList.append(birthdayHTML);
                    });
                    if (todayBirthdays.length > 0) {
                        const toastMessage = `🎉 Happy Birthday to ${todayBirthdays.join(', ')}! 🎂`;
                        Toastify({
                            text: toastMessage,
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

                    updateCalendar(birthdayDates, month, year, response.data);
                }
            },
        });
    }

    function updateCalendar(birthdayDates, month, year, birthdayData) {
        const calendarInstance = calendarElement._flatpickr;
        if (calendarInstance) {
            calendarInstance.set('disable', [
                function (date) {
                    return !(date.getMonth() === month - 1 && birthdayDates.includes(date.getDate()));
                },
            ]);
            calendarInstance.set('onDayCreate', function (dObj, dStr, fp, dayElem) {
                const day = parseInt(dayElem.innerText);
                if (dayElem.classList.contains('prevMonthDay') || dayElem.classList.contains('nextMonthDay')) {
                    return;
                }
                if (birthdayDates.includes(day)) {
                    dayElem.classList.add('highlighted-day');
                    const birthdaysOnDay = birthdayData.filter(b => {
                        const birthDate = new Date(b.birthdate);
                        return birthDate.getDate() === day && birthDate.getMonth() + 1 === month;
                    });
                    const tooltipContent = birthdaysOnDay.map(person => `${person.lastname}, ${person.firstname}`).join('<br>');
                    dayElem.setAttribute('data-bs-toggle', 'tooltip');
                    dayElem.setAttribute('data-bs-placement', 'top');
                    dayElem.setAttribute('data-bs-html', 'true');
                    dayElem.setAttribute('title', tooltipContent);
                    dayElem.addEventListener('click', (event) => {
                        event.preventDefault();
                        event.stopPropagation();
                        calendarInstance.close();
                    });
                }
            });
            const tooltipElements = document.querySelectorAll('[data-bs-toggle="tooltip"]');
            tooltipElements.forEach(dayElem => {
                new bootstrap.Tooltip(dayElem);
            });
        }
    }


    const flatpickrInstance = flatpickr(calendarElement, {
        defaultDate: currentDate,
        inline: true,
        onMonthChange: function (selectedDates, dateStr, instance) {
            const newMonth = instance.currentMonth + 1;
            const newYear = instance.currentYear;
            update_birthdays(newMonth, newYear);
        },
        onYearChange: function (selectedDates, dateStr, instance) {
            const newMonth = instance.currentMonth + 1;
            const newYear = instance.currentYear;
            update_birthdays(newMonth, newYear);
        },
        onReady: function () {
            update_birthdays(currentDate.getMonth() + 1, currentDate.getFullYear());
        },
    });

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
                            <li class="list-group-item ps-0">
                                <a href="<?php echo base_url('meeting_schedule'); ?>" class="d-block text-decoration-none">
                                    <div class="row align-items-center g-3">
                                        <div class="col-auto">
                                            <div class="avatar-sm p-1 py-2 h-auto bg-light rounded-3 shadow">
                                                <div class="text-center">
                                                    <h5 class="mb-0 fw-bold text-info">${new Date(event.date_meeting).getDate()}</h5>
                                                    <div class="text-muted">${new Date(event.date_meeting).toLocaleString('en-GB', { weekday: 'short' })}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <h5 class="text-muted mt-0 mb-1 fs-12">${event.time}</h5>
                                            <p class="fs-14 mb-0">${event.reasons}</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        `;
                        eventList.append(eventHTML);
                    });
                }
            },
        });
    }

    loadUpcomingEvents();
});
</script>

<style>
    .highlighted-day {
        background-color: #ff0000;
        color: #ffffff;
        border-radius: 50%;
        font-weight: bold;
    }

    .today{
        background-color: #000000 !important;
        color: white !important;
    }
</style>