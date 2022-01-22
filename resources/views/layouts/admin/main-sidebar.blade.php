
        <!-- Page Sidebar Start-->
        <div class="page-sidebar">
            <div class="sidebar custom-scrollbar">
                <div class="sidebar-user text-center">
                    <div><img class="img-60 rounded-circle lazyloaded blur-up" src="{{asset('assets/images/dashboard/man.png')}}" alt="#">
                    </div>
                    <h6 class="mt-3 f-14">{{auth()->user()->full_name}}</h6>
                    <p>{{auth()->user()->roles_name}}</p>
                </div>
                <ul class="sidebar-menu">
                    <li><a class="sidebar-header" href="{{route('admin')}}"><i data-feather="home"></i><span>Dashboard</span></a></li>
                    <li><a class="sidebar-header" href="#"><i data-feather="box"></i> <span>Products</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('category.index')}}"><i class="fa fa-circle"></i>Category</a></li>
                            <li><a href="category-sub.html"><i class="fa fa-circle"></i>Sub Category</a></li>
                            <li><a href="product-list.html"><i class="fa fa-circle"></i>Product Category</a></li>
                            <li><a href="product-detail.html"><i class="fa fa-circle"></i>Child Category</a></li>
                            <li><a href="add-product.html"><i class="fa fa-circle"></i>Product</a></li>
                        </ul>
                    </li>
                    <li><a class="sidebar-header" href=""><i data-feather="users"></i><span>Reviews</span></a></li>
                    <li><a class="sidebar-header" href=""><i data-feather="dollar-sign"></i><span>Customers</span></a></li>

                    @can('user-list')
                        <li><a class="sidebar-header" href=""><i data-feather="user-plus"></i><span>Admins</span><i class="fa fa-angle-right pull-right"></i></a>
                            <ul class="sidebar-submenu">
                                <li><a href="{{ route('users.index')}}"><i class="fa fa-circle"></i>Admin</a></li>
                                @can('Permission-list')
                                    <li><a href="{{ route('roles.index')}}"><i class="fa fa-circle"></i>Role</a></li>
                                @endcan
                            </ul>
                        </li>
                    @endcan

                    <li>
                        <a class="sidebar-header" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i data-feather="log-in">
                            </i><span>Login</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                            <input type="hidden" name="admin" value="admin">
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Page Sidebar Ends-->
