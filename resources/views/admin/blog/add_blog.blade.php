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
                               Add Blog
                            </h1>
                        </div>
                        <div class="col-sm-5 text-right hidden-xs">
                            <ol class="breadcrumb push-10-t">
                                <li>BLog</li>
                                <li><a class="link-effect" href="/admin/blog">All Blog</a></li>
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

                 {!! Form::open(['action' => 'blogController@store', 'method' => 'POST','files' => true,'class'=> 'form-horizontal push-10-t'] ) !!}
                                        
                     <div class="form-group">
                       <label class="col-xs-12" for="example-text-input">Title</label>
                        <div class="col-sm-12">
                          <input class="form-control" type="text" id="title" name="title" placeholder="Blog Title"  required>
                        </div>
                     </div>
                   
            <div class="form-group">
                 <div class=" block-content-full">
                        <label class="col-xs-12" for="example-text-input">Content</label>
                                    <!-- Summernote Container -->
                        <textarea class="js-summernote" name="content"></textarea>
                                    
                 </div>
            </div>
    <br>
           
   
                                   
    </div>
</div>



                        </div>
                     <div class="col-md-4">

                        <div class="block">
                          <!-- featured image here -->
                            <div class="block-content">
                                <div class="form-group">
                                     <label class="" for="example-file-input">Feature Image</label>
                                     <input type="file" id="imageupload" name="pic"  required="">  
                                     <div id="preview-image"></div>
                                     
                                </div>
                            </div>
        
                        </div>


                        <div class="block">    
                            <div class="block-content">
                            <div class="form-horizontal">
                                    <div class="form-group">
                                            <label class="col-xs-12" for="example-select">Select Category</label>
                                            <div class="col-sm-12">
                                                    <select  class="js-select2 form-control" id="example2-select2"  style="width: 100%;" data-placeholder="Choose many.."  multiple  name="category"  required="">
                                                      @foreach ($parent as $item)
                                                       <option value="{{$item->id}}">{{$item->title}}</option>
                                                        @foreach ($categories as $row)
                                                          @if($row->parent == $item->id)
                                                    <option value="{{$row->id}}"> <span aria-hidden="true">—</span>{{$row->title}}</option>
                                                          @endif
                                                         @endforeach
                                                        @endforeach
                                                    </select>
                                            </div>
                                    </div>           
                                </div>
                            </div>
                        </div>


       <div class="block">        
         <div class="block-content">
           <div class="form-horizontal">                      
             <div class="form-group">
                <label class="col-xs-12" for="example-tags1">Tag</label>
                    <div class="col-xs-12">
                      <input class="js-tags-input form-control" type="text" id="example-tags1" name="tag" >
                    </div>
                </div>
            <div class="form-group">
                 <label class="col-xs-12" for="example-select">Visibility</label>
                  <div class="col-sm-12">
                    <select class="form-control" id="datepicker" name="visibility" size="1">
                        <option value="Public">Public</option>
                        <option value="Private">Private</option>
                    </select>
                  </div>
             </div>

             <div class="form-group">
                    <label class="col-xs-12" for="example-select">Publish</label>
                     <div class="col-sm-12">
                            <div class='input-group date' id='datetimepicker1'>
                                    <input type='text' class="form-control" name="publish" />
                                    <input type='hidden' class="form-control" id="publish" value="" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                            </div>
                        {{-- <input class="js-datepicker form-control" type="text" id="datepicker" name="publish" > --}}
                     </div>
            </div>

            
                        
            <div class="form-group">
                    <label class="col-xs-12" for="example-text-input">Author</label>
                     <div class="col-sm-12">
                       <input class="form-control" type="text"  name="author" placeholder="Author"  value="" required>
                     </div>
            </div>


           </div>
          </div>
        </div>

                 <!-- post btn here --> 
            <div class="form-group">
                <div class="col-xs-12">
                   <button class="btn btn-sm btn-primary  pull-right" type="submit" name="submit">Publish</button>
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
        