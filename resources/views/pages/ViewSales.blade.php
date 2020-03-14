<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
<title>@yield('title') - {{config('app.name')}}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="{{ asset('yo/font-awesome.css') }}" rel="stylesheet">
<link href="{{ asset('yo/bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('yo/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ asset('yo/buttons.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ asset('datatable/style.css') }}" rel="stylesheet">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('icon/favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('icon/favicon-96x96.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('icon/favicon-16x16.png') }}">
<link rel="manifest" href="{{ asset('icon/manifest.json') }}">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="{{ asset('icon/ms-icon-144x144.png') }}">
<meta name="theme-color" content="#ffffff">



</head>
<body>

<!-- partial:index.partial.html -->
<div class="container">


  <div class="row">

    <div class="col-12" >
      <h3 class="titulo-tabla">All Transcation Information  </h3>

<div id="buttons"><a href="{{ url('/vendor') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></div>


      <table id="ejemplo" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
              <th>S/N</th>
                <th>Name</th>
                  <th>Tag Id</th>
                <th>items</th>
                <th>Quantity</th>
                <th>price</th>
                <th>Time In</th>
                  <th>Cummulative Total</th>
            </tr>
        </thead>
        <tbody>
  <?php $count ='1';?>
          @foreach($posts as $p)
<?php
// $name2=App\Model\mtncotumer::usersinfo323($p->reg);
 $name=App\Model\transcations::usersinfo($p->user_id);
// $phone2=App\Model\mtncotumer::phoneinfo2($p->reg);
// $phone=App\Model\mtncotumer::phoneinfo($p->reg);
// $group=App\Model\mtncotumer::usersinfogroup($p->reg);
?>
<?php
 $sum += $p->item_price * $p->quqntity;
   ?>
            <tr>
              <td>{{$count++}}</td>
              <td>{{$name}}</td>
              <td>{{$p->user_id}}</td>
              <td>{{$p->items}}</td>
              <td>{{$p->quqntity}}</td>
                <td>{{$p->item_price}}</td>
                <td>{{date('d/m/Y h:i:a',strtotime($p->created_at))}}</td>
                {{-- <td colspan="6"></td> --}}
                <td style="color:red;">N {{$sum}}</td>
            </tr>


@endforeach

{{-- <tr>
  <td colspan="5"></td>
  <td style="color:red;">N {{$sum}}</td>

</tr> --}}
        </tbody>
        <tr>
          <td colspan="6"></td>
          <td style="color:red;">Sum Total: N {{$sum}}</td>

        </tr>
        <tfoot>
            <tr>
              <th>S/N</th>
                <th>Name</th>
                  <th>Tag Id</th>
                <th>items</th>
                <th>Quantity</th>
                <th>price</th>
                <th>Time In</th>
                  <th>Cummulative Total</th>
            </tr>
        </tfoot>

    </table>




    </div>
  </div>






</div>


<script src="{{ asset('yo/js/jquery.min.js') }}" ></script>
<script src="{{ asset('yo/js/popper.min.js') }}" ></script>
<script src="{{ asset('yo/js/bootstrap.min.js') }}" ></script>
<script src="{{ asset('yo/js/jquery.dataTables.min.js') }}" ></script>
<script src="{{ asset('yo/js/dataTables.bootstrap4.min.js') }}" ></script>
<script src="{{ asset('yo/js/dataTables.buttons.min.js') }}" ></script>
<script src="{{ asset('yo/js/buttons.bootstrap4.min.js') }}" ></script>
<script src="{{ asset('yo/js/jszip.min.js') }}" ></script>
<script src="{{ asset('yo/js/pdfmake.min.js') }}" ></script>
<script src="{{ asset('yo/js/vfs_fonts.js') }}" ></script>
<script src="{{ asset('yo/js/buttons.html5.min.js') }}" ></script>
<script src="{{ asset('yo/js/buttons.print.min.js') }}" ></script>
<script src="{{ asset('yo/js/buttons.colVis.min.js') }}" ></script>
{{-- <script src="{{ asset('datatable/script.js') }}" ></script> --}}
<script>
var table = $('#ejemplo').DataTable();

var buttons = new $.fn.dataTable.Buttons(table, {
  buttons: [


            {
                extend:    'copyHtml5',
                text:      '<i class="fa fa-clipboard"></i>Copiar',
                title:'Titulo de tabla copiada',
                titleAttr: 'Copiar',
                className: 'btn btn-app export barras',
                exportOptions: {
                    columns: [ 0, 1 , 2, 3, 4,5,6,7]
                }
            },

            {
                extend:    'pdfHtml5',
                text:      '<i class="fa fa-file-pdf-o"></i>PDF',
                title:'Titulo de tabla en pdf',
                titleAttr: 'PDF',
                className: 'btn btn-app export pdf',
                exportOptions: {
                        columns: [ 0, 1 ,2,3,4,5,6,7]
                },
                customize:function(doc) {

                    doc.styles.title = {
                        color: '#4c8aa0',
                        fontSize: '30',
                        alignment: 'center'
                    }
                    doc.styles['td:nth-child(2)'] = {
                        width: '100px',
                        'max-width': '100px'
                    },
                    doc.styles.tableHeader = {
                        fillColor:'#4c8aa0',
                        color:'white',
                        alignment:'center'
                    },
                    doc.content[1].margin = [ 100, 0, 100, 0 ]

                }

            },

            {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel-o"></i>Excel',

                titleAttr: 'Excel',
                className: 'btn btn-app export excel',
                exportOptions: {
                    columns: [ 0, 1 ,2,3,4,5,6,7]
                },
            },
            {
                extend:    'csvHtml5',
                text:      '<i class="fa fa-file-text-o"></i>CSV',
                title:'Titulo de tabla en CSV',
                titleAttr: 'CSV',
                className: 'btn btn-app export csv',
                exportOptions: {
                      columns: [ 0, 1 ,2,3,4,5,6,7]
                }
            },
            {
                extend:    'print',
                text:      '<i class="fa fa-print"></i>Imprimir',
                title:'Titulo de tabla en impresion',
                titleAttr: 'Imprimir',
                className: 'btn btn-app export imprimir',
                exportOptions: {
                      columns: [ 0, 1 ,2,3,4,5,6,7]
                }
            },
            {
                extend:    'pageLength',
                titleAttr: 'Registros a mostrar',
                className: 'selectTable'
            }
        ]
   //  buttons: [
   //    'copyHtml5',
   //    'excelHtml5',
   //    'csvHtml5',
   //    'pdfHtml5'
   // ]
}).container().appendTo($('#buttons'));
</script>
</body>
</html>
