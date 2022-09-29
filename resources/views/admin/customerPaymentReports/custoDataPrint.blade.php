<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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

                    <img src="{{ asset('public/assets/images/invlogo.png') }}" alt="logo" class="img-fluid"
                        width="250px" height="250px">
                </div>
                <div class="top-left">
                    <p><strong>Date:</strong>{{ date('d-m-y') }}</p>
                </div>
            </section>

            <section class="store-user mt-5">
                <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                            <table>
                                <thead>
                                    <tr>
                                        <H4>{{ $company->companyName }}</H4>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <th>Mobile :</th>
                                        <td>{{ $company->phone }}</td>

                                    </tr>
                                    <tr>
                                        <th>Email :</th>
                                        <td>{{ $company->companyEmail }}</td>

                                    </tr>
                                    <tr>
                                        <th>Address :</th>
                                        <td>{{ $company->address }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-6">
                            <table>
                                <thead>
                                    <tr>
                                        <H5>{{ $customer->customerName }}</H5>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>Email :</th>
                                        <td>{{ $customer->customerEmail }}</td>
                                    </tr>
                                    <tr>
                                        <th>Mobile :</th>
                                        <td>{{ $customer->customerPhone }}</td>
                                    </tr>
                                    <tr>
                                        <th>Address :</th>
                                        <td>{{ $customer->customerAddress }}</td>
                                    </tr>

                                </tbody>
                            </table>



                        </div>
                    </div>
                </div>
            </section>

            <section class="">
                <table class="table table-hover">
                    <thead class="text-bord">
                        <tr>
                            <th>Date</th>
                            <th>Pay Method</th>
                            <th>Previous Balance</th>
                            <th>Payment Amount</th>
                            <th>Dues Amount</th>
                            <th>Current Balance</th>
                            <th>Payment Note</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customerData as $item)
                            <tr>
                                <td>{{ $item->paymentDate }}</td>
                                <td>{{ $item->transactionMethod }}</td>
                                <td>{{ $item->custoPrevBalance }} ৳</td>
                                <td>{{ $item->paymentAmount }} ৳</td>
                                <td>INV No({{ $item->invNumber }}) {{ $item->duesAmount }} ৳</td>
                                <td>{{ $item->custoCarrentBalance }} ৳</td>
                                <td>{{ $item->note }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </section>

            <section class="balance-info">
                <div class="row">
                    <div class="col-8">

                    </div>
                    <div class="col-4">
                        <table class="table border-0 table-hover">
                            <tfoot>
                                <tr>
                                    <td>Total Payment:</td>
                                    <td>{{ $custoPaymentBlnc }}</td>
                                </tr>
                                <tr>
                                    <td>Total Dues:</td>
                                    <td>{{ $customer->customerCurrentBalance }}</td>
                                </tr>
                                <tr>
                                    <td>Grand Total:</td>
                                    <td>{{ $custoPaymentBlnc + $customer->customerCurrentBalance }}.00</td>
                                </tr>
                            </tfoot>
                        </table>

                        <!-- Signature -->
                        <div class="col-12">
                            <img src="{{ asset('public/assets/images/invsignature.png') }}" class="img-fluid"
                                alt="">
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
                        <span>{{ $company->phone }}</span>
                    </span>
                    <span class="pr-2">
                        <i class="fas fa-envelope"></i>
                        <span>{{ $company->companyEmail }}</span>
                    </span>
                    <span class="pr-2">
                        <i class="fab fa-facebook-f"></i>
                        <span>/facebook</span>
                    </span>
                </div>
            </footer>
        </div>
    </div>
</body>

</html>
