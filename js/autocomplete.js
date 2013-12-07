$(function() {
    var availableTags = [
			 "Economics",
			 "English",
			 "Statistics",
			 "Information Science",
			 "Mathematics",
			 "C++",
			 "Clojure",
			 "COBOL",
			 "ColdFusion",
			 "Erlang",
			 "Fortran",
			 "Groovy",
			 "Haskell",
			 "Java",
			 "JavaScript",
			 "Lisp",
			 "Perl",
			 "PHP",
			 "Python",
			 "Ruby",
			 "Scala",
                         "Scheme"
			 ];
    $( "#tags" ).autocomplete({
	    source: availableTags
    });
});