// ------SCROLL NAV------ 

document.addEventListener("DOMContentLoaded", function () {
    let lastScrollTop = 0;
    const navbar = document.querySelector(".navbar-custom");

    window.addEventListener("scroll", function () {
        let scrollTop = window.scrollY || document.documentElement.scrollTop;

        if (scrollTop > lastScrollTop && scrollTop > 50) {
            navbar.classList.add("navbar-hidden"); 
        } else {
            navbar.classList.remove("navbar-hidden"); 
        }

        lastScrollTop = scrollTop;
    });
});

// ----------ANIMATION REVEAL----------

const ratio = .1
const options = {
    root: null,
    rootMargin: "0px",
    threshold: ratio
}
handleIntersect = function (entries, observer) {
    entries.forEach(function (entry){
        if (entry.intersectionRatio > ratio) {
            entry.target.classList.add('reveal_visible')
            observer.unobserve(entry.target)        
        }
    })
  }
const observer = new IntersectionObserver(handleIntersect, options);
document.querySelectorAll('.reveal').forEach(function(r){
    observer.observe(r)
})


const FormHandler = (function () {
    let e = () => {
        let form = document.getElementById("myForm"),
            sendButton = document.getElementById("send"),
            responseMessage = document.getElementById("responseMessage");

        if (!form || !sendButton || !responseMessage) {
            console.error("Erreur : Formulaire ou éléments requis introuvables !");
            return;
        }

        form.addEventListener("submit", async function (event) {
            event.preventDefault();
            event.stopPropagation();

            if (!form.checkValidity()) {
                form.classList.add("was-validated");
                return;
            }

            sendButton.disabled = true; 

            try {
                let formData = new FormData(form);
                let response = await fetch("mail.php", { 
                    method: "POST", 
                    body: formData 
                });

                if (!response.ok) throw new Error(`Erreur HTTP: ${response.status}`);

                let result = await response.json();

                responseMessage.classList.remove("d-none", "alert-danger", "alert-success");
                responseMessage.classList.add(result.success ? "alert-success" : "alert-danger");
                responseMessage.innerHTML = result.message;
            } catch (error) {
                console.error("Erreur lors de l'envoi du formulaire:", error);
                responseMessage.classList.remove("d-none", "alert-success");
                responseMessage.classList.add("alert-danger");
                responseMessage.innerHTML = "Une erreur est survenue. Veuillez réessayer.";
            } finally {
                sendButton.disabled = false; 
            }
        });
    };

    return { setupFormValidation: e };
})();

document.addEventListener("DOMContentLoaded", FormHandler.setupFormValidation);

setTimeout(function() {
    var myModal = new bootstrap.Modal(document.getElementById('myModal'));
    myModal.show();
  }, 3000);




