</div>
</div>
</div>

<div class="footer">
    <div class="footer-inner">
        <div class="footer-content">
            <span class="bigger-120">
                <span class="blue bolder">GIS PDAM Tirta Kepri. </span>
                Copyright &copy; <?=date('yy')?>
            </span>
        </div>
    </div>
</div>

<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
    <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
</a>
</div>
<!-- basic scripts -->

<script>
$(document).ready(function() {
    $('#dataTables-example').DataTable({
        responsive: true
    });
});
</script>


<script>
window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
    });
}, 3000);
</script>
<!-- page specific plugin scripts -->
<script src="<?=base_url()?>template/assets/js/jquery.colorbox.min.js"></script>
<!-- inline scripts related to this page -->

<!-- inline scripts related to this page -->
<!-- page specific plugin scripts -->



</body>

</html>
