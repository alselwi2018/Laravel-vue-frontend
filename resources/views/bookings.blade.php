@extends('layout.welcome')
@section('contents')
    <div class="container">
        <div class="col-sm-12">
            <div class="row">
        <div class="col-sm-5">
            <div class="row">
                <div class="col-sm-12">
                    <h3>Booked Places</h3>
                </div>

        </div>
        </div>
        <div class="col-sm-7">

            @if(count($book) > 0)

                @foreach ($book as $bookings)

                    <div class="col-sm-12">
                    <h4>{{ $bookings->property_name }}</h4>
                    <i class="fas fa-map-marker-alt"></i>  {{ $bookings->location_name }}
                       <div class="d-flex"><span class="fas fa-calendar-alt"></span>&nbsp;  <p><b>From date:</b>  {{$bookings->start_date}} </p></div>
                       <div class="d-flex"><span class="fas fa-calendar-alt"></span>&nbsp; <p><b>To Date:</b> {{ $bookings->end_date }}</p></div>
                       <div class="d-flex"><p>Near Beach:&nbsp; </p><p> @if($bookings->near_beach == 1)

                        Yes @else No @endif</p></div>

                    <div class="d-flex">Sleeps: &nbsp; <b>{{ $bookings->sleeps }}</b>
                    &nbsp; <i class="fas fa-bed"></i> &nbsp;<b>{{ $bookings->beds }}</b> &nbsp;Pets:&nbsp; @if($bookings->accepts_pets == 1 ) Yes @else No @endif</div>
                    <span class="float-right" style="color:red;"> </span>
                    </div>

                @endforeach
            </div>

            @else
            <div>
                <h3>No Bookings</h3>
            </div>
            @endif
        </div>
        </div>
    </div>
@endsection
