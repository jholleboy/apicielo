@include('layout.navbar')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Bem Vindo!</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
            <div class="row">
              
              <form role="form" method="POST" action={{ route('pagamento') }} enctype="multipart/form-data">
                @csrf
                <div class="tab-content" >
                  <form class="form-horizontal">
                    <div class="form-group row"> 
                      <label for="example-text-input" class="col-auto col-form-label">Nome</label>
                      <div class="col-auto">
                      <input class="form-control" type="text" name="nome" placeholder="Nome">
                      @error('nome') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                  </div>
              </div>      
            </div>
            <div class="tab-content">
              <form class="form-horizontal">
                <div class="form-group row"> 
                  <label for="example-text-input" class="col-auto col-form-label">Valor</label>
                  <div class="col-auto">
                  <input class="form-control" type="number" name="valor" placeholder="Valor">
                  @error('valor') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
              </div>
          </div>     
        </div> 
        <div class="tab-content">
          <form class="form-horizontal">
            <div class="form-group row">
        <label for="example-type-input" class="col-auto col-form-label">Tipo</label>
                      <div class="col-auto">
                      <select class="form-control" name="tipo" id="tipo"> 
                           <option value="CreditCard">Cartão de Credito</option>
                      </select>   
                      </div>
                    </div>
                  </div>
    <div class="tab-content">
      <form class="form-horizontal">
        <div class="form-group row"> 
          <label for="example-text-input" class="col-auto col-form-label">Nº do Cartão</label>
          <div class="col-auto">
          <input class="form-control" type="number" name="numero" placeholder="Nº do Cartão">
          @error('numero') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
      </div>
  </div>     
</div> 
<div class="tab-content">
  <form class="form-inline">
  <div class="form-group row">   
    <label for="example-text-input" class="col-auto col-form-label">expiração</label>  
      <div class="col-auto">
        <input class="form-control mx-sm-3" type="month"  name="exp" value="date">
      @error('exp') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
  </div>
</div>     
</div> 
<div class="tab-content">
  <form class="form-inline">
    <div class="form-group row"> 
      <label for="example-text-input" class="col-auto col-form-label">Codigo de Segurança</label>
      <div class="col-auto">
      <input class="form-control mx-sm-3" type="number" name="seguranca" placeholder="Codigo de Segurança">
      @error('seguranca') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
  </div>
</div>     
</div> 
            <div class="offset-sm-2 col-sm-10">
              <button type="submit" class="btn btn-danger">Criar</button>
            </div>
            </form>
              
                
                   
                   
                  
                  
                  
         
            
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  

                @include('layout.footer')
