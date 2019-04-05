$(document).ready(function(){
    configToast();
    $(".menu-icon").click(()=>{
        $(".menu").toggleClass("menu-hide");
        $("font").toggleClass("show");
        $(".content").toggleClass("menu-hide-content");
    });
    
    $("#home, #ihome").click(()=>{
        removeClass();
        //showContent("/home");
        window.location = "home";
        $("#ihome, #home > font").addClass("activo");
    });
    
    $("#movement, #imovement").click(()=>{
        removeClass();
        //showContent("movement");
        window.location = "movement";
        $("#imovement, #movement > font").addClass("activo");
    });
    
    $("#users, #iusers").click(()=>{
        removeClass();
        $("#iusers, #users > font").addClass("activo");
    });
    
    $("#people, #ipeople").click(()=>{
        removeClass();
        $("#ipeople, #people > font").addClass("activo");
        $("label, #tabpanel").addClass("label");
        window.location = "personas";
        //showContent("/personas");
    });
    
    $("#positions, #ipositions").click(()=>{
        removeClass();
        $("#ipositions, #positions > font").addClass("activo");
        window.location = "areas";
    });
    
    if(window.location.href.indexOf('home') > -1)
    {
        /*$(".subtitle h4").text("Trabajadores registrados");
         list('register','.tableContent','example');*/
         
        onlyList('returnHome', '.tableContent');
        $("#reporteContent").click(function(){
            $(".subtitle h4").text("Reporte");
            
              var fecha = new Date(); //Fecha actual
              var mes = fecha.getMonth()+1; //obteniendo mes
              var dia = fecha.getDate(); //obteniendo dia
              var ano = fecha.getFullYear(); //obteniendo año
              if(dia<10)
                dia='0'+dia; //agrega cero si el menor de 10
              if(mes<10)
                mes='0'+mes //agrega cero si el menor de 10
              
            const filter = "<div class='row' style='width:98%; margin-bottom:40px;' id='contentInputs'>"+
            "<div class='col-md-3'>"+
                "<input type='hidden' name='tokenHome' id='tokenHome' value='{{ csrf_token() }}'/>"+
                "<label id='fecha_iniciolb'>Fecha de inicio:</label>"+
                "<input type='date' name='fecha_iniciolb' id='fecha_inicio' value='"+ano+"-"+mes+"-"+dia+"' class='form-control' onchange='reportFilter();'/>"+
            "</div>"+
            "<div class='col-md-3'>"+
                "<label id='fecha_finlb'>Fecha fin:</label>"+
                "<input type='date' name='fecha_finlb' id='fecha_fin' value='"+ano+"-"+mes+"-"+dia+"' class='form-control' onchange='reportFilter();'/>"+
            "</div>"+
            "<div class='col-md-3'>"+
                "<label id='typelb'>Concepto:</label>"+
                "<select name='typelb' id='type' class='form-control' onchange='reportFilter();'>"+
                    "<option value='Entrada'>Entrada</option>"+
                    "<option value='Salida'>Salida</option>"+
                    "<option value='Todo'>Todo</option>"+
                "</select>"+
            "</div>"+
            "<div class='col-md-3'>"+
                "<button class='btn btn-success' style='margin:20px;height:50px;width:90px;float:left;font-size:20px;' onclick='exportExcel();'><i class='fas fa-table'></i></button>"+
                "<button class='btn btn-primary' style='margin:20px;height:50px;width:90px;float:right;font-size:20px;' onclick='exportPDF();'><i class='fas fa-file-pdf'></i></button>"+
            "</div>"+
            "</div>";
            
            $.get("report", function(data){
                $('.tableContent').empty().html(filter+data);    
                myDataTable("report");
            });
        });
        
        $("#inasistenciaContent").click(function(){
             $(".subtitle h4").text("Inasistencia de personal");    
             list('inasistencia','.tableContent','inasistencia');
        });
        
        $("#estadisticaContent").click(function() {
           $(".subtitle h4").text("Estadísticas"); 
           $(".tableContent").empty();
           estadistica();
        });
    }
    
    if(window.location.href.indexOf('movement') > -1)
    { 
        $("#inputenter").focus();
        list('listEnters', '.contentTableMovement', 'entrada')
        
         $("#btnExit").click(function(){
           list("listExit", ".contentTableMovement", 'salida');
           $("#inputexit").focus();
        });
        
        $("#btnEnter").click(function(){
            list("listEnters", ".contentTableMovement", 'entrada'); 
            $("#inputenter").focus();
        });
        
        $("#btnListAll").click(function(){
            list("listAll", ".contentTableMovement", 'todos'); 
        });
        
        $("#inputenter").keypress(function(e){
            if(e.keyCode == 13)
            {
                var value = $(this).val();
                
                if(value == "")
                {
                    toastr.error('El campo no puede estar vacío', 'Error!')
                }
                else
                {
                    $.ajax({
                       url:"addMovement",
                       method: "post",
                       headers: {
                            'X-CSRF-TOKEN': $('#tokenMovement').val()
                        },
                       data:{
                           doc: value,
                           type: "Entrada"
                       },
                       success: function(data){
                           if(data.res != "error")
                           {
                               list(data.res, ".contentTableMovement", 'entrada');
                                $("#inputenter").val("");
                                $("#inputenter").focus();
                                toastr.success('Bienvenido, '+data.user.peo_first_name + ' ' + data.user.peo_second_name + ' ' + 
                                data.user.peo_last_name + ' '+ data.user.peo_second_surname,'Entrada');
                           }
                           else
                           {
                               toastr.error("No se encontró ningún trabajador, escanee o digite de nuevo el número de cédula de un trabajador existente", "Datos incorrectos");
                           }
                       },
                       error: function(){
                           toastr.error("No se encontró ningún trabajador, escanee o digite de nuevo el número de cédula de un trabajador existente", "Datos incorrectos");
                       }
                    });
                }
            }
        });
        
        $("#inputexit").keypress(function(e){
            if(e.keyCode == 13)
            {
                var value = $(this).val();
                
                if(value == "")
                {
                    toastr.error('El campo no puede estar vacío', 'Error!')
                }
                else
                {
                    $.ajax({
                       url:"addMovement",
                       method: "post",
                       headers: {
                            'X-CSRF-TOKEN': $('#tokenMovement').val()
                        },
                       data:{
                           doc: value,
                           type: "Salida"
                       },
                       success: function(data){
                           if(data.res != "error")
                           {
                               list(data.res, ".contentTableMovement", 'salida');
                               toastr.success('Hasta luego, '+data.user.peo_first_name + ' ' + data.user.peo_second_name + ' ' + 
                                data.user.peo_last_name + ' '+ data.user.peo_second_surname,'Salida');
                                $("#inputexit").val("");
                                $("#inputexit").focus();
                           }
                           else
                           {
                               toastr.error("No se encontró ningún trabajador, escanee o digite de nuevo el número de cédula de un trabajador existente", "Datos incorrectos");
                           }
                       },
                       error: function(){
                           toastr.error("No se encontró ningún trabajador, escanee o digite de nuevo el número de cédula de un trabajador existente.", "Datos incorrectos");
                       }
                    });
                }
            }
         });
    }
    
    if(window.location.href.indexOf('personas') > -1)
    {
        
        list('listPeople','#tabseccion','per_table');
        
        $("#form_person").on('submit', function(e){
           e.preventDefault();
           var cont = 0;
           
           cont += Validate($("#id_number"), 'Número de documento', 'numero');
           cont += Validate($("#first_name"), 'Primer nombre', 'nombre');
           cont += Validate($("#email"), 'Correo electrónico', 'mail');
           cont += Validate($("#second_name"), 'Segundo nombre', 'nombre_null');
           cont += Validate($("#last_name"), 'Primer apellido', 'nombre');
           cont += Validate($("#second_surname"), 'Segundo apellido', 'nombre');
           cont += Validate($("#phone_a"), 'Número de teléfono 1', 'numero');
           cont += Validate($("#phone_b"), 'Número de teléfono 2', 'numero_null');
           cont += Validate($("#date"), 'Fecha de nacimiento', 'fecha');
           
           var data = $("#form_person").serializeArray();
           //console.log(data + "  " +cont);
           
           if(cont == 9){
                $.ajax({
                       url:"addPerson",
                       method: "post",
                       headers: {
                            'X-CSRF-TOKEN': $('#tokenPerson').val()
                        },
                       data: data,
                       success: function(data){
                           if(data.res != "error")
                           {
                                list('listPeople','#tabseccion','per_table');
                                toastr.success('Completado', 'Registro insertado correctamente');
                                $("#seccion2").removeClass('active');
                                $("#seccion1").addClass('active');
                           }
                           else
                           {
                               toastr.error("error:else");
                           }
                       },
                       error: function(){
                           toastr.error("Datos incorrectos (error:catch)");
                       }
                });
           }
        });
        
        $(document).on('click', '#upd-person-btn', function(e){
           e.preventDefault();
           var cont = 0;
           
           cont += Validate($("#u_id_number"), 'Número de documento', 'numero');
           cont += Validate($("#u_first_name"), 'Primer nombre', 'nombre');
           cont += Validate($("#u_email"), 'Correo electrónico', 'mail');
           cont += Validate($("#u_second_name"), 'Segundo nombre', 'nombre_null');
           cont += Validate($("#u_last_name"), 'Primer apellido', 'nombre');
           cont += Validate($("#u_second_surname"), 'Segundo apellido', 'nombre');
           cont += Validate($("#u_phone_a"), 'Número de teléfono 1', 'numero');
           cont += Validate($("#u_phone_b"), 'Número de teléfono 2', 'numero_null');
           cont += Validate($("#u_date"), 'Fecha de nacimiento', 'fecha');
           
           var data = $("#u_form_person").serializeArray();
           //console.log(data);
           var id = $("#u_id").val();
           
           if(cont == 9){
               $.ajax({
                       url:"updatePerson/"+id,
                       //type: "PUT",
                       method: "PUT",
                       headers: {
                            'X-CSRF-TOKEN': $('#u_tokenPerson').val()
                        },
                       data: data,
                       success: function(data){
                           if(data.res != "error")
                           {
                                list('listPeople','#tabseccion','per_table');
                                toastr.success('Completado', 'Registro actualizado correctamente');
                                list('listPeople','#tabseccion','per_table');
                                $('.update-modal').modal('hide');
                           }
                           else
                           {
                               toastr.error("error:else");
                           }
                       },
                       error: function(){
                           toastr.error("Datos incorrectos (error:catch)");
                       }
                    });
           }
        });
        
        $(document).on('click', '#btn-cancelar', function(e) {
            $(".update-modal").modal('hide');
        });
        
        $(document).on('click', '.btn-upd-per', function(){
            
            var id = $(this).val();
            //console.log(id);
            
            $.get("/personas/find/"+id, function(data) {
               $(".modal-content").empty().html(data);
               $(".update-modal").modal('show');
            });
        });
        
        $(document).on('click', '.btn-del-per', function(e) {
            var id = $(this).val();
            
            $(".modal-content").empty().html(
                "<div class='modal-header'><h4>Eliminar registro</h4></div>"+
                "<div class='modal-body'>¿Desea eliminar permanentemente el registro?</div>"+
                "<div class='modal-footer'>"+
                "<button class='btn btn-outline-dark' id='btn-cancelar'>Cancelar</button>"+
                "<button class='btn btn-danger del-person-btn' value='"+id+"'>Eliminar</button>"+
                "</div>"
            );
            $(".update-modal").modal('show');
        });
        
        $(document).on('click', '.del-person-btn', function(e){
           e.preventDefault();
           
           var id = $(this).val();
           
               $.ajax({
                       url:"deletePerson/"+id,
                       //type: "PUT",
                       method: "DELETE",
                       headers: {
                            'X-CSRF-TOKEN': $('#tokenPerson').val()
                        },
                       success: function(data){
                           if(data.res != "error")
                           {
                                toastr.success('Completado', 'Registro eliminado correctamente');
                                list('listPeople','#tabseccion','per_table');
                                $('.update-modal').modal('hide');
                           }
                           else
                           {
                               toastr.error("error:else");
                           }
                       },
                       error: function(){
                           toastr.error("Datos incorrectos (error:catch)");
                       }
                    });
        });
    }
    
    if(window.location.href.indexOf('areas') > -1)
    {
        list('listPositions','#areas_tabseccion','areas_table');
        
        $("#form_position").on('submit', function(e){
            e.preventDefault();
            
            if(Validate($("#area"), "Nombre de área", "nombre")!=0){
                var data = $(this).serializeArray();
                $.ajax({
                           url:"addPosition",
                           method: "post",
                           headers: {
                                'X-CSRF-TOKEN': $('#tokenArea').val()
                            },
                           data: data,
                           success: function(data){
                               if(data.res != "error")
                               {
                                    list('listPositions','#areas_tabseccion','areas_table');
                                    toastr.success('Completado', 'Registro insertado correctamente');
                               }
                               else
                               {
                                   toastr.error("Error");
                               }
                           },
                           error: function(){
                               toastr.error("Datos incorrectos (error:catch)");
                           }
                    });
            }
        });

        $(document).on('click','.btn-upd-pos', function(){
            var id = $(this).val();

            $.get("/positions/find/"+id, function(data){
                $(".modal-content").empty().html(data);
                $(".update-modal").modal('show');
            });
        });

        $("#form_position_pos").on('submit', function(e){
            var id = $("#id_pos").val();
            e.preventDefault();
            $.ajax({
                url : "/positions/updatePosition/"+id,
                method: "PUT",
                headers: {
                            'X-CSRF-TOKEN': $('#tokenArea').val()
                         },
                data: $(this).serializeArray(),
                success: function(data){
                    if(data.ok)
                    {
                        list('listPositions','#areas_tabseccion','areas_table');
                        toastr.success('Completado', "'"+data.message+"'");
                    }
                    else
                    {
                        toastr.error("'"+data.message+"'");
                    }
                },
                error: function(){
                    toastr.error("Datos incorrectos");
                }
            })
        })
    }
});

function removeClass()
{
    $("#ihome, #home > font").removeClass("activo");
    $("#imovement, #movement > font").removeClass("activo");
    $("#iusers, #users > font").removeClass("activo");
    $("#ipeople, #people > font").removeClass("activo");
    $("#ipositions, #positions > font").removeClass("activo");
}

function showContent(url)
{
    $.get(url, function(data){
        $(".forms").empty().html(data);
    })    
}

function myDataTable(selector)
{
    $("#"+selector+"").DataTable({
        "language": {
        "emptyTable":			"<i>No hay datos disponibles en la tabla.</i>",
        "info":		   		"Del _START_ al _END_ de _TOTAL_ ",
      "infoEmpty":			"Mostrando 0 registros de un total de 0.",
      "infoFiltered":			"(filtrados de un total de _MAX_ registros)",
      "infoPostFix":			"(actualizados)",
      "lengthMenu":			"Mostrar _MENU_ registros",
      "loadingRecords":		"Cargando...",
      "processing":			"Procesando...",
      "search":			"<span style='font-size:15px;'>Buscar:</span>",
      "searchPlaceholder":		"Dato para buscar",
      "zeroRecords":			"No se han encontrado coincidencias.",
      "paginate": {
        "first":			"Primera",
        "last":				"Última",
        "next":				"Siguiente",
        "previous":			"Anterior"
      },
      "aria": {
        "sortAscending":	"Ordenación ascendente",
        "sortDescending":	"Ordenación descendente"
      }
    },

    "lengthMenu":		[[5, 10, 20, 25, 50, -1], [5,10, 20, 25, 50, "Todos"]],
    "iDisplayLength":	10,
    });
}

function enter(e, value){
    if(e.keyCode == 13)
    {
        alert(value);
    }
}

function list(url, selector, table){
    $.get(url, function(data){
        $(selector).empty().html(data);
        myDataTable(table);
    });
}

function configToast(){
    toastr.options = {
      "closeButton": false,
      "debug": false,
      "newestOnTop": false,
      "progressBar": false,
      "positionClass": "toast-bottom-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
}

function Validate(input, campo, tipo){
    
    switch (tipo) {
        case 'numero':
            if(input.val().trim() == ""){
                toastr.error("El campo "+campo+" no puede estar vacío.");
                input.css("border", "2px solid #c13f3f");
                return 0;
            }else{
                if(!($.isNumeric(input.val()))){
                    toastr.error("El campo "+ campo + " debe ser numérico");
                    input.css("border", "2px solid #c13f3f");
                    return 0;
                }else{
                    if(input.val().indexOf(' ') >= 0){
                        toastr.error("El campo "+ campo + " no debe tener espacios en blanco");
                        input.css("border", "2px solid #c13f3f");
                        return 0;
                    }else{
                        input.css("border", "1px solid #ccd0d2");
                        return 1;
                    }
                }
            }
            break;
            
        case 'nombre':
            if(input.val().trim() == ""){
                toastr.error("El campo "+campo+" no puede estar vacío.");
                input.css("border", "2px solid #c13f3f");
                return 0;
            }else{
                if(!(input.val().match('[a-zA-Z]'))){
                    toastr.error("El campo "+ campo + " debe ser solo texto");
                    input.css("border", "2px solid #c13f3f");
                    return 0;
                }else{
                    if(input.val().indexOf(' ') >= 0){
                        toastr.error("El campo "+ campo + " no debe tener espacios en blanco");
                        input.css("border", "2px solid #c13f3f");
                        return 0;
                    }else{
                        input.css("border", "1px solid #ccd0d2");
                        return 1;
                    }
                }
            }
            break;
            
        case 'mail':
            var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  
            if(input.val().trim() == ""){
                toastr.error("El campo "+campo+" no puede estar vacío.");
                input.css("border", "2px solid #c13f3f");
                return 0;
            }else{
                if(!(re.test(input.val()))){
                    toastr.error("El campo "+ campo + " debe ser un correo electrónico válido");
                    input.css("border", "2px solid #c13f3f");
                    return 0;
                }else{
                    if(input.val().indexOf(' ') >= 0){
                        toastr.error("El campo "+ campo + " no debe tener espacios en blanco");
                        input.css("border", "2px solid #c13f3f");
                        return 0;
                    }else{
                        input.css("border", "1px solid #ccd0d2");
                        return 1;
                    }
                }
            }
            break;
        
        case 'numero_null':
                
            if(input.val().trim() != ""){    
                if(!($.isNumeric(input.val()))){
                    toastr.error("El campo "+ campo + " debe ser numérico");
                    input.css("border", "2px solid #c13f3f");
                    return 0;
                }else{
                    if(input.val().indexOf(' ') >= 0){
                        toastr.error("El campo "+ campo + " no debe tener espacios en blanco");
                        input.css("border", "2px solid #c13f3f");
                        return 0;
                    }else{
                        input.css("border", "1px solid #ccd0d2");
                        return 1;
                    }
                }
            }
            return 1;
            
            break;
            
        case 'nombre_null':
            
            if(input.val().trim() != ""){
                if(!(input.val().match('[a-zA-Z]'))){
                    toastr.error("El campo "+ campo + " debe ser solo texto");
                    input.css("border", "2px solid #c13f3f");
                    return 0;
                }else{
                    if(input.val().indexOf(' ') >= 0){
                        toastr.error("Error", "El campo "+ campo + " no debe tener espacios en blanco");
                        input.css("border", "2px solid #c13f3f");
                        return 0;
                    }else{
                        input.css("border", "1px solid #ccd0d2");
                        return 1;
                    }
                }
            }
            return 1;
            
            break;
            
         case 'fecha':
            if(input.val().trim() == ""){
                toastr.error("Error", "El campo "+campo+" no puede estar vacío.");
                input.css("border", "2px solid #c13f3f");
                return 0;
            }else{
                return 1;
            }
        default:
            // code
    }
    
}

function estadistica()
{
    Highcharts.chart("myChart",{
       chart: {
            type: 'line'
        },
        title: {
            text: 'Promedio de llegada por persona'
        },
        xAxis: {
            type: 'category',
            labels: {   
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        },
        yAxis: {
            min: Date.UTC(2019, 0, 0, 5, 0, 0),
            max: Date.UTC(2019, 0, 0, 9, 0, 0),
            type: 'datetime',
            title: {
                text: 'Horario llegada'
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            dateTimeLabelFormats:{
                day:"%A, %b %e, %Y",
                hour:"%A, %b %e, %H:%M:%p",
                millisecond:"%A, %b %e, %H:%M:%S.%L",
                minute:"%A, %b %e, %H:%M",
                month:"%B %Y",
                second:"%A, %b %e, %H:%M:%S",
                year:"%Y"
            },
            pointFormat: 'Promedio: <b>{point.y:%H:%M:%p}</b>'
        },
        series: [{
            name: 'Trabajadores',
            data: [
                ['Hans', Date.UTC(2019, 0, 0, 7, 0, 0)],
                ['William', Date.UTC(2019, 0, 0, 6, 57, 0)],
                ['Robert', Date.UTC(2019, 0, 0, 7, 1, 0)]
            ],
            dataLabels: {
                enabled: false,
                rotation: -90,
                color: '#FFFFFF',
                align: 'right',
                y: 10, // 10 pixels down from the top
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        }]
    });
}


function addZero(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}

function reportFilter()
{
    var fecha_inicio = $("#fecha_inicio").val();
    var fecha_fin = $("#fecha_fin").val();
    var type = $("#type").val();
    
    const filter = "<div class='row' style='width:98%; margin-bottom:40px;' id='contentInputs'>"+
            "<div class='col-md-3'>"+
                "<input type='hidden' name='tokenHome' id='tokenHome' value='{{ csrf_token() }}'/>"+
                "<label id='fecha_iniciolb'>Fecha de inicio:</label>"+
                "<input type='date' name='fecha_inicio' id='fecha_inicio' value='"+fecha_inicio+"' class='form-control' onchange='reportFilter();'/>"+
            "</div>"+
            "<div class='col-md-3'>"+
                "<label id='fecha_finlb'>Fecha fin:</label>"+
                "<input type='date' name='fecha_fin' id='fecha_fin' value='"+fecha_fin+"' class='form-control' onchange='reportFilter();'/>"+
            "</div>"+
            "<div class='col-md-3'>"+
                "<label id='typelb'>Concepto:</label>"+
                "<select name='type' id='type' class='form-control' onchange='reportFilter();'>"+
                    "<option value='Entrada'>Entrada</option>"+
                    "<option value='Salida'>Salida</option>"+
                    "<option value='Todo'>Todo</option>"+
                "</select>"+
            "</div>"+
            "<div class='col-md-3'>"+
                "<button class='btn btn-success' style='margin:20px;height:50px;width:90px;float:left;font-size:20px;' onclick='exportExcel();'><i class='fas fa-table'></i></button>"+
                "<button class='btn btn-primary' style='margin:20px;height:50px;width:90px;float:right;font-size:20px;' onclick='exportPDF();'><i class='fas fa-file-pdf'></i></button>"+
            "</div>"+
            "</div>";
    $.ajax({
        url: "home/"+fecha_inicio+"/"+fecha_fin+"/"+type+"/reportFilter",
        method: "GET",
        success:function(data){
            $(".tableContent").empty().html(filter+data);
            $("#type").val(type);
            myDataTable("report");
        }
    });
}

function exportExcel()
{
    var fecha_inicio = $("#fecha_inicio").val();
    var fecha_fin = $("#fecha_fin").val();
    var type = $("#type").val();
    
    window.location.href="exportExcel/"+fecha_inicio+"/"+fecha_fin+"/"+type+"/export";
       
   /* $.ajax({
        url:'exportExcel',
        method:'POST',
        headers: {
        'X-CSRF-TOKEN': $('#tokenHome').val()
        },
        data:{
            'fecha_inicio': fecha_inicio,
            'fecha_fin': fecha_fin,
            'type': type
        }, 
        success: function (data){
            alert(data.res);
        }
    });*/
}

function exportPDF()
{
    var fecha_inicio = $("#fecha_inicio").val();
    var fecha_fin = $("#fecha_fin").val();
    var type = $("#type").val();
    
    window.open("exportPDF/"+fecha_inicio+"/"+fecha_fin+"/"+type+"/export", '_blank');
}

function onlyList(url, selector)
{
    $.get(url, function(data){
        $(selector).empty().html(data);
    });
}



