@include('layout.navbar')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Bem Vindo!</h1>
          </div>
        </div>
      </div>
    </div>
    <div class="content">
      <div class="container-fluid">
            
              
              <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Opção</th>
                    </tr>
                </thead>
                <tbody>
                 @foreach ($lista as $lista)
                 <tr>
                  <td>{{$lista->id}}</td>
                  <td>{{$lista->nome}}</td>
                  <td><a  href="{{ route('consulta', ['id'=>$lista->id]) }}"><i class="fa-solid fa-magnifying-glass fa-fade"></i></a>|</td>
              </tr>   
                 @endforeach
                </tbody>
                <tfoot>                   
                </tfoot>
            </table>
      </div>
    </div>    
  </div>
  <script type="text/javascript">
    $(document).ready(function () {
$('#example').DataTable({
"lengthChange": false,


language: {
lengthMenu: 'Ver _MENU_',
zeroRecords: 'Não encontrado - Desculpe',
info: 'Pagina _PAGE_ de _PAGES_',
infoEmpty: 'Sem Usuarios',
infoFiltered: '(Filtrado por _MAX_)',
search: 'Pesquisa',
"paginate": {
"first":      "Primeira",
"last":       "Ultima",
"next":       "Proxima",
"previous":   "Voltar"
},
},});
});
  </script>

                @include('layout.footer')
