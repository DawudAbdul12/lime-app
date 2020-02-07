
 <!-- Sidebar -->
            <nav id="sidebar">
                <!-- Sidebar Scroll Container -->
                <div id="sidebar-scroll">
                    <!-- Sidebar Content -->
                    <!-- Adding .sidebar-mini-hide to an element will hide it when the sidebar is in mini mode -->
                    <div class="sidebar-content">
                       

                        <!-- Side Content -->
                        <div class="side-content">
                              

                        <div class="row toppada">
                            <div class="col-sm-5 col-xs-6">
                            <img src="{{ asset('user_pic/'.auth()->user()->pic) }}" class="img-responsive img-circle" width:100%; height="100px;">
                            </div>
                            <div class="col-sm-7 col-xs-6 kd">
                                <p style="font-size: 14px; color:#fff;"> 
                                <small>Welcome </small><br/>
                                <strong>{{auth()->user()->name}}</strong>
                                    
                               </p>

                            </div>
                        </div>

                        <br>
                        <ul class="nav-main">

                                <li>
                                    <a href="/admin/dashboard" @if($page == "dashboard") class="active" @endif ><i class="si si-speedometer"></i><span class="sidebar-mini-hide">Dashboard</span></a>
                                </li>
                                            
                                <li <?php if($page == "all_blogs" || $page == "add_blog" || $page == "edit_blog"  || $page == "edit_category" || $page == "categories"){?> class="open" <?php }?> >
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="fa fa-newspaper-o"></i><span class="sidebar-mini-hide">Blog</span></a>
                                    <ul>
                                            <li>
                                            <a href="/admin/blog" <?php if($page == "all_blogs"){?> class="active"<?php }?> > All  </a>
                                            </li>
                                            <li>
                                            <a href="/admin/blog/create" <?php if($page == "add_blog" || $page == "edit_blog"){?> class="active"<?php }?> >Add new</a>
                                            </li>
                                            <li>
                                            <a href="/admin/blog/categories" <?php if($page == "edit_category" || $page == "categories"){?> class="active"<?php }?> >Categories</a>
                                            </li>
                                        
                                    </ul>
                                </li>

                                <li <?php if($page == "all_product" || $page == "add_product" || $page == "edit_product" || $page == 'product_categories' ){?> class="open" <?php }?> >
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-calendar"></i><span class="sidebar-mini-hide">Projects</span></a>
                                    <ul>
                                            <li>
                                              <a href="/admin/project" <?php if($page == "all_product"){?> class="active"<?php }?> > All  </a>
                                            </li>
                                            <li>
                                              <a href="/admin/project/create" <?php if($page == "add_product" || $page == "edit_product"){?> class="active"<?php }?> >Add new</a>
                                            </li>
                                            <li>
                                              <a href="/admin/project/categories" <?php if($page == "edit_category" || $page == "product_categories"){?> class="active"<?php }?> >Categories</a>
                                            </li>
                                    </ul>
                                </li>

                                <li <?php if($page == "all_album" || $page == "add_album" || $page == "edit_album" ){?> class="open" <?php }?> >
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-calendar"></i><span class="sidebar-mini-hide">Gallery</span></a>
                                    <ul>
                                            <li>
                                              <a href="/admin/album" <?php if($page == "all_album"){?> class="active"<?php }?> > All  </a>
                                            </li>
                                            <li>
                                              <a href="/admin/album/create" <?php if($page == "add_album" || $page == "edit_album"){?> class="active"<?php }?> >Add new</a>
                                            </li>
                                    </ul>
                                </li>

                                <li <?php if($page == "all_team" || $page == "add_team" || $page == "edit_team" ){?> class="open" <?php }?> >
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-calendar"></i><span class="sidebar-mini-hide">Team</span></a>
                                    <ul>
                                            <li>
                                              <a href="/admin/team" <?php if($page == "all_team"){?> class="active"<?php }?> > All  </a>
                                            </li>
                                            <li>
                                              <a href="/admin/team/create" <?php if($page == "add_team" || $page == "edit_team"){?> class="active"<?php }?> >Add new</a>
                                            </li>
                                    </ul>
                                </li>

                                <li <?php if($page == "all_slider" || $page == "add_slider" || $page == "edit_slider" ){?> class="open" <?php }?> >
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-calendar"></i><span class="sidebar-mini-hide">Slider</span></a>
                                    <ul>
                                            <li>
                                              <a href="/admin/slider" <?php if($page == "all_slider"){?> class="active"<?php }?> > All  </a>
                                            </li>
                                            <li>
                                              <a href="/admin/slider/create" <?php if($page == "add_slider" || $page == "edit_slider"){?> class="active"<?php }?> >Add new</a>
                                            </li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="/admin/brand" @if($page == "brand") class="active" @endif ><i class="si si-calendar"></i><span class="sidebar-mini-hide">Brand</span></a>
                                 </li>



                        
                                {{-- <li>
                                  <a href="/admin/sponsor" @if($page == "sponsor") class="active" @endif ><i class="glyphicon glyphicon-certificate"></i><span class="sidebar-mini-hide">Sponsors</span></a>
                                </li> --}}


                            @if(auth()->user()->type == "Super Administrator" || auth()->user()->type == "Administrator" )

                                <li <?php if($page == "all_users" || $page == "register" || $page == "edit_user"){?> class="open" <?php }?> >
                                   <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-user"></i><span class="sidebar-mini-hide">Users</span></a>
                                     <ul>
                                           <li>
                                           <a href="/admin/user" <?php if($page == "all_users"){?> class="active"<?php }?> > All  </a>
                                           </li>
                                           <li>
                                           <a href="/admin/user/create" <?php if($page == "register" || $page == "edit_user"){?> class="active"<?php }?> >Add new</a>
                                           </li>
                                        
                                    </ul>
                                </li>
                           
                            @endif

                            </ul>
                        </div>
                        <!-- END Side Content -->
                    </div>
                    <!-- Sidebar Content -->
                </div>
                <!-- END Sidebar Scroll Container -->
            </nav>
            <!-- END Sidebar -->



            <!-- TOP BAR -->


              <!-- Header -->
            <header id="header-navbar" class="content-mini content-mini-full">
                <!-- Header Navigation Right -->
                <ul class="nav-header pull-right">
                    <li>
                        <div class="btn-group">
                            <button class="btn btn-default2 btn-image dropdown-toggle " data-toggle="dropdown" type="button">
                                <img src="{{ asset('user_pic/'.auth()->user()->pic) }}"  alt="Current User" >
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                            
                                <li>
                                    <a tabindex="-1" href="javascript:void(0)">
                                        <i class="si si-settings pull-right"></i>Settings
                                    </a>
                                </li>
                                <li class="divider"></li>
                               
                                <li>
                                    <a tabindex="-1" href="/admin/user/changepassword">
                                        <i class="si si-lock pull-right"></i> Change Password
                                    </a>
                                </li>
                                <li>
                                    <a tabindex="-1" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        <i class="si si-logout pull-right"></i>Log out
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                     </form>
                </ul>
                <!-- END Header Navigation Right -->

                <!-- Header Navigation Left -->
                <ul class="nav-header pull-left">
                    <li class="hidden-md hidden-lg">
                        <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                        <button class="btn btn-default" data-toggle="layout" data-action="sidebar_toggle" type="button">
                            <i class="fa fa-navicon"></i>
                        </button>
                    </li>
               
                    <li>
                        <!-- Opens the Apps modal found at the bottom of the page, before including JS code -->
                        <button class="btn btn-default2 pull-right" data-toggle="modal" data-target="#apps-modal" type="button">
                            <i class="si si-grid"></i>
                        </button>
                    </li>
            
                    
                </ul>
                <!-- END Header Navigation Left -->
            </header>
            <!-- END Header -->


            <!-- END OF TOP -->