<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- Custom Style -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/invcss/style.css') }}">

    <title>Invoice..!</title>
</head>

<body>
    <div class="my-5 page" size="A4">
        <div class="p-5">
            <section class="top-content bb d-flex justify-content-between">
                <div class="logo">

                    <img src="{{ asset('public/assets/images/invlogo.png') }}" alt="logo" class="img-fluid" width="250px" height="250px">
                </div>
                <div class="top-left">
                    <div class="graphic-path">
                        <p>Invoice</p>
                    </div>
                    <div class="position-relative">
                        <p>Invoice No. <span>123</span></p>
                    </div>
                </div>
            </section>

            <section class="store-user mt-5">
                <div class="col-10">
                    <div class="row bb pb-3">
                        <div class="col-7">
                            <table>
                                <thead>
                                    <tr>
                                        <H4>{{ $showData->customerName }}</H4>


                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <th>Mobile :</th>
                                        <td>{{ $showData->customerPhone }}</td>

                                    </tr>
                                    <tr>
                                        <th>Email :</th>
                                        <td>{{ $showData->customerEmail }}</td>

                                    </tr>
                                    <tr>
                                        <th>Address :</th>
                                        <td>{{ $showData->customerAddress }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-5">
                            <table>
                                <thead>
                                    <tr>
                                        <H5>{{ $companyData->companyName }}</H5>
                                     </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>Mobile :</th>
                                        <td>{{ $companyData->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email :</th>
                                        <td>{{ $companyData->companyEmail }}</td>
                                     </tr>
                                    <tr>
                                        <th>Address :</th>
                                        <td>{{ $companyData->address }}</td>
                                     </tr>

                                </tbody>
                            </table>



                        </div>
                    </div>
                    <div class="row extra-info pt-3">
                        <div class="col-7">
                            <p>Payment Method: <span>bKash</span></p>
                            <p>Order Number: <span>#868</span></p>
                        </div>
                        <div class="col-5">
                            <p>Invoice Date: <span>{{ $invoiceDate->purchaseDate }}</span></p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="product-area mt-4">
                <table class="table table-hover">
                    <thead class="text-bord">
                        <tr>
                            <th>Product Description</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="media">

                                    <div class="media-body">
                                        <p class="mt-0 title">
                                            @foreach ($dd as $object)
                                            {{ $object->productID }}
                                        @endforeach
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td>@foreach ($dd as $object)
                                {{ $object->prodRate }}
                            @endforeach</td>
                            <td>@foreach ($dd as $object)
                                {{ $object->prodQty }}
                            @endforeach</td>
                            <td>@foreach ($dd as $object)
                                {{ $object->totalPrice }}
                            @endforeach</td>
                        </tr>
                    </tbody>
                </table>
            </section>

            <section class="balance-info">
                <div class="row">
                    <div class="col-8">

                    </div>
                    <div class="col-4">
                        <table class="table border-0 table-hover">
                            <tr>
                                <td>Sub Total:</td>
                                <td>800$</td>
                            </tr>
                            <tr>
                                <td>Tax:</td>
                                <td>15$</td>
                            </tr>
                            <tr>
                                <td>Deliver:</td>
                                <td>10$</td>
                            </tr>
                            <tfoot>
                                <tr>
                                    <td>Total:</td>
                                    <td>825$</td>
                                </tr>
                            </tfoot>
                        </table>

                        <!-- Signature -->
                        <div class="col-12">
                            <img src="{{ asset('public/assets/images/invsignature.png') }}" class="img-fluid" alt="">
                            <p class="text-center m-0"> Director Signature </p>
                        </div>
                    </div>
                </div>
            </section>
            <footer>
                <hr>
                <p class="m-0 text-center">
                    THANK YOU FOR YOUR SHOPPING.
                </p>

                <div class="social pt-3">
                    <span class="pr-2">
                        <i class="fas fa-mobile-alt"></i>
                        <span>01955800663</span>
                    </span>
                    <span class="pr-2">
                        <i class="fas fa-envelope"></i>
                        <span>hasan@gmail.com</span>
                    </span>
                    <span class="pr-2">
                        <i class="fab fa-facebook-f"></i>
                        <span>/bannna</span>
                    </span>
                    <span class="pr-2">
                        <i class="fab fa-youtube"></i>
                        <span>/banna</span>
                    </span>
                    <span class="pr-2">
                        <i class="fab fa-github"></i>
                        <span>/banna</span>
                    </span>
                </div>
            </footer>
        </div>
    </div>
</body>
</html>
