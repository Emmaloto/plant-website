function toggle_div_fun(id) {

    var divelement = document.getElementById(id);

    if(divelement.style.display == 'none')
       divelement.style.display = 'initial';
    else
       divelement.style.display = 'none';
 }

 function toggle_two_div(id, id_other) {

   var divelement = document.getElementById(id);
   var otherelement = document.getElementById(id_other);

   if(divelement.style.display == 'none'){
      divelement.style.display = 'flex';
      otherelement.style.display = 'none'
 
   }else
      divelement.style.display = 'none';
}


function load_list(category)
{
   //$('.navbar-brand').css("background-color", "red") ;
   //document.getElementById('#plant-list').style.display = 'flex';
   $('#plant-list').load('/category/' + category);
}

function iterateLinks(){
   
}