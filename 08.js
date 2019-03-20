Zepto(function ($) {
  const POKEAPI = "https://pokeapi.co/api/v2/pokemon/";
  /*let code = 25;
  $.getJSON(POKEAPI + code, function (data) {
    console.log(data);
    //console.log(data['name']);
    //console.log(data['sprites']['front_default']);
  });*/
  let cookies = cookie.all();
  console.log(cookies);

  let ultimo = $("#ultimo");
  ultimo.text(cookie.get("name"));

  let cargar = $("#cargar");
  cargar.click(function (){
    let code = $("#code").val();
    let _name = $("div#descripcion h2");
    let _img = $("div#descripcion img");
    _img.prop("src", "img/loading.gif");
    cargar.prop('disabled','true');
    cargar.text("Cargando...");

    $.getJSON(POKEAPI + code, function (data) {
      //console.log(data);
      _name.text((data['name']).toUpperCase());
      cookie.set("name", data['name']);
      _img.prop("src", data['sprites']['front_default']);
      _img.prop("alt", data['name']);
      cargar.removeAttr('disabled');
      cargar.text("Cargar");
    });
  });
});
