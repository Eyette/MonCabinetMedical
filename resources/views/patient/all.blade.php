@extends('layouts.master')

@section('title')
{{ __('sentence.All Patients') }}
@endsection

@section('content')

          <div class="card shadow mb-4">
            <div class="card-header py-3">
               <div class="row">
                <div class="col-8">
                    <h6 class="m-0 font-weight-bold text-primary w-75 p-2">{{ __('sentence.All Patients') }}</h6>
                </div>
                <div class="col-4">
                  <a href="{{ route('patient.create') }}" class="btn btn-primary btn-sm float-right "><i class="fa fa-plus"></i> {{ __('sentence.New Patient') }}</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>{{ __('sentence.Patient Name') }}</th>
                      <th class="text-center">{{ __('sentence.Age') }}</th>
                      <th class="text-center">{{ __('sentence.Phone') }}</th>
                      <th class="text-center">{{ __('sentence.Blood Group') }}</th>
                      <th class="text-center">{{ __('sentence.Date') }}</th>
                      <th class="text-center">{{ __('sentence.Actions') }}</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($patients as $patient)
                    <tr>
                      <td>{{ $patient->id }}</td>
                      <td><a href="{{ url('patient/view/'.$patient->id) }}"> {{ $patient->name }} </a></td>
                      <td class="text-center"> {{ \Carbon\Carbon::parse($patient->Patient->birthday)->age }} </td>
                      <td class="text-center"> {{ $patient->Patient->phone }} </td>
                      <td class="text-center"> {{ $patient->Patient->blood }} </td>
                      <td class="text-center"><label class="badge badge-primary-soft">{{ $patient->created_at->format('d M Y H:i') }}</label></td>
                      <td class="text-center">
                        <a href="{{ url('patient/view/'.$patient->id) }}" class="btn btn-outline-success btn-circle btn-sm"><i class="fa fa-eye"></i></a>
                        <a href="{{ url('patient/edit/'.$patient->id) }}" class="btn btn-outline-warning btn-circle btn-sm"><i class="fa fa-pen"></i></a>
                        <a href="#" data-link="{{route('patient.delete',$patient->id)}}" class="btn btn-outline-danger btn-circle btn-sm" data-toggle="modal" data-target="#DeleteModal" data-link="#"><i class="fas fa-trash"></i></a>
                      </td>
                    </tr>
                    @endforeach
                   
                  </tbody>
                </table>
               <span class="float-right mt-3">{{ $patients->links() }}</span>

              </div>
            </div>
          </div>
@endsection

  