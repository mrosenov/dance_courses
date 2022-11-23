@extends('admin.layouts.default_admin')

@section('section')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{route('holidays')}}">Holidays</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Holiday</li>
        </ol>
    </nav>
    <div class="card card-default">
        <div class="card-body">
            <form method="POST" action="{{route('update-holiday', $holiday->id)}}">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="HolidayName">Holiday Name</label>
                    <input name="name" type="text" class="form-control" id="HolidayName" placeholder="Name" value="{{$holiday->name}}" required>
                </div>
                <div class="form-group">
                    <label for="HolidayDescription">Short Description</label>
                    <textarea name="short_description" class="form-control" id="HolidayDescription" rows="3" required>{{$holiday->description}}</textarea>
                </div>
                <label class="text-dark font-weight-medium" for="HolidayFrom">Holiday From</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text mdi mdi-calendar" id="HolidayFrom"></span>
                    </div>
                    <input name="holiday_from" type="datetime-local" class="form-control" data-mask="00/00/0000" value="{{$holiday->holiday_from}}" required>
                </div>
                <label class="text-dark font-weight-medium" for="HolidayTo">Holiday To</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text mdi mdi-calendar" id="HolidayTo"></span>
                    </div>
                    <input name="holiday_to" type="datetime-local" class="form-control" data-mask="00/00/0000" value="{{$holiday->holiday_to}}" required>
                </div>
                <div class="form-footer mt-6">
                    <button type="submit" class="btn btn-success w-100">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
