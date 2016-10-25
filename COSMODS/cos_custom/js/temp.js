document.write("\<script src='http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js' type='text/javascript'>\<\/script>");
var selectors = new Array;

function getSelectorString(mainSelector) {
  $(mainSelector).each(getSelectors);
  $(mainSelector).parents().each(getSelectors);
  var output = 'HTML'+ selectors.reverse().join(', ');
  return output;
}
function getSelectors(){
  var selector = $(this).parents()
    .map(function() { return this.tagName; })
    .get().reverse().join(" > ");

  if (selector) {
    selector += " > "+ $(this)[0].nodeName;
  }

  var id = $(this).attr("id");
  if (id) {
    selector += "#"+ id;
  }

  var classNames = $(this).attr("class");
  if (classNames) {
    selector += "." + $.trim(classNames).replace(/\s/gi, ".");
  }

  selectors.push(selector);
}
