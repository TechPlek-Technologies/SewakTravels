import express from "express";
import { createConnection } from "mysql";
import cors from "cors";
import "dotenv/config";
import nodemailer from "nodemailer";
import bodyParser from "body-parser";
import sendgridTransport from "nodemailer-sendgrid-transport";
const app = express();
app.use(cors());

app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: false }))

const host = process.env.DB_HOST;
const pass = process.env.DB_PASSWORD;
const user = process.env.DB_UERNAME;
const databaseName = process.env.DB_DATABASE;
const db = createConnection({
  host: host,
  user: user,
  password: pass,
  database: databaseName,
});

// Define an API route to fetch data
app.get("/api/", (req, res) => {
  const query = "SELECT * FROM tbl_cab_vehicle";
  db.query(query, (err, results) => {
    if (err) {
      console.error(err); // Log the error
      return res.status(500).json({ error: "Error fetching data" });
    } else {
      res.json(results); // Send the data as a JSON response
    }
  });
});

app.post('/submitForm', (req, res) => {
  const { name, lastName, phoneNumber, email, message } = req.body;

  // Configure nodemailer to send emails
  const transporter = nodemailer.createTransport({
    host: "smtp.sewaktravels.com",
    port: 465,
    secure: true, // use TLS
    auth: {
      user: "booking@sewaktravels.com",
      pass: "b@gI6RKGL",
    },
    tls: {
      // do not fail on invalid certs
      rejectUnauthorized: false,
    },
  });


  // Email content
  const mailOptions = {
    from: 'your-email@gmail.com',
    to: 'deepaksharmaa.39@gmail.com',
    subject: 'New Form Submission',
    text: `Name: ${name}\nLast Name: ${lastName}\nPhone Number: ${phoneNumber}\nEmail: ${email}\nMessage: ${message}`,
  };

  // Send email
  transporter.sendMail(mailOptions, (error, info) => {
    if (error) {
      console.error(error);
      res.status(500).send('Internal Server Error');
    } else {
      console.log('Email sent: ' + info.response);
      res.status(200).send('Email sent successfully');
    }
  });
});

app.listen(5000, () => {
  console.log("Listening on port 5000");
});
