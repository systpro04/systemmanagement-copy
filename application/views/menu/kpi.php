

<div class="container kpi-section">
    <h2 class="fw-bold text-center">List of Key Performance Indicator (KPI)</h2>

    <div class="row justify-content-center mt-5">
        <?php foreach ($kpiData as $type => $kpis): ?>
            <div class="col-md-4 d-flex flex-column align-items-center kpi-item">
            <?php
                if ($type == 'RMS') {
                    $type = 'Record Management System';
                }
                ?>
                <div class="kpi-icon <?php echo $type == 'System Analyst' ? 'bg-primary' : ($type == 'Programmer' ? 'bg-success' : 'bg-warning'); ?>">
                    <iconify-icon icon="<?php echo $type == 'System Analyst' ? 'solar:laptop-minimalistic-bold-duotone' : ($type == 'Programmer' ? 'solar:code-circle-bold-duotone' : 'solar:siderbar-bold-duotone'); ?>"></iconify-icon>
                </div>
                <h4 class="kpi-header mt-1 mb-3 fs-15"><?php echo $type; ?>'s KPI</h4>

                <?php foreach ($kpis as $kpi): ?>
                    <div class="kpi-description">
                        <p class="fw-bold"><i class="ri-checkbox-circle-fill text-success"></i> <?php echo $kpi->title; ?></p>
                        <p><?php echo $kpi->description; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>