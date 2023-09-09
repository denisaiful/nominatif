var PageComingSoon = function () {

    return {
        
        //Coming Soon
        initPageComingSoon: function () {
			var newYear = new Date(); 
			//newYear = new Date(newYear.getFullYear() + 1, 1 - 1, 1); 
			//var newYear = new Date("August 21, 2015 01:15:00");
			newYear = new Date(newYear.getFullYear() + 1, -2, -20); 
			$('#defaultCountdown').countdown({until: newYear})
        }

    };
}();        