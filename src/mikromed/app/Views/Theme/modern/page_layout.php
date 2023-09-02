 <?= $this->include('Theme/modern/partials/main') ?>

<head>

    <?= $this->include('Theme/modern/partials/head-css') ?>


</head>

<body>
    <!-- Begin page -->
    <div id="layout-wrapper">

        
        <?= $this->include('Theme/modern/partials/topbar'); ?>
        <?= $this->include('Theme/modern/partials/sidebar'); ?>
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <?= $this->renderSection('content') ?>

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            <?= $this->include('Theme/modern/partials/footer') ?>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->


    <?= $this->include('Theme/modern/partials/vendor-scripts') ?>

    <!-- App js -->
    <script src="/assets/js/app.js"></script>

</body>
</body>

</html>