<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <ul>
                    <div class="logo">
                        <a href="index.html">
                            <img src="assets/images/logo.png" alt=""/>
                            <span>Soeng Souy</span>
                        </a>
                    </div>
                    <li class="label">Main</li>
                    <li><a href="{{ url('/') }}" class="sideba"><i class="ti-home"></i> Dashboard</a></li>
                    <li><a href="#" class="sideba"><i class="ti-home"></i> Company Details</a></li>
                    <li class="label">SUPLIER</li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-bar-chart-alt"></i> Suplier <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="#">Add Suplier</a></li>
                            <li><a href="#">Suplier Lists</a></li>
                        </ul>
                    </li>

                    <li class="label">CATAGORY</li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-bar-chart-alt"></i> Catagory <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="#">Add Catagory</a></li>
                            <li><a href="#">Catagory Manage</a></li>
                        </ul>
                    </li>

                    <li class="label">SUB CATAGORY</li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-bar-chart-alt"></i>SubCatagory <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="#">Add SubCatagory</a></li>
                            <li><a href="#"> Sub Catagory Manage</a></li>
                        </ul>
                    </li>

                    <li class="label">PRODUCTS</li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-bar-chart-alt"></i> Product Manage <span
                        class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="{{ route('product-stock') }}">Add Product</a></li>
                        <li><a href="{{ route('product-stock') }}">Purchaseble Products</a></li>
                    </ul>
                    </li>

                    <li class="label">STOCKS</li>
                    <li><a href="#"><i class="ti-bar-chart-alt"></i> Stock Manage</a></li>

                    <li class="label">SALES</li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-bar-chart-alt"></i> Sales Products <span
                        class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="#">Create Invoice</a></li>
                        <li><a href="#">All Invoice</a></li>
                    </ul>
                    </li>

                    <li class="label">REPORTS</li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-bar-chart-alt"></i> All Reports <span
                        class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="#">Suplier Payment Reports</a></li>
                        <li><a href="#">Purchase Reports</a></li>
                        <li><a href="#">Sales Reports</a></li>
                    </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /# sidebar -->
