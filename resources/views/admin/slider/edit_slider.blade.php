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
                               Edit Slider
                            </h1>
                        </div>
                        <div class="col-sm-5 text-right hidden-xs">
                            <ol class="breadcrumb push-10-t">
                                <li>Edit</li>
                                <li><a class="link-effect" href="/admin/slider">All </a></li>
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
                    {!! Form::open(['action' => ['sliderController@update', $slider->id ], 'method' => 'POST','files' => true,'class'=> 'form-horizontal push-10-t']) !!}

              
                     <div class="form-group">
                       <label class="col-xs-12" for="example-text-input">Title</label>
                        <div class="col-sm-12">
                        <input class="form-control" type="text"  name="title" placeholder="Enter title" value="{{$slider->title}}" required>
                        </div>
                     </div>

                     <div class="form-group">
                            <label class="col-xs-12" for="example-text-input">Link</label>
                             <div class="col-sm-12">
                             <textarea class="form-control" name="link">{{ $slider->link }}</textarea>
                             </div>
                    </div>

                    <div class="form-group">
                            <label class="col-xs-12" for="example-text-input">Buton Text</label>
                             <div class="col-sm-12">
                               <input class="form-control" type="text"  name="btn_txt" placeholder="button text" value="{{$slider->btn_text}}" >
                             </div>
                     </div>
                   
                    <div class="form-group">
                        <div class=" block-content-full">
                                <label class="col-xs-12" for="example-text-input">Content</label>
                                            <!-- Summernote Container -->
                        <textarea class="js-summernote" name="content"> {{ $slider->content }}</textarea>
                                            
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
                                     <label class="" for="example-file-input">Image</label>
                                     <input type="file" id="imageupload" name="pic" >  
                                     <div id="preview-image"><img src="{{ asset('slider_images/'.$slider->pic) }}" class="thumbimage"></div>
                                </div>
                            </div>
                        </div>

                    

       <div class="block">        
         <div class="block-content">
           <div class="form-horizontal">                      
           

                <div class="form-group">
                        <label class="col-xs-12" for="example-select">Visibility</label>
                         <div class="col-sm-12">
                           <select class="form-control" id="datepicker" name="visibility" size="1" required>
                               <option @if($slider->visibility == "Public") selected @endif value="Public">Public</option>
                               <option  @if($slider->visibility == "Private") selected @endif value="Private">Private</option>
                           </select>
                         </div>
                </div>

             <div class="form-group">
                    <label class="col-xs-12" for="example-select">Publish</label>
                     <div class="col-sm-12">
                            <div class='input-group date' id='datetimepicker1'>
                                    <input type='text' class="form-control" name="publish" required value="{{$slider->publish}}"/>
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
                 <div class="form-group">
                        <div class="col-xs-12">
                                {{ Form::hidden('_method','PUT')}}
                                <a href="/admin/slider" class="btn btn-secondary">Back</a>
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
        