import React from "react";
import CarDetailPage from "./cab/single-detail/car-detail";

interface PopupProps {
  onClose: () => void;
}

const Popup: React.FC<PopupProps> = ({ onClose }) => {
  return (
    <>
      <div>
        <button onClick={onClose}>Close</button>
      </div>
      <CarDetailPage />
    </>
  );
};

export default Popup;
