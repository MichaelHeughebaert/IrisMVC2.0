        </div>
    </div>
</div>

<?php if ($this->title != 'Aanmelden') { ?>
    <div class="page-footer">
        <div class="page-footer-inner"> Intranet 2013-<?php echo date("Y"); ?> &copy; Dienst ICT</div>
        <div class="scroll-to-top"><i class="icon-arrow-up"></i></div>
    </div>
<?php } ?>

<script src="<?= URL; ?>public/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?= URL; ?>public/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?= URL; ?>public/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="<?= URL; ?>public/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"
    type="text/javascript"></script>
<script src="<?= URL; ?>public/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js"
    type="text/javascript"></script>
<script src="<?= URL; ?>public/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?= URL; ?>public/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?= URL; ?>public/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js"
    type="text/javascript"></script>
<script src="<?= URL; ?>public/global/scripts/app.min.js" type="text/javascript"></script>

<?php if (isset($this->scripts) && in_array('login', $this->scripts)) { ?>
    <script src="<?= URL; ?>public/pages/plugins/jquery-validation/js/jquery.validate.min.js"
            type="text/javascript"></script>
    <script src="<?= URL; ?>public/pages/plugins/jquery-validation/js/additional-methods.min.js"
            type="text/javascript"></script>
    <script src="<?= URL; ?>public/pages/scripts/login.min.js" type="text/javascript"></script>
<?php } ?>

<script src="<?= URL; ?>public/global/scripts/layout.min.js" type="text/javascript"></script>
<script src="<?= URL; ?>public/global/scripts/demo.min.js" type="text/javascript"></script>
<script src="<?= URL; ?>public/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
</body>
</html>