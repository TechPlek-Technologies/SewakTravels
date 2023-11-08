import express from "express";
import { createConnection } from "mysql";
import cors from "cors";
import 'dotenv/config'


const app=express();
app.use(cors());

const host=process.env.DB_HOST;
const pass=process.env.DB_PASSWORD;
const user=process.env.DB_UERNAME;
const databaseName=process.env.DB_DATABASE
const db = createConnection({
    host: host,
    user: user,
    password: pass,
    database: databaseName,
  });


  
  
  // Define an API route to fetch data
  app.get('/api/', (req, res) => {
    const query = 'SELECT * FROM tbl_cab_vehicle';
    db.query(query, (err, results) => {
      if (err) {
        console.error(err); // Log the error
        return res.status(500).json({ error: 'Error fetching data' });
      } else {
        res.json(results); // Send the data as a JSON response
      }
    });
  });
  

  
app.listen(5000,()=>{
    console.log("Listening on port 5000")
})