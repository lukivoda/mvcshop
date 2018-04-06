//from the npm packages(node_modules root folder)
var elixir = require("laravel-elixir");
//don't create sourcemaps when compilin files
elixir.config.sourcemaps = false;

var gulp = require("gulp");

elixir(function(mix){
    //compile sass to css
    mix.sass("resources/assets/sass/app.scss", "resources/assets/css");

    //combine css files in one file
    mix.styles(
      [
          "css/app.css",//actual css file compiled previously
          "bower/vendor/slick-carousel/slick/slick.css"
      ], "public/css/all.css",//output file
        "resources/assets" //source files
    );

    var bowerPath = "bower/vendor";

    mix.scripts(
       [
           //jQuery
           bowerPath + "/jQuery/dist/jQuery.min.js",
           //foundation js
           bowerPath + "/foundation-sites/dist/js/foundation.min.js",
           //slick-carousel.js
           bowerPath + "/slick-carousel/slick/slick.min.js"
       ], "public/js/all.js",//output file
        "resources/assets" //source files

    )

});