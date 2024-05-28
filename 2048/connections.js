const mysql = require('mysql');


const db = mysql.createConnection({
    host    :'localhost',
    port    :'3306',
    user    :'root',
    password    :'',
    database    :'2048'
    
});
// conn.connect(function(err) {
//     if (err) throw err;
//     console.log('Database is connected successfully !');
//   });
  module.exports = db;