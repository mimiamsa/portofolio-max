function log(d) {
	"use strict";
	window.console.log(d);
}

function select(sCSS) {
	"use strict";
	return document.querySelector(sCSS);
}

// function selectThis(sCSS) {
//     "use strict";
//     return this.querySelector(sCSS);
// }

function selectAll(sCSS) {
	"use strict";
	return document.querySelectorAll(sCSS);
}

function byId(id) {
	"use strict";
	return document.getElementById(id);
}
