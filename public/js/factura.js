      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

        var precio_venta =0;
        var cantidad =0;
        var total =0;
        var iva=0;
        var subtotal =0;
        var factura= new Array();
        var producto=0;
        var item =0;
        var cliente = 0;


        $(document).ready(function(){
          document.getElementById("documento").focus();
          $("#factura_cuerpo").hide();
          $("#factura_detalle").hide();
        });

         function getFocus() {
            document.getElementById("nombre").focus();
          }


          __clienteAutocomplete();
          __productoAutocomplete();
          function __clienteAutocomplete()
          {
             var options = {
              url: function (phrase) {
                  return baseUrl()+'findclient/'+phrase;
                },
               getValue: "documento",

                template: {
                    type: "description",
                    fields: {
                        description: "nombre"
                    }
                },

                list: {
                    match: {
                        enabled: false
                    },
                    onKeyEnterEvent: function() {
                        var e = $("#documento").getSelectedItemData();
                        $("nombre").text(e.nombre+" "+e.apellidos);
                         $("documento").text(e.documento);
                         $("direccion").text(e.direccion);
                         $("telefono").text(e.telefono);
                         $("email").text(e.email);
                         cliente = e;
                         $('#factura_cuerpo').show();
                          getFocus();
                    },
                    onClickEvent: function() {
                        var e = $("#documento").getSelectedItemData();
                        $("nombre").text(e.nombre+" "+e.apellidos);
                         $("documento").text(e.documento);
                         $("direccion").text(e.direccion);
                         $("telefono").text(e.telefono);
                         $("email").text(e.email);
                         cliente = e;
                         $('#factura_cuerpo').show();
                          getFocus();
                    },
                    showAnimation: {
                          type: "fade", //normal|slide|fade
                          time: 400,
                          callback: function() {}
                        },

                        hideAnimation: {
                          type: "slide", //normal|slide|fade
                          time: 400,
                          callback: function() {}
                        }

                },
                autoSelect: true,

                theme: "plate-dark"
             };
             $("#documento").easyAutocomplete(options);
          }

          function __productoAutocomplete()
          {
             var options = {
              url: function (phrase) {
                  return baseUrl()+'findproducto/'+phrase;
                },
               getValue: "nombre",

                template: {
                    type: "description",
                    fields: {
                        description: "referencia"
                    }
                },

                list: {
                    match: {
                        enabled: false
                    },
                    showAnimation: {
                          type: "fade", //normal|slide|fade
                          time: 400,
                          callback: function() {}
                        },
                          onKeyEnterEvent: function() {
                              var d = $("#nombre").getSelectedItemData();
                               $("#valor_venta").val(d.precio_venta);
                               producto =d;
                               precio_venta = d.precio_venta;


                            },
                          onClickEvent: function() {
                              var d = $("#nombre").getSelectedItemData();
                               $("#valor_venta").val(d.precio_venta);
                               producto =d;
                               precio_venta = d.precio_venta;

                          },
                        hideAnimation: {
                          type: "slide", //normal|slide|fade
                          time: 400,
                          callback: function() {}
                        }

                },
                autoSelect: true,

                theme: "plate-dark"
             };
             $("#nombre").easyAutocomplete(options);
          }

          function calvalor()
          {
            cantidad = $("#cantidad").val();
            if(cantidad=="")
            {
              cantidad =1;
            }
            $("#total").val((cantidad*precio_venta)+(((cantidad*precio_venta)*producto.impuesto.tasa)/100));
          }

          function addproducto()
          {
            if( $("#nombre").val()=='' || $("#cantidad").val()==0 ||  $("#valor_venta").val() == 0 || $("#total").val() == 0)
            {
              toastr.warning('Todos los campos son obligatorios');
            }
              else
            {
              $("#factura_detalle").show();
              var div;
              subtotal = parseFloat(cantidad) * parseFloat(precio_venta);

              iva = (subtotal * producto.impuesto.tasa)/100;
              total = parseFloat(iva) + parseFloat(subtotal);

              factura.push([item,producto.codigo,producto.nombre,cantidad,producto.precio_venta,subtotal,iva,total]);
               __calcularvalorfactura();
              $("#nombre").val('');
              $("#cantidad").val('');
              $("#valor_venta").val('');
              $("#total").val('');
              div = '<div class="row col-lg-12 col-sm-12 col-md-12" id="item_'+item+'">';
              div+= '<div class="col-lg-1 col-md-1 col-sm-1"> <input type="text" name="" value="'+factura[item][1]+'" class="form-control-plaintext" readonly></div>';
              div+= '<div class="col-lg-4 col-md-4 col-sm-4"> <input type="text" name="" value="'+factura[item][2]+'" class="form-control-plaintext" readonly></div>';
              div+= '<div class="col-lg-1 col-md-1 col-sm-1"> <input type="text" name="" value="'+factura[item][3]+'" class="form-control-plaintext" readonly></div>';
              div+= '<div class="col-lg-2 col-md-2 col-sm-1"> <input type="text" name="" value="'+factura[item][4]+'" class="form-control-plaintext" readonly></div>';
              div+= '<div class="col-lg-1 col-md-1 col-sm-1"> <input type="text" name="" value="'+factura[item][5]+'" class="form-control-plaintext" readonly></div>';
              div+= '<div class="col-lg-1 col-md-1 col-sm-1"> <input type="text" name="" value="'+factura[item][6]+'" class="form-control-plaintext" readonly></div>';
              div+= '<div class="col-lg-1 col-md-1 col-sm-1"> <input type="text" name="" value="'+factura[item][7]+'" class="form-control-plaintext" readonly></div>';
              div+= '<div class="col-lg-1 col-md-1 col-sm-1"> <button class="btn btn-link fa fa-trash red" onclick="__removeproducto('+item+');"></button></div>';
              div+= '</div>';
              $('.contenido').append(div);
              item= item +1;
            }
          }

          function __calcularvalorfactura()
          {

              var total_factura=0;
              var subtotal_factura =0;
              var iva_factura = 0;
              if(factura.length>0)
              {
                 for(var i = 0; i <= factura.length - 1; i++){
                  subtotal_factura = subtotal_factura + factura[i][5];
                  $("subtotal").text(subtotal_factura.toFixed(2));
                  total_factura = total_factura+ factura[i][7];
                  $("total").text(total_factura.toFixed(2));
                  $("descuento").text(0.00);
                  iva_factura = iva_factura + factura[i][6];
                  $("iva").text(iva_factura.toFixed(2));
                }
              }else
              {
                  $("subtotal").text(0.00);
                  $("total").text(0.00);
                  $("descuento").text(0.00);
                  $("iva").text(0.00);
              }
              getFocus();
          }

          function __removeproducto(id)
          {
              for(var i = 0; i <= factura.length - 1; i++){

                  if(factura[i][0] == id){
                      factura.splice(i);
                      item = item -1;
                  }
              }
              var parent = document.getElementById("contenido");
              var nested = document.getElementById("item_"+item);
              var garbage = parent.removeChild(nested);
              __calcularvalorfactura();

           }

           function save()
           {
            if(factura.length<=0)
              {
              toastr.warning("No hay posiciones selecionadas para generar la factura");
            }
            else
            {
              $.post(baseUrl()+'ventas/grabar',
              {
                "numero": parseFloat($("numero_factura").text()),
                "cliente": cliente.documento,
                "iva": parseFloat($("iva").text()),
                "subtotal": parseFloat($("subtotal").text()),
                "total": parseFloat($("total").text()),
                'detalle': factura,

              }, function(r){

                  toastr.success('La factura se ha grabado correctamente');
                  //location.reload();

              },
              'json')
            }
           }
