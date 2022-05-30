
        let numColonne = document.querySelector('#recupColonne');
        //  je recupere id=> du btn
        let btn = document.getElementById("submit");
        // je place un ecouteur devenement
        btn.addEventListener("click", e => {
            e.preventDefault();// empecher la page de se recharger
            console.log(parseInt(numColonne.value));
            //premiere verification 
            //je fait appel la methode papa.perseet je recupere input sur son id
            Papa.parse(document.getElementById("files").files[0], {
                download: true,
                Header: false,
                skipEmptyLines: true,
                complete: function (results) {
                    // results est un objet. le premier element de l'objet est data. Data contient un tableau à deux dimentions 
                    console.log(results);
                    let a = 0;
                    results.data.map((data, index) => {
                    })
                    // deuxieme verification 
                    Papa.parse(document.getElementById("files1").files[0], {
                        download: true,
                        Header: false,
                        complete: function (results1) {
                            console.log(results1);
                            check3(results.data,results1.data);
                        }
                    })
                }
            })
        })

        function commaToDot(poids){
            return parseFloat((poids+"").replace(",","."));
        }

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

        function Afficher4(idShippingbo, poidsShippingbo, totalDuPoidsCorrespondancesId, difference) {
            let table4 = document.getElementById("table4");
            let body = table4.createTBody();
            let rowBody = body.insertRow();
            let td = document.createElement('td');
            let td2 = document.createElement('td');
            let td3 = document.createElement('td');
            let td4 = document.createElement('td');
            td.append(idShippingbo);
            td2.append(poidsShippingbo);
            td3.append(totalDuPoidsCorrespondancesId);
            td4.append(difference);
            rowBody.append(td, td2, td3, td4);
        }

        let totalDuPoidsCorrespondancesId = 0;
        function check3 (csvShippingbo, csvGls){
            let numColonneValide = parseInt(numColonne.value)-1;
            for(let i=0; i<csvShippingbo.length; i++){
                let idShippingbo = csvShippingbo[i][2]; 
                let poidsShippingbo = parseFloat(csvShippingbo[i][17]);
                totalDuPoidsCorrespondancesId = 0;
                for (let j = 0; j < csvGls.length; j++) {
                    let idGls = csvGls[j][22];
                    let poidsGls = parseFloat(commaToDot(csvGls[j][numColonneValide]))*1000;
                    if(idShippingbo==idGls){
                        totalDuPoidsCorrespondancesId += poidsGls;
                    } else if (idShippingbo!=idGls){
                        totalDuPoidsCorrespondancesId += 0;
                    }
                }
                if(totalDuPoidsCorrespondancesId == poidsShippingbo && totalDuPoidsCorrespondancesId !=0){
                    Afficher3(idShippingbo, poidsShippingbo, totalDuPoidsCorrespondancesId)
                } else if (totalDuPoidsCorrespondancesId != poidsShippingbo && totalDuPoidsCorrespondancesId !=0){
                    let difference = poidsShippingbo - totalDuPoidsCorrespondancesId;
                    Afficher4(idShippingbo, poidsShippingbo, totalDuPoidsCorrespondancesId, difference)
                }
            }
        }
