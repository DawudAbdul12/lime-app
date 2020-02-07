@extends('admin.layout.app')
@section('content')

          <!-- Main Container -->
            <main id="main-container">
              
                <div class="content bg-gray-lighter visibility-hidden"   data-toggle="appear" data-class="animated bounceIn">
                    <div class="row items-push">
                        <div class="col-sm-12">
                              <h1 class="page-title">
                                Edit Category 
                            </h1>
                        </div>
                    </div>
                </div>
                  
                @include('admin.message')
                <!--  -->
                    <div class="content animated fadeInLeft">
                        <div class="row">
                        <div class="col-md-4">
                            <!-- Default Elements -->
                            <div class="block">
                                {{-- <div class="block-header">
                                    <h3 class="title">Add New Product Category</h3>
                                <p> Product categories for your store can be managed here.</p>
                                </div> --}}
          <div class="block-content block-content-narrow">
           {!! Form::open(['action' => ['productCategoryController@update', $category->id ], 'method' => 'POST','files' => true,'class'=> 'form-horizontal push-10-t']) !!}
        {{-- {!! Form::open(['action' => 'categoryController@store', 'method' => 'POST','files' => true,'class'=> 'form-horizontal push-10-t'] ) !!} --}}
            <div class="form-group">
                    <div class="col-sm-12">
                        <div class="form-material floating">
                        <input class="form-control" type="text" id="material-text2" name="title" required  value="{{$category->title}}">
                            <label for="material-text2">Enter  Title</label>
                        </div>
                    </div>
             </div>

             <div class="form-group">
                    <div class="col-sm-12">
                        <div class="form-material floating">
                            <select class="js-select2 form-control" id="material-select2" name="parent" size="1" required>
                                   
                                    <option value="0">None</option><!-- Empty value for demostrating material select box -->
                                    @foreach ($parent as $item)
                                       <option  @if($category->parent == $item->id)   selected  @endif value="{{$item->id}}">{{$item->title}}</option>
                                    @endforeach
                            </select>
                            <label for="material-select2">Parent</label>
                        </div>
                    </div>
             </div>

             <div class="form-group">
                    <div class="col-sm-12">
                        <div class="form-material floating">
                            <select class="js-select2 form-control" id="material-select2" name="position" size="1" required> 
                                    @php $totalCategories = count($categories); @endphp
                                    @for ($i = 1; $i <= $totalCategories; $i++)
                                    <option @if($category->position == $i)   selected  @endif value="{{$i}}">{{$i}}</option>
                                    @endfor
                            </select>
                            <input class="form-control" type="hidden"  name="i" value="{{$category->id}}">
                            <label for="material-select2">Position</label>
                        </div>
                    </div>
             </div>

             <div class="form-group">
                    <div class="col-sm-12">
                        <div class="form-material floating">
                            <select class="js-select2 form-control" id="material-select2" name="publish" size="1" required>
                                <option></option><!-- Empty value for demostrating material select box -->
                                <option  @if($category->publish == "Yes")   selected  @endif value="Yes">Yes</option>
                                <option  @if($category->publish == "No")   selected  @endif value="No">No</option>
                            </select>
                            <label for="material-select2">Publish</label>
                        </div>
                    </div>
             </div>

             <div class="form-group">
                    <div class="col-sm-12">
                            <label for="material-text2">Category Description. If any</label>
                        <div class="form-material floating">
                        <textarea class="form-control" id="example-textarea-input" name="content" rows="6" placeholder="Content..">{{$category->content}}</textarea>
                        </div>
                    </div>
             </div>

          

                                     
            <div class="form-group">
                <div class="col-xs-12">
                        {{ Form::hidden('_method','PUT')}}
                        <a href="/admin/product/categories" class="btn btn-secondary">Back</a>
                        {{ Form::submit('Update',['class'=>'btn btn-danger'] ) }}

                    {{-- <button class="btn btn-sm btn-primary" type="submit" name="submit">Update Category</button> --}}
                 </div>
            </div>

       
        {!! Form::close() !!}
        </div>
    </div>
    <!-- END Default Elements -->
                        </div>
                        <div class="col-md-8">
                            <!-- Normal Form -->
                            <div class="block">
                                <div class="block-content">
                            <table class="table table-bordered table-striped js-dataTable-full" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th class="hidden-xs">Slug</th>
                                            <th class="hidden-xs">Position</th>
                                            <th class="text-center" style="width: 10%;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                     @foreach ($parent as $item)
    
                                     <tr>  
                                            <td class="text-center">{{ $item->id }}</td>
                                            <td class="text-center">{{ $item->title }}</td>
    
                                            <td class="text-center">{{ $item->slug }}</td>
    
                                            <td class="text-center">{{ $item->position }}</td>

                                            <td class="text-center">
                                                <div class="btn-group">
                                                <a href="/admin/project/categories/{{ $item->id }}/edit" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
                                                {!! Form::open(['action' => ['productCategoryController@destroy', $item->id ], 'method' => 'POST']) !!}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" onClick ="return confirm('Are you sure You want to Delete')" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button> 
                                             {!! Form::close() !!}
                                               
                                                </div>
                                            </td>
                                    </tr>
    
                                    @foreach ($categories as $row)
                                        @if($row->parent == $item->id)
                                         <tr>  
                                                <td class="text-center">{{ $item->id }}</td>

                                                <td class="text-center"> <span aria-hidden="true">—</span> {{ $row->title }}</td>
    
                                                <td class="text-center">{{ $row->slug }}</td>

                                                <td class="text-center">{{ $row->position }}</td>

                                                <td class="text-center">
                                                    <div class="btn-group">
                                                    <a href="/admin/project/categories/{{ $row->id }}/edit" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>

                                                {!! Form::open(['action' => ['productCategoryController@destroy', $row->id ], 'method' => 'POST']) !!}
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" onClick ="return confirm('Are you sure You want to Delete')" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button> 
                                                 {!! Form::close() !!}
                                                    </div>
                                                </td>
                                        </tr>
                                       @endif
    
                                    @endforeach
    
                                 @endforeach
    
                                    </tbody>
                                </table>
                        </div>
                            </div>
                            <!-- END Normal Form -->

                           
                        </div>
                    </div>
                    </div>
                <!--  -->

                <!-- Page Content -->
               
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->


@endsection
    

         