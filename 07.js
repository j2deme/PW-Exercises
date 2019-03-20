Zepto(function ($) {
  function calcularCosto(){
    let costo = 0;
    let masas = {
      cl: 50,
      cr: 75,
      li: 45,
    };
    let sizes = {
      t_chica: 50,
      t_mediana: 70,
      t_grande: 90,
    };
    const ppi = 5; // Precio Por Ingrediente
    const ppie = 7; // PPI Extra

    // Obtención de los elementos de formulario
    // let masa = document.querySelector("#masa"); // Vanilla JS
    let masa = $("#masa");
    let size = $("input[name=tamano]").filter(checked);
    let ingredientes = $(".ingrediente").filter(checked);
    let iexs = $(".iex").filter(checked);
    let _costo = $("#costo");

    // Cálculos de costos
    costo += masas[masa.val()];
    costo += sizes[size.attr("id")];
    costo += ingredientes.length * ppi;
    costo += iexs.length * ppie;
    _costo.val(costo);
  }

  // Ejercicio 09 - INICIO
  function enviarFormulario(){
    let _form = $("#formPizza");
    //console.log(_form.serialize());
    //$.post(URL, DATA, FN);
    $.post(_form.attr("action"), _form.serialize(), function(respuesta){
      //console.log(respuesta);
      alert(respuesta);
    });
  }
  // Ejercicio 09 - FIN
  let cotizarBtn = $("#cotizarBtn");
  cotizarBtn.click(function(e) {
    e.preventDefault();
    calcularCosto();
    enviarFormulario();
  });
});

let checked = function () { return this.checked; }
let selected = function () { return this.selected; }
