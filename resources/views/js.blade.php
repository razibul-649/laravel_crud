@extends('master')

@section('page-name')
Javascipt
@endsection

@section('main-content')
<section class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <div class="card">
          <div class="card-header">Practice Javascript</div>
          <div class="card-body">
            <form class="row g-3">
              <div class="col-md-6">
                <label for="firstNumber" class="form-label">First Number</label>
                <input type="text" class="form-control" id="firstNumber" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');" placeholder="Enter First Number...">
              </div>
              <div class="col-md-6">
                <label for="secondNumber" class="form-label">Second Number</label>
                <input type="text" class="form-control" id="secondNumber" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');"  placeholder="Enter Second Number...">
              </div>
              <br>
              <br>
              <div class="col-md-12 text-center">
                <button type="button" onclick="add()" class="btn btn-success btn-sm px-3 me-3">+</button>
                <button type="button" onclick="sub()" class="btn btn-danger btn-sm px-3 me-3">-</button>
                <button type="button" onclick="mult()" class="btn btn-warning btn-sm px-3 me-3">*</button>
                <button type="button" onclick="div()" class="btn btn-primary btn-sm px-3">/</button>
              </div>

              <div class="col-md-12">
                <label for="result" class="form-label">Resut</label>
                <input type="number" class="form-control" id="result" placeholder="Result..."
               >
                
               <br>
               


         
             <div id="container">Here the numbers show in word</div>
              </div>

            </form>
          </div>  
        </div>
      </div>
    </div>
  </div>
</section>
@endsection