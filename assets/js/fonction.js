function modif($i){
    var mont = document.getElementById("mont"+$i);
    var tot = document.getElementById("total");
    var totval = document.getElementById("total").value;
    // var result = document.getElementById("result");
    // alert(mont);
    var prix = document.getElementById("prix"+$i).value;
    // alert(prix);
    var qte = document.getElementById("qte"+$i).value;

    // $_SESSION['total_panier'] = prix*qte;
    // alert(qte);
    mont.innerHTML=prix*qte;
    tot.innerHTML=totval+(prix*qte);
}