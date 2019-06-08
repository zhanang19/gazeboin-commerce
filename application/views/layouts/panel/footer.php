<?php
/**
 * Created by PhpStorm.
 * User: zhanang19
 * Date: 10/05/2019
 * Time: 19:40
 * Project: e-commerce
 */
?>

            <footer class="footer">
                <div class="container-fluid">
                    <nav class="float-left">
                        <ul>
                            <li>
                                <a href="<?= base_url('page/about-us') ?>">About Us</a>
                            </li>
                            <li>
                                <a href="https://bigcastle.id" target="_blank">Bikin Website Murah</a>
                            </li>
                            <li>
                                <a href="https://gazeboin.com" target="_blank">Tryout Online</a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright float-right">
                        &copy; <script>document.write(new Date().getFullYear())</script> made with <i class="material-icons text-danger">favorite</i> by
                        <a href="https://gazeboin.com" target="_blank">Gazeboin.com</a>.
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!--   Core JS Files   -->
    <script src="<?= base_url('assets/js/core/popper.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/core/bootstrap-material-design.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/plugins/perfect-scrollbar.jquery.min.js') ?>"></script>
    <!-- Plugin for the momentJs  -->
    <script src="<?= base_url('assets/js/plugins/moment.min.js') ?>"></script>
    <!--  Plugin for Sweet Alert -->
    <script src="<?= base_url('assets/js/plugins/sweetalert2.js') ?>"></script>
    <!-- Forms Validations Plugin -->
    <script src="<?= base_url('assets/js/plugins/jquery.validate.min.js') ?>"></script>
    <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
    <script src="<?= base_url('assets/js/plugins/jquery.bootstrap-wizard.js') ?>"></script>
    <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
    <script src="<?= base_url('assets/js/plugins/bootstrap-selectpicker.js') ?>"></script>
    <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
    <script src="<?= base_url('assets/js/plugins/bootstrap-datetimepicker.min.js') ?>"></script>
    <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
    <script src="<?= base_url('assets/js/plugins/jquery.dataTables.min.js') ?>"></script>
    <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
    <script src="<?= base_url('assets/js/plugins/bootstrap-tagsinput.js') ?>"></script>
    <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="<?= base_url('assets/js/plugins/jasny-bootstrap.min.js') ?>"></script>
    <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
    <script src="<?= base_url('assets/js/plugins/fullcalendar.min.js') ?>"></script>
    <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
    <script src="<?= base_url('assets/js/plugins/jquery-jvectormap.js') ?>"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="<?= base_url('assets/js/plugins/nouislider.min.js') ?>"></script>
    <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <!-- Library for adding dinamically elements -->
    <script src="<?= base_url('assets/js/plugins/arrive.min.js') ?>"></script>
    <!-- Chartist JS -->
    <script src="<?= base_url('assets/js/plugins/chartist.min.js') ?>"></script>
    <!--  Notifications Plugin    -->
    <script src="<?= base_url('assets/js/plugins/bootstrap-notify.js') ?>"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?= base_url('assets/js/material-dashboard.js') ?>"></script>
    
    <script>
        $(function () {
            md.initFormExtendedDatetimepickers();
        });
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <?php get_flashdata() ?>    
</body>

</html>
