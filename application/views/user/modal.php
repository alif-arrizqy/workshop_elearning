<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <img src="<?= base_url('assets/images/penutupan_web.png'); ?>" style="border-radius: 20px;" width="100%">
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/')?>vendors/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#myModal').modal('show');
    });
</script>