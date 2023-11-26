// <!-- remove 000webhost Banner -->
//<script src="/Index_Resources/includes/remove-000webhost-Banner.js"></script>

// remove 000webhost Banner
window.onload = () => {
   let bannerNode = document.querySelector('[alt="www.000webhost.com"]').parentNode.parentNode;
   bannerNode.parentNode.removeChild(bannerNode);
}


// remove new disclaimer banner

/* Function to add style */
function addStyle(styles) {

/* Create style element */
var css = document.createElement('style');
css.type = 'text/css';

if (css.styleSheet) 
css.styleSheet.cssText = styles;
else 
css.appendChild(document.createTextNode(styles));

/* Append style to the head element */
document.getElementsByTagName("head")[0].appendChild(css);
}

/* Declare the style element */
var styles = '.disclaimer { display: none }';

//styles += ' body { text-align: center }';
//styles += ' #header { height: 50px; background: green }';

/* Function call */
window.onload = function() { addStyle(styles) };


