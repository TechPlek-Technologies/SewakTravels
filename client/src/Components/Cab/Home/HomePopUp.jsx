import { Dialog, DialogContent } from "@mui/material";
import styles from'./HomePopUp.module.css'
import { SendMail } from "../../../Utility/SendMail";

const HomePopUp = ({ setPhone_email, isPopupOpen, handlePopupClose,phone_email }) => {

  async function sendQueryEmail(){
    await SendMail("deepaksharmaa.39@gmail.com","Demo",`<h1>New Query From Mobile/Email: ${phone_email}</h1>`);
  }
  

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
                    onChange={(e)=>setPhone_email(e.target.value)}
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
                        // sendQueryEmail();

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
