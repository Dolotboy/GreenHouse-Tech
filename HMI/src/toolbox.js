exports.fetchData = (db) => {
    return new Promise(resolve => {
      let transaction = db.transaction(["GreenHouseTech_Entrepot2"], "readwrite");
      let entrepot = transaction.objectStore("GreenHouseTech_Entrepot2");
      let requete = entrepot.getAll();
      requete.onsuccess = function(event){
        resolve(event.target.result);
      }
    })
}

exports.setDb = () => {
    return new Promise(resolve =>{
    window.requete = indexedDB.open("GreenHouseTech",2);
    let db;

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

exports.ClearDb = (db) =>{
    let transaction = db.transaction(["GreenHouseTech_Entrepot2"], "readwrite");
    let entrepot = transaction.objectStore("GreenHouseTech_Entrepot2");
    let request = entrepot.clear();
    request.onsuccess = function(event) {
        console.log("successs");
    }
}

exports.GenerateObject = (proxy) => {
    return JSON.parse(JSON.stringify(proxy));
}