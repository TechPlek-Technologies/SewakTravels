import QuantityInput from "./QuantityInput";

const QtyBox= () => {
    return (
      <div className="room-cls">
        <div className="qty-box">
          <label>{"Adult"}</label>
          <QuantityInput />
        </div>
        <div className="qty-box">
          <label>children</label>
          <QuantityInput />
        </div>
      </div>
    );
  };
  
  export default QtyBox;
  