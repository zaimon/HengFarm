        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{ url('project')  }}" class="site_title"><i class="fa fa-paw"></i> <span>Heng Farm</span></a>
            </div>

            <div class="clearfix"></div>
            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="{{ URL::asset('resources\assets\images\user\\'.Auth::user()->logo)}}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>{{ Auth::user()->rank == 99?'Admin':'User' }}</span>
                <h2>{{ Auth::user()->firstName}} &nbsp;{{Auth::user()->lastName }}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>&nbsp</h3>
                <ul class="nav side-menu">
                  <li><a href="{{ url('index')  }}"><i class="fa fa-home"></i> Home </a></li>
                  <li><a href="{{ url('project')}}"><i class="fa fa-pagelines"></i> Project </a>
                    {{--   <ul class="nav child_menu">
                      <li><a href="{{ url('project')  }}">All Project</a></li>
                      <li><a href="{{ url('project/create')  }}">Create Project</a></li>
                    <li><a href="form_advanced.html">Advanced Components</a></li>
                      <li><a href="form_validation.html">Form Validation</a></li>
                      <li><a href="form_wizards.html">Form Wizard</a></li>
                      <li><a href="form_upload.html">Form Upload</a></li>
                      <li><a href="form_buttons.html">Form Buttons</a></li>
                    </ul> --}}
                  </li>
                  
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        