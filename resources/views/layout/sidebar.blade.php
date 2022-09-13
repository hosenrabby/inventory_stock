<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
        <div class="nano-content">
            <ul>
                <div class="logo">
                    <a href="{{ route('admin-dashboard') }}">
                        <img src="assets/images/logo.png" alt=""/>
                        <span>BD-ENG Stock-Inv</span>
                    </a>
                </div>

                <li class="label">Main</li>
                    <li><a href="{{ route('admin-dashboard') }}" class="sideba"><i class="ti-home"></i> Dashboard</a></li>
                    <li><a href="{{ route('company.index') }}" class="sideba"><i class="ti-home"></i> Company Details</a></li>


                <li class="label">SUPLIER</li>
                <li><a class="sidebar-sub-toggle"><i class="ti-user"></i> Suplier <span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="{{ url('authorized/supplier/create') }}">Add Suplier</a></li>
                        <li><a href="{{ url('authorized/supplier') }}">Suplier Lists</a></li>
                    </ul>
                </li>
                <li class="label">CUSTOMER</li>
                <li><a class="sidebar-sub-toggle"><i class="ti-user"></i> Customer <span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="{{ route('customer.create') }}">Add Customer</a></li>
                        <li><a href="{{ route('customer.index') }}">Manage Customer</a></li>
                    </ul>
                </li>
                <li class="label">CATAGORY</li>
                <li><a class="sidebar-sub-toggle"><i class="ti-bar-chart-alt"></i> Catagory <span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="{{ route('category.create') }}">Add Catagory</a></li>
                        <li><a href="{{ route('category.index') }}">Catagory Manage</a></li>
                    </ul>
                </li>

                <li class="label">SUB CATAGORY</li>
                <li><a class="sidebar-sub-toggle"><i class="ti-bar-chart-alt"></i>SubCatagory <span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="{{ route('subcategory.create') }}">Add SubCatagory</a></li>
                        <li><a href="{{ route('subcategory.index') }}"> Sub Catagory Manage</a></li>
                    </ul>
                </li>

                <li class="label">PRODUCTS</li>
                <li><a class="sidebar-sub-toggle"><i class="ti-bar-chart-alt"></i> Product Manage <span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="{{ url('authorized/product-stock/create') }}">Add Product</a></li>
                        <li><a href="{{ url('authorized/product-stock') }}">Products Information</a></li>
                        <li><a href="{{ url('authorized/purchase-manage') }}">Purchase Manage</a></li>
                    </ul>
                </li>

                {{-- <li class="label">STOCKS</li>
                <li><a href="{{ url('authorized/product-stock') }}"><i class="ti-bar-chart-alt"></i> Stock Manage</a>
                </li> --}}

                <li class="label">SALES</li>
                <li><a class="sidebar-sub-toggle"><i class="ti-bar-chart-alt"></i> Sales Products <span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="{{ url('authorized/salesproduct-form') }}">Create Invoice</a></li>
                        <li><a href="{{ url('authorized/salesproduct') }}">All Invoice</a></li>
                    </ul>
                </li>
                <li class="label">Payments</li>
                <li><a class="sidebar-sub-toggle"><i class="ti-bar-chart-alt"></i> Payments <span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="{{ url('authorized/supplierPaymentList') }}">Supplier payment List</a></li>
                        <li><a href="{{ url('authorized/customerPaymentList') }}">Customer Payment List</a></li>
                    </ul>
                </li>

                <li class="label">REPORTS</li>
                <li><a class="sidebar-sub-toggle"><i class="ti-bar-chart-alt"></i> All Reports <span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="{{ url('authorized/supplierLedgerReport') }}">Suplier Ledger Reports</a></li>
                        <li><a href="{{ url('authorized/customerLedgerReport') }}">Customer Ledger Reports</a></li>
                        <li><a href="{{ url('authorized/purchaseReports') }}">Purchase Reports</a></li>
                        <li><a href="{{ url('authorized/stockLedgerReport') }}">Stock ledger Report</a></li>
                        <li><a href="{{ url('/authorized/salesReports') }}">Sales Reports</a></li>

                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /# sidebar -->
