import { Dialog, DialogContent } from "@mui/material";
import styles from "./HomePopUp.module.css";
import { SendMail } from "../../../Utility/SendMail";
import { useContext, useState } from "react";
import { PaymentContext } from "../../../Context/PaymentContext";
import { AppContext } from "../../../Context/JourneyContext";
import { Link } from "react-router-dom";

const HomePopUp = ({
  setPhone_email,
  isPopupOpen,
  handlePopupClose,
  phone_email,
  pathParams,
}) => {
  const { setPaymentData } = useContext(PaymentContext);
  const [isValidPhone, setIsValidPhone] = useState(true);
  const { journeyData, setJourneyData } = useContext(AppContext);
  async function sendQueryEmail(phone) {
    const res = await SendMail(
      "booking@sewaktravels.Com",
      "Demo",
      `<h1>New Query From Search bar:</h1>
      
      <h5>Mobile Number : ${phone}</h5>
      <h5>Source : ${pathParams.source}</h5>
      <h5>Destination : ${pathParams.destination}</h5>
      <h5>Trip Type : ${pathParams.selectedValue}</h5>
      <h5>Start Date : ${pathParams.startDate}</h5>
      `,
      "Booking Query"
    );
    console.log(res);
  }

  const handleChange = (e) => {
    const { value } = e.target;
    // Regular expression to validate a phone number
    const phoneRegex = /^\d{10}$/; // Change this regex according to your phone number format
    setIsValidPhone(phoneRegex.test(value));
    if (phoneRegex.test(value)) {
      setPhone_email(value);
      setPaymentData((prevState) => ({
        ...prevState, // Keep all existing fields
        contact: value, // Update just the firstName field
      }));
      handleSearch();
      sendQueryEmail(value);
    }
  };

  const handleSearch = async () => {
    const updatedObject = {
      ...journeyData,
      source: pathParams?.source,
      destination: pathParams?.destination,
      selectedValue: pathParams?.selectedValue,
      startDate: pathParams?.startDate,
      returnDate: pathParams?.returnDate,
      startTime: pathParams?.startTime,
      returnTime: pathParams?.returnTime,
      rentalPackage: pathParams?.rentals,
      email_phone: phone_email,
    };
    setJourneyData(updatedObject);
  };

  return (
    <>
      <Dialog open={isPopupOpen} onClose={handlePopupClose} fullWidth>
        <DialogContent>
          <div className="container">
            <div className="row">
              <div className="col ">
                <div className="input-group">
                  <input
                    type="number"
                    className="form-control"
                    placeholder="Enter Phone No. to continue"
                    aria-label="Recipient's username"
                    required
                    onChange={handleChange}
                    aria-controls=""
                  />

                  <div className={`input-group-append ${styles.mobile}`}>
                    <div className="btn btn-rounded btn-sm color1">
                      <Link
                        to={{
                          pathname: `/cabs/listing/${JSON.stringify(
                            pathParams
                          )}`,
                          state: { journeyData },
                        }}
                      >
                        Continue
                      </Link>
                    </div>
                  </div>
                </div>
                <div className={`input-group-append ${styles.desktop}`}>
                  <div className="btn btn-rounded btn-sm color1">
                  <Link
                        to={{
                          pathname: `/cabs/listing/${JSON.stringify(
                            pathParams
                          )}`,
                          state: { journeyData },
                        }}
                      >
                        Continue
                      </Link>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div className="container">
            <div className="row">
              <div className="col ">
                {!isValidPhone && (
                  <div style={{ color: "red" }}>Enter Valid Phone</div>
                )}
              </div>
            </div>
          </div>
        </DialogContent>
      </Dialog>
    </>
  );
};

export default HomePopUp;
