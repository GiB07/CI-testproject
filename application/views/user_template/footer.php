        <!-- <footer class="footer">
            © 2018 Elegent Admin by wrappixel.com
        </footer> -->
    </div>
    

    <!-- <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script> -->
    <script src="<?php echo base_url('assets/bootstrap5/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/dataTables.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/navbar.js'); ?>"></script>
    <!-- <script src="<?php echo base_url('assets/js/jquery-4.0.0.min.js'); ?>"></script> -->
    <script src="<?php echo base_url('assets/js/sweetalert.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/moment.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/fullcalendar.js'); ?>"></script>
    <!-- <script src="dist/js/dashboard1.js"></script> -->
    <script type="text/javascript">
$(document).ready(function() {
    if ($('#cartTable').length) {
        $('#cartTable').DataTable({
            paging: true,
            searching: true,
            ordering: true,
            info: true,
            order: [[0, 'asc']],
            lengthMenu: [
                [8, 25, 50, -1],
                [8, 25, 50, 'All']
            ],
            layout: {
                topStart: 'pageLength',
                topEnd: 'search',
                bottomStart: 'info',
                bottomEnd: 'paging'
            }
        });
    }
});
</script>

</body>

</html>