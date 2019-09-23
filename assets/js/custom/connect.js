//Proto DB with Javascript using SessionStorage
//v2.1
//Developed by Tummanoon Wacha-em

function Connect(){
    let conn = {
        dbLastID: 'lastID', //ID generator database name

        //get a series of ID from given database name 
        getIDs: function(db){ 
            return new Promise(function(resolve, reject){
                var s = sessionStorage.getItem(db);
                var arr = [];
                if(s != null){
                    arr = JSON.parse(s);
                }
                resolve(arr);
            });
        },

        //get a series of Objects from given database name 
        getDB: function(db){
            return new Promise((resolve, reject) => {
                this.getIDs(db).then(arr => {
                    var objs = [];
                    arr.forEach(id => {
                        this.getObject(id).then(obj => {
                            objs.push(obj);
                        });
                    });
                    resolve(objs);
                });
            });
        },

        //get a series of Objects filtered by query from given database name 
        getWhereDB: function(db, query){
            return new Promise(async (resolve, reject) => {
                var arr1 = await this.getDB(db);
                var arr2 = [];
                var boo = false;
                try{
                    for(key in query){
                        if(boo){
                            arr1 = [];
                            await arr2.forEach(async obj => {
                                if(obj[key] == query[key]){
                                    await arr1.push(obj);
                                }
                            });
                            arr2 = arr1;
                        }else{
                            arr2 = [];
                            await arr1.forEach(async obj => {
                                if(obj[key] == query[key]){
                                    await arr2.push(obj);
                                }
                            });
                            arr1 = arr2;
                        }
                        boo = !boo;
                    }
                    resolve(arr1);
                }catch(e){
                    reject(e);
                }
            });
        },

        //add an Object (also generate ID) to given database name 
        addToDB: function(db, obj){
            return new Promise((resolve, reject) => {
                this.getIDs(db).then(arr => {
                    let id = this.genID();
                    arr.push(id);
                    sessionStorage.setItem(db, JSON.stringify(arr));

                    obj['oid'] = id;
                    this.setObject(id, obj);
                    resolve(id);
                }, err => {
                    reject(err);
                });
            });
        },

        //add an array of Object (also generated ID) to given database name
        addManyToDB: function(db, objs){
            return new Promise(async (resolve, reject) => {
                let arr = await this.getIDs(db);
                let arr_ids = [];
                await objs.forEach(async obj => {
                    let id = this.genID();
                    arr.push(id);
                    obj['oid'] = id;
                    await this.setObject(id, obj);
                    arr_ids.push(id);
                });
                await sessionStorage.setItem(db, JSON.stringify(arr));
                resolve(arr_ids);
            });
        },

        //remove an Object using its ID from given database name 
        removeFromDB: function(db, id){
            return new Promise((resolve, reject) => {
                this.getIDs(db).then(arr => {
                    console.log(id);
                    console.log(arr);
                    let i = arr.indexOf(id);
                    if(i >= 0){
                        arr.splice(i, 1);
                        sessionStorage.setItem(db, JSON.stringify(arr));
                        this.removeObject(id);
                        resolve(id);
                    }else{
                        reject(i);
                    }
                }, err => {
                    reject(err);
                });
            });
        },

        //get an Object using its ID
        getObject: function(id){
            return new Promise((resolve, reject) => {
                let str = sessionStorage.getItem(id);
                var obj = null;
                if(str != null){
                    obj = JSON.parse(str);
                }
                resolve(obj);
            });
        },

        //add or update an Object using its ID
        setObject: function(id, obj){
            return new Promise((resolve, reject) => {
                sessionStorage.setItem(id, JSON.stringify(obj));
                resolve(obj);
            });
        },

        //remove an Object using its ID
        removeObject: function(id){
            return new Promise((resolve, reject) => {
                sessionStorage.removeItem(id);
                resolve(null);
            });
        },

        //generate ID
        genID: function(){
            var id = this.getLastID();
            id = id + 1;
            sessionStorage.setItem(this.dbLastID, id);
            return id;
        },

        //get latest generated ID
        getLastID: function(){
            var id = sessionStorage.getItem(this.dbLastID);
            if(id == null) id = 0;
            return Number(id);
        }
    };

    return conn;
}