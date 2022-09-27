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
                    <p><strong>Date:</strong>
                        {{ date('d-m-y') }}
                    </p>
                </div>
            </section>

            <section class="product-area mt-4">
                <table class="table table-hover">
                    <thead class="text-bord">
                        <tr>
                            <th>SL</th>
                            <th>Customer Name</th>
                            <th>Customer Email</th>
                            <th>Customer Phone</th>
                            <th>Customer Current Balance</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customer as $item)
                            <tr>
                                <td>
                                    <div class="media">

                                        <div class="media-body">
                                            <p class="mt-0 title">
                                                {{ $loop->iteration }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    {{ $item->customerName }}
                                </td>
                                <td>
                                    {{ $item->customerEmail }}
                                </td>
                                <td>
                                    {{ $item->customerPhone }}
                                </td>
                                <td>
                                    {{ $item->customerCurrentBalance }}
                                </td>
                            </tr>
                        @endforeach

                    </tbody>

                    <tfoot>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Total:</td>
                            <td>
                                {{-- @foreach ($balance as $item)
                                {{ echo $item; }}
                                @endforeach --}}
                                {{ $balance }}
                            </td>

                        </tr>
                    </tfoot>
                </table>
            </section>

            <section class="balance-info">
                <div class="row">
                    <div class="col-8">

                    </div>
                    <div class="col-4">

                        <!-- Signature -->
                        <div class="col-12">
                            <img src="#" class="img-fluid" alt="">
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
                        <span>
                            {{-- {{ $companyData->phone }} --}}
                        </span>
                    </span>
                    <span class="pr-2">
                        <i class="fas fa-envelope"></i>
                        <span>
                            {{-- {{ $companyData->companyEmail }} --}}
                        </span>
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
