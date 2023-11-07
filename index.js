import express from "express";
const app=express();

app.get("/api",(req,res)=>{
    res.send("Hello App")
})

app.listen(5000,()=>{
    console.log("Listening on port 5000")
})