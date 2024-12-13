// jQuery Section
$(document).ready(function(){

    $(".sidebarlinks").click(function(){
        $(this).toggleClass('active');

        // console.log(this.classList);
    })

    $("#myscription").click(function(){
        $("#tocooklists").addClass('active')
    })

    $(".cookclosebtn").click(function(){
        $("#tocooklists").toggleClass('active')
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

    // document.getElementById('autoclick').click();


// end tab section

// End Show Section

// Start Todo Cook Section
let getcookform = document.getElementById('tocookform');
let getcookinput = document.getElementById('cookbox');
let getcookul = document.getElementById('cookgroups');

getcookform.addEventListener('submit',function(e){

    addcooknew();

    // updatecooklocal();

    e.preventDefault();
});

let getcooklocals = JSON.parse(localStorage.getItem('tocooks'));

if(getcooklocals){

    getcooklocals.forEach(getcooklocal=>{
        addcooknew(getcooklocal);
    })

}

function addcooknew(tocook){

    let todotext = getcookinput.value;

    if(tocook){
        todotext = tocook.text;
    }

    if(todotext){
        const newli = document.createElement("li");

        if(tocook && tocook.done){
            newli.classList.add('completed');
        }

        newli.appendChild(document.createTextNode(todotext));
        getcookul.appendChild(newli);

        getcookinput.value = '';
        getcookinput.focus();

        updatecooklocal();

        newli.onclick = function(){
            this.classList.toggle('completed')
            updatecooklocal();
        }

        newli.addEventListener('contextmenu',function(e){
            this.remove();
            e.preventDefault();
        })

    }

}

function updatecooklocal(){
    let getlis = document.querySelectorAll('.tocooklists .list-group li');

    let todolist = [];

    getlis.forEach(function(getli){
        todolist.push({
            text:getli.textContent,
            done:getli.classList.contains('completed')
        })
    })

    localStorage.setItem('tocooks',JSON.stringify(todolist))

}


// End Todo Cook Section



