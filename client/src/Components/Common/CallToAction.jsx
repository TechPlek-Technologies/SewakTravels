import { Box, Fab } from "@mui/material";
import AddIcCallOutlinedIcon from "@mui/icons-material/AddIcCallOutlined";
import React from "react";
import "./CallToAction.css";
import { useState } from "react";

const CallToAction = () => {
  const [isExpanded, setIsExpanded] = useState(false);
  const [isHovered, setIsHovered] = useState(false);

  const handleBoxClick = () => {
    setIsExpanded(!isExpanded);
  };

  const handleMouseEnter = () => {
    setIsHovered(true);
  };

  const handleMouseLeave = () => {
    setIsHovered(false);
  };

  const handleButtonClick = () => {
    window.location.href = "tel:+91-837-782-8828";
  };

  return (
    <Box
      className="callTo1"
      sx={{ "& > :not(style)": { m: 1 }, zIndex: "80000"}}
      onClick={handleBoxClick}
      onMouseEnter={handleMouseEnter}
      onMouseLeave={handleMouseLeave}
    >
      <Fab
        aria-label="add"
        className={isExpanded || isHovered ? "expanded" : "callTo"}
        onClick={handleButtonClick}
      >
        <AddIcCallOutlinedIcon
          sx={{ color: "#ef3f3e", width: "30px", height: "30px"}}
        />
       
          <div className={isExpanded || isHovered ? "callTo-message" : "callTo-message1"}> <h6>Call For Inquiry</h6></div>
       
      </Fab>
    </Box>
  );
};

export default CallToAction;
