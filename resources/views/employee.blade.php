@extends('layout.welcome')
@section('contents')
<br>
    <div class="container">
        <div class="col-sm-12">
            <div class="row">
        <div class="col-sm-5">
            <div class="row">
                <div class="col-sm-12">
                    <h3>Employees</h3>
                </div>

        </div>
        </div>
        <div class="col-sm-7">
<table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Age</th>
                        <th scope="col">Department</th>
                      </tr>
                    </thead>
                    <tbody>
            @if(count($emp) > 0)

                @foreach ($emp as $bookings)
                      <tr>
                      <th scope="row">{{ $bookings->__pk }}</th>
                        <td>{{ $bookings->first_name }}</td>
                      <td>{{ $bookings->last_name }}</td>
                      <td>{{ $bookings->age }}</td>
                      <td>{{ $bookings->department_name }}</td>
                      </tr>

                @endforeach
             </tbody>
                  </table>
            </div>

            @else
            <div>
                <h3>No Employees</h3>
            </div>
            @endif
        </div>
        </div>
    </div>
@endsection
