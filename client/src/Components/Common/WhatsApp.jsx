import { Box, Fab } from "@mui/material";
import WhatsAppIcon from '@mui/icons-material/WhatsApp';
import React from "react";
import "./whatsapp.css";

const Whatsappintegration = () => {
  return (
    <a href="https://wa.me/+918377828828" target="blank">
      <Box
        className="wtp1"
        sx={{ "& > :not(style)": { m: 1 }, zIndex: "80000" }}
      >
        <Fab aria-label="add" className="wtp">
        <WhatsAppIcon sx={{ color: "#1ad03f" ,width:"45px", height:"45px"}} />  
         </Fab>
      </Box>
    </a>
  );
};

export default Whatsappintegration;