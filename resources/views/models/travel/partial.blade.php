@extends('layouts.app')

@section('content')

@php
$plural = str_plural($model);
@endphp

<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-1">
            {{ ucfirst(explode('.', Route::currentRouteName())[1]) }} {{ ucfirst($model) }}</div>
        </h5>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card-body">
                        <form id="{{ $model }}-form" method="POST" action="{{ $route }}">
                            @csrf
                            
                            @if (Route::is("$plural.edit"))
                            {{ method_field('PUT') }}                            
                            @endif                                               
                            
                            <div class="form-group row">
                                <label for="activity" class="col-md-4 col-form-label text-md-right">Activity</label>
                                
                                <div class="col-md-6">
                                    <input type="text" class="form-control{{ $errors->has('activity') ? ' is-invalid' : '' }}" id="activity" name="activity" value="{{ old('activity', optional($model)->activity) }}" required autofocus>
                                    
                                    @if ($errors->has('activity'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('activity') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="venue" class="col-md-4 col-form-label text-md-right">Venue</label>
                                
                                <div class="col-md-6">
                                    <input id="venue" type="text" class="form-control{{ $errors->has('venue') ? ' is-invalid' : '' }}" name="venue" value="{{ old('venue', optional($model)->venue) }}" required>
                                    
                                    @if ($errors->has('venue'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('venue') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            
                            {{-- <div class="form-group row">
                                <label for="office_id" class="col-md-4 col-form-label text-md-right">Office</label>
                                <div class="col-md-6">
                                    @component('components.select', ['datasource' => collect([0 => ['id' => 1, 'name' => 'test office']]), 'value' => old('office_id')])
                                    @slot('name')
                                    office_id
                                    @endslot
                                    required
                                    @endcomponent
                                </div>
                            </div> --}}
                            
                            <div class="form-group row">
                                <label for="startdate" class="col-md-4 col-form-label text-md-right">Start Date</label>
                                
                                <div class="col-md-6">
                                    <input type="date" name="startdate" id="startdate" class="form-control" placeholder="Start Date" value="{{ old('startdate', optional($model)->startdate) }}" required autocomplete="off">
                                    
                                    @if ($errors->has('startdate'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('startdate') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="enddate" class="col-md-4 col-form-label text-md-right">End Date</label>
                                
                                <div class="col-md-6">
                                    <input type="date" name="enddate" id="enddate" class="form-control" placeholder="End Date" value="{{ old('enddate', optional($model)->enddate) }}" required autocomplete="off">
                                    
                                    @if ($errors->has('enddate'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('enddate') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"></label>
                            </div>                           
                            
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary float-right">
                                        <i class="fa fa-save"></i> SAVE
                                    </button>
                                    <a class="btn float-right" href="javascript:void();" onclick="window.history.back();"><i class="fa fa-arrow-left"></i> Back</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    
    @push('scripts')
    <script type="text/javascript">
        flatpickr('#startdate', {allowInput: true});
        flatpickr('#enddate', {allowInput: true});
    </script>
    @endpush
    