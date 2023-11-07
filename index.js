import express from "express";
import { createConnection } from "mysql";
import cors from "cors";
import Razorpay from "razorpay";
import 'dotenv/config'


const app=express();
app.use(cors());

const instance = new Razorpay({
  key_id: process.env.RP_KEY_ID,
  key_secret: process.env.RP_SECRET_KEY,
});

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


  app.get("/order", (req, res) => {
  try {
    const options = {
      amount: 10 * 100, // amount == Rs 10
      currency: "INR",
      receipt: "receipt#1",
      payment_capture: 0,
 // 1 for automatic capture // 0 for manual capture
    };
  instance.orders.create(options, async function (err, order) {
    if (err) {
      return res.status(500).json({
        message: "Something Went Wrong",
      });
    }
  return res.status(200).json(order);
 });
} catch (err) {
  return res.status(500).json({
    message: "Something Went Wrong",
  });
 }
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