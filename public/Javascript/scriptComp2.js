//---<>----------------------------------------<>---//
//---<> Les variables <>---//
//---<>----------------------------------------<>---//
console.log("yééééééééééééééééééééééé");
let numero_shippingbo = document.querySelector('#numero_shippingbo');
let poids_shippingbo = document.querySelector('#poids_shippingbo');
let numero_transporteur = document.querySelector('#numero_transporteur');
let poids_transporteur = document.querySelector('#poids_transporteur');

let idShippingbo = document.querySelector('#idShippingbo');
let poidsShippingbo = document.querySelector('#poidsShippingbo');
let recupColonneOrder = document.querySelector('#recupColonneOrder');
let numColonne = document.querySelector('#recupColonne');

let btn = document.getElementById("submit");
let aze = document.getElementById("files1");
let csvColonnes = document.getElementById("files3");
let clearTableau = document.getElementById("clearTableau");

let tableCsvColonne = document.getElementById("table2_body");
let tableCsvColonneTotal = document.getElementById("table2");
let table3 = document.getElementById("table3");

let content = document.getElementById("content");
let card_numero_shippingbo = document.querySelector(".shippingbo");
let data = [];
let totalDuPoidsCorrespondancesId = 0;
let exporeCSV = [];
let noCorrespondance = true;
let poidsTotal = 0;
let noPoids = false;
let match = document.querySelectorAll(".match");

let stockDatas;
let stockDatas2;

let colonneP = "";
let colonneR = "";

//---<>----------------------------------------<>---//
//---<> RAFRAICHIR LA PAGE AVEC LE BTN "RESET" <>---//
//---<>----------------------------------------<>---//

    reset.addEventListener("click", refresh);
    function refresh() {
        location.reload();
    }

//---<>----------------------------------------<>---//
//--------------<> CLEAR LE TABLEAU <>--------------//
//---<>----------------------------------------<>---//

    clearTableau.addEventListener("click", (e) => {
        e.preventDefault;

        let tbody = document.querySelectorAll("#table3 tbody #table4 tbody")
        for (let i = 0; i < tbody.length; i++) {
            tbody[i].parentNode.removeChild(tbody[i]);
        }
        content.style.visibility = "hidden";
    });

//----------<>--------------------------------------------------------<>----------//
//--------------<> FONCTION PERMETTANT D'IMPORTER UN FICHIER CSV <>--------------//
//---------<>---------------------------------------------------------<>---------//

    csvColonnes.addEventListener("change", (e) => {
        e.preventDefault();
        Papa.parse(document.getElementById("files3").files[0], {
            download: true,
            Header: false,
            skipEmptyLines: true,
            encoding: "ASCII",
            encoding:"UTF-8",
            complete: function (results) {
                console.log(results.data);
                afficherCsvColonnes(results.data);
            }
        })
    })

//----------<>--------------------------------------------------------<>----------//
//--------------<> FONCTION PERMETTANT de charger les deux fichiers csv et récupérer les données. (Notamment en lien avec la fonction "selected") <>--------------//
//---------<>---------------------------------------------------------<>---------//

    aze.addEventListener("change", (e) => {
        e.preventDefault();     //---<> EMPECHE LA PAGE DE SE RECHARGER <>---// 
        //---<> PREMIERE VERIFICATION <>---//
        //---<> JE FAIT APPEL LA METHODE PAPA.PARSE ET JE RECUPERE L'INPUT SUR SON ID <>---//
        Papa.parse(document.getElementById("files").files[0], {
            download: true,
            Header: false,
            skipEmptyLines: true,
            encoding: "ASCII",
            encoding: "UTF-8",
            complete: function (results) {
                let a = 0;
                results.data.map((data, index) => {
                })
                // deuxieme verification 
                Papa.parse(document.getElementById("files1").files[0], {
                    download: true,
                    Header: false,
                    // skipEmptyLines: true,
                    encoding: "ASCII",
                    encoding: "UTF-8",
                    complete: function (results1) {
                        selected(results.data[0],results1.data[0]);
                        stockDatas=results.data;
                        stockDatas2=results1.data;
                    }
                })
            }
        })
    })

//-----------------<>----------------------------------------<>-----------------//
//---<> PERMET DE REMPLACER LA VIRGULE PAR UN POINT DANS LES FICHIERS CSV  <>---//
//-----------------<>----------------------------------------<>-----------------//

    function commaToDot(poids){
        return parseFloat((poids+"").replace(",","."));
    }

//-----------------<>----------------------------------------<>-----------------//
//---<> Les deux fonctions appelées au click pour afficher. Voir    btn.addEventListener("click") et voir check3    <>---//
//-----------------<>----------------------------------------<>-----------------//

    function Afficher3(idShippingbo, poidsShippingbo, totalDuPoidsCorrespondancesId) {
        let table3 = document.getElementById("table3");
        let body = table3.createTBody();
        let rowBody = body.insertRow();
        let td = document.createElement('td');
        let td2 = document.createElement('td');
        let td3 = document.createElement('td');
        td.append(idShippingbo);
        td2.append(poidsShippingbo);
        td3.append(totalDuPoidsCorrespondancesId);
        rowBody.append(td, td2, td3);
    }

    function Afficher4(idShippingbo, poidsShippingbo, totalDuPoidsCorrespondancesId, difference, calculSommeTaxes, resultatCalculShippingbo) {
        content.style.visibility = "visible";        
        for (let i = 0; i < exporeCSV.length; i += 4) {
        data.push(exporeCSV.slice(i, i + 4));
        }
        let table4 = document.getElementById("table4");
        let body = table4.createTBody();
        let rowBody = body.insertRow();
        let td = document.createElement('td');
        let td2 = document.createElement('td');
        let td3 = document.createElement('td');
        let td4 = document.createElement('td');
        let td5 = document.createElement('td');
        let td6 = document.createElement('td');
        td.append(idShippingbo);
        td2.append(poidsShippingbo);
        td3.append(totalDuPoidsCorrespondancesId);
        td4.append(difference);
        // td5.append(calculSommeTaxes);
        td6.append(resultatCalculShippingbo);
        // rowBody.append(td, td2, td3, td4, td5, td6);
        rowBody.append(td, td2, td3, td4, td6);
    }   

//---<>--------------------------------------------<>---//
//--------------<> EXPORTER FICHIER SCV <>--------------//
//---<>--------------------------------------------<>---//

    let  link = document.getElementById("btn");
                
    link.addEventListener("click", telecharger);

    function telecharger(){
        let csvContent =
        "data:text/csv;charset=utf-8," +
        data.map((e) => e.join(",")).join("\n");
        var encodedUri = encodeURI(csvContent);
        link.setAttribute("href", encodedUri);
        link.setAttribute("download", "mon_fichier.csv");
        
    }

//---<>---------------------------------------<>---//
//--------------<> NOUVEAU RAJOUT <>--------------//
//---<>-------------------------------------<>---//

    function afficherCsvColonnes(results_data){
        results_data.map((data, index) => {
            let rowBody = tableCsvColonne.insertRow();
            data.map((element, index) => {
                let td = document.createElement('td');
                td.append(element);
                rowBody.append(td);
            })
        })
    }

//---<>---------------------------------------<>---//
//--------------<> Valeurs des deux fichiers csv grace au menu déroulant pour shipping et grace à la BDD pour transporteur <>--------------//
//---<>-------------------------------------<>---//

    function selected(resultsShippingbo, resultsTransporteur){
        // On créé la liste déroulante pour numéro de commande de shippingbo
        resultsShippingbo.forEach((element, index) => {
            let numeroShip = document.createElement('option');
            numeroShip.setAttribute("value", index+1);
            let txt = document.createTextNode(element);
            numeroShip.append(txt);
            numero_shippingbo.append(numeroShip);
        });

        // On créé la liste déroulante pour choix poids de shippingbo
        resultsShippingbo.forEach((element, index) => {
            let numeroShip = document.createElement('option');
            numeroShip.setAttribute("value", index+1);
            let txt = document.createTextNode(element);
            numeroShip.append(txt);
            poids_shippingbo.append(numeroShip);
        });

        // On va comparer les colonnes de la bdd et du fichier csv. On compare la réf et le poids pour trouver ceux qui sont identiques. On extrait alors le numéro de colonne.
        let colonnePoids = colonnesPoidsRefCsv[0].colonnePoidsCsv;
        let colonneRef = colonnesPoidsRefCsv[0].colonneRefCsv;
        resultsTransporteur.forEach((element, index) => {
            if(element.trim() == colonnePoids.trim()){
                return colonneP = index+1;
            }
            if(element.trim() == colonneRef.trim()){
                return colonneR = index+1;
            }
        });

/* // Backup ancienne version. Menu déroulant JS
        resultsShippingbo.forEach((element, index) => {
            let numeroShip = document.createElement('option');
            numeroShip.setAttribute("value", index+1);
            let txt = document.createTextNode(element);
            numeroShip.append(txt);
            numero_shippingbo.append(numeroShip);
        });

        resultsShippingbo.forEach((element, index) => {
            let numeroShip = document.createElement('option');
            numeroShip.setAttribute("value", index+1);
            let txt = document.createTextNode(element);
            numeroShip.append(txt);
            poids_shippingbo.append(numeroShip);
        });

        resultsTransporteur.forEach((element, index) => {
            let numeroShip = document.createElement('option');
            numeroShip.setAttribute("value", index+1);
            let txt = document.createTextNode(element);
            numeroShip.append(txt);
            numero_transporteur.append(numeroShip);
        });

        resultsTransporteur.forEach((element, index) => {
            let numeroShip = document.createElement('option');
            numeroShip.setAttribute("value", index+1);
            let txt = document.createTextNode(element);
            numeroShip.append(txt);
            poids_transporteur.append(numeroShip);
        }); */

    }

    var david, arnaud; 
/*     // Backup ancienne version. Menu déroulant JS
    var quentin, dominique; */

    numero_shippingbo.addEventListener('change', function(e){
        david = e.target.value; 
    })

    poids_shippingbo.addEventListener('change', function(e){
        arnaud = e.target.value;
    })

/*     // Backup ancienne version. Menu déroulant JS
    numero_transporteur.addEventListener('change', function(e){
        quentin = e.target.value;
    })

    poids_transporteur.addEventListener('change', function(e){
        dominique = e.target.value;
    }) */

//---<>---------------------------------------<>---//
//--------------<> Au click : lancement des 2 fichiers pour affichage comparaison des poids et calcul des coûts. <>--------------//
//---<>-------------------------------------<>---//

    btn.addEventListener("click", (e) => {
        e.preventDefault();     //---<> EMPECHE LA PAGE DE SE RECHARGER <>---//
        check3(stockDatas, stockDatas2, david, arnaud, colonneR, colonneP);
    })

    let calculSommeTaxes =0;

    function check3 (csvShippingbo, csvGls, david, arnaud, colonneR, colonneP){
        let idShippingboValide = parseInt(david)-1;
        let poidsShippingboValide = parseInt(arnaud)-1;
        let recupColonneOrderValide = parseInt(colonneR)-1;
        let numColonneValide = parseInt(colonneP)-1;
        for(let i=0; i<csvShippingbo.length; i++){
            let idShippingbo = csvShippingbo[i][idShippingboValide]; 
            let poidsShippingbo = parseFloat(csvShippingbo[i][poidsShippingboValide]);
            totalDuPoidsCorrespondancesId = 0;
            calculSommeTaxes = 0;
            let idGls;
            let csr;
            let per;
            let sgo;
            for (let j = 0; j < csvGls.length; j++) {
                idGls = csvGls[j][recupColonneOrderValide];
                per = parseFloat(commaToDot(csvGls[j][32]));
                csr = parseFloat(commaToDot(csvGls[j][31]));
                sgo = parseFloat(commaToDot(csvGls[j][34]));
                let poidsGls = parseFloat(commaToDot(csvGls[j][numColonneValide]))*1000;
                if(idShippingbo==idGls){
                    noCorrespondance = false;
                    totalDuPoidsCorrespondancesId += poidsGls;
                    calculSommeTaxes += per+csr+sgo;
                    //---<> CALCUL DU POIDS TOTAL DE TOUTES LES CORRESPONDANCES TROUVEES <>---//
                    poidsTotal += totalDuPoidsCorrespondancesId;
                } else if (idShippingbo!=idGls){
                    
                    totalDuPoidsCorrespondancesId += 0;
                }
            }

            if(totalDuPoidsCorrespondancesId == poidsShippingbo && totalDuPoidsCorrespondancesId !=0){
                Afficher3(idShippingbo, poidsShippingbo, totalDuPoidsCorrespondancesId)
            } else if (totalDuPoidsCorrespondancesId != poidsShippingbo && totalDuPoidsCorrespondancesId !=0){
                let difference = totalDuPoidsCorrespondancesId - poidsShippingbo;

                // Début calcul. Mise en place des variables pour le calcul
                let recupToutesTaxes = [];

                let recupFactureTab = Object.values(facture[0]);

                let recupFacture= recupFactureTab.toString();

                let poidsEnKg = Math.ceil(poidsShippingbo/1000);

                // Comparaison des poids bdd et shippingbo

                for(let i=0; i<valeurBase.length; i++){
                    if(valeurBase[i].valeurPoids == poidsEnKg){
                        let recupValeurBase = valeurBase[i].valeurPrix;
                        recupToutesTaxes.push('V');
                        recupToutesTaxes.push(recupValeurBase);
                    }
                }
                
                if (poidsEnKg>=30) {
                    let recupValeurBase = valeurBase[valeurBase.length-1].valeurPrix;
                    recupToutesTaxes.push('V');
                    recupToutesTaxes.push(recupValeurBase);
                }

                 // Fin comparaison des poids bdd et shippingbo

                for (let i=0; i<taxe.length; i++) {
                    let recuptaxe = Object.values(taxe[i]);
                    recuptaxe.pop();
                    recuptaxe.shift();
                    for (let j=0; j<recuptaxe.length; j++){
                        recupToutesTaxes.push(recuptaxe[j]);
                    }
                }
                
                // Fin variables pour calcul
                // ------------------------------------------------------------------------------------------------
                // Calcul
                
                let result = [""];
                let result2 = [];
                let m = 0;
                let k = 0;
                let operateur = [];
                let total = 0;
                for (let i = 0; i < recupFacture.length; i++) {
                    if(recupFacture[i] == '+' || recupFacture[i] == '-' || recupFacture[i] == '*' || recupFacture[i] == '/'){
                        operateur[k] = recupFacture[i];
                        m++;
                        result[m] = "";
                        k++;
                        i++;
                    }
                    result[m] += recupFacture[i];
                }
                
                for (let i = 0; i < result.length; i++) {
                    for (let n = 0; n < recupToutesTaxes.length; n++){
                        if(result[i] == recupToutesTaxes[n]){
                            result2.push(recupToutesTaxes[n+1]);
                        }
                    }
                }
                
                let az = [];
                for(let i = 0; i <result2.length; i++){
                    az.push(String(result2[i]));
                    az.push(String(operateur[i]));
                }
                az.pop();
                let qz=az.join('');
                let resultatCalculShippingbo = eval(qz);

                Afficher4(idShippingbo, poidsShippingbo, totalDuPoidsCorrespondancesId, difference, calculSommeTaxes, resultatCalculShippingbo)
            }
        }

        /* if (isNaN(poidsTotal) == true || is_float(poidsTotal) == false || poidsTotal == undefined || poidsTotal == null || poidsTotal == NaN ||poidsTotal == 0){
            noPoids = true;
        }else{
            noPoids = false;
        } */
        //-----------------------<>---------------------------------------------------------------------------------<>----------------------//
        //---<> SI LE POIDS TOTAL N'EST PAS UN NOMBRE ET QUE SON POIDS EST EGAL A ZERO ON MET TRUE POOUR AFFICHER LE MESSAGE D'ERREUR <>---//
        //----------------------<>--------------------------------------------------------------------------------<>----------------------//

        if (isNaN(poidsTotal)){
            noPoids = true;
        }else{
            noPoids = false;
        }
        //console.log(noPoids)

        //---<>--------------------------------------------------------------------- <>---//
        //---<> AFFICHE LE TABLEAU OU L'ERREUR EN FONCTION DE LA VALEUR DES BOOLEENS <>---//
        //---<>--------------------------------------------------------------------- <>---//

        if (noCorrespondance == false && noPoids == false){ //---<> AFFICHER TABLEAU <>---//
            match[1].classList.replace("match", "match-active");
            match[0].classList.replace("match-active", "match");
        }else if(noCorrespondance == true || noPoids== true){ //---<> AFFICHER ERREUR <>---//
            match[0].classList.replace("match","match-active");
            match[1].classList.replace("match-active","match");
        }
        poidsTotal = null;
    }


/* ///////////////////////////////////////////////////// */
//---<>---------------------------------------<>---//
//--------------<> Tri du tableau par ordre décroissant <>--------------//
//---<>-------------------------------------<>---//
/* ///////////////////////////////////////////////////// */

th = document.getElementsByTagName('th');

    for(let c=0; c < th.length; c++){

        th[c].addEventListener('click',item(c)) //et cbd alors ?
    }


    function item(c){

        return function(){
        //console.log(c)
        sortTable(c)
        }
    }

    //---<> TRIER LES VALEURS PAR ORDRE DECROISSANT <>---//

    function sortTable(c) {
        var table, rows, switching, i, x, y, shouldSwitch;
        table = document.getElementById("table4");
        switching = true;
        /*Faites une boucle qui continuera jusqu'à ce que
        aucune commutation n'ait été effectuée*/
        /*Make a loop that will continue until
        no switching has been done:*/
        while (switching) {
            //commencer par dire : on ne fait pas de commutation
            //start by saying: no switching is done:
            switching = false;
            rows = table.rows;
            /*Parcourir en boucle toutes les lignes du tableau (sauf la
                première, qui contient les en-têtes du tableau)*/
            /*Loop through all table rows (except the
            first, which contains table headers):*/
            for (i = 1; i < (rows.length - 1); i++) {
            //commencer par dire qu'il ne devrait pas y avoir de commutation   
            //start by saying there should be no switching:
            shouldSwitch = false;
            /*Obtenez les deux éléments que vous voulez comparer,
            l'un de la ligne actuelle et l'autre de la suivante*/
            /*Get the two elements you want to compare,
            one from current row and one from the next:*/
            x = rows[i].getElementsByTagName("TD")[c];
            y = rows[i + 1].getElementsByTagName("TD")[c];
            //vérifier si les deux rangées doivent être interverties
            //check if the two rows should switch place:
            if (parseFloat(y.innerHTML) > parseFloat(x.innerHTML)) {
                //si c'est le cas, marquer comme un interrupteur et rompre la boucle
                //if so, mark as a switch and break the loop:
                shouldSwitch = true;
                break;
            }
            }
            if (shouldSwitch) {
            /*Si un aiguillage a été marqué, effectuez l'aiguillage
            et indiquez qu'un aiguillage a été effectué*/
            /*If a switch has been marked, make the switch
            and mark that a switch has been done:*/
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            }
        }
    }