document.addEventListener("DOMContentLoaded", function() {
    
    document.querySelector('#btnFormSubmit').onclick = (e) => {
        e.target.disabled = true
        e.target.parentNode.submit()
    }

})