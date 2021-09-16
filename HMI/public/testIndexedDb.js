let db;
    let data;
    //main();

    async function main(){
      data = await getData();
      db = await SetDb();
      console.log(db, data);
      console.log(data["vegetals"][0]);

      let transaction = db.transaction(["GreenHouseTech_Entrepot2"], "readwrite");
      let entrepot = transaction.objectStore("GreenHouseTech_Entrepot2");
      let veggies = data["vegetals"];
      for(let i = 0; i < 30; i++){
        entrepot.add(veggies[i]);
      }

      data = await fetchData();
      let jsonString = JSON.stringify(data);
      console.log(jsonString);
      let test = `{ "vegetals":` + jsonString + "}";
      console.log(test);
      console.log(test[17],test[18],test[19],test[20]);
      let json = JSON.parse(test);
      console.log(json);
      alert(json["vegetals"].length);
    }

    function fetchData(){
      return new Promise(resolve => {
        let transaction = db.transaction(["GreenHouseTech_Entrepot2"], "readwrite");
        let entrepot = transaction.objectStore("GreenHouseTech_Entrepot2");
        let requete = entrepot.getAll();
        requete.onsuccess = function(event){
          resolve(event.target.result);
        }
      })
    }

    function getData(){
      return new Promise(resolve => {
        fetch("./JsonContent.json")
      .then(response => {
        resolve(response.json());
      })
      })
    }

    function SetDb(){
      return new Promise(resolve =>{
      window.requete = indexedDB.open("GreenHouseTech",2);

      window.requete.onupgradeneeded = function(event){
            db = event.target.result;
            let options = {
                keyPath : "primaryKey",
                autoIncrement : true
            };
            let entrepot = db.createObjectStore("GreenHouseTech_Entrepot2",options);
            entrepot.createIndex("index", "primaryKey");
            resolve(db);
        }

        // Gestion des erreurs d'ouverture
        window.requete.onerror = function(event){
            console.log(event.target.errorCode);
            console.log("error");
            resolve(db);
        };

        // En cas de succès, "bd" contient la connexion
        window.requete.onsuccess = function(event){
            db = event.target.result;
            resolve(db);
        }
      });
    }