'use strict'



$(".header__button").on({ 
  click: function () {
    $(".insertar").css({
      display: "flex",
    });

    $(".insertar__form").css({
      display: "flex",
    });
  },
});

$("#cerrar").on({
  click: function () {
    $(".insertar").css({
      display: "none",
    });

    $(".insertar__form").css({
      display: "none",
    });

    $(".insertar__correcto").css({
      display: "none",
    });

    $(".insertar__error").css({
      display: "none",
    });

    $(".insertar__existe").css({
      display: "none",
    });

    $(".insertar__buscar").css({
      display: "none",
    });
  },
});

$(".insertar__formulario").on({
  submit: function (e) {
    e.preventDefault();

    let $etiqueta = $(this);

    let url = $(".insertar__formulario").attr("action");

    let src = $(".insertar__formulario").children('input[name="src"]').val();

    let quiero;

    let plata;

    if (src.match(/^https:\/\/www.youtube.com\/watch\?/g)) {
      quiero = src.slice(32);

      plata = "Y";
    }

    if (src.match(/^https:\/\/youtu.be\//g)) {
      quiero = src.slice(17);

      plata = "Y";
    }

    if (src.match(/^https:\/\/www.youtube.com\/embed\//g)) {
      quiero = src.slice(30);

      plata = "Y";
    }

    if (src.match(/^https:\/\/m.youtube.com\/watch\?/g)) {
      
      quiero = src.slice(30);

      plata = "Y";
    }

    if (src.match(/^https:\/\/vimeo.com\//g)) {
      quiero = src.slice(18);

      plata = "V";
    }

    if (src.match(/^https:\/\/player.vimeo.com\/video\//g)) {
      quiero = src.slice(31);

      plata = "V";
    }

    let nombre = $(".insertar__formulario")
      .children('input[name="nombre"]')
      .val();

    let fecha = new Date();

    let ano = fecha.getFullYear();

    let mes = fecha.getMonth() + 1;

    let dia = fecha.getDate();

    $.ajax({
      type: "POST",
      url: url,
      data: $etiqueta.serialize(),
      success: function (res) {
        

        if (res === "todo bien") {
         

          let iUno = document.createElement("i");

          $(iUno)
            .addClass("article__icon")
            .addClass("fas")
            .addClass("fa-heart");

          $(iUno).attr("data-tab", 0);

          let pUno = document.createElement("span");

          pUno.innerHTML = "0 votos";

          let divVoto = document.createElement("div");

          $(divVoto).addClass("voto");

          $(divVoto).append(pUno);

          let divI = document.createElement("div");

          $(divI).addClass("article__like");

          $(divI).attr("data-tab", quiero);

          $(divI).append($(iUno));

          $(divI).append($(divVoto));

          let h2 = document.createElement("h2");

          $(h2).addClass("article__h2");

          $(h2).text(nombre);

          let span = document.createElement("span");

          $(span).addClass("article__date");

          $(span).text(ano + "-" + mes + "-" + dia);

          let divNom = document.createElement("div");

          $(divNom).addClass("article__info");

          $(divNom).append($(h2));

          $(divNom).append($(span));

          let frame = document.createElement("iframe");

          $(frame).addClass("article__iframe");

          if (plata === "Y") {
            $(frame).attr("src", "https://www.youtube.com/embed/" + quiero);
          }

          if (plata === "V") {
            $(frame).attr("src", "https://player.vimeo.com/video/" + quiero);
          }

          let article = document.createElement("article");

          $(article).addClass("article");

          $(article).attr("id", quiero);

          $(article).append($(frame));

          $(article).append($(divNom));

          $(article).append($(divI));

          $("#idea").append($(article));

          asignarclick();
          
          $(".insertar").css({
            display: "flex",
          });

          $(".insertar__form").css({
            display: "flex",
          });

          $(".insertar__correcto").css({
            display: "flex",
          });

          $(".insertar__error").css({
            display: "none",
          });

          $(".insertar__existe").css({
            display: "none",
          });

          $(".insertar__buscar").css({
            display: "none",
          });
        } else {
          if (res === "ya existe") {
            $(".insertar__seccion").css({
              display: "flex",
            });

            $(".insertar__correcto").css({
              display: "none",
            });

            $(".insertar__error").css({
              display: "none",
            });

            $(".insertar__existe").css({
              display: "flex",
            });

            $(".insertar__buscar").css({
              display: "none",
            });
          } else {
            $(".insertar").css({
              display: "flex",
            });

            $(".insertar__seccion").css({
              display: "flex",
            });

            $(".insertar__form").css({
              display: "flex",
            });

            $(".insertar__correcto").css({
              display: "none",
            });

            $(".insertar__error").css({
              display: "flex",
            });

            $(".insertar__existe").css({
              display: "none",
            });

            $(".insertar__buscar").css({
              display: "none",
            });
          }
        }
      },
      error: function (res) {},
    });
  },
});

$("#busqueda").on({
  click: function (e) {
    e.preventDefault();

    let src = $("#busqueda").parent().children('input[name="buscar"]').val();

    

    let quiero;

    let algo;
    let slice;

    let sub;

    if (src.match(/^https:\/\/www.youtube.com\/watch\?/g)) {
      quiero = src.slice(32);
    }

    if (src.match(/^https:\/\/youtu.be\//g)) {
      quiero = src.slice(17);
    }

    if (src.match(/^https:\/\/www.youtube.com\/embed\//g)) {
      quiero = src.slice(30);
    }

    if (src.match(/^https:\/\/m.youtube.com\/watch\?/g)) {
      

      quiero = src.slice(30);
    }

    if (src.match(/^https:\/\/vimeo.com\//g)) {
      quiero = src.slice(18);
    }

    if (src.match(/^https:\/\/player.vimeo.com\/video\//g)) {
      quiero = src.slice(31);
    }

    

    $.ajax({
      type: "GET",
      url: "controlers/buscar.controler.php?src=" + quiero + "",
      data: $(this).serialize(),

      success: function (res) {
        

        if (res === "bien") {
          $(".article").addClass("seva");

          $("#" + quiero + "").removeClass("seva");
        } else {
          

          $(".insertar").css({
            display: "flex",
          });

          $(".insertar__correcto").css({
            display: "none",
          });

          $(".insertar__error").css({
            display: "none",
          });

          $(".insertar__existe").css({
            display: "none",
          });

          $(".insertar__buscar").css({
            display: "flex",
          });
        }
      },
      error: function (res) {},
    });

    
  },
});

$("#cerrarBus").on({
  click: function () {
    $(".article").removeClass("seva");
  },
});

function asignarclick() {
  $(".article__icon.fas.fa-heart").on({
    click: function (e) {
      e.preventDefault();

      let $corazon = $(this);

      

      let voto = $corazon.attr("data-tab");

      let total = +voto;

      let src = $corazon.parent().attr("data-tab");

      

      

      let galleta = document.cookie;

       

      

      if (galleta) {
        console.log("existe");
      } else {
        console.log("no existe"); 

        $.ajax({
          type: "GET",
          url: "controlers/votar.controler.php?src=" + src + "",
          data: $corazon.serialize(),
          success: function (res) {
            if ($corazon.hasClass("activo")) {
              
              $corazon.parent().children(".voto").children("span").remove();

              let pVoto = document.createElement("span");

              pVoto.innerHTML = "" + (total + 1) + " votos";

              $corazon.parent().children(".voto").append(pVoto);
            } else {

              

              $corazon.addClass("activo");

              $corazon.parent().children(".voto").children("span").remove();

              let pVoto = document.createElement("span");

              pVoto.innerHTML = "" + (total + 1) + " votos";

              $corazon.parent().children(".voto").append(pVoto);
            }
          },

          error: function (res) {},
        });
      }
    }
  })
}


asignarclick();