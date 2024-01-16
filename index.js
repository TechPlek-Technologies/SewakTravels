const express = require('express');
const mysql = require('mysql2/promise'); // Using mysql2 for promise-based queries

const app = express();
const port = process.env.PORT || 3000;

const db = mysql.createPool({
  host: 'localhost',
  user: 'sewaznyn_trvls',
  password: 'A*z$!RNghfvA',
  database: 'sewaznyn_swtravels',
  waitForConnections: true,
  connectionLimit: 10,
  queueLimit: 0,
});



// Define a route to get all data from tbl_blogs
app.get('/', async (req, res) => {
  try {

   


    res.status(200).json({ text: "Home" });
  } catch (error) {
    console.error('Error fetching data:', error);
    res.status(500).json({ error: 'Internal Server Error' });
  }
});

app.get('/blogsdata', async (req, res) => {
  try {

    const connection = await db.getConnection();
    // Execute a query to select all data from tbl_blogs
    const [rows, fields] = await connection.execute('SELECT * FROM tbl_blogs ORDER BY creation_date DESC');

    connection.release();


    res.status.json({ blogs: rows });
  } catch (error) {
    console.error('Error fetching data:', error);
    res.status(500).json({ error: 'Internal Server Error' });
  }
});

// Start the Express server
app.listen(port, () => {
  console.log(`Server listening on port ${port}`);
});
