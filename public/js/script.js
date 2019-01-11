console.log("js work");

//Afficher le form de commentaire
var commentElt = document.getElementById("like");
var addCommentElt = document.getElementById("addComment");
commentElt.addEventListener("click", function(e) {
    e.preventDefault();
    var propCss = window.getComputedStyle(addCommentElt,null).getPropertyValue("display");
    if (propCss === "none") {
        addCommentElt.style.display = "block";
        window.setTimeout(function() {
            addCommentElt.style.opacity = "100";
        }, 1);
        
    } else {
        addCommentElt.style.display = "none"
    }
    
});
