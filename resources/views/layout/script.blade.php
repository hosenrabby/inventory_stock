
 <!-- scripit init-->
 <script src="{{ asset('public/assets/js/dashboard2.js') }}"></script>
 <script src="{{ asset('assets/js/lib/data-table/datatables.min.js') }}"></script>
 <script src="{{ asset('assets/js/lib/data-table/dataTables.buttons.min.js') }}"></script>
 <script src="{{ asset('assets/js/lib/data-table/buttons.flash.min.js') }}"></script>
 <script src="{{ asset('assets/js/lib/data-table/jszip.min.js') }}"></script>
 <script src="{{ asset('assets/js/lib/data-table/pdfmake.min.js') }}"></script>
 <script src="{{ asset('assets/js/lib/data-table/vfs_fonts.js') }}"></script>
 <script src="{{ asset('assets/js/lib/data-table/buttons.html5.min.js') }}"></script>
 <script src="{{ asset('assets/js/lib/data-table/buttons.print.min.js') }}"></script>
 <script src="{{ asset('assets/js/lib/data-table/datatables-init.js') }}"></script>
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



 <!-- bootstrap -->
 <script type="text/javascript">
    //==========================================
//       Purchase Form Append
//==========================================

    // $('#addRow').click(function(){
    //     $.ajax({
    //         url:'http://localhost/inventory_stock/authorized/resources/views/admin/purchaseManage/prodData.blade.php',
    //         method:'post',
    //         dataType:'html',
    //         data:"",
    //         success:function(data){

    //         }
    //     });
    // })



    $('.addRow').click(function(){
        // alert('Hello world');
        var i=1;
        var rowlen=parseInt($('#rowlenth').val());
        i+=rowlen;
        var row = '<div class="row mt-3" id="deleteRow">'
            row+= '<div class="col-1">'
            // row+= '<button type="button" class="btn btn-outline-danger" id="minus" onclick="rowDelete()" style="margin-top: 34px"><i class="fa-solid fa-minus"></i></button>'
            row+= '</div>'
            row+= '<div class="form-group col">'
            row+= '<label>Product Name</label>'
            row+= '<input type="text" class="form-control" name="prodName" placeholder="Product Name">'
            row+= '</div>'
            row+= '<div class="form-group col">'
            row+= '<label>Product Code</label>'
            row+= '<input type="number" class="form-control" name="prodCode" id="prodCode" placeholder="Product Code">'
            row+= '</div>'
            row+= '<div class="form-group col">'
            row+= '<label>Product QTY</label>'
            row+= '<input type="number" class="form-control" name="prodQty" id="prodQTY'+i+'" onkeyup="parchaseCal('+i+')" placeholder="Product QTY">'
            row+= '</div>'
            row+= '<div class="form-group col">'
            row+= '<label>Product Rate</label>'
            row+= '<input type="number" class="form-control" name="prodRate" id="prodRate'+i+'" onkeyup="parchaseCal('+i+')" placeholder="Product Rate">'
            row+= '</div>'
            row+= '<div class="form-group col">'
            row+= '<label>Total Price</label>'
            row+= '<input type="number" class="form-control totCount" name="totalPrice" id="totalPrice'+i+'" placeholder="Total Price">'
            row+= '</div>'
            row+= '</div>';

                $('#appendRow').append(row);
                $('#rowlenth').val(i);
                i++;
    })

    $('#delRow').click(function(){
        $('#deleteRow').remove();
    })

    // function rowDelete(){
    //     $('#deleteRow').remove()
    // }

    function parchaseCal(id){
        var prodQty = $('#prodQTY'+id).val();
        var prodRate = $('#prodRate'+id).val();
        var total = (prodQty*prodRate);
            $('#totalPrice'+id).val(total);

            var allTotal = 0;
            $('.totCount').each(function(){
                var get_value = $(this).val();
                if($.isNumeric(get_value)){
                    allTotal += parseInt(get_value);
                }
            });
            $('#grandTot').val(allTotal);

            var grandVal = $('#grandTot').val();
            var paidA = $('#paidAmount').val();

            if(grandVal != paidA){
                var dues = grandVal - paidA;
                $('#duesAmount').val(dues);
            } else{
                $('#duesAmount').val(0);
            }
    }

</script>
