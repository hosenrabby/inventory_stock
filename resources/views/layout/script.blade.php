<!-- scripit init-->
<script src="{{ asset('public/assets/js/dashboard2.js') }}"></script>
{{-- <script src="{{ asset('assets/js/lib/data-table/datatables.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/buttons.flash.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/jszip.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/buttons.html5.min.') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/datatables-init.js') }}"></script> --}}

<!-- jquery vendor -->
<script src="{{ asset('public/assets/js/lib/jquery.min.js') }}"></script>
<script src="{{ asset('public/assets/js/lib/jquery.nanoscroller.min.js') }}"></script>
<!-- nano scroller -->
<script src="{{ asset('public/assets/js/lib/menubar/sidebar.js') }}"></script>
<script src="{{ asset('public/assets/js/lib/preloader/pace.min.js') }}"></script>
<!-- sidebar -->

<script src="{{ asset('public/assets/js/lib/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/assets/js/scripts.js') }}"></script>

<script src="{{ asset('public/assets/js/lib/calendar-2/moment.latest.min.js') }}"></script>
<script src="{{ asset('public/assets/js/lib/calendar-2/pignose.calendar.min.js') }}"></script>
<script src="{{ asset('public/assets/js/lib/calendar-2/pignose.init.js') }}"></script>


<script src="{{ asset('public/assets/js/lib/weather/jquery.simpleWeather.min.js') }}"></script>
<script src="{{ asset('public/assets/js/lib/weather/weather-init.js') }}"></script>
<script src="{{ asset('public/assets/js/lib/circle-progress/circle-progress.min.js') }}"></script>
<script src="{{ asset('public/assets/js/lib/circle-progress/circle-progress-init.js') }}"></script>
<script src="{{ asset('public/assets/js/lib/chartist/chartist.min.js') }}"></script>
<script src="{{ asset('public/assets/js/lib/sparklinechart/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('public/assets/js/lib/sparklinechart/sparkline.init.js') }}"></script>
<script src="{{ asset('public/assets/js/lib/owl-carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('public/assets/js/lib/owl-carousel/owl.carousel-init.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<!-- bootstrap -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
 <!-- bootstrap -->
 {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script> --}}
<script type="text/javascript">


//<!-- DataTable startd-->

$(document).ready(
    function(){
    $('#bootstrap-data-table-export').DataTable();
    }
);

//<!-- DataTable End -->

//<!-- Delaete Alert startd -->

$('.delete-confirm').click(function(event) {
var form = $(this).closest("form");
var name = $(this).data("name");
event.preventDefault();
swal({
title: `Are you sure you want to delete this?`,
text: "If you delete this, it will be gone forever.",
icon: "warning",
buttons: true,
dangerMode: true,
})
.then((willDelete) => {
if (willDelete) {
form.submit();
}
});
});

// <!-- Delaete Alert End -->


// <!-- Timepicker startd -->

$(function() {
$(".datepicker").datepicker({
dateFormat: 'dd-mm-yy',
changeMonth: true,
changeYear: true,

});
});


<!-- Timepicker End -->




<!-- Auto Complite File startd -->



    // var availableTags = [];
    // $.ajax({
    //     method: "GET",
    //     url: "/supplier",
    //     success:function (response){
    //         startAutoComplete(response);
    //     }


    // });

    // function startAutoComplete (availableTags){

    //     $( "#auto" ).autocomplete({
    //   source: availableTags
    //  });

    // }






<!-- Auto Complite File End -->

</script>
