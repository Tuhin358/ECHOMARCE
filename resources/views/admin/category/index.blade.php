@extends('admin.admin_master')
@section('admin_content')


<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>

            <p class="alert-success">
                @php
                    $message=Session::get('message');
                    if($message){
                        echo $message;
                    }else{
                        Session::put('message',null);
                    }
                @endphp
            </p>

            <h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
              <thead>
                  <tr>
                      <th style="width:10%">id</th>
                      <th style="width:10%"> Category_Name</th>
                      <th style="width:35%">Description</th>
                      <th style="width:15%">image</th>
                      <th style="width:10%">Status</th>
                      <th style="width:20%">Actions</th>
                  </tr>
              </thead>
              @foreach ($categories as $category)


              <tbody>
                <tr>
                    <td>{{ $category->id }}</td>
                    <td class="center">{{ $category->name }}</td>
                    <td class="center">{{ $category->description }}</td>
                    <td>
                        <img src="{{ asset('/storage/'.$category->image) }}" style="width:160px; height:80px">

                    </td>


                    <td class="center ">
                        @if($category->status==1)

                        <span class="label label-success">Active</span>
                        @else
                        <span class="label label-danger">Deactive</span>

                        @endif


                    </td>
                    <td class="row">
                        <div class="span3"></div>

                        <div class="span2 ">
                            @if($category->status==1)
                        <a  href="{{ url('/cat-status'.$category->id) }}" class="btn btn-success">
                            <i class="halflings-icon white thumbs-down"></i>
                        </a>
                        @else
                        <a  href="{{ url('/cat-status'.$category->id) }}" class="btn btn-danger">
                            <i class="halflings-icon white thumbs-up"></i>
                        </a>
                        @endif

                    </div>

                        <div class="span2">
                        <a  class="btn btn-info" href="{{url('/categories/'.$category->id.'/edit')}}" >
                            <i class="halflings-icon white edit"></i>
                        </a></div>

                        <div class="span2">
                            <form method="POST" action="{{ url('/categories/'.$category->id) }}">

                                @csrf
                                @method('DELETE')
                        <button class="btn btn-danger" type="submit">  <i class="halflings-icon white trash"></i></button>


                        </form>
                    </div>
                        <div class="spamn3"></div>
                    </td>
                </tr>


              </tbody>
              @endforeach
          </table>
        </div>
    </div><!--/span-->

</div><!--/row-->

@endsection
