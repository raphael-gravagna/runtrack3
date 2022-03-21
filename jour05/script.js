function saisie(txt_defaut,nom_controle)
{
        if(document.getElementById(nom_controle).value==txt_defaut)
        document.getElementById(nom_controle).value='';

}

function retablir(txt_defaut,nom_controle)
{
        if(document.getElementById(nom_controle).value=='')
        document.getElementById(nom_controle).value=txt_defaut;
}

function mev(txt_defaut,nom_controle)
{
    var longueur = document.getElementById(nom_controle).value.lenght;

    if(longueur < 4 || document.getElementById(nom_controle).value==txt_defaut)
    {
        document.getElementById(nom_controle).style.border='#CC3300 2px solid';
        switch(nom_controle)
        {
            case "nom":
                b_nom=false;
                break;
            case "prenom":
                b_prenom=false;
                break;
            case "email":
                b_email=false;
                break;
            case "password":
                b_password=false;
                break;

        }
    }
    else
    {
        document.getElementById(nom_controle).style.border='#333 1px solid';
        switch(nom_controle)
        {
            case "nom":
                b_nom=true;
                break;
            case "prenom":
                b_prenom=true;
                break;
        }

    }

}