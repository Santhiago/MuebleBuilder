var pieza = "";

$( ".t" ).trigger( "click" );

function refreshClick(){
  $('.pieza').click(function() {
    var id = $(this).attr("data-id");
    var src = $(this).attr("data-src");
    pieza = id;

    $('#pieza-preview').empty();
    $('#pieza-preview').append(
      '<img title="Pieza" ' +
      'src="' + src.replace("stl", "png").replace('mueble','pieza') + '" height="100" weight="100">'
    );
    console.log(src);

    changePart(src, id);
  });
}

$('.textura').click(function() {
    var src = $(this).attr("data-src");
    
    if (pieza) {
      console.log(src);
      changeTexture(src, pieza);
    } else {
      alert('Debe escoger una pieza!');
    }
});

$('.color').click(function() {
    var color = $(this).attr("data-color");

    if (pieza) {
      console.log(color);
      changeColor(color,pieza)
    } else {
      alert('Debe escoger una pieza!');
    }
});

$('.mueble').click(function() {
  var id = $(this).attr("data-id");
  var src = $(this).attr("data-src");

  pieza = "";

  $('#pieza-preview').empty();
  $('#ls-partes').empty();
  $('#ls-partes').append(
    '<img title="Pieza 1" ' +
    'src="dist/img/' + id + '/pieza1_' + id + '.png" ' +
    'data-id="1" ' +
    'data-src="dist/img/' + id + '/mueble1_' + id + '.stl" ' +
    'class="col-md-4 pieza"  height="42">' +

    '<img title="Pieza 2" ' +
    'src="dist/img/' + id + '/pieza2_' + id + '.png" ' +
    'data-id="1" ' +
    'data-src="dist/img/' + id + '/mueble2_' + id + '.stl" ' +
    'class="col-md-4 pieza"  height="42">' +

    '<img title="Pieza 3" ' +
    'src="dist/img/' + id + '/pieza3_' + id + '.png" ' +
    'data-id="1" ' +
    'data-src="dist/img/' + id + '/mueble3_' + id + '.stl" ' +
    'class="col-md-4 pieza"  height="42">' +

    '<img title="Pieza 4" ' +
    'src="dist/img/' + id + '/pieza4_' + id + '.png" ' +
    'data-id="2" ' +
    'data-src="dist/img/' + id + '/mueble4_' + id + '.stl" ' +
    'class="col-md-4 pieza"  height="42">' +

    '<img title="Pieza 5" ' +
    'src="dist/img/' + id + '/pieza5_' + id + '.png" ' +
    'data-id="2" ' +
    'data-src="dist/img/' + id + '/mueble5_' + id + '.stl" ' +
    'class="col-md-4 pieza"  height="42">' +

    '<img title="Pieza 6" ' +
    'src="dist/img/' + id + '/pieza6_' + id + '.png" ' +
    'data-id="2" ' +
    'data-src="dist/img/' + id + '/mueble6_' + id + '.stl" ' +
    'class="col-md-4 pieza"  height="42">'
  );
  refreshClick();
  console.log(id);

  $('#stl').empty();
 init("dist/img/" + id + "/mueble1_" + id + ".stl","dist/img/" + id + "/mueble4_" + id + ".stl", "dist/img/" + id + "/mueble7_" + id + ".stl",id);
  animate();
  document.getElementById("stl").appendChild( renderer.domElement );
});
