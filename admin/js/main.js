



let dele = document.querySelectorAll(".delete");

for(let i=0 ; i< dele.length; i++) {
    dele[i].addEventListener("click" , function(e) {
        let confirmer = confirm("Do you Want delete this Product ?");
        if (!confirmer) {
            e.preventDefault();
        }
    })
}

let upda = document.querySelectorAll(".update");

for(let i=0 ; i< upda.length; i++) {
    upda[i].addEventListener("click" , function(e) {
        let confirmer = confirm("Do you Want Update  this Product ?");
        if (!confirmer) {
            e.preventDefault();
        }
    })
}