$(document).ready(function(){
    $("#categorie").change(function(){
      var cle = $(this).val();
      if (cle!=""){
        $.ajax({
            url:'getProduitCateg',
            type:'post',
            data:{categorie: cle},
            dataType : 'json',
            success:function(response){     
              var len =  response.retour.length;
              $("#liste").empty();
              var str = "<div class='table-responsive'><table class='table table-striped'><thead style='font-weight:bold;'>"
              +"<tr>"
                +"<th></th>"
                +"<th>IDPRODUIT</th>"
                +"<th>CATEGORIE</th>"
                +"<th>DESIGNATION</th>"
                +"<th>PRIX</th>"
                +"<th>QUANTITE</th>"
                +"<th>AJOUTER</th>"
              +"</tr></thead><tbody>";

              for(var i=0; i<len; i++){
                var nom = response.retour[i];
                str += "<tr>"
                +"<td><img src='" + response.baseUrl+response.retour[i]['image']+".png'  width=100 heigth=100 >" + "</td>"
                +"<td>" + response.retour[i]['idProduit'] + "</td>"
                +"<td>" + response.retour[i]['nomCategorie'] + "</td>"
                +"<td style='font-weight:bold;'>" + response.retour[i]['designation'] + "</td>"
                +"<td>" + response.retour[i]['prixUnitaire'] + "</td>"
                +"<td class='qty'>"
                  +"<a href = '#' class='btn-minus'><i class='fa fa-minus'></i></a>"
                  +"<input  style='width:10%; align-text:center;' type='text' value='1' id='"+response.retour[i]['idProduit']+"'>"
                  +"<a href = '#' class='btn-plus'><i class='fa fa-plus'></i></a>"
                +"</td>"
                +"<td><button type='button' class='btn btn-primary' value='"+response.retour[i]['idProduit']+"'> ajouter</button> </td>"
                +"</tr>";
               
              }
              str += "</tbody></table>" ;
              $("#liste").append(str);
                $('#liste .qty a').on('click', function () {
                  var $button = $(this);
                  var oldValue = $button.parent().find('input').val();
                  if ($button.hasClass('btn-plus')) {
                      var newVal = parseFloat(oldValue) + 1;
                  } else {
                      if (oldValue > 0) {
                          var newVal = parseFloat(oldValue) - 1;
                      } else {
                          newVal = 0;
                      }
                  }
                  $button.parent().find('input').val(newVal);
              });
              $('#liste button').on('click',function(){
                var idProduit = $(this).val();
                var id = "#"+idProduit;
                var quantite =  $(id).val();
                $.ajax({
                      url:'ajoutProduit',
                      type:'post',
                      data:{idProduit: idProduit, quantite: quantite},
                      dataType : 'json',
                      success:function(response){
                        $('#nombreAchat').empty();
                        $('#nombreAchat').append(response.nombreAchat);                  
                        $('#panier').css('display','flex');
                        $('#prod').empty();
                        for(var i=0; i<response.produit.length; i++){
                          var str="";
                          str += " <span id='"+response.produit[i][0]['idProduit']+"'>"
                          +"<div class='ps-cart-item'><a class='ps-cart-item__close'  href='#"+response.produit[i][0]['idProduit']+"'></a>"
                          +"<div class='ps-cart-item__thumbnail'><a href='#'></a><img src='' alt='"+response.produit[i][0]['designation']+"'></div>"
                          +"<div class='ps-cart-item__content'><a class='ps-cart-item__title' href='#'>"+response.produit[i][0]['designation']+"</a>"
                          +"<p><span>Quantity:<i>"+response.quantite[i]+"</i></span><span>Total:<i>"+response.totalPrix[i]+"ar</i></span></p>"
                          +"</div></div></span>";

                          $('#prod').append(str);
                        }
                      }
                })
              })
              console.log(response.retour)  ;   
            }        
          })
        }
      })
    
    $('#liste .qty a').on('click', function () {
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        if ($button.hasClass('btn-plus')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find('input').val(newVal);
    });

    $('#liste button').on('click',function(){
      var idProduit = $(this).val();
      var id = "#"+idProduit;
      var quantite =  $(id).val();
      $.ajax({
            url:'ajoutProduit',
            type:'post',
            data:{idProduit: idProduit, quantite: quantite},
            dataType : 'json',
            success:function(response){
              $('#nombreAchat').empty();
              $('#nombreAchat').append(response.nombreAchat);                  
              $('#panier').css('display','flex');
              $('#prod').empty();
              for(var i=0; i<response.produit.length; i++){
                var str="";
                str += " <span id='"+response.produit[i][0]['idProduit']+"'>"
                +"<div class='ps-cart-item'><a class='ps-cart-item__close'  href='#"+response.produit[i][0]['idProduit']+"'></a>"
                +"<div class='ps-cart-item__thumbnail'><a href='#'></a><img src='' alt='"+response.produit[i][0]['designation']+"'></div>"
                +"<div class='ps-cart-item__content'><a class='ps-cart-item__title' href='#'>"+response.produit[i][0]['designation']+"</a>"
                +"<p><span>Quantity:<i>"+response.quantite[i]+"</i></span><span>Total:<i>"+response.totalPrix[i]+"ar</i></span></p>"
                +"</div></div></span>";

                $('#prod').append(str);
              }

            //   $('.ps-cart-item__close').on('click',function(){
            //     var href = $(this).attr('href');
            //     var idProduit = href.split("#")[1];
            //     $.ajax({
            //       url:'supprimerAchat',
            //       type:'post',
            //       data:{idProduit: idProduit},
            //       dataType : 'json',
            //       success:function(response){
            //           var id = "#"+idProduit;
            //         // console.log($(id));
                    
            //       }
            //     })
            //   })
            }
      })
    })
    

    

})