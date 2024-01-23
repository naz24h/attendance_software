@extends('admin.master')


@section('content')

<div class="content-wrapper">

    <div class="page-header">
        <h3 class="page-title">Edit Attendance</h3>
     
      </div>

    <div class="row">
        <div class="col grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
          
              <form class="forms-sample" action="{{ route('employee.attendance.update',$editData['0']['date']) }}" method="post" > 
                @csrf 

              <div class="row">
                <div class="col-md-12">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
        
                                <label class="form-label">Attendance Date <span class="text-danger">*</span></label>
                                <input type="date" name="date" class="form-control" required="" value="{{ $editData['0']['date'] }}">
                                  
                              </div>
                        </div>


                        <div class="col-md-6">
                            <table class="table table-bordered table-striped" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th rowspan="2" class="text-center" style="vertical-align: middle;">Sl</th>
                                    <th rowspan="2" class="text-center" style="vertical-align: middle;">Employee List</th>
                                    <th colspan="3" class="text-center" style="vertical-align: middle; width: 30%;">Attendance Status</th>
                                </tr>

                                <tr>
                                    <th class="text-center btn present_all" style="display: table-cell; background-color: #2f8d31; color: white;">Present</th>
                                    <th class="text-center btn leave_all" style="display: table-cell; background-color: #2f8d31; color: white;">Leave</th>
                                    <th class="text-center btn absent_all" style="display: table-cell; background-color: #2f8d31; color: white;">Absent</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($editData as $key => $data)
                                <tr id="div{{$data->id}}" class="text-center">
                                    <input type="hidden" name="employee_id[]" value="{{ $data->employee_id }}">

                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $data['admin']['name'] }}</td>
                                    <td colspan="3">
                                        <div class="switch-toggle switch-3 switch-candy">
                                            <input name="attend_status{{$key}}" type="radio" id="present{{$key}}" value="Present" checked="checked" {{ ($data->attend_status == 'Present')? 'checked': '' }}>
                                            <label for="present{{$key}}">Present</label>

                                            <input name="attend_status{{$key}}" type="radio" id="leave{{$key}}" value="Leave" {{ ($data->attend_status == 'Leave')? 'checked': '' }}>
                                            <label for="leave{{$key}}">Leave</label>

                                            <input name="attend_status{{$key}}" type="radio" id="absent{{$key}}" value="Absent" {{ ($data->attend_status == 'Absent')? 'checked': '' }} >
                                            <label for="absent{{$key}}">Absent</label>
                                        </div>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>

                            </table>
                        </div>

                       </div>
        
                       
                        
                    

                </div>
              </div>


              
                <button type="submit" class="btn btn-primary mr-2">Update</button>
                <a  class="btn btn-light" href="">Cancel</a>
              </form>

            </div>
          </div>
        </div>

</div>



@endsection