require("rootpath")();
const express = require("express");
const app = express();
const cors = require("cors");
const path = require("path");
const bodyParser = require("body-parser");
const errorHandler = require("_middleware/error-handler");

app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());
app.use(cors());

app.use(express.static(path.join("./client/build")))

// Catch all requests that don't match any route
app.get("*", (req, res) => {
  res.sendFile(
    path.join(__dirname, "../client/build/index.html")
    );
  });
  
  // api routes
app.use("/blogsdata", require("./blogs/blogs.controller"));

// global error handler
app.use(errorHandler);

// start server
const port =
  process.env.NODE_ENV === "production" ? process.env.PORT || 80 : 5000;
  
app.listen(port, () => console.log("Server listening on port " + port));
