@extends('layouts.master')

@section('title')
{{ __('sentence.View Prescription') }}
@endsection

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"></h1>
            <a href="{{ url('prescription/pdf/'.$prescription->id) }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-print fa-sm text-white-50"></i> Print</a>
          </div>
<div class="row justify-content-center">
   <div class="col-10">
      <div class="card shadow mb-4">
         <div class="card-body">
            <!-- ROW : Doctor informations -->
            <div class="row">
               <div class="col">
                  {!! clean(App\Setting::get_option('header_left')) !!}
               </div>
               <div class="col-md-3">
                  <p>Tunis, {{ __('sentence.On') }} {{ $prescription->created_at->format('d-m-Y') }}</p>
               </div>
            </div>
            <!-- END ROW : Doctor informations -->
            <!-- ROW : Patient informations -->
            <div class="row">
               <div class="col">
                  <hr>
                  <p>
                     <b>{{ __('sentence.Patient Name') }} :</b> {{ $prescription->User->name }}
                     @isset($prescription->User->Patient->birthday)
                     - <b>{{ __('sentence.Age') }} :</b> {{ $prescription->User->Patient->birthday }} ({{ \Carbon\Carbon::parse($prescription->User->Patient->birthday)->age }} Years)
                     @endisset
                     @isset($prescription->User->Patient->gender)
                     - <b>{{ __('sentence.Gender') }} :</b> {{ __('sentence.'.$prescription->User->Patient->gender) }}
                     @endisset
                     @isset($prescription->User->Patient->weight)
                     - <b>{{ __('sentence.Patient Weight') }} :</b> {{ $prescription->User->Patient->weight }} Kg
                     @endisset
                     @isset($prescription->User->Patient->height)
                     - <b>{{ __('sentence.Patient Height') }} :</b> {{ $prescription->User->Patient->height }}
                     @endisset
                  </p>
                  <hr>
               </div>
            </div>
            <!-- END ROW : Patient informations -->
            @if(count($prescription_drugs) > 0)
            <!-- ROW : Drugs List -->
            <div class="row justify-content-center">
               <div class="col">
                  @foreach ($prescription_drugs as $drug)
                  <li>{{ $drug->type }} - {{ $drug->Drug->trade_name }} {{ $drug->strength }} - {{ $drug->dose }} - {{ $drug->duration }} <br> {{ $drug->drug_advice }}</li>
                     @if($loop->last)
                        <div style="margin-bottom: 150px;"></div>
                        <hr>
                      @endif
                  @endforeach
                 
               </div>
            </div>
            @endif
            @if(count($prescription_tests) > 0)
            <!-- ROW : Tests List -->
            <div class="row justify-content-center">
               <div class="col">
                  <strong><u>{{ __('sentence.Test to do') }} </u></strong><br><br>
                  @foreach ($prescription_tests as $test)
                  <li>{{ $test->Test->test_name }} @empty(!$test->description) - {{ $test->description }} @endempty</li>
                     @if($loop->last)
                        <div style="margin-bottom: 150px;"></div>
                        <hr>
                      @endif
                  @endforeach
                  <hr>
               </div>
            </div>
            <!-- END ROW : Tests List -->
            @endif
            <!-- ROW : Footer informations -->
            <div class="row">
               <div class="col">
                  <p class="font-size-12">{!! clean(App\Setting::get_option('footer_left')) !!}</p>
               </div>
               <div class="col">
                  <p class="float-right font-size-12">{!! clean(App\Setting::get_option('footer_right')) !!}</p>
               </div>
            </div>
            <!-- END ROW : Footer informations -->
         </div>
      </div>
   </div>
</div>
@endsection

@section('header')
<style type="text/css">
   p, u, li {
      color: #444444 !important; 
   }

</style>
@endsection
@section('footer')
@endsection

