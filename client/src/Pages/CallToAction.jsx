import { Box, Fab } from "@mui/material";
import AddIcCallOutlinedIcon from "@mui/icons-material/AddIcCallOutlined";
import React from "react";
import "./CallToAction.css";

const CallToAction = () => {
  return (
    <a href="tel:+91-837-782-8828">
      <Box
        className="callTo1"
        sx={{ "& > :not(style)": { m: 1 }, zIndex: "80000" }}
      >
        <Fab aria-label="add" className="callTo">
          <AddIcCallOutlinedIcon sx={{ color: "#ef3f3e" }} />
        </Fab>
      </Box>
    </a>
  );
};

export default CallToAction;
