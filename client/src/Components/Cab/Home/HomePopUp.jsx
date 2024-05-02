import { Dialog, DialogContent } from "@mui/material";
import styles from'./HomePopUp.module.css'
import { SendMail } from "../../../Utility/SendMail";
import { useContext } from "react";
import { PaymentContext } from "../../../Context/PaymentContext";

const HomePopUp = ({ setPhone_email, isPopupOpen, handlePopupClose,phone_email }) => {

  const { setPaymentData } = useContext(PaymentContext);
  async function sendQueryEmail(){
    await SendMail("booking@sewaktravels.com","Demo",`<h1>New Query From Mobile/Email: ${phone_email}</h1>`);
  }
  
  const handleChange = (e) => {
    setPaymentData(prevState => ({
      ...prevState, // Keep all existing fields
      contact: e.target.value // Update just the firstName field
    }));
    setPhone_email(e.target.value)
  };

  return (
    <>
      <Dialog open={isPopupOpen} onClose={handlePopupClose} fullWidth>
        <DialogContent>
          <div className="container">
            <div className="row">
             
            </div>
          </div>
          <div className="container">
            <div className="row">
              <div className="col ">
                <div className="input-group">
                  <input
                    type="email"
                    className="form-control"
                    placeholder="Enter your Email/Phone to continue"
                    aria-label="Recipient's username"
                    required
                    onChange={handleChange}
                  />
                  <div className={`input-group-append ${styles.mobile}`} >
                    <div onClick={()=>{
                      handlePopupClose();
                        // sendQueryEmail();

                    }} className="btn btn-rounded btn-sm color1">
                      Continue
                    </div>
                  </div>
                </div>
                <div className={`input-group-append ${styles.desktop}`}>
                    <div onClick={()=>{
                      handlePopupClose();
                        sendQueryEmail();

                    }} className="btn btn-rounded btn-sm color1">
                      Continue
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </DialogContent>
      </Dialog>
    </>
  );
};

export default HomePopUp;
