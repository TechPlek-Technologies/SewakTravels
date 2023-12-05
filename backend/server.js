// server.js
const express = require('express');
const mysql = require('mysql');
const app = express();
const port = 3001;

const db = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: 'deepak@123',
  database: 'sewaznyn_swtravels'
});

db.connect((err) => {
  if (err) {
    console.error('Database connection failed:', err);
  } else {
    console.log('Connected to database');
  }
});

app.get('/api/data', (req, res) => {
  const vehicleTypeId = req.params.id;
  // Replace the query with your own query to fetch data from the database
  const sql = `SELECT * FROM tbl_vendors_vehicle WHERE isDeleted = 0;`;
  

  db.query(sql, function (err, result) {
    if (err) {
      console.error('Error executing query:', err);
      res.status(500).send('Internal Server Error');
    } else {
      console.log('Result:', result);
      res.send(result);
    }
  });
});

app.listen(port, () => {
  console.log(`Server is running on port ${port}`);
});
