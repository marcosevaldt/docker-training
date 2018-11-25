const express 		= require('express');
const bodyParser 	= require('body-parser');
const mysql 		  = require('mysql');
const path 			  = require('path');
const app 			  = express();
const port 			  = 5000;

const db = mysql.createConnection ({
    host: 'mysql',
    user: 'root',
    password: 'root',
    database: 'db_clients'
});

db.connect((err) => {
    if (err) {
        throw err;
    }
    console.log('Connected to database');
});

global.db = db;

// configure middleware
app.set('port', process.env.port || port); // set express to use this port
app.set('views', __dirname + '/views'); // set express to look in this folder to render our view
app.set('view engine', 'ejs'); // configure template engine
app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json()); // parse form data client
app.listen(port, () => {
    console.log(`Server running on port: ${port}`);
});

// Generic List
app.get('/:table/list', function (req, res) {
  let query = "SELECT * FROM " + req.params.table + " ORDER BY id ASC";  
  db.query(query, (err, result) => {
      if (err) {
          res.send(err);
      }
      res.send(result);
  });
});

// Generic Delete
app.get('/:table/delete/:id', function (req, res) {
  let query = "DELETE FROM " + req.params.table + " WHERE id = " + req.params.id;  
  db.query(query, (err, result) => {
      if (err) {
          res.send(err);
      }
      res.send(result);
  });
});

app.post('/clients/create', function (req, res) {
  let query = "INSERT INTO clients VALUES ('', '" + req.body.name + "', '" + req.body.email + "', '" + req.body.password + "', '" + req.body.status_id + "', '" + req.body.client_type_id + "')";
  db.query(query, (err, result) => {
      if (err) {
      	  res.send(err);
      }
      res.send(result);
  });
});

app.post('/phones/create', function (req, res) {
  let query = "INSERT INTO phones VALUES ('', '" + req.body.client_id + "', '" + req.body.phone_type_id + "', '" +  req.body.number + "')";
  db.query(query, (err, result) => {
      if (err) {
          res.send(err);
      }
      res.send(result);
  });
});

app.post('/addresses/create', function (req, res) {
  let query = "INSERT INTO addresses VALUES ('', '" + req.body.client_id + "', '" + req.body.address_type_id + "', '" + req.body.name + "')";
  db.query(query, (err, result) => {
      if (err) {
          res.send(err);
      }
      res.send(result);
  });
});

app.post('/documents/create', function (req, res) {
  let query = "INSERT INTO documents VALUES ('', '" + req.body.client_id + "', '" + req.body.name + "', '" + req.body.document_type_id + "')";
  db.query(query, (err, result) => {
      if (err) {
          res.send(err);
      }
      res.send(result);
  });
});

app.post('/phones_type/create', function (req, res) {
  let query = "INSERT INTO phones_type VALUES ('', '" + req.body.name + "')";
  db.query(query, (err, result) => {
      if (err) {
          res.send(err);
      }
      res.send(result);
  });
});

app.post('/documents_type/create', function (req, res) {
  let query = "INSERT INTO documents_type VALUES ('', '" + req.body.name + "')";
  db.query(query, (err, result) => {
      if (err) {
          res.send(err);
      }
      res.send(result);
  });
});

app.post('/clients_type/create', function (req, res) {
  let query = "INSERT INTO clients_type VALUES ('', '" + req.body.name + "')";
  db.query(query, (err, result) => {
      if (err) {
          res.send(err);
      }
      res.send(result);
  });
});

app.post('/clients_status/create', function (req, res) {
  let query = "INSERT INTO clients_status VALUES ('', '" + req.body.name + "')";
  db.query(query, (err, result) => {
      if (err) {
          res.send(err);
      }
      res.send(result);
  });
});

app.post('/addresses_type/create', function (req, res) {
  let query = "INSERT INTO addresses_type VALUES ('', '" + req.body.name + "')";
  db.query(query, (err, result) => {
      if (err) {
          res.send(err);
      }
      res.send(result);
  });
});
