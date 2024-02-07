var express = requre('express');
var router = express.router();
var database = require('../database');
 
router.get("/", function(request, response, next){
    var query = "SELECT * FROM movie";
    datatbase.query(query, function(error, data){
        if(error){
            throw error;
        }
        else{
            response.render('practice', {title: 'practice output', action:'list', sampleData:data});
        }
    });
});
