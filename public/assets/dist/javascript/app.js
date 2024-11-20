// jQuery Section
$(document).ready(function(){

    $(".sidebarlinks").click(function(){
        $(this).toggleClass('active');

        // console.log(this.classList);
    })

});





// Javascript Section

// Start Show Section

// start tab section
let gettablinks = document.querySelectorAll('.tablinks'),
    gettabpanels = document.querySelectorAll('.tab-panels'),
    getbtncloses = document.querySelectorAll('.btn-close');

    function gettabs(env,link){

        // Remove Tabpanel
        gettabpanels.forEach((gettabpanel)=>{
            gettabpanel.style.display = "none"
        })

        // Add Tabpanel
        document.getElementById(link).style.display= "block"

        // Remove Active
        gettablinks.forEach((gettablink)=>{
            gettablink.classList.remove('active');
        })

        // Add Active
        env.target.classList.add('active');

        // For Btn close
        for(let x = 0 ; x < getbtncloses.length ; x++){
            getbtncloses[x].addEventListener('click',function(){
                this.parentElement.style.display = "none"
            })
        }

    }

    document.getElementById('autoclick').click();


// end tab section

// End Show Section
