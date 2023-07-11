@include('layout.navbar')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{$dados->Customer->Name}}</h1>
          </div>
        </div>
      </div>
    </div>
    <div class="content">
      <div class="container-fluid">
            <div class="row">
              
              <form role="form" >
                @csrf
            <div class="tab-content">
              <form class="form-horizontal">
                <div class="form-group row"> 
                  <label for="example-text-input" class="col-auto col-form-label">Valor</label>
                  <div class="col-auto">
                  <input class="form-control" type="text" name="valor" placeholder="{{  'R$ '.number_format($dados->Payment->Amount, 2, ',', '.') }}" disabled>
                  @error('valor') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
              </div>
          </div>     
        </div> 
        <div class="tab-content">
          <form class="form-horizontal">
            <div class="form-group row"> 
              <label for="example-text-input" class="col-auto col-form-label">Tipo</label>
              <div class="col-auto">
              <input class="form-control" type="text" name="tipo" placeholder="{{$dados->Payment->Type}}" disabled>
              @error('tipo') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
          </div>
      </div>     
    </div> 
    <div class="tab-content">
      <form class="form-horizontal">
        <div class="form-group row"> 
          <label for="example-text-input" class="col-auto col-form-label">Data</label>
          <div class="col-auto">
          <input class="form-control" type="text" name="numero" placeholder="{{ date('H:m:i d/m/Y', strtotime($dados->Payment->ReceivedDate)) }}" disabled>
          @error('numero') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
      </div>
  </div>     
</div> 
@isset($dados->Payment->ReturnMessage)
<div class="tab-content">
  <form class="form-inline">
    <div class="form-group row"> 
      <label for="example-text-input" class="col-auto col-form-label">Status</label>
      <div class="col-auto">
        <font color="red"><h4>{{$dados->Payment->ReturnMessage}}</h4></font>
      @error('Status') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
  </div>
</div>     
</div>
@else
<div class="tab-content">
  <form class="form-inline">
    <div class="form-group row"> 
      <label for="example-text-input" class="col-auto col-form-label">Status:</label>
      <div class="col-auto">
        <font color="green"><h4>Completo</h4></font>
 </div>
</div>     
</div>
@endisset
            </form>    
        </div>
      </div>
    </div>
  </div>
  

                @include('layout.footer')
