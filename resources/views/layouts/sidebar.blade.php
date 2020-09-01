
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="treeview">
              <a href="{{ route('home') }}">
                <i class="fa fa-dashboard"></i> <span class="header">Dashboard</span>
              </a>
            </li>

            <li class="treeview {{ Request::is('administrator/products*')? 'active' :''  }}">
              <a href="#">
                <i class="fa fa-sellsy"></i>
                <span>Sales</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class=""><a href="{{url('transcation')}}"><i class="fa fa-shopping-cart"></i>Sale Cart</a></li>
                <li class="{{ Request::is('administrator/banks/create')? 'active' :''  }}"><a href="{{url('/transcation/history')}}"><i class="fa fa-plus-square"></i> Sales Details </a></li>
              </ul>
            </li>

            <li class="treeview {{ Request::is('administrator/customers*')? 'active' :''  }}">
              <a href="#">
                <i class="fa fa-shopping-cart"></i>
                <span>Products</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="{{ Request::is('administrator/customers')? 'active' :''  }}"><a href="{{route('products.index')}}"><i class="fa fa-dropbox"></i> Products Gallery</a></li>
              </ul>
            </li>

            
            <li class="treeview {{ Request::is('administrator/customers*')? 'active' :''  }}">
              <a href="#">
                <i class="fa fa-dropbox"></i>
                <span>Customers</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="{{ Request::is('administrator/customers')? 'active' :''  }}"><a href="{{ route('client.index') }}"><i class="fa fa-bars"></i> Customers </a></li>
                <li class="{{ Request::is('administrator/clients/create')? 'active' :''  }}"><a href="{{ route('client.create') }}"><i class="fa fa-plus-circle"></i> Add Customers</a></li>
              </ul>
            </li>

            <li class="treeview {{ Request::is('administrator/suppliers*')? 'active' :''  }}">
              <a href="#">
                <i class="fa fa-folder-o"></i>
                <span>Suppliers</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="{{ Request::is('administrator/suppliers')? 'active' :''  }}"><a href="{{ route('supplier.index') }}"><i class="fa fa-bars"></i> Suppliers </a></li>
                <li class="{{ Request::is('administrator/suppliers/create')? 'active' :''  }}"><a href="{{ route('supplier.create') }}"><i class="fa fa-plus-circle"></i> Add Suppliers</a></li>
              </ul>
            </li>


            <li class="treeview {{ Request::is('admin/repair-product*')? 'active' :''  }}">
                  <a href="#">
                      <i class="fa fa-wrench"></i>
                      <span>workshop</span>
                      <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                      <li class="{{ Request::is('admin/repair-product')? 'active' :''  }}">
                          <a href="{{ route('workshop.index') }}"><i class="fa fa-list-alt"></i>Payment Details </a>
                      </li>

                      <li class="{{ Request::is('admin/repair-product/create')? 'active' :''  }}"><a href="{{ route('workshop.create') }}"><i class="fa fa-plus-square-o"></i>Add new </a></li>
                  </ul>
              </li>


            <li class="treeview {{ Request::is('administrator/customers*')? 'active' :''  }}">
              <a href="#">
              <i class="fa fa-bars"></i>
                <span>Banking(Pos)</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="{{ Request::is('administrator/customers')? 'active' :''  }}"><a href="{{ route('bank.index') }}"> <i class="fa fa-dropbox"></i></i>Transactions</a></li>
                <li class="{{ Request::is('administrator/customers/create')? 'active' :''  }}"><a href="{{ route('bank.create') }}"><i class="fa fa-plus-circle"></i> Add Transactions</a></li>
              </ul>
            </li>

           <li class="treeview-menu">
              <a href="">
                <i class="fa fa-users"></i>
                <span>Staffs</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>

            <li class="treeview {{ Request::is('administrator/products*')? 'active' :''  }}">
              <a href="#">
              <i class="fa fa-list-alt"></i>
                <span>Income/Expenses</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="nav-item {{ Route::currentRouteName() == 'incomes.index' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('incomes.index') }}">
                    <i class="fa fa-dropbox"></i>
                    <span>Incomes</span></a>
                </li>
                <li class="nav-item {{ Route::currentRouteName() == 'expense.index' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('expense.index') }}">
                    <i class="fa fa-plus-square"></i>
                    <span>Expenses</span></a>
                </li>
                <li class="nav-item {{ Route::currentRouteName() == 'summary' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('expenses.summary') }}">
                    <i class="fa fa-sellsy"></i>
                    <span>All Summary</span></a>
                </li>
              </ul>
            </li>


            <li class="treeview {{ Request::is('administrator/products*')? 'active' :''  }}">
              <a href="#">
                <i class="fa fa-user"></i>
                <span>Account</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="nav-item {{ Route::currentRouteName() == 'incomes.index' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('user.index') }}">
                    <i class="fa fa-bars"></i>
                    <span>Users</span></a>
                </li>
                <li class="nav-item {{ Route::currentRouteName() == 'expense.index' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('user.create') }}">
                    <i class="fa fa-plus-circle"></i>
                    <span>Add User</span></a>
                </li>
              </ul>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
