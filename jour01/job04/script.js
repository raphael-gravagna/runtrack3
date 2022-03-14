function bisextile(annee)
{
    var annee = "2000"
    if ((annee%4==0) && ((annee%100!=0) || (annee%400==0))) return true;
    else return false;
    
}
console.log(bisextile(1996));