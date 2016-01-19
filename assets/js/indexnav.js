// Circular Nav adapted from Sara Soueidan from Codrops
(function(){

	var button = document.getElementById('cn-button'),
    wrapper = document.getElementById('cn-wrapper');

    //open and close menu when the button is clicked
	var open = false;
	button.addEventListener('click', handler, false);

	function handler(){
	  if(!open){
	    this.innerHTML = "Close";
	    classie.add(wrapper, 'opened-nav');
	  }
	  else{
			// Elipses by Austin Condiff from The Noun Project
	    this.innerHTML = "<img src=\"assets/img/noun_70912_cc.svg\" id=\"ellipses\"/>";
		classie.remove(wrapper, 'opened-nav');
	  }
	  open = !open;
	}
	function closeWrapper(){
		classie.remove(wrapper, 'opened-nav');
	}

})();
