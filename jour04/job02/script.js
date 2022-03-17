const tableau = [{"name":"La Plateforme_", "address":"8 rue d'hozier", "city":"Marseille", "nb_staff":"11", "creation":"2019"}]
//console.log(tableau[0]["city"])
//document.write(tableau[0]["city"])
const key = "city"

document.addEventListener("DOMContentLoaded", ()=> { 
    jsonValueKey(tableau, key);
})

function jsonValueKey(tableau, key) {
    document.write(tableau[0][key])
}

/*console.log(tableau)
document.write(tableau.name);
document.write(tableau.city);
*/
/*


function jsonValueKey(tableau) {
    document.write(tableau.name);
    document.write(tableau.address);
    document.write(tableau.city);
    document.write(tableau.nb_staff);
    document.write(tableau.creation);
}*/