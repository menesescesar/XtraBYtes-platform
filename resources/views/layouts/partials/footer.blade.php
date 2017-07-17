<footer class="main-footer">
    <div class="pull-right hidden-xs">
        Contribute to Xtrabytes Community <i id="infoBtn" class="fa fa-info-circle"></i>
    </div>

    <strong> Xtrabytes Community <img width="25px" src=" {{ asset('/img/xby-logo.png') }} " class="img-circle"></strong>

    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close-modal">&times;</span>
            <img src=" {{ asset('/img/xby-info.png') }} " width="300px" >
            <div class="col-md-10 col-md-offset-1">
                <p>{{trans('layout-partials.To support the development donate on our community fund, we always appreciate donations to our XBY address')}}:</p>
                <p><b>BLocksFEE4ProofofSignatureXXYF3VQ3</b></p>
            </div>
        </div>
    </div>

</footer>

<script>
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var btn = document.getElementById("infoBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close-modal")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>