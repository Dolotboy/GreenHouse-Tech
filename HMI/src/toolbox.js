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

exports.GeneratePlant = (proxyPlant) => {
    return {
        plantType : proxyPlant.plantType,
        daysConservation : proxyPlant.daysConservation,
        description : proxyPlant.description,
        groundType : proxyPlant.groundType,
        idPlant : proxyPlant.idPlant,
        imgPlant : proxyPlant.imgPlant,
        plantName : proxyPlant.plantName,
        season : proxyPlant.season,
        tblPlantSowing_idSowing : proxyPlant.tblPlantSowing_idSowing
    };
}

exports.GeneratePackage = (proxyPackage) => {
    console.log("Package : " + JSON.stringify(proxyPackage));
    console.log("Problems :" + proxyPackage.favorableConditions);
     return{
            idPlant : proxyPackage.idPlant,
            imgPlant : proxyPackage.imgPlant,
            plantName : proxyPackage.plantName,
            plantType : proxyPackage.plantType,
            plantFamily : proxyPackage.plantFamily,
            season : proxyPackage.season,
            groundType : proxyPackage.groundType,
            daysConservation : proxyPackage.daysConservation,
            description : proxyPackage.description,
            favorableConditions : this.favorableConditions(proxyPackage.favorableConditions),
            //problems : proxyPackage.problems,
            favorableConditionDate : this.favorableConditionsDate(proxyPackage.favorableConditionDate)
     };
}

exports.favorableConditionsDate = (proxyProblems) => {
    let dateRanges = [];
    for(let i = 0; i < proxyProblems.length; i++){
        let dateRange = Object;
        dateRange.idRangeDate = proxyProblems[i];
        dateRange.rangeType = proxyProblems[i];
        dateRanges.push(dateRange);
    }
    return dateRanges;
}

exports.favorableConditions = (proxyFavorableConditions) => {
    let favorableConditions = [];
    for(let i = 0; i < proxyFavorableConditions.length; i++){
        let favorableCondition = Object;
        favorableCondition.type = proxyFavorableConditions[i].type,
        favorableCondition.min = proxyFavorableConditions[i].min,
        favorableCondition.max = proxyFavorableConditions[i].max,
        favorableCondition.unit = proxyFavorableConditions[i].unit
        favorableConditions.push(favorableCondition);
    }
    return favorableConditions;
}