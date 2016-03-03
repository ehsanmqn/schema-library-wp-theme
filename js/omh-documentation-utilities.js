/**
* A set of general utility functions that support the schema library
*
*/
var OMHDocumentationUtilities = {};

(function($) {

  var utils = OMHDocumentationUtilities;

  // IE is missing the Window.origin property
  if ( !window.location.origin ) {
    window.location.origin = window.location.protocol + "//" + window.location.hostname + (window.location.port ? ':' + window.location.port: '');
  }

  utils.preload = function( imageUrl, imageClass ) {
    if ( $( '.'+imageClass ).length === 0 ){
      $('<img />').attr('src',imageUrl).addClass( imageClass ).appendTo('body').css('display','none');
    }
  };


  //from the semver-compare package
  utils.semverCompare = function(a, b) {
      var pa = a.split('.');
      var pb = b.split('.');
      for (var i = 0; i < 3; i++) {
          var na = Number(pa[i]);
          var nb = Number(pb[i]);
          if (na > nb) return -1;
          if (nb > na) return 1;
          if (!isNaN(na) && isNaN(nb)) return -1;
          if (isNaN(na) && !isNaN(nb)) return 1;
      }
      return 0;
  };

  utils.decodeHtmlChars = function( string ){
    return $('<textarea />').html( string ).text(); //unescape special chars (backslashes)
  };



})(jQuery);