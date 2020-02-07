@extends('admin.layout.app')
@section('content')

            <!-- Main Container -->
            <main id="main-container">
              

                <div class="content">
                    <div class="row items-push">
                        <div class="col-sm-12">
                            <h1 class="page-heading  visibility-hidden" data-toggle="appear" data-class="animated bounceIn">
                                Dashoard 
                            </h1>
                        </div>
    
                    </div>
                </div>

                <!-- Page Content -->
                <div class="content">
                    <div class="row">
                        <div class="col-sm-6 col-lg-3 col-md-3 visibility-hidden" data-toggle="appear" data-offset="50" data-class="animated fadeInUp">
                            <a class="block block-link-hover1" href="/admin/project/create">
                                <div class="block-header">
                                    <h3 class="block-title">Add Project</h3>
                                    <br>    
                                    <i class="si si-calendar fa-2x"></i>
                                    <br>    
                                      <p>Click to add new</p>
                                </div>
                            </a>
                        </div>

                        <div class="col-sm-6 col-lg-3 col-md-3 visibility-hidden" data-toggle="appear" data-offset="50" data-timeout="200" data-class="animated fadeInUp">
                            <a class="block block-link-hover1" href="/admin/blog/create">
                                <div class="block-header">
                                    <h3 class="block-title">Add Blog</h3>
                                    <br>    
                                    <i class="fa fa-newspaper-o fa-2x"></i>
                                    <br>    
                                      <p>Click to add new</p>
                                </div>
                            </a>
                        </div>

                        <div class="col-sm-6 col-lg-3 col-md-3 visibility-hidden" data-toggle="appear" data-offset="50" data-timeout="400" data-class="animated fadeInUp" >
                            <a class="block block-link-hover1" href="/admin/album/create">
                                <div class="block-header">
                                    <h3 class="block-title">Add Gallery</h3>
                                    <br>    
                                    <i class="glyphicon glyphicon-certificate fa-2x"></i>
                                    <br>    
                                      <p>Click to add new</p>
                                </div>
                            </a>
                        </div>
                        

                        <div class="col-sm-6 col-lg-3 col-md-3 visibility-hidden" data-toggle="appear" data-offset="50" data-timeout="600" data-class="animated fadeInUp">
                            <a class="block block-link-hover1" href="/admin/team/create">
                                <div class="block-header">
                                    <h3 class="block-title">Add Team</h3>
                                    <br>    
                                    <i class="si si-user fa-2x"></i>
                                    <br>    
                                      <p>Click to add new</p>
                                </div>
                            </a>
                        </div>
                        
                        
                    </div>



                
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->

 @endsection