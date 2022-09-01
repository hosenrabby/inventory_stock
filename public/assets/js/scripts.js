(function($) {
    "use strict";


    $(function () {
        for (var nk = window.location, o = $(".nano-content li a").filter(function () {
            return this.href == nk;
        })
            .addClass("active")
            .parent()
            .addClass("active"); ;) {
            if (!o.is("li")) break;
            o = o.parent()
                .addClass("d-block")
                .parent()
                .addClass("active");
        }
    });


    /*
    ------------------------------------------------
    Sidebar open close animated humberger icon
    ------------------------------------------------*/

    $(".hamburger").on('click', function() {
        $(this).toggleClass("is-active");
    });





    /* TO DO LIST
    --------------------*/
    $(".tdl-new").on('keypress', function(e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if (code == 13) {
            var v = $(this).val();
            var s = v.replace(/ +?/g, '');
            if (s == "") {
                return false;
            } else {
                $(".tdl-content ul").append("<li><label><input type='checkbox'><i></i><span>" + v + "</span><a href='#' class='ti-close'></a></label></li>");
                $(this).val("");
            }
        }
    });


    $(".tdl-content a").on("click", function() {
        var _li = $(this).parent().parent("li");
        _li.addClass("remove").stop().delay(100).slideUp("fast", function() {
            _li.remove();
        });
        return false;
    });

    // for dynamically created a tags
    $(".tdl-content").on('click', "a", function() {
        var _li = $(this).parent().parent("li");
        _li.addClass("remove").stop().delay(100).slideUp("fast", function() {
            _li.remove();
        });
        return false;
    });

//==========================================
//       Purchase Form Append
//==========================================


    $('#addRow').click(function(){
        // alert('Hello world');
        var row = '<div class="row mt-3" id="appendRow">'
            row+= '<div class="col-1">'
            row+= '<button type="button" class="btn btn-outline-dark" id="addRow" style="margin-top: 34px"><i class="fa-solid fa-minus"></i></button></div>'
            row+= '<div class="form-group col">'
            row+= '<label>Select Product</label>'
            row+= '<select class="form-control" name="productID">'
            row+= '<option value="" selected>Select Product</option>'
            row+= '@foreach ($product as $product)'
            row+= '<option value="{{ $product->id }}">{{ $product->productName }}</option>'
            row+= '@endforeach'
            row+= '</select>'
                //     </div>
                //         <div class="form-group col">
                //             <label>Product Code</label>
                //             <input type="number" class="form-control" name="prodCode" placeholder="Product Code">
                //         </div>
                //     <div class="form-group col">
                //         <label>Product QTY</label>
                //         <input type="number" class="form-control" name="prodQty" placeholder="Product QTY">
                //     </div>
                //     <div class="form-group col">
                //         <label>Product Rate</label>
                //         <input type="number" class="form-control" name="prodRate" placeholder="Product Rate">
                //     </div>
                //     <div class="form-group col">
                //         <label>Total Price</label>
                //         <input type="number" class="form-control" name="totalPrice" placeholder="Total Price">
                //     </div>
                // </div>';

                $('#appendRow').append(row);
    })





})(jQuery);
