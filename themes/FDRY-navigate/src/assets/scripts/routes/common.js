import smoothscroll from "smoothscroll-polyfill";
// import hamburger from "./../part/hamburger";
import dropdownMenuOffset from "../part/dropdownMenuOffset";
import dropdownMenu from "../part/dropdownMenu";


// https://github.com/aFarkas/lazysizes
import 'lazysizes';
import 'lazysizes/plugins/bgset/ls.bgset';

export default {
	init() {
		// JavaScript to be fired on all pages

		// kick off the polyfill!
		smoothscroll.polyfill();

		// Hamburger event listener
		// hamburger();

		// DROPDOWN
		dropdownMenu();

		// FIX Left position dropdown
		dropdownMenuOffset();


		window.addEventListener("resize", function() {
			dropdownMenuOffset();
		});
	
	},

	finalize() {
		// JavaScript to be fired on all pages, after page specific JS is fired
	},
};
