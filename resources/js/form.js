document.addEventListener("DOMContentLoaded", function() {
    
    let elem_email2 = document.getElementById("email2")

    elem_email2.style.display = "none";

    let seconds = 0

    setInterval(() => {
        seconds++
    }, 1000)

    document.querySelector('#btnFormSubmit').onclick = (e) => {

        if ( seconds > 5 && elem_email2.value.length == 0) {
            e.target.disabled = true
            e.target.parentNode.submit()
        }

    }

})