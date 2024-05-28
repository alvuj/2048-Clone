var express 		= require('express');
var router 			= express.Router();

var tablica        = require('./tablica.js');


//apartmani.js
router.get('/tablica', tablica.tablica);







        

module.exports = router;