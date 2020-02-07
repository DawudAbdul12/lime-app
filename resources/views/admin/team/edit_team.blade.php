@extends('admin.layout.app')
@section('content')

            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Header -->
                <div class="content bg-gray-lighter visibility-hidden"   data-toggle="appear" data-class="animated bounceIn">
                    <div class="row items-push">
                        <div class="col-sm-7">
                            <h1 class="page-heading">
                              Edit a Team member
                            </h1>
                        </div>
                        <div class="col-sm-5 text-right hidden-xs">
                            <ol class="breadcrumb push-10-t">
                                <li>Edit</li>
                                <li><a class="link-effect" href="/admin/team">All Teams</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
                @include('admin.message')
                <!-- END Page Header -->

                <!-- Page Content -->
                <div class="content animated fadeInLeft">
                    <div class="row">
                         <div class="col-md-8">
                            <!-- Default Elements -->
         <div class="block">              
            <div class="block-content">
                {!! Form::open(['action' => ['teamController@update', $team->id ], 'method' => 'POST','files' => true,'class'=> 'form-horizontal push-10-t']) !!}
                                        
                     <div class="form-group">
                       <label class="col-xs-12" for="example-text-input">Fullname</label>
                        <div class="col-sm-12">
                        <input class="form-control" type="text" id="fullname" name="fullname" placeholder="Enter Fullname" value="{{$team->full_name}}" required>
                        </div>
                     </div>

                     <div class="form-group">
                            <label class="col-xs-12" for="example-text-input">Postion</label>
                             <div class="col-sm-12">
                             <input class="form-control" type="text"  name="position" placeholder="Enter Position" value="{{ $team->position}}" required>
                             </div>
                    </div>
                   
                    <div class="form-group">
                        <div class=" block-content-full">
                                <label class="col-xs-12" for="example-text-input">Content</label>
                                            <!-- Summernote Container -->
                        <textarea class="js-summernote" name="content">{{ $team->bio }}</textarea>
                                            
                        </div>
                    </div>
                   <br>                
            </div>
         </div>


                        </div>
                     <div class="col-md-4">

                        <div class="block">
                            <div class="block-content">
                                <div class="form-group">
                                     <label class="" for="example-file-input">Profile  Picture</label>
                                     <input type="file" id="imageupload" name="pic" >  
                                     <div id="preview-image"><img src="{{ asset('team_profile/'.$team->profile_pic) }}" class="thumbimage"></div>
                                     
                                </div>
                            </div>
                        </div>


                        <div class="block">
                            <div class="block-content">
                                <div class="form-group">
                                    <label class="" for="example-file-input">Email</label>
                                    <input type="text" class="form-control" type="email"  name="email" placeholder="Enter Email" value="{{ $team->email}}" >  
                                </div>
                                <div class="form-group">
                                        <label class="" for="example-file-input">LinkedIn</label>
                                        <input type="text" class="form-control" type="text"  name="linkedin" placeholder="LinkedIn Link" value="{{ $team->linkedin}}">  
                                 </div>
                                 <div class="form-group">
                                        <label class="" for="example-file-input">Facebook</label>
                                        <input type="text" class="form-control" type="text"  name="fb" placeholder="Facebook Link" value="{{ $team->fb}}">  
                                 </div>
                                 <div class="form-group">
                                        <label class="" for="example-file-input">Twitter</label>
                                        <input type="text" class="form-control" type="text"  name="twitter" placeholder="Twitter Link" value="{{ $team->twitter}}">  
                                 </div>
                                 <div class="form-group">
                                        <label class="" for="example-file-input">Instagram</label>
                                        <input type="text" class="form-control" type="text"  name="ig" placeholder="Instagram Link" value="{{ $team->ig}}">  
                                 </div>
                            </div>
                        </div>


       <div class="block">        
         <div class="block-content">
           <div class="form-horizontal">                      
             <div class="form-group">
                <label class="col-xs-12" for="example-tags1">Tag</label>
                    <div class="col-xs-12">
                      <input class="js-tags-input form-control" type="text" id="example-tags1" name="tag" value="{{ $team->tag}}" >
                    </div>
             </div>

            <div class="form-group">
                 <label class="col-xs-12" for="example-select">Visibility</label>
                  <div class="col-sm-12">
                    <select class="form-control" id="datepicker" name="visibility" size="1" required>
                        <option @if($team->visibility == "Public") selected @endif value="Public">Public</option>
                        <option  @if($team->visibility == "Private") selected @endif value="Private">Private</option>
                    </select>
                  </div>
             </div>

             <div class="form-group">
                    <label class="col-xs-12" for="example-select">Publish</label>
                     <div class="col-sm-12">
                            <div class='input-group date' id='datetimepicker1'>
                            <input type='text' class="form-control" name="publish" required value="{{ $team->publish }}"/>
                                    <input type='hidden' class="form-control" id="publish" value="" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                            </div>
                        {{-- <input class="js-datepicker form-control" type="text" id="datepicker" name="publish" > --}}
                     </div>
            </div>
           </div>
          </div>
        </div>

                 <!-- post btn here --> 
            <!-- post btn here --> 
            <div class="form-group">
                    <div class="col-xs-12">
                            {{ Form::hidden('_method','PUT')}}
                            <a href="/admin/team" class="btn btn-secondary">Back</a>
                            {{ Form::submit('Update',['class'=>'btn btn-danger'] ) }}
                     </div>
                </div>
     {!! Form::close() !!}
     
        </div>
    </div>
    </div>
</div>

                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->

            @endsection
        