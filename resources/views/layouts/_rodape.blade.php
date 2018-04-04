
<div class="row-fluid">
    <div id="footer" class="span12"> 2018 &copy; by <a href="http://efficaxsolucoes.com.br">Efficax Soluções Empresariais.</a> Todos os direitos reservados - 1.0.0 </div>
</div>

<!--end-Footer-part-->
<script src="{{URL::asset('js/custom.js')}}"></script>
<script src="{{URL::asset('js/bootstrap-colorpicker.js')}}"></script>
<script src="{{URL::asset('js/bootstrap-datepicker.js')}}"></script>
<script src="{{URL::asset('js/jquery.toggle.buttons.js')}}"></script>
<script src="{{URL::asset('js/masked.js')}}"></script>
<script src="{{URL::asset('js/matrix.form_common.js')}}"></script>
<script src="{{URL::asset('js/wysihtml5-0.3.0.js')}}"></script>
<script src="{{URL::asset('js/bootstrap-wysihtml5.js')}}"></script>
<script src="{{URL::asset('js/jquery.min.js')}}"></script>
<script src="{{URL::asset('js/jquery.ui.custom.js')}}"></script>
<script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('js/jquery.uniform.js')}}"></script>
<script src="{{URL::asset('js/select2.min.js')}}"></script>
<script src="{{URL::asset('js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('js/matrix.js')}}"></script>
<script src="{{URL::asset('js/matrix.tables.js')}}"></script>
<script src="{{URL::asset('js/excanvas.min.js')}}"></script>
<script src="{{URL::asset('js/jquery.flot.min.js')}}"></script>
<script src="{{URL::asset('js/jquery.flot.resize.min.js')}}"></script>
<script src="{{URL::asset('js/jquery.peity.min.js')}}"></script>
<script src="{{URL::asset('js/fullcalendar.min.js')}}"></script>
<script src="{{URL::asset('js/matrix.dashboard.js')}}"></script>
<script src="{{URL::asset('js/jquery.gritter.min.js')}}"></script>
<script src="{{URL::asset('js/matrix.interface.js')}}"></script>
<script src="{{URL::asset('js/matrix.chat.js')}}"></script>
<script src="{{URL::asset('js/jquery.validate.js')}}"></script>
<script src="{{URL::asset('js/matrix.form_validation.js')}}"></script>
<script src="{{URL::asset('js/jquery.wizard.js')}}"></script>
<script src="{{URL::asset('js/matrix.popover.js')}}"></script>
<script src="{{URL::asset('js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('js/matrix.tables.js')}}"></script>
<script type="text/javascript">
    // This function is called from the pop-up menus to transfer to
    // a different page. Ignore if the value returned is a null string:
    function goPage (newURL) {

        // if url is empty, skip the menu dividers and reset the menu selection to default
        if (newURL != "") {

            // if url is "-", it is this page -- reset the menu:
            if (newURL == "-" ) {
                resetMenu();
            }
            // else, send page to designated URL
            else {
                document.location.href = newURL;
            }
        }
    }

    // resets the menu selection upon entry to this page:
    function resetMenu() {
        document.gomenu.selector.selectedIndex = 2;
    }
</script>
<script>
    $('.textarea_editor').wysihtml5();
</script>
