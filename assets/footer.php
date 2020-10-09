<!-- Footer-->
<footer class="footer text-center" style="bottom:0; position:fixed; width:100%">
    <div class="container"><small>© OnlineInsure 2020</small></div>
</footer>
<script>
    function search(e) {
        if(event.key === 'Enter') {
            if(e.value == 1){
                $(".clientDiv1").show();
                $(".clientDiv2").hide();
                $(".clientDiv3").hide();
            } 
            else if(e.value == 2){
                $(".clientDiv1").show();
                $(".clientDiv2").show();
                $(".clientDiv3").hide();
            }
            else if(e.value == 3){
                $(".clientDiv1").show();
                $(".clientDiv2").show();
                $(".clientDiv3").show();
            }
            else if(e.value > 3){
                alert("Please Cannot be more than 3");
            } 
            else{
                alert("Please enter number of client");
            }      
        }
    }
    $('#createPayrollButton').on('keypress', function(e) {
        if (keyCode === 13) { 
            e.preventDefault();
            return false;
        }
    });
</script>
<!-- Bootstrap core JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
<!-- Third party plugin JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<!-- Contact form JS-->
<script src="assets/mail/jqBootstrapValidation.js"></script>
<script src="assets/mail/contact_me.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>