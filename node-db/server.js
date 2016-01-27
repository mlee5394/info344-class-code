'use strict';

var express = require('express');
var morgan = require('morgan');
var bodyParser = require('body-parser');
var mysql = require('mysql');
var dbConfig = require('./secret/config-maria.json');
var bluebird = require('bluebird');
var storiesApi = require('./controllers/stories-api');

// insted of creating single connection it creates another one called 
// createpool can do 10 connections for multiple connections when a lot of people
// are on the same connection
var connPool = bluebird.promisifyAll(mysql.createPool(dbConfig));
var Story = require('./models/story.js').Model(connPool);



var app = express();

app.use(morgan('dev'));
app.use(bodyParser.json());

app.use(express.static(__dirname + '/static'));

app.use('/api/v1', storiesApi.Router(Story));

app.listen(80, function() {
	console.log('server is listening...');
});

