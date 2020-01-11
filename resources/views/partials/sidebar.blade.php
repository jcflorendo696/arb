<div class="sidebar" data-color="orange">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
          EM
        </a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          Expense Manager
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">

          @if( Route::current()->getName() == 'dashboard')
          <li class="active">
          @else
          <li class="">
          @endif
          <a href=" {{ route('dashboard') }}">
              <i class="now-ui-icons design_app"></i>
              <p>My Expenses</p>
            </a>
          </li>
        
          @if ( Auth::user()->getRole->role == "Administrator" )
              @if( Route::current()->getName() == 'users')
              <li class="active">
              @else
              <li>
              @endif
              <a href=" {{ route('users') }}">
                  <i class="now-ui-icons design_bullet-list-67"></i>
                  <p> Users </p>
                </a>
              </li>
          
              @if( Route::current()->getName() == 'roles')
              <li class="active">
              @else
              <li>
              @endif
              <a href=" {{ route('roles') }}">
                  <i class="now-ui-icons users_single-02"></i>
                  <p> Roles </p>
                </a>
              </li>

              @if( Route::current()->getName() == 'expenses-category')
              <li class="active">
              @else
              <li>
              @endif
              <a href=" {{ route('expenses-category') }} ">
                  <i class="now-ui-icons business_chart-bar-32"></i>
                  <p>Expense Categories</p>
                </a>
              </li>

          <!-- <li>
          <a href="#multiOptions" data-toggle="collapse" class="collapsed" aria-expanded="false">
              <i class="now-ui-icons business_chart-bar-32"></i>
              <p>Multi Option <b class="caret"></b></p>
            </a>
            <div class="collapse" id="multiOptions" >
            <ul class="nav">
                        <li>
                            <a href="../examples/pages/pricing.html">
                                <span class="sidebar-mini-icon">P</span>
                                <span class="sidebar-normal"> Pricing </span>
                            </a>
                        </li>
                      
                        <li>
                            <a href="../examples/pages/rtl.html">
                                <span class="sidebar-mini-icon">RS</span>
                                <span class="sidebar-normal"> RTL Support </span>
                            </a>
                        </li>
                      
                        <li>
                            <a href="../examples/pages/invoice.html">
                                <span class="sidebar-mini-icon">I</span>
                                <span class="sidebar-normal"> Invoice </span>
                            </a>
                        </li>
                    </ul>
            </div>
          </li> -->

          
          <!-- 
          <li>
          <a href=" #">
              <i class="now-ui-icons business_money-coins"></i>
              <p>Expenses</p>
            </a>
          </li> -->
          @else
          @endif


        </ul>
      </div>
    </div>