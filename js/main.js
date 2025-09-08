

//end  header 

let icon = document.querySelector('.fa-bars');
let ul = document.querySelector('ul');
let target = document.querySelectorAll('ul li a');

icon.addEventListener("click" , function() {
    if (icon.classList.contains('fa-bars')) {
            icon.classList.replace('fa-bars','fa-xmark');
            ul.classList.toggle('nav_bar');
    }else {
        icon.classList.replace( 'fa-xmark','fa-bars');
        ul.classList.toggle('nav_bar');
    }
})

for (let i=0; i<target.length; i++) {
    target[i].addEventListener('click',function(event) {
        for (let j = 0; j < target.length; j++) {
            target[j].classList.remove('active'); 
        }
        event.currentTarget.classList.add('active');
    })
}


let dele = document.querySelectorAll(".delete");

for(let i=0 ; i< dele.length; i++) {
    dele[i].addEventListener("click" , function(e) {
        let confirmer = confirm("Do you Want delete this Product ?");
        if (!confirmer) {
            e.preventDefault();
        }
    })
}


// end header


    ScrollReveal({
        reset: true,
        delay: 400,
    })
    ScrollReveal().reveal('.text',  {origin: 'left' });
    ScrollReveal().reveal('section img',{ scale: 0.85});


// End Section